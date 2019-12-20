<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreVideoRequest;

use Illuminate\Http\Request;

use App\Video;

class VideoController extends Controller
{
     public function index()
    {
        $videos = Video::orderBy('created_at', 'DESC')->get();
        return view('videos')->with('videos', $videos);
    }

     public function uploader(){
        return view('uploader');
    }
 
 public function store(StoreVideoRequest  $request)
    {

        // $input = $request->input();

        // dd($input);die;


        $path = str_random(16) . '.' . $request->video->getClientOriginalExtension();
        $request->video->storeAs('public/videos', $path);
 
        $video = Video::create([
            'disk'          => 'public',
            'original_name' => $request->video->getClientOriginalName(),
            'path'          => $path,
            'title'         => $request->title,
        ]);

        $video->save();
 
        // ConvertVideoForStreaming::dispatch($video);
 
        return redirect('/video')
            ->with(
                'message',
                'Your video will be available shortly after we process it'
            );
    }
}
