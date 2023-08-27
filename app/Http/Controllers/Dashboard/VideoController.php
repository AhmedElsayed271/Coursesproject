<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\VideoCourse;
use Illuminate\Http\Request;
use App\Models\SectionCourse;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class VideoController extends Controller
{
    

    public function index($section_id)
    {

        $videos = VideoCourse::where('section_course_id', $section_id)->paginate(10);
        $section_id = $section_id;
        return view('dashboard.videos.index',compact('videos','section_id'));
    }

    public function create($section_id)
    {
        
        $section =  SectionCourse::find($section_id);

        $section_id = $section->id;

        if(!$section){
            return redirect()->route('dashboard')->with(['error' => 'This Course Dson\' Exist']);
        }

        return view('dashboard.videos.create', compact('section_id'));
    }

    public function store(Request $request)
    {

        
        $request->validate([
            'video' => 'required|mimes:mp4,ogx,oga,ogv,ogg,webm',
        ]);


        $video = $request->video->store('courses_videos', 'upload');


        VideoCourse::create([

            'video' => $video,
            'section_course_id' => $request->section_id,
        ]);

        return response()->json($request);

    }

    public function editDetails($video_id)
    {
        $video = VideoCourse::findOrFail($video_id);

        return view('dashboard.videos.edit-details', compact('video'));
    }

    public function updateDetails(Request $request, $video_id)
    {
        
       

        $video =  VideoCourse::find($video_id);

   
 

        if(!$video){
            return redirect()->route('dashboard')->with(['error' => 'This Course Dson\' Exist']);
        }
      
        $request->validate([
            'name' => "required|min:3",
            'video_no' => [
                'required',
                'integer',
                function ($attribute,$value,$fail) use ($request,$video) {
                    $section = SectionCourse::with('videos')->whereHas('videos', function ($q) use ($video,$request) {

                        $q->where(function ($q) use ($request){
             
                            $q->where('video_no',$request->video_no)->where('video_no','!=',null);
            
                        })->where('id','!=',$video->id);
            
                    })->find($video->section_course_id);


                    if ($section) {
                        $fail('This Number Is Already Taken');
                    }
                }
            ],
        ]);


      


        $video->update([
            'name' => $request->name,
            'video_no' => $request->video_no,
        ]);

        return redirect()->route("videos.index",$video->section_course_id)->with(['success' => "Updated Detials Successfuly"]);
    }

    public function edit($video_id)
    {
        $video = VideoCourse::findOrFail($video_id);
 
        $section_id = $video->section_course_id;

        return view('dashboard.videos.edit', compact('video','section_id'));
    }

    public function update(Request $request,$video_id)
    {
        $request->validate([
            'video' => 'required|',
        ]);


        $video =  VideoCourse::find($video_id);

      

        if(!$video){
            return redirect()->route('dashboard')->with(['error' => 'This Course Dson\' Exist']);
        }

        $oldVideo = $video->video;


        $videos = $request->video->store('courses_videos', 'upload');

        $video->update([
            'video' => $videos
        ]);

        Storage::disk('upload')->delete($oldVideo);

        return response()->json($videos);
    }

    public function destroy($video_id)
    {
        $video =  VideoCourse::find($video_id);

        $oldVideo = $video->video;

        if(!$video){
            return redirect()->route('dashboard')->with(['error' => 'This Course Dson\' Exist']);
        }
        $video->delete();
        
        Storage::disk('upload')->delete($oldVideo);
       
        return redirect()->route("videos.index",$video->section_course_id)->with(['success' => "Deleted Detials Successfuly"]);

    }

}
