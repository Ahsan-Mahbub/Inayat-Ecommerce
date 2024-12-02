<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\ProjectImage;
use Illuminate\Http\Request;
use Str;
use File;

class projectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_project = Project::orderBy('id','desc')->get();
        return view('backend.file.project.list', compact('all_project'));
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
        $project = new Project();
        $requested_data = $request->all();

        $gen_slug = Str::slug($request->project_name);
        
        $is_exists_slug = Project::where('project_name', $request->project_name)->count();
        if ($is_exists_slug > 0) {
            $gen_slug = $gen_slug. '-' . $is_exists_slug + 1 ;
        }
        $requested_data['slug'] = $gen_slug;

        if ($request->hasFile('image')) {
            $extension = $request->file('image')->getClientOriginalExtension();
            $name = 'image' . Str::random(5) . '.' . $extension;
            $path = "backend/assets/images/project/";
            $request->file('image')->move($path, $name);
            $requested_data['image'] = $path . $name;
        }
        $save = $project->fill($requested_data)->save();
        if($save){
            return redirect()->route('project.index')->with('message','Project Added Successfully');
        }else{
            return back()->with('error','Project Added Failed!!');;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function status($id)
    {
        $status = Project::findOrFail($id);
        if ($status->status == 0) {
            $status->status = 1;
        } else {
            $status->status = 0;
        }
        $status->save();
        return redirect()->back()->with('message','Project Status Change Successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $project = Project::findOrFail($id);
        return view('backend.file.project.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id = $request->id;
        $update = Project::findOrFail($id);
        $formData = $request->all();
        if ($request->hasFile('image')) {
            if (File::exists($update->image)) {
                File::delete($update->image);
            }
            $extension = $request->file('image')->getClientOriginalExtension();
            $name = 'image' . Str::random(5) . '.' . $extension;
            $path = "backend/assets/images/project/";
            $request->file('image')->move($path, $name);
            $formData['image'] = $path . $name;
        }
        $updated = $update->fill($formData)->save();
        if($updated){
            return redirect()->route('project.index')->with('message','Project Updated Successfully');
        }else{
            return back()->with('error','Project Updated Failed');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Project::where('id', $id)->firstOrFail()->delete();
        return back()->with('message','Project Successfully Deleted');
    }

    public function image($id)
    {
        $project = Project::findOrFail($id);
        $images = ProjectImage::where('project_id', $project->id)->orderBy('id','desc')->get();
        return view('backend.file.project.image', compact('project','images'));

    }

    public function imageStore(Request $request)
    {
        $requested_data = $request->all();
        $savedImages = [];

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $imageFile) {
                $extension = $imageFile->getClientOriginalExtension();
                $name = 'image' . Str::random(5) . '.' . $extension;
                $path = "backend/assets/images/project/";
                $imageFile->move($path, $name);
                $requested_data['image'] = $path . $name;
                $requested_data['project_id'] = $request->project_id;
                $projectImage = new ProjectImage();
                $save = $projectImage->fill($requested_data)->save();

                if ($save) {
                    $savedImages[] = $name;
                }
            }
        }

        if (count($savedImages) > 0) {
            return back()->with('message', 'Project Images Added Successfully');
        } else {
            return back()->with('error', 'Project Images Upload Failed!');
        }
    }


    public function imageDestroy($id)
    {
        ProjectImage::where('id', $id)->firstOrFail()->delete();
        return back()->with('message','Project Image Successfully Deleted');
    }
}
