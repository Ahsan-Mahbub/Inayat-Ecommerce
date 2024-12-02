<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Stock;

class SearchController extends Controller
{
    public function search(Request $request){
        $search = $request->input('product_name');
        $category_id = $request->input('category_id');

        if($category_id){
            $products = Product::query()
                ->active()
                ->where('product_name', 'LIKE', "%{$search}%")
                ->where('category_id', $category_id)
                ->paginate(15);
        }else{
            $products = Product::query()
                ->active()
                ->where('product_name', 'LIKE', "%{$search}%")
                ->paginate(15);
        }
        return view('frontend.file.product.search',compact('products'));
    }

    public function getPrice(Request $request)
    {
        $product_price = Product::where('id', $request->product_id)->select('main_price')->first();
        $stock_price = Stock::where('product_id', $request->product_id)->where('watt', $request->watt)->where('color', $request->color)->where('temperature', $request->temperature)->where('dimmable_type', $request->dimmable_type)->orderBy('id','desc')->select('price')->first();

        if($stock_price)
        {
            $price = $stock_price;
        }else{
            $price = $product_price;
        }
        return response()->json($price, 200);
    }
}
