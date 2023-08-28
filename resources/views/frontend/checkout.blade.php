@extends('frontend.layouts.master')

@section('title', 'Checkout')

@section('content')

    <section class="vh-100" style="background-color: #eee">
        <div class="container h-100 py-5">


            <div class="col">
                <div class="card shopping-cart" style="border-radius: 15px">
                    <div class="card-body text-black ">
                        <div class="row d-flex justify-content-center align-items-center h-100">
                          
                            <div class="row">
                                <div class="col-lg-6 px-5 py-4">
                                    <h3 class="mb-5 pt-2 text-center fw-bold">المشتريات</h3>
                                    <div class="d-flex justify-content-between align-items-center flex-column mb-5">
                                        <div class="ShopImg">
                                            <img src="{{ $course->image }}" class="img-fluid" width="150"
                                                alt="Course image">
                                        </div>
                                        <div class="mt-3">
                                            <h5 class="fw-bold text-end ">دورة تعلم تطبيقات الويب</h5>
                                        </div>
                                    </div>
                                    
                                    <hr class="mb-4">
                                    <div class="d-flex justify-content-between p-2">
                                        <p class="fw-bold">الخصم:</p>
                                        <p class="fw-bold">
                                            @if ($course->old_price != null)
                                                {{ $course->old_price - $course->price }}
                                            @else
                                                0
                                            @endif
                                            <span>EGP</span>
                                        </p>
                                    </div>
                                    <div class="d-flex justify-content-between p-2 mb-2" style="background-color: #e1f5fe;">
                                        <h5 class="fw-bold mb-0">السعر:</h5>
                                        <h5 class="fw-bold mb-0"><span>EGP</span> {{ $course->price }} </h5>
                                    </div>
                                </div>
                                <div class="col-lg-6 p-5">
                                    <h3 class="mb-5 pt-2 text-center fw-bold">اختر وسيله الدفع</h3>
                                    <div class="payMethods mb-3">
                                        <div
                                            class="paymethod1 my-2 d-flex flex-column flex-md-row justify-content-between align-items-center">
                                            <div class="pay1">
                                                <input type="radio" id="cards" name="paymentMethod" form="payment"
                                                    value="credit">
                                                <label for="cards" class="fw-bold">بطاقه إئتمان</label>
                                            </div>
                                            <div class="paymentImg">
                                                <img src="{{ asset('assets/frontend/images/processout.svg') }}"
                                                    alt="paymentMethod1">
                                            </div>
                                        </div>
                                        <div
                                            class="paymethod2 my-2 d-flex flex-column flex-md-row justify-content-between align-items-center">
                                            <div class="pay2">
                                                <input type="radio" id="wallet" name="paymentMethod" form="payment"
                                                    value="wallet">
                                                <label for="wallet" class="fw-bold">محفظه الكترونيه</label>
                                            </div>
                                            <div class="paymentImg text-center">
                                                <img src="{{ asset('assets/frontend/images/vodafone.AVIF') }}"
                                                    alt="vodafone" width="30">
                                                <img src="{{ asset('assets/frontend/images/orangeCash.AVIF') }}"
                                                    alt="orangeCash" width="40">
                                                <img src="{{ asset('assets/frontend/images/etisalat-cash.AVIF') }}"
                                                    alt="etisalat-cash" width="50">
                                            </div>
                                        </div>
                                    </div>
                                    <form class="mb-3" id="payment" action="{{ route('PayByPaymob') }}" method="get">
                                        @csrf
                                        <div class="form-outline mb-5" id="walletData">
                                            <label class="form-label" for="phone">رقم الهاتف</label>
                                            <input type="text" class="form-control form-control-lg" name="phone"
                                                placeholder=' ادخل رقم الهاتف' id="phone" max="11"/>
                                            <input type="hidden" value="{{ $course->id }}" name="course_id" />
                                            <input type="hidden" value="{{ $buyBy }}" name="buyBy" />
                                        </div>
                                        <button type="submit" class="btn main-btn btn-block fw-bold">شراء الان</button>
                                    </form>
                                    <h5 class="fw-bold mb-5 pb-5" id="backToCourses">
                                        <a href="{{ route('course.details',$course->id) }}"><i class="fas fa-angle-left me-2"></i>الرجوع الي
                                            الدوره</a>
                                    </h5>
                                </div>
                            </div>
                        </div>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif    
                    @if (Session::has('error'))
                        <div class="alert alert-danger">
                            {{ Session::get('error') }}
                        </div>
                    @endif
                  
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
