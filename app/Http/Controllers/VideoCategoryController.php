<?php

namespace App\Http\Controllers;

use App\Models\VideoCategory;
use Illuminate\Http\Request;
use Str;
use File;

class VideoCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_category = VideoCategory::orderBy('category_name','asc')->get();
        return view('backend.file.video-category.list', compact('all_category'));
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
        $category = new VideoCategory();
        $requested_data = $request->all();

        $gen_slug = Str::slug($request->category_name);
        $is_exists_slug = VideoCategory::where('category_name', $request->category_name)->count();
        if ($is_exists_slug > 0) {
            $gen_slug = $gen_slug. '-' . $is_exists_slug + 1 ;
        }
        $requested_data['slug'] = $gen_slug;

        if ($request->hasFile('image')) {
            $extension = $request->file('image')->getClientOriginalExtension();
            $name = 'image' . Str::random(5) . '.' . $extension;
            $path = "backend/assets/images/video-category/";
            $request->file('image')->move($path, $name);
            $requested_data['image'] = $path . $name;
        }
        $save = $category->fill($requested_data)->save();
        if($save){
            return redirect()->route('video.category.index')->with('message','Video Category Added Successfully');
        }else{
            return back()->with('error','Video Category Added Failed!!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\VideoCategory  $videoCategory
     * @return \Illuminate\Http\Response
     */
    public function status($id)
    {
        $status = VideoCategory::findOrFail($id);
        if ($status->status == 0) {
            $status->status = 1;
        } else {
            $status->status = 0;
        }
        $status->save();
        return redirect()->back()->with('message','Video Category Status Change Successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\VideoCategory  $videoCategory
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $lists = VideoCategory::findOrFail($id);
        return response()->json($lists, 201);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\VideoCategory  $videoCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id = $request->id;
        $update = VideoCategory::findOrFail($id);
        $formData = $request->all();
        if ($request->hasFile('image')) {
            if (File::exists($update->image)) {
                File::delete($update->image);
            }
            $extension = $request->file('image')->getClientOriginalExtension();
            $name = 'image' . Str::random(5) . '.' . $extension;
            $path = "backend/assets/images/video-category/";
            $request->file('image')->move($path, $name);
            $formData['image'] = $path . $name;
        }
        $updated = $update->fill($formData)->save();
        if($updated){
            return redirect()->route('video.category.index')->with('message','Video Category Updated Successfully');
        }else{
            return back()->with('error','Video Category Updated Failed');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\VideoCategory  $videoCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = VideoCategory::where('id', $id)->firstOrFail()->delete();
        return back()->with('message','Video Category Successfully Deleted');
    }
}
