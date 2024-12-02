<?php

namespace App\Http\Controllers\Frontend;

use Carbon\Carbon;
use App\Models\Message;
use App\Models\Product;
use App\Models\BuyOrder;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Space;
use App\Models\Blog;
use App\Models\Client;
use App\Models\Certificate;
use App\Models\ProductReview;
use App\Models\VideoCategory;
use App\Models\Video;
use App\Models\Team;
use App\Models\Project;
use App\Models\ProjectImage;
use App\Models\Dealer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;

class FrontendController extends Controller
{
    public function product()
    {
        $products = Product::active()->orderBy('id','desc')->paginate(16);
        return view('frontend.file.product.product', compact('products'));
    }

    public function shopBySpace()
    {
        $spaces = Space::active()->orderBy('priority','asc')->get();
        return view('frontend.file.space', compact('spaces'));
    }

    public function categoryProduct($slug)
    {
        $main_category = Category::where('slug', $slug)->first();
        $categories = Category::active()->orderBy('priority','asc')->get();
        $subcategories = SubCategory::where('category_id', $main_category->id)->active()->orderBy('priority','asc')->get();
        if($main_category){
            $products = Product::where('category_id', $main_category->id)->active()->orderBy('id','desc')->paginate(16);
            return view('frontend.file.product.category-product', compact('products','main_category','subcategories','categories'));
        }else{
            return redirect('/');
        }
    }

    public function subCategoryProduct($slug)
    {
        $subcategory = SubCategory::where('slug', $slug)->first();
        if($subcategory){
            $products = Product::where('subcategory_id', $subcategory->id)->active()->orderBy('id','desc')->paginate(16);
            return view('frontend.file.product.subcategory-product', compact('products','subcategory'));
        }else{
            return redirect('/');
        }
    }

    public function shopBySpaceProduct($slug)
    {
        $space = Space::where('slug', $slug)->first();
        if($space){
            $products = Product::whereJsonContains('space_id', strval($space->id))->active()->orderBy('id','desc')->paginate(16);
            return view('frontend.file.product.space-product', compact('products','space'));
        }else{
            return redirect('/');
        }
    }

    public function singleProduct($slug)
    {
        $product = Product::where('slug', $slug)->first();
        if($product)
        {
            $product_sizes = explode(',', $product->size); 
            usort($product_sizes, function ($a, $b) {
                return (int) $a <=> (int) $b;
            });
            $product_colors = explode(',', $product->color); 
            $product_temperatures = explode(',', $product->temperature); 
            sort($product_temperatures);
            $product_dimmable_type = explode(',', $product->dimmable_type); 
            $products = Product::where('category_id', $product->category_id)->where('id','!=',$product->id)->limit(12)->get();
            $reviews = ProductReview::where('status',1)->where('product_id', $product->id)->orderBy('id','desc')->get();
            return view('frontend.file.product.single-product', compact('product','products', 'product_sizes', 'product_colors','product_temperatures','product_dimmable_type','reviews'));
        }else{
            return back();
        }
    }

    public function message(Request $request){
        $message = new Message();
        $requested_data = $request->all();
        $save = $message->fill($requested_data)->save();
        if($save){
            return back()->with('message','Enquire Message Send Successfully');
        }else{
            return back()->with('error','Enquire Message Send Failed!!');;
        }
    }

    public function customerPreOrderStore(Request $request){
        $buyOrder = new BuyOrder();
        $buyOrder->date = date('Y-m-d', strtotime(Carbon::now()));
        $buyOrder->name = $request->name;
        $buyOrder->phone = $request->phone;
        $buyOrder->email = $request->email;
        $buyOrder->address = $request->address;
        $buyOrder->product_id = $request->product_id;
        $buyOrder->created_at = Carbon::now();
        $save = $buyOrder->save();
        if($save){
            return back()->with('message','Thanks, Your Order Successfully Done!');
        }else{
            return back()->with('error','Opps, Your Order Failed!');;
        }
    }

    public function blog()
    {
        $blogs = Blog::active()->orderBy('priority','asc')->get();
        return view('frontend.file.blog', compact('blogs'));
    }

    public function singleBlog($slug)
    {
        $blog = Blog::where('slug', $slug)->first();
        if($blog){
            return view('frontend.file.single-blog', compact('blog'));
        }else{
            return redirect('/');
        }
    }

    public function client()
    {
        $clients = Client::active()->orderBy('priority','asc')->get();
        return view('frontend.file.client', compact('clients'));
    }

    public function getSidebarProduct(Request $request)
    {
        $query = Product::query();
        if ($request->side_category) {
            $query->whereIn('category_id', $request->side_category);
        }
        if ($request->side_status) {
            $query->whereIn('stock_status', $request->side_status);
        }
        if ($request->side_minimum && $request->side_maximum) {
            $query->whereBetween('price', [$request->side_minimum, $request->side_maximum]);
        }
        $products = $query->where('status', 1)->orderBy('id', 'desc')->paginate(48);
        
        return response()->json([
            'status' => 'success',
            'view' => (string) View::make('frontend.file.product.replace-product')->with(compact('products')),
        ]);
    }

    public function certificate()
    {
        $certificates = Certificate::active()->orderBy('priority','asc')->get();
        return view('frontend.file.certificate', compact('certificates'));
    }

    public function videoCategory()
    {
        $video = Video::active()->orderBy('priority','asc')->first();
        $categories = VideoCategory::active()->orderBy('priority','asc')->get();
        return view('frontend.file.video-category', compact('categories','video'));
    }

    public function video($slug)
    {
        $category = VideoCategory::active()->where('slug',$slug)->first();
        if($category)
        {
            $videos = Video::active()->where('category_id', $category->id)->orderBy('priority','asc')->get();
            return view('frontend.file.video', compact('category','videos'));
        }else{
            return back();
        }
    }

    public function team()
    {
        $teams = Team::active()->orderBy('priority','asc')->get();
        return view('frontend.file.team', compact('teams'));
    }

    public function singleTeam($slug)
    {
        $team = Team::active()->where('slug',$slug)->first();
        if($team)
        {
            return view('frontend.file.single-team', compact('team'));
        }else{
            return back();
        }
    }

    public function project()
    {
        $projects = Project::active()->orderBy('priority','asc')->get();
        return view('frontend.file.project', compact('projects'));
    }

    public function singleProject($slug)
    {
        $project = Project::active()->where('slug',$slug)->first();
        $images = ProjectImage::where('project_id', $project->id)->orderBy('id','desc')->get();
        if($project)
        {
            return view('frontend.file.single-project', compact('project','images'));
        }else{
            return back();
        }
    }

    public function dealerStore(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'phone' => 'required|string|max:20',
            'address' => 'required|string',
            'company_name' => 'required|string|max:255',
            'company_email' => 'nullable|email|max:255',
            'company_phone' => 'required|string|max:20',
            'company_address' => 'required|string',
        ]);
        
        $message = new Dealer();
        $requested_data = $request->all();
        $save = $message->fill($requested_data)->save();
        if($save){
            return back()->with('message','Dealer Request Successfully');
        }else{
            return back()->with('error','Dealer Request Failed!!');;
        }
    }
}
