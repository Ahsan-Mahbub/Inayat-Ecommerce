<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\OrderInformation;
use App\Models\OrderProductInformation;
use App\Http\Requests\OrderRequest;
use Cart;
use Auth;

class OrderInformationController extends Controller
{
    public function orderStore(OrderRequest $request){
        // dd($request->all());
        $id = Auth::guard('customers')->user()->id;
        $customerInfo = [
            'name'   => $request->name,
            'phone'=> $request->phone,
            'address'=> $request->address,
        ];   
        $updated = Customer::where('id', $id)->update($customerInfo);

        $last_order = OrderInformation::orderBy('id','desc')->select('id')->first();
        $number = $last_order ? $last_order->id+1 : 1;
        $numberString = (string) $number;
        $length = strlen($numberString);
        $zerosToAdd = 4 - $length;
        $invoiceNumber = str_pad($numberString, $length + $zerosToAdd, '0', STR_PAD_LEFT); 


        $order_info = [
            'customer_id'   => $id,
            'invoice'=> 'invoice'.'-'.$invoiceNumber,
            'total_ammount'=> $request->total_ammount,
            'sub_total_ammount'=> $request->sub_total_ammount,
            'delivery_charge'=> $request->delivery_charge,
            'delivery_area'=> $request->delivery_area,
            'payment_method'=> $request->payment_method,
            'status'=> 2,
            'name'=>$request->name,
            'email'=>Auth::guard('customers')->user()->email,
            'phone'=>$request->phone,
            'address'=>$request->address,
            'type'=>'customer',
        ];
        $save = OrderInformation::create($order_info);
        $order_ids = $save['id'];
        $request_data=$request->all();
        $cart_data=[];
        for ($key=0; $key < count($request_data['product_id']); $key++) {
            $cart_data[]=[
                'order_id' => $order_ids,
                'product_id'=>$request_data['product_id'][$key],
                'category_name'=>$request_data['category_name'][$key],
                'product_img'=>$request_data['product_img'][$key],
                'product_name'=>$request_data['product_name'][$key],
                'watt'=>$request_data['watt'][$key],
                'color'=>$request_data['color'][$key],
                'dimmable_type'=>$request_data['dimmable_type'][$key],
                'temperature'=>$request_data['temperature'][$key],
                'price'=>$request_data['price'][$key],
                'qty'=>$request_data['qty'][$key],
                'total_price'=>$request_data['total_price'][$key],
            ];
        }
        OrderProductInformation::insert($cart_data);
        Cart::destroy();
        return redirect('/customer/dashboard')->with('message','Product Order Successfully');
    }

    public function guestOrderStore(OrderRequest $request)
    {
        $last_order = OrderInformation::orderBy('id','desc')->select('id')->first();
        $number = $last_order ? $last_order->id+1 : 1;
        $numberString = (string) $number;
        $length = strlen($numberString);
        $zerosToAdd = 4 - $length;
        $invoiceNumber = str_pad($numberString, $length + $zerosToAdd, '0', STR_PAD_LEFT); 

        $order_info = [
            'invoice'=> 'invoice'.'-'.$invoiceNumber,
            'total_ammount'=> $request->total_ammount,
            'sub_total_ammount'=> $request->sub_total_ammount,
            'delivery_charge'=> $request->delivery_charge,
            'delivery_area'=> $request->delivery_area,
            'payment_method'=> $request->payment_method,
            'status'=> 2,
            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'address'=>$request->address,
            'type'=>'customer',
        ];
        $save = OrderInformation::create($order_info);
        $order_ids = $save['id'];
        $request_data=$request->all();
        $cart_data=[];
        for ($key=0; $key < count($request_data['product_id']); $key++) {
            $cart_data[]=[
                'order_id' => $order_ids,
                'product_id'=>$request_data['product_id'][$key],
                'category_name'=>$request_data['category_name'][$key],
                'product_img'=>$request_data['product_img'][$key],
                'product_name'=>$request_data['product_name'][$key],
                'watt'=>$request_data['watt'][$key],
                'color'=>$request_data['color'][$key],
                'dimmable_type'=>$request_data['dimmable_type'][$key],
                'temperature'=>$request_data['temperature'][$key],
                'price'=>$request_data['price'][$key],
                'qty'=>$request_data['qty'][$key],
                'total_price'=>$request_data['total_price'][$key],
            ];
        }
        OrderProductInformation::insert($cart_data);
        Cart::destroy();
        return redirect('/')->with('message','Product Order Successfully');
    }

    public function dashboard()
    {
        $deliverd = OrderInformation::where('customer_id',Auth::guard('customers')->user()->id)->where('status',1)->count('id');
        $pandding = OrderInformation::where('customer_id',Auth::guard('customers')->user()->id)->where('status',2)->count('id');
        $rejected = OrderInformation::where('customer_id',Auth::guard('customers')->user()->id)->where('status',3)->count('id');
        $all = OrderInformation::where('customer_id',Auth::guard('customers')->user()->id)->count('id');

        $orders = OrderInformation::where('customer_id',Auth::guard('customers')->user()->id)->orderBy('id','desc')->limit(10)->get();
        return view('frontend.file.dashboard',compact('orders','deliverd','pandding','rejected','all'));
    }

    public function allOrder()
    {
        $orders = OrderInformation::where('customer_id',Auth::guard('customers')->user()->id)->orderBy('id','desc')->get();
        return view('frontend.file.customer.order',compact('orders'));
    }

    public function invoice($id)
    {
        $order = OrderInformation::findOrFail($id);
        $products=OrderProductInformation::where('order_id', $id)->orderBy('id', 'asc')->get();

        return view('frontend.file.customer.invoice', compact('order','products'));
    }
}