<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;
use Str;
use File;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banner = Banner::first();
        return view('backend.file.banner.index', compact('banner'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function show(Banner $banner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function edit(Banner $banner)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $update = Banner::findOrFail($id);
        $formData = $request->all();
        if ($request->hasFile('image')) {
            if (File::exists($update->image)) {
                File::delete($update->image);
            }
            $extension = $request->file('image')->getClientOriginalExtension();
            $name = 'image' . Str::random(5) . '.' . $extension;
            $path = "backend/assets/images/banner/";
            $request->file('image')->move($path, $name);
            $formData['image'] = $path . $name;
        }
        if ($request->hasFile('image2')) {
            if (File::exists($update->image2)) {
                File::delete($update->image2);
            }
            $extension = $request->file('image2')->getClientOriginalExtension();
            $name = 'image' . Str::random(5) . '.' . $extension;
            $path = "backend/assets/images/banner/";
            $request->file('image2')->move($path, $name);
            $formData['image2'] = $path . $name;
        }
        if ($request->hasFile('image3')) {
            if (File::exists($update->image3)) {
                File::delete($update->image3);
            }
            $extension = $request->file('image3')->getClientOriginalExtension();
            $name = 'image' . Str::random(5) . '.' . $extension;
            $path = "backend/assets/images/banner/";
            $request->file('image3')->move($path, $name);
            $formData['image3'] = $path . $name;
        }
        if ($request->hasFile('image4')) {
            if (File::exists($update->image4)) {
                File::delete($update->image4);
            }
            $extension = $request->file('image4')->getClientOriginalExtension();
            $name = 'image' . Str::random(5) . '.' . $extension;
            $path = "backend/assets/images/banner/";
            $request->file('image4')->move($path, $name);
            $formData['image4'] = $path . $name;
        }
        if ($request->hasFile('image5')) {
            if (File::exists($update->image5)) {
                File::delete($update->image5);
            }
            $extension = $request->file('image5')->getClientOriginalExtension();
            $name = 'image' . Str::random(5) . '.' . $extension;
            $path = "backend/assets/images/banner/";
            $request->file('image5')->move($path, $name);
            $formData['image5'] = $path . $name;
        }
        if ($request->hasFile('image6')) {
            if (File::exists($update->image6)) {
                File::delete($update->image6);
            }
            $extension = $request->file('image6')->getClientOriginalExtension();
            $name = 'image' . Str::random(5) . '.' . $extension;
            $path = "backend/assets/images/banner/";
            $request->file('image6')->move($path, $name);
            $formData['image6'] = $path . $name;
        }
        $updated = $update->fill($formData)->save();
        if($updated){
            return back()->with('message','Promotional Banner Updated Successfully');
        }else{
            return back()->with('error','Promotional Banner Updated Failed');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Banner $banner)
    {
        //
    }
}
