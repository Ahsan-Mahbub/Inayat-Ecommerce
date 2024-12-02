<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Cart;
use Illuminate\Support\Facades\View;

class CartController extends Controller
{
    public function cart()
    {
        return view('frontend.file.cart');
    }
    public function checkout()
    {
        return view('frontend.file.checkout');        
    }

    public function guestCheckout()
    {
        return view('frontend.file.guest-checkout');
    }

    //  add to cart product by ajax
    public function addToCart(Request $request){
        $productDetails = Product::where('id',$request->product_id)->with('category')->first();
        $product_sizes = explode(',', $productDetails->size); 
        $product_colors = explode(',', $productDetails->color); 
        $product_temperatures = explode(',', $productDetails->temperature); 
        return response()->json([
            'status' => 'success',
            'view' => (String)View::make('frontend.file.product.ajax_add_to_cart_model_content')->with(compact('productDetails', 'product_sizes', 'product_colors','product_temperatures')),
        ]);
    }

    //  add to cart product form details page by ajax
    public function addToCartProduct(Request $request){
        // dd($request->all());
        if ($request->ajax()) {
            $data = $request->all();
            //  Store Cart 
            $data['id']=$request->product_id;
            $data['name']=$request->product_name;
            $data['qty']=$request->quantity;
            $data['price']=$request->product_price;  
            $data['weight']=0; 
            $data['options']['color']=$request->color;
            $data['options']['watt']=$request->watt;
            $data['options']['temperature']=$request->temperature;
            $data['options']['dimmable_type']=$request->dimmable_type;
            $data['options']['product_img']=$request->product_img;
            $data['options']['category_name']=$request->category_name;
            $data['options']['total_price']=$request->product_price * $request->quantity;

            Cart::add($data);
        
            return response()->json([ 'status' => 'success', 'modal' => 'false', 'message' => 'Successfully added in your cart!']);
        }
    }

    //  Mini cart update by ajax
    public function miniCartUpdate(Request $request){        
        if ($request->ajax()) {           
            $getCountCartItems = Cart::content()->count();
            $getCountAmount = Cart::subtotal();
            return response()->json([ 'status' => 'success', 'getCountCartItems' => $getCountCartItems, 'getCountAmount' => $getCountAmount ]);
        }
    }

    //  Cart Item Delete by ajax
    public function cartDelete(Request $request){
        Cart::remove($request->cart_id);
        $all_cart = Cart::content();

        return response()->json([
            'status' => 'success',
            'message' => 'Cart item deleted Successfully!',
            'view' => (String)View::make('frontend.file.cart-item')->with(compact('all_cart')),
        ]);
    }

    //  Cart Item Update by ajax
    public function cartUpdate(Request $request){
        Cart::update($request->cart_id, $request->new_qty);
        $all_cart = Cart::content();
        
        return response()->json([
            'status' => 'success',
            'message' => 'Cart quantity updated Successfully!',
            'view' => (String)View::make('frontend.file.cart-item')->with(compact('all_cart')),
        ]);
    }
    
}