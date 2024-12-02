<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;
use Str;
use File;

class TestimonialController extends Controller
{
/**
 * Display a listing of the resource.
 *
 * @return \Illuminate\Http\Response
 */
public function index()
{
    $all_testimonial = Testimonial::orderBy('id','desc')->get();
    return view('backend.file.testimonial.list', compact('all_testimonial'));
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
    $testimonial = new Testimonial();
    $requested_data = $request->all();
    if ($request->hasFile('image')) {
        $extension = $request->file('image')->getClientOriginalExtension();
        $name = 'image' . Str::random(5) . '.' . $extension;
        $path = "backend/assets/images/testimonial/";
        $request->file('image')->move($path, $name);
        $requested_data['image'] = $path . $name;
    }
    $save = $testimonial->fill($requested_data)->save();
    if($save){
        return redirect()->route('testimonial.index')->with('message','Testimonial Added Successfully');
    }else{
        return back()->with('error','Testimonial Added Failed!!');;
    }
}

/**
 * Display the specified resource.
 *
 * @param  \App\Models\Testimonial  $testimonial
 * @return \Illuminate\Http\Response
 */
public function status($id)
{
    $status = Testimonial::findOrFail($id);
    if ($status->status == 0) {
        $status->status = 1;
    } else {
        $status->status = 0;
    }
    $status->save();
    return redirect()->back()->with('message','Testimonial Status Change Successfully');
}

/**
 * Show the form for editing the specified resource.
 *
 * @param  \App\Models\Testimonial  $testimonial
 * @return \Illuminate\Http\Response
 */
public function edit($id)
{
    $lists = Testimonial::findOrFail($id);
    return response()->json($lists, 201);
}

/**
 * Update the specified resource in storage.
 *
 * @param  \Illuminate\Http\Request  $request
 * @param  \App\Models\Testimonial  $testimonial
 * @return \Illuminate\Http\Response
 */
public function update(Request $request)
{
    $id = $request->id;
    $update = Testimonial::findOrFail($id);
    $formData = $request->all();
    if ($request->hasFile('image')) {
        if (File::exists($update->image)) {
            File::delete($update->image);
        }
        $extension = $request->file('image')->getClientOriginalExtension();
        $name = 'image' . Str::random(5) . '.' . $extension;
        $path = "backend/assets/images/testimonial/";
        $request->file('image')->move($path, $name);
        $formData['image'] = $path . $name;
    }
    $updated = $update->fill($formData)->save();
    if($updated){
        return redirect()->route('testimonial.index')->with('message','Testimonial Updated Successfully');
    }else{
        return back()->with('error','Testimonial Updated Failed');
    }
}

/**
 * Remove the specified resource from storage.
 *
 * @param  \App\Models\Testimonial  $testimonial
 * @return \Illuminate\Http\Response
 */
public function destroy($id)
{
    Testimonial::where('id', $id)->firstOrFail()->delete();
    return back()->with('message','Testimonial Successfully Deleted');
}
}
