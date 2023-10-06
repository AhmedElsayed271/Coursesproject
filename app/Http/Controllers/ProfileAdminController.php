<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ProfileAdminController extends Controller
{
    public function edit()
    {
        $admin = Auth::guard('admin')->user();

        return view('dashboard.profile.edit',compact('admin'));
    }

    public function update(Request $request)
    {
       
        $validated = Validator::make($request->all(),[
            'name' => 'required|min:3',
            'email' => "required|email|unique:admins,email," . Auth::id(),
            'password' => 'sometimes|nullable|min:6',
        ]);
        
        $validated = $validated->validated();

        if ($request->password == null)
         {
            unset($validated['password']);
         } else {
            $validated['password'] = Hash::make($validated['password']);
         }

         $admin = Admin::find(Auth::id());

         $admin->update($validated);

         return redirect()->route('dashboard.profile.edit')->with(['success'=> 'Updated Successfuly']);
    }
}
