<?php

namespace App\Http\Controllers\website;

use App\Models\Course;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CourseDetailsController extends Controller
{
    public function courseDetails($course_id)
    {

        $course = Course::findOrFail($course_id);

        return view('frontend.courseDetails', compact('course'));
    }   
}
