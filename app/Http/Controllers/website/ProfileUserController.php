<?php

namespace App\Http\Controllers\website;

use Illuminate\Http\Request;
use App\Models\UserBuyCourse;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProfileUserController extends Controller
{
    public function showProfile()
    {

        $myCourses = UserBuyCourse::with('course')->where('user_id',Auth::id())->get();

        return view('frontend.profile',compact('myCourses'));
    }
}
