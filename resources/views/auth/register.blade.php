@extends('frontend.layouts.master')

@section('title', 'Course Details')

@section('content')
<section class="vh-100">
    <div class="container py-2 px-4 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100 mt-1">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card shadow-2-strong">
                    <div class="col-12 row px-0 py-4 d-flex justify-content-center">
                    </div>
                    <form class="card-body text-center" action="{{ route('register') }}" method="post">
                        @csrf
                        <h3 class="mb-5">انشاء حساب</h3>
                        <div class="form-outline mb-4">
                            <input name="full_name" type="text" class="form-control form-control-lg"
                                placeholder="الاسم" value="{{ old('full_name') }}" />
                                     <x-input-error :messages="$errors->get('full_name')" class="mt-2"  />
                        </div>
                        <div class="form-outline mb-4">
                            <input type="email" name="email" value="{{ old('email') }}" class="form-control form-control-lg"
                                placeholder="البريد الالكتروني"  />
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>
                        <div class="form-outline mb-4">
                            <input type="text" name="phone" value="{{ old('phone') }}" class="form-control form-control-lg"
                                placeholder="رقم الهاتف" />
                                <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                        </div>
                        <div class="form-outline mb-4">
                            <input type="password" name="password" value="{{ old('password') }}" placeholder="الرقم السري"
                                class="form-control form-control-lg" />
                                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>
                        <div class="form-outline mb-4">
                            <input type="password" name="password_confirmation" value="{{ old('password_confirmation') }}" placeholder="تاكيد الرقم السري"
                                class="form-control form-control-lg" />
                                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                        </div>
                        <button class="btn main-btn btn-block" type="submit">
                            انشاء حساب
                        </button>
                    </form>
                    <div class="text-center">
                        <hr class="my-4" />

                        <p>تسجيل دخول باستخدام :</p>
                        <div class="authIcons">
                            <a href="{{ route('auth.socialite.redirect','facebook') }}" class="btn btn-link btn-floating mx-1 rounded">
                                <i class="fab fa-facebook-f fs-5 p-2 rounded"></i>
                            </a>
                            <a href="{{ route('auth.socialite.redirect','google') }}" class="btn btn-link btn-floating mx-1  rounded">
                                <i class="fab fa-google fs-5 p-2 rounded"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
