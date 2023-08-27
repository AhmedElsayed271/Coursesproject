<?php

namespace App\Http\Controllers\website;

use App\Models\Course;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MarketingController extends Controller
{
    
    public function index()
    {

        $courses = Course::all();

        return view('frontend.marketing',compact('courses'));
    }
}
