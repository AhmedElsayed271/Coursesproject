<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'last_name' => ['required', 'string', 'max:255','min:3'],
            'first_name' => ['required', 'string', 'max:255','min:3'],
            'phone' => ['required', 'string', 'max:11','min:11'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ], [
            'first_name.required' => 'الاسم الاول مطلوب',
            'first_name.min' => 'الاسم الاول يجب ان لا يقل عن ثلاثة احرف',
            'last_name.min' => 'الاسم الاخير يجب ان لا يقل عن ثلاثة احرف',
            'last_name.required' => 'الاسم الاخير مطلوب',
            'full_name.required' => 'الاسم مطلوب',
            'phone.required' => 'رقم الهاتف مطلوب',
            'phone.min' => 'رقم الهاتف يجب ان لا يقل عن 11 رقم',
            'phone.max' => 'رقم الهاتف يجب ان لا يزيد عن 11 رقم',
            'email.required' => 'البريد الالكتروني مطلوب',
            'full_name.unique' => 'هذا البريد الاكتروني مأخوذ',
            'email.email' => 'هذا الحقل يجب ان يكون بريدا الكترونيا',
            'email.unique' => 'هذا البريد موجود بالفعل اختر بريدا اخرا',
            'password.required' => 'كلمة السر مطلوبه',
            'password.confirmed' => 'يجب ان تكون كلمتا السر متطابقتان',
        ]);

       

        $user = User::create([
            'last_name' => $request->last_name,
            'first_name' => $request->first_name,
            'full_name' => $request->first_name . ' ' . $request->last_name,
            'phone' => $request->phone,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
