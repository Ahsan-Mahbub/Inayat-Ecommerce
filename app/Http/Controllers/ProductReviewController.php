<?php

namespace App\Http\Controllers;

use App\Models\ProductReview;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class ProductReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::active()->get();
        $pageNumber = request()->query('page', 1);
        $perPage = 10;
        $offset = ($pageNumber - 1) * $perPage;
        $all_review = ProductReview::orderBy('id','desc')->paginate($perPage);   
        $sl = $offset + 1;    
        return view('backend.file.review.list', compact('all_review','sl','products'));
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
    public function store(Request $request)
    {
        $review = new ProductReview();
        $review->review = $request->review;
        $review->comments = $request->comments;
        $review->customer_name = $request->customer_name;
        $review->product_id = $request->product_id;
        $review->created_at = Carbon::now();
        $review->status = 1;
        $save = $review->save();
        if($save){
            return back()->with('message','Review Successfully Submitted!');
        }else{
            return back()->with('error','Something is wrong!');;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductReview  $productReview
     * @return \Illuminate\Http\Response
     */
    public function status($id)
    {
        $status = ProductReview::findOrFail($id);
        if ($status->status == 0) {
            $status->status = 1;
        } else {
            $status->status = 0;
        }
        $status->save();
        return redirect()->back()->with('message','Review Status Change Successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductReview  $productReview
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $lists = ProductReview::findOrFail($id);
        return response()->json($lists, 201);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProductReview  $productReview
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id = $request->id;
        $review = ProductReview::findOrFail($id);
        $review->review = $request->review;
        $review->comments = $request->comments;
        $review->customer_name = $request->customer_name;
        $review->product_id = $request->product_id;
        $updated = $review->save();
        if($updated){
            return back()->with('message','Review Updated Successfully');
        }else{
            return back()->with('error','Review Updated Failed');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductReview  $productReview
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ProductReview::where('id', $id)->firstOrFail()->delete();
        return back()->with('message','Review Successfully Deleted');
    }
}
