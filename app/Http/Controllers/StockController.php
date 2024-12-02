<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Stock;
use App\Models\ProductSize;
use App\Models\ProductColor;
use App\Models\Temperature;
use App\Models\Space;
use Illuminate\Http\Request;
use DB;

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_stock = Stock::get();
        return view('backend.file.stock.list', compact('all_stock'));
    }
    
    public function totalStock()
    {
        $all_stock = Stock::select('product_id', 'color', 'watt', 'temperature', 'dimmable_type', DB::raw('SUM(quantity) as total_stock'))
                    ->groupBy('product_id', 'color', 'watt', 'temperature', 'dimmable_type')
                    ->orderBy('total_stock', 'desc')
                    ->get();

        return view('backend.file.stock.all-stock', compact('all_stock'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::active()->get();
        return view('backend.file.stock.create', compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        if ($request->product_id == null) {
            return redirect()->back()->with('error', 'Sorry! You do not select any item');
        }

        DB::beginTransaction();
        
        for ($key=0; $key < count($data['product_id']); $key++) {
            $stock = new Stock;
            $stock->product_id = $data['product_id'][$key];
            $stock->color = strtolower($data['color'][$key]);
            $stock->watt = strtolower($data['watt'][$key]);
            $stock->temperature = strtolower($data['temperature'][$key]);
            $stock->dimmable_type = strtolower($data['dimmable_type'][$key]);
            $stock->quantity = $data['quantity'][$key];
            $stock->price = $data['price'][$key];
            $stock->save();
        } 
        DB::commit();
        return redirect()->route('stock.index')->with('message', 'Product Stock Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function show(Stock $stock)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $stock = Stock::findOrFail($id);
        $product = Product::where('id',$stock->product_id)->select('id', 'product_name', 'size', 'color','main_price','temperature','dimmable_type')->first();
        return view('backend.file.stock.edit', compact('product','stock'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $update = Stock::findOrFail($id);
        $formData = $request->all();
        $updated = $update->fill($formData)->save();
        if($updated){
            return redirect()->route('stock.index')->with('message','Stock Updated Successfully');
        }else{
            return back()->with('error','Stock Updated Failed');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Stock::where('id', $id)->firstOrFail()->delete();
        return back()->with('message','Stock Product Successfully Deleted');
    }

    public function getSearchProduct(Request $request){
        if ($request->searchDataLength >= 0) {
            $products = Product::active()->where("product_name","LIKE","%".$request->search."%")
            ->orWhere('slug',"LIKE","%".$request->search."%")
            ->get();
        }
        else {
            $products = Product::get();
        }
        return view('backend.file.stock.search-product', compact('products'));
    }


    public function getProductDetails(Request $request){
        $data['productDetails'] = Product::where('id', $request->product_id)->select('id', 'product_name', 'size', 'color','main_price','temperature','dimmable_type')->first();
        $data['rand'] = mt_rand(1, 99999);
        return response()->json($data);
    }   
}
