<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\OrderInformation;
use App\Models\OrderProductInformation;
use App\Http\Requests\OrderRequest;
use Illuminate\Support\Facades\Validator;

class SaleController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'product_id' => 'required',
        ]);

        $request_data=$request->all();
        $price = $request_data['price'];
        $qty = $request_data['qty'];

        $total_price = 0;
        for ($i = 0; $i < count($price); $i++) {
            $price_value = intval($price[$i]);
            $qty_value = intval($qty[$i]);
            $product_total = $price_value * $qty_value;
            $total_price += $product_total;
        }

        $last_order = OrderInformation::orderBy('id','desc')->select('id')->first();
        $number = $last_order ? $last_order->id+1 : 1;
        $numberString = (string) $number;
        $length = strlen($numberString);
        $zerosToAdd = 4 - $length;
        $invoiceNumber = str_pad($numberString, $length + $zerosToAdd, '0', STR_PAD_LEFT); 

        $customer = Customer::where('id', $request->customer_id)->first();
        $order_info = [
            'customer_id'   => $customer->id,
            'invoice'=> 'invoice'.'-'.$invoiceNumber,
            'total_ammount'=> $total_price,
            'status'=> 2,
            'name'=>$customer->name,
            'email'=>$customer->email,
            'phone'=>$customer->phone,
            'address'=>$customer->address,
            'type'=>'admin',
        ];
        $save = OrderInformation::create($order_info);
        $order_ids = $save['id'];

        $admin_checkout_data=[];
        for ($key=0; $key < count($request_data['product_id']); $key++) {
            $qty = isset($request_data['qty'][$key]) ? $request_data['qty'][$key] : 0;
            $price = isset($request_data['price'][$key]) ? $request_data['price'][$key] : 0;
            $total_price = $qty * $price;

            $admin_checkout_data[]=[
                'order_id' => $order_ids,
                'product_id'=>$request_data['product_id'][$key],
                'category_name'=>$request_data['category_name'][$key],
                'product_img'=>$request_data['product_img'][$key],
                'product_name'=>$request_data['product_name'][$key],
                'price'=>$request_data['price'][$key],
                'qty'=>$request_data['qty'][$key],
                'total_price'=>$total_price,
            ];
        }
        OrderProductInformation::insert($admin_checkout_data);

        return redirect()->route('order.admin.index')->with('message','Sales Successfully Created');
    }
}
