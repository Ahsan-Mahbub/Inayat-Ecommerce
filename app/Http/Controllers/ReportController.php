<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ReportController extends Controller
{
    public function stockIndex()
    {
        $p_categories = Category::get();
        $all_product = Product::paginate(20);
        return view('backend.file.report.product', compact('all_product','p_categories'));
    }

    public function stockGet(Request $request)
    {
        $p_categories = Category::get();
        $categoryId = $request->category_id;
        $all_product = Product::where('category_id', $categoryId)->paginate(20);
        return view('backend.file.report.product-report', compact('all_product','p_categories','categoryId'));
    }
}
