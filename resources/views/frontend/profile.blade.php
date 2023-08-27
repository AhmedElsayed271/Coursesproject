@extends('frontend.layouts.master')

@section('title', 'Profile')

@section('content')
    <div class="container">
        <div class="title marginTop ">
            <h2 class="fw-bold">الدورات المسجله</h2>
        </div>
        <!-- End Static Section Title-->
        <!-- start personal info -->
        <div class="personalInfo">
            <div class="card">
                <div class="card-body">
                    <div class="personalInfo">
                        <h3 class="main-color fw-bold pb-3">البيانات الشخصيه</h3>
                        <h3>الاسم : <span class="personalName">{{ Auth::user()->full_name }}</span></h3>
                        <h3>البريد الالكتروني : <span class="personalEmail text-lowercase">{{ Auth::user()->email }}</span>
                        </h3>
                    </div>
                </div>
            </div>
        </div>
        <!-- end personal info -->
        <!-- if user didn't buy coyrses -->

        <!-- End Static Section Title-->
        <!--Start user courses  -->
        @if ($myCourses->count() > 0)
            <section class="card py-4 px-2 my-4 courseInfo">
                @forelse($myCourses as $course)
                    <div class="d-flex justify-content-around align-items-center ">
                        <div class="owncourse d-flex flex-column align-items-center">
                            <div class="courseImg ">
                                <img src="{{ $course->course->image }}" alt="ImageCourseDetails" width="200">
                            </div>
                            <div class="mt-3">
                                <h5 class="card-title fw-bold ">{{ $course->course->name }}</h5>
                            </div>
                        </div>
                        <div class="coursePrice">
                            <div class="view">
                                <a href="{{ route('video.course', $course->course_id) }}"><button
                                        class="btn main-btn fw-bold">مشاهده</button></a>
                            </div>
                        </div>
                    </div>
                @empty
                @endforelse
            </section>
        @else
            <div class="notBuy mt-5">
                <h2 class="fw-bold">لا يوجد دورات مسجله حتي الان !</h2>
            </div>
        @endif
    </div>
    <!-- End user courses -->
@endsection
