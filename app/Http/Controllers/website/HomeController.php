<?php

namespace App\Http\Controllers\website;

use App\Models\Course;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function home()
    {

        $courses = Course::all();


        return view('frontend.home', compact('courses'));
    }
}
