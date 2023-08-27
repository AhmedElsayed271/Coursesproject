<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\UserBuyCourse;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckUserBuyCourse
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        $course_id = request()->course_id;
        
        $course = UserBuyCourse::where(['user_id' => Auth::id(),"course_id" => $course_id])->first();
        
        if (!$course) {
            return redirect()->route('home');
        }
        
        return $next($request);
    }
}
