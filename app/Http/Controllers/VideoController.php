<?php

namespace App\Http\Controllers;

use App\Models\Video;
use App\Models\VideoCategory;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = VideoCategory::active()->get();
        $all_video = Video::orderBy('id','desc')->get();
        return view('backend.file.video.list', compact('all_video','categories'));
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
        $validated = $request->validate([
            'video_link' => 'nullable|url',
        ]);

        $video = new Video();
        $requested_data = $request->all();
        if($request->video_link)
        {
            $videoId = $this->extractVideoId($validated['video_link']);
            $video->link = $videoId;
        }

        $save = $video->fill($requested_data)->save();
        if($save){
            return redirect()->route('video.index')->with('message','Video Added Successfully');
        }else{
            return back()->with('error','Video Added Failed!!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function status($id)
    {
        $status = Video::findOrFail($id);
        if ($status->status == 0) {
            $status->status = 1;
        } else {
            $status->status = 0;
        }
        $status->save();
        return redirect()->back()->with('message','Video Status Change Successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = VideoCategory::active()->get();
        $video = Video::findOrFail($id);
        return view('backend.file.video.edit', compact('video','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $validated = $request->validate([
            'video_link' => 'nullable|url',
        ]);

        $id = $request->id;
        $update = Video::findOrFail($id);
        $formData = $request->all();
        if($request->video_link)
        {
            $videoId = $this->extractVideoId($validated['video_link']);
            $update->link = $videoId;
        }
        $updated = $update->fill($formData)->save();
        if($updated){
            return redirect()->route('video.index')->with('message','Video Updated Successfully');
        }else{
            return back()->with('error','Video Updated Failed');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Video::where('id', $id)->firstOrFail()->delete();
        return back()->with('message','Video Successfully Deleted');
    }

    private function extractVideoId($url)
    {
        $pattern = '/^.*(?:(?:youtu.be\/|v\/|watch\?v=)|embed\/)(.*?)(?:\?|$)/';
        if (preg_match($pattern, $url, $matches)) {
            return $matches[1];
        }
        return null;
    }
}
