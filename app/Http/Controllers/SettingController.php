<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use Str;
use File;


class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $information = Setting::first();
        return view('backend.file.setting.index', compact('information'));
    }

    public function promo()
    {
        $information = Setting::first();
        return view('backend.file.setting.promo', compact('information'));
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
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function show(Setting $setting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function edit(Setting $setting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $update = Setting::findOrFail($id);
        $formData = $request->all();
        if ($request->hasFile('image')) {
            if (File::exists($update->image)) {
                File::delete($update->image);
            }
            $extension = $request->file('image')->getClientOriginalExtension();
            $name = 'image' . Str::random(5) . '.' . $extension;
            $path = "logo/";
            $request->file('image')->move($path, $name);
            $formData['image'] = $path . $name;
        }
        if ($request->hasFile('e_catalogue')) {
            if (File::exists($update->e_catalogue)) {
                File::delete($update->e_catalogue);
            }
            $extension = $request->file('e_catalogue')->getClientOriginalExtension();
            $name = 'e_catalogue' . Str::random(5) . '.' . $extension;
            $path = "pdf/";
            $request->file('e_catalogue')->move($path, $name);
            $formData['e_catalogue'] = $path . $name;
        }
        $updated = $update->fill($formData)->save();
        if($updated){
            return back()->with('message','Site Information Updated Successfully');
        }else{
            return back()->with('error','Site Information Updated Failed');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function destroy(Setting $setting)
    {
        //
    }

    public function eCatalogue()
    {
        $information = Setting::select('id','e_catalogue','image')->first();
        return view('backend.file.setting.e-catalogue', compact('information'));
    }
}
