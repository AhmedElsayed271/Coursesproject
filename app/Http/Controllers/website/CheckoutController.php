<?php

namespace App\Http\Controllers\website;

use App\Models\User;
use App\Models\Course;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CheckoutController extends Controller
{
    public function checkout(Request $request,$course_id)
    {

        $course = Course::findOrFail($course_id);

        $buyBy = '';

        if (isset($request->query()['buyby'])) {
            $buyBy = $request->query()['buyby'];

            $user = User::find($buyBy);

            if (!$user) {
                return redirect()->route('home');
            }
        }

        return view('frontend.checkout', compact('course','buyBy'));
    }   
}
