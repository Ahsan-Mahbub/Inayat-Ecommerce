<?php

namespace App\Http\Controllers;

use App\Models\SubCategory;
use Illuminate\Http\Request;
use Str;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_subcategory = SubCategory::orderBy('id','desc')->get();
        return view('backend.file.subcategory.list', compact('all_subcategory'));
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
        $subcategory = new SubCategory();
        $requested_data = $request->all();

        $gen_slug = Str::slug($request->subcategory_name);
        $is_exists_slug = SubCategory::where('subcategory_name', $request->subcategory_name)->count();
        if ($is_exists_slug > 0) {
            $gen_slug = $gen_slug. '-' . $is_exists_slug + 1 ;
        }
        $requested_data['slug'] = $gen_slug;

        $save = $subcategory->fill($requested_data)->save();
        if($save){
            return redirect()->route('subcategory.index')->with('message','Sub Category Added Successfully');
        }else{
            return back()->with('error','Sub Category Added Failed!!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function status($id)
    {
        $status = SubCategory::findOrFail($id);
        if ($status->status == 0) {
            $status->status = 1;
        } else {
            $status->status = 0;
        }
        $status->save();
        return redirect()->back()->with('message','Sub Category Status Change Successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $lists = SubCategory::findOrFail($id);
        return response()->json($lists, 201);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id = $request->id;
        $update = SubCategory::findOrFail($id);
        $formData = $request->all();
        $updated = $update->fill($formData)->save();
        if($updated){
            return redirect()->route('subcategory.index')->with('message','Sub Category Updated Successfully');
        }else{
            return back()->with('error','Sub Category Updated Failed');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = SubCategory::where('id', $id)->firstorfail()->delete();
        return back()->with('message','Sub Category Successfully Deleted');
    }
}
