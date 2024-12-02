<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\OrderInformation;
use App\Models\OrderProductInformation;
use Illuminate\Http\Request;

class OrderInformationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pageNumber = request()->query('page', 1);
        $perPage = 10;
        $offset = ($pageNumber - 1) * $perPage;
        $all_order = OrderInformation::where('type', 'customer')->orderBy('id','desc')->paginate($perPage);
        $sl = $offset + 1;   
        return view('backend.file.order.list',compact('all_order','sl'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function invoice($id)
    {
        $order = OrderInformation::findOrFail($id);
        $products=OrderProductInformation::where('order_id', $id)->orderBy('id', 'asc')->get();

        return view('backend.file.order.invoice', compact('order','products'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\OrderInformation  $orderInformation
     * @return \Illuminate\Http\Response
     */
    public function status(Request $request, $id)
    {
        if( $request->status == 1 )
        {
            $order_products = OrderProductInformation::where('order_id', $id)->get();
            $products_data = [];

            foreach ($order_products as $order_product) {
                $product = Product::where('id', $order_product['product_id'])->first();
                $stock = $product->stock - $order_product['qty'];
                $sale = $product->sale + $order_product['qty'];

                $products_data[$order_product['product_id']] = [
                    'stock' => $stock,
                    'sale'  => $sale,
                ];
            }

            foreach ($products_data as $product_id => $data) {
                Product::where('id', $product_id)->update($data);
            }
        }
        $status = $request->status;
        $post_status = OrderInformation::findOrFail($id);
        $post_status->status = $status;
        $post_status->save();
        return redirect()->back()->with('message','Order Status Change Successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OrderInformation  $orderInformation
     * @return \Illuminate\Http\Response
     */
    public function edit(OrderInformation $orderInformation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\OrderInformation  $orderInformation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OrderInformation $orderInformation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OrderInformation  $orderInformation
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = OrderInformation::where('id', $id)->firstorfail()->delete();
        return back()->with('message','Data Successfully Deleted');
    }

    public function statusWiseOrderList($status)
    {  
        $pageNumber = request()->query('page', 1);
        $perPage = 10;
        $offset = ($pageNumber - 1) * $perPage;
        $sl = $offset + 1; 
        $all_order = OrderInformation::where('status', $status)->where('type', 'customer')->orderBy('id','desc')->paginate($perPage);
        return view('backend.file.order.status-wise-order-list',compact('all_order', 'status','sl'));
    }
}