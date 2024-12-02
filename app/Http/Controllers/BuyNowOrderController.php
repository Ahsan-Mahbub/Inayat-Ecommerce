<?php

namespace App\Http\Controllers;

use App\Models\BuyOrder;
use Illuminate\Http\Request;

class BuyNowOrderController extends Controller
{
    //  buyNowOrderIndex
    public function buyNowOrderIndex(){
        $pageNumber = request()->query('page', 1);
        $perPage = 10;
        $offset = ($pageNumber - 1) * $perPage;
        $sl = $offset + 1; 

        $all_data = BuyOrder::with('product')->orderBy('id','desc')->paginate($perPage);
        return view('backend.file.order.buy-now-order-list', compact('all_data'));
    }
}
