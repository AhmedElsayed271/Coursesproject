<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialiteController extends Controller
{
    
    public function redirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function callback($provider)
    {
        $getUser = Socialite::driver($provider)->user();
        // dd($getUser);
        $user = User::where([
            'provider_id' => $getUser->id,
            'provider' => $provider,
        ])->first();

        if(!$user){
            $user = User::create([
                "full_name" => $getUser->name,
                "first_name" => $getUser->user['given_name'] ?? "first name",
                "last_name" => $getUser->user['family_name'] ?? "last name",
                'provider_id' => $getUser->id,
                'provider' => $provider,
                "email" => $getUser->email,
                "password" => Str::random(15),
            ]);
        }

        Auth::guard('web')->login($user);

        return redirect('/');

    }
}
