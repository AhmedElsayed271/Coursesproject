@extends('frontend.layouts.master')

@section('title', 'Login')

@section('content')
    <section class="vh-100">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card shadow-2-strong rounded-1">
                        <form class="card-body p-5 text-center" action="{{ route('login') }}" method="post">
                            @csrf
                            <h3 class="mb-5">تسجيل الدخول</h3>
                            <div class="form-outline mb-4">
                                <input name="email" type="email" id="logEmail" class="form-control form-control-lg"
                                    placeholder="البريد الالكتروني" />
                            </div>
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            <div class="form-outline mb-4">
                                <input name="password" type="password" id="logPass" placeholder="الرقم السري"
                                    class="form-control form-control-lg" />
                            </div>
                            <x-input-error :messages="$errors->get('password')" class="mt-2 text-danger" />
                            <button class="btn main-btn btn-block fw-bold" type="submit">
                                تسجيل دخول
                            </button>
                            <p class="small fw-bold mt-2 pt-1 mb-0">
                                ليس لديك حساب :
                                <a href="/signup.html" class="text-danger"> انشاء حساب </a>
                            </p>
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
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
