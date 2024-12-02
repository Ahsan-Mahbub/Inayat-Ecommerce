<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductReview;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

class ProductReviewController extends Controller
{
    public function reviewStore(Request $request){
        $review = new ProductReview();
        $review->review = $request->rate_value;
        $review->comments = $request->comments;
        $review->customer_id = Auth::guard('customers')->user()->id;
        $review->product_id = $request->product_id;
        $review->created_at = Carbon::now();
        $review->status = 0;
        $save = $review->save();
        if($save){
            return back()->with('message','Review Successfully Submitted!');
        }else{
            return back()->with('error','Something is wrong!');;
        }
    }
}
