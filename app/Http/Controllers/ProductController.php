<?php

namespace App\Http\Controllers;

use Str;
use File;
use App\Models\Product;
use App\Models\ProductSize;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\ProductColor;
use App\Models\Temperature;
use App\Models\Space;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::get();
        $pageNumber = request()->query('page', 1);
        $perPage = 10;
        $offset = ($pageNumber - 1) * $perPage;
        $all_product = Product::orderBy('id','desc')->paginate($perPage);   
        $sl = $offset + 1;    
        return view('backend.file.product.list', compact('all_product','sl','categories'));
    }

    public function filterProduct(Request $request)
    {
        $categories = Category::get();
        $pageNumber = request()->query('page', 1);
        $perPage = 10;
        $offset = ($pageNumber - 1) * $perPage;

        $category_id = $request->input('category_id');
        $search = $request->input('search');

        $query = Product::query();

        if ($category_id) {
            $query->where('category_id', $category_id);
        }

        if($search){
            $query->where('product_name', 'LIKE', "%{$search}%");
        }

        $all_product = $query->paginate($perPage);

        $sl = $offset + 1;    

        return view('backend.file.product.filter-list', compact('all_product','category_id','search','sl'));
    }

    public function subcategory($id)
    {   
        $subcategories = SubCategory::where('category_id', $id)->get();
        return response()->json($subcategories, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $all_space = Space::active()->get();     
        $all_size = ProductSize::where('status', 1)->orderBy('id','desc')->get();
        $all_color = ProductColor::where('status', 1)->orderBy('id','desc')->get();
        $all_temperature = Temperature::where('status', 1)->orderBy('id','desc')->get();
        return view('backend.file.product.create', compact('all_space','all_size','all_color','all_temperature'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = new Product();
        $requested_data = $request->all();
        if($request->space_id)
        {
            $requested_data['space_id'] = json_encode(request('space_id'));
        }
        
        $gen_slug = Str::slug($request->product_name);
        
        $is_exists_slug = Product::where('product_name', $request->product_name)->count();
        if ($is_exists_slug > 0) {
            $gen_slug = $gen_slug. '-' . $is_exists_slug + 1 ;
        }
        $requested_data['slug'] = $gen_slug;

        if($request->color){
            $color = implode(',', $request->color);
        }
        else{
            $color = '';
        }

        if($request->size){
            $size = implode(',', $request->size);
        }
        else{
            $size = '';
        }

        if($request->temperature){
            $temperature = implode(',', $request->temperature);
        }
        else{
            $temperature = '';
        }

        if($request->dimmable_type){
            $dimmable_type = implode(',', $request->dimmable_type);
        }
        else{
            $dimmable_type = '';
        }

        $requested_data['color'] = $color;
        $requested_data['size'] = $size;
        $requested_data['temperature'] = $temperature;
        $requested_data['dimmable_type'] = $dimmable_type;

        $product->main_price = $request->price - $request->discount;
        if ($request->hasFile('image')) {
            $extension = $request->file('image')->getClientOriginalExtension();
            $name = 'image' . Str::random(5) . '.' . $extension;
            $path = "backend/assets/images/product/";
            $request->file('image')->move($path, $name);
            $requested_data['image'] = $path . $name;
        }
        if ($request->hasFile('image2')) {
            $extension = $request->file('image2')->getClientOriginalExtension();
            $name = 'image' . Str::random(5) . '.' . $extension;
            $path = "backend/assets/images/product/";
            $request->file('image2')->move($path, $name);
            $requested_data['image2'] = $path . $name;
        }
        if ($request->hasFile('image3')) {
            $extension = $request->file('image3')->getClientOriginalExtension();
            $name = 'image' . Str::random(5) . '.' . $extension;
            $path = "backend/assets/images/product/";
            $request->file('image3')->move($path, $name);
            $requested_data['image3'] = $path . $name;
        }
        if ($request->hasFile('image4')) {
            $extension = $request->file('image4')->getClientOriginalExtension();
            $name = 'image' . Str::random(5) . '.' . $extension;
            $path = "backend/assets/images/product/";
            $request->file('image4')->move($path, $name);
            $requested_data['image4'] = $path . $name;
        }
        if ($request->hasFile('image5')) {
            $extension = $request->file('image5')->getClientOriginalExtension();
            $name = 'image' . Str::random(5) . '.' . $extension;
            $path = "backend/assets/images/product/";
            $request->file('image5')->move($path, $name);
            $requested_data['image5'] = $path . $name;
        }
        if ($request->hasFile('image6')) {
            $extension = $request->file('image6')->getClientOriginalExtension();
            $name = 'image' . Str::random(5) . '.' . $extension;
            $path = "backend/assets/images/product/";
            $request->file('image6')->move($path, $name);
            $requested_data['image6'] = $path . $name;
        }
        if ($request->hasFile('image7')) {
            $extension = $request->file('image7')->getClientOriginalExtension();
            $name = 'image' . Str::random(5) . '.' . $extension;
            $path = "backend/assets/images/product/";
            $request->file('image7')->move($path, $name);
            $requested_data['image7'] = $path . $name;
        }
        if ($request->hasFile('image8')) {
            $extension = $request->file('image8')->getClientOriginalExtension();
            $name = 'image' . Str::random(5) . '.' . $extension;
            $path = "backend/assets/images/product/";
            $request->file('image8')->move($path, $name);
            $requested_data['image8'] = $path . $name;
        }
        $save = $product->fill($requested_data)->save();
        
        if($save){
            return redirect()->route('product.index')->with('message','Product Added Successfully');
        }else{
            return back()->with('error','Product Added Failed!!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    public function status($id)
    {
        $status = Product::findOrFail($id);
        if ($status->status == 0) {
            $status->status = 1;
        } else {
            $status->status = 0;
        }
        $status->save();
        return redirect()->back()->with('message','Product Status Change Successfully');
    }

    public function feature($id)
    {
        $feature = Product::findOrFail($id);
        if ($feature->feature == 0) {
            $feature->feature = 1;
        } else {
            $feature->feature = 0;
        }
        $feature->save();
        return redirect()->back()->with('message','Product Feature Change Successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $all_size = ProductSize::where('status', 1)->orderBy('id','desc')->get();
        $all_color = ProductColor::where('status', 1)->orderBy('id','desc')->get();
        $all_temperature = Temperature::where('status', 1)->orderBy('id','desc')->get();
        $all_space = Space::active()->get();     
        $product_sizes = explode(',', $product->size); 
        $product_colors = explode(',', $product->color); 
        $product_temperatures = explode(',', $product->temperature); 
        $product_dimmable_type = explode(',', $product->dimmable_type); 
        $subcategory = SubCategory::where('id', $product->subcategory_id)->first();
        return view('backend.file.product.edit', compact('product','subcategory','all_space','all_size', 'all_color', 'product_sizes', 'product_colors','product_temperatures','all_temperature','product_dimmable_type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $formData = $request->all();
        $update = Product::findOrFail($id);
        
        if($request->space_id){
            $formData['space_id'] = json_encode(request('space_id'));
        }else{
            $formData['space_id'] = '';
        }
        $update->main_price = $request->price - $request->discount; 
        if($request->color){
            $color = implode(',', $request->color);
        }else{
            $color = '';
        }
        if($request->size){
            $size = implode(',', $request->size);
        }else{
            $size = '';
        }
        if($request->temperature){
            $temperature = implode(',', $request->temperature);
        }else{
            $temperature = '';
        }

        if($request->dimmable_type){
            $dimmable_type = implode(',', $request->dimmable_type);
        }else{
            $dimmable_type = '';
        }
        
        $formData['color'] = $color;
        $formData['size'] = $size;
        $formData['temperature'] = $temperature;
        $formData['dimmable_type'] = $dimmable_type;
        //image1
        if ($request->input('remove_image') == '1') {
            if (File::exists($update->image)) {
                File::delete($update->image);
            }
            $update->image = null;
        }
        if ($request->hasFile('image')) {
            if (File::exists($update->image)) {
                File::delete($update->image);
            }
            $extension = $request->file('image')->getClientOriginalExtension();
            $name = 'image' . Str::random(5) . '.' . $extension;
            $path = "backend/assets/images/product/";
            $request->file('image')->move($path, $name);
            $formData['image'] = $path . $name;
        }
        //image2
        if ($request->input('remove_image2') == '1') {
            if (File::exists($update->image2)) {
                File::delete($update->image2);
            }
            $update->image2 = null;
        }
        if ($request->hasFile('image2')) {
            if (File::exists($update->image2)) {
                File::delete($update->image2);
            }
            $extension = $request->file('image2')->getClientOriginalExtension();
            $name = 'image' . Str::random(5) . '.' . $extension;
            $path = "backend/assets/images/product/";
            $request->file('image2')->move($path, $name);
            $formData['image2'] = $path . $name;
        }
        //image3
        if ($request->input('remove_image3') == '1') {
            if (File::exists($update->image3)) {
                File::delete($update->image3);
            }
            $update->image3 = null;
        }
        if ($request->hasFile('image3')) {
            if (File::exists($update->image3)) {
                File::delete($update->image3);
            }
            $extension = $request->file('image3')->getClientOriginalExtension();
            $name = 'image' . Str::random(5) . '.' . $extension;
            $path = "backend/assets/images/product/";
            $request->file('image3')->move($path, $name);
            $formData['image3'] = $path . $name;
        }
        //image4
        if ($request->input('remove_image4') == '1') {
            if (File::exists($update->image4)) {
                File::delete($update->image4);
            }
            $update->image4 = null;
        }
        if ($request->hasFile('image4')) {
            if (File::exists($update->image4)) {
                File::delete($update->image4);
            }
            $extension = $request->file('image4')->getClientOriginalExtension();
            $name = 'image' . Str::random(5) . '.' . $extension;
            $path = "backend/assets/images/product/";
            $request->file('image4')->move($path, $name);
            $formData['image4'] = $path . $name;
        }
        //image5
        if ($request->input('remove_image5') == '1') {
            if (File::exists($update->image5)) {
                File::delete($update->image5);
            }
            $update->image5 = null;
        }
        if ($request->hasFile('image5')) {
            if (File::exists($update->image5)) {
                File::delete($update->image5);
            }
            $extension = $request->file('image5')->getClientOriginalExtension();
            $name = 'image' . Str::random(5) . '.' . $extension;
            $path = "backend/assets/images/product/";
            $request->file('image5')->move($path, $name);
            $formData['image5'] = $path . $name;
        }
        //image6
        if ($request->input('remove_image6') == '1') {
            if (File::exists($update->image6)) {
                File::delete($update->image6);
            }
            $update->image6 = null;
        }
        if ($request->hasFile('image6')) {
            if (File::exists($update->image6)) {
                File::delete($update->image6);
            }
            $extension = $request->file('image6')->getClientOriginalExtension();
            $name = 'image' . Str::random(5) . '.' . $extension;
            $path = "backend/assets/images/product/";
            $request->file('image6')->move($path, $name);
            $formData['image6'] = $path . $name;
        }
        //image7
        if ($request->input('remove_image7') == '1') {
            if (File::exists($update->image7)) {
                File::delete($update->image7);
            }
            $update->image7 = null;
        }
        if ($request->hasFile('image7')) {
            if (File::exists($update->image7)) {
                File::delete($update->image7);
            }
            $extension = $request->file('image7')->getClientOriginalExtension();
            $name = 'image' . Str::random(5) . '.' . $extension;
            $path = "backend/assets/images/product/";
            $request->file('image7')->move($path, $name);
            $formData['image7'] = $path . $name;
        }
        //image8
        if ($request->input('remove_image8') == '1') {
            if (File::exists($update->image8)) {
                File::delete($update->image8);
            }
            $update->image8 = null;
        }
        if ($request->hasFile('image8')) {
            if (File::exists($update->image8)) {
                File::delete($update->image8);
            }
            $extension = $request->file('image8')->getClientOriginalExtension();
            $name = 'image' . Str::random(5) . '.' . $extension;
            $path = "backend/assets/images/product/";
            $request->file('image8')->move($path, $name);
            $formData['image8'] = $path . $name;
        }

        $updated = $update->fill($formData)->save();
        if($updated){
            return back()->with('message','Product Updated Successfully');
        }else{
            return back()->with('error','Product Updated Failed');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::where('id', $id)->firstOrFail()->delete();
        return back()->with('message','Product Successfully Deleted');
    }
}
