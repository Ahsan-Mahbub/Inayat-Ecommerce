<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\Product;
use App\Models\Category;
use App\Models\Banner;
use App\Models\Space;
use App\Models\Testimonial;

class HomeController extends Controller
{
    public function home()
    {
        $sliders = Slider::active()->orderBy('priority','asc')->get();
        $products = Product::where('feature',1)->active()->orderBy('id','desc')->get();
        $short_categories = Category::active()->orderBy('priority','asc')->get();
        $short_space = Space::active()->orderBy('priority','asc')->limit(5)->get();
        $home_categories = Category::has('product')
            ->active()
            ->orderBy('priority','asc')
            ->paginate(5)
            ->map(function( $category ){
                $category->product = $category->product->take(8);
            return $category;
        });
        $banner = Banner::first();
        $testimonials = Testimonial::active()->orderBy('priority','asc')->get();
        return view('frontend.layouts.home', compact('sliders','products','home_categories','banner','short_categories','short_space','testimonials'));
    }
}
