<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\SectionCourse;
use Illuminate\Http\Request;

class VideoCourseController extends Controller
{
    public function videoCourse($course_id)
    {

        $sections = SectionCourse::with(['videos' => function ($q) {
            $q->orderBy('video_no');
        },'course'])->where('course_id',$course_id)->orderBy('Section_no')->get();

        // return $sections;
        return view('frontend.videoCourse', compact('sections'));
    }
}
