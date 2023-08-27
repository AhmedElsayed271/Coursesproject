@extends('frontend.layouts.master')

@section('title', 'Profile')

@section('content')
      <!-- Static Section Title -->
      <div class="title marginTop ">
        <h2 class="fw-bold">الدورات المسجله</h2>
    </div>
    <!-- End Static Section Title-->
    <!--Start user courses  -->
    <section class="card py-4 px-2 my-4 courseInfo">
        @forelse($myCourses as $course)
            <div class="d-flex justify-content-around align-items-center ">
                <div class="owncourse d-flex flex-column align-items-center">
                    <div class="courseImg ">
                        <img src="{{ $course->course->image}}" alt="ImageCourseDetails" width="200">
                    </div>
                    <div class="mt-3">
                        <h5 class="card-title fw-bold ">{{ $course->course->name }}</h5>
                    </div>
                </div>
                <div class="coursePrice">
                    <div class="view">
                        <a href="{{ route('video.course',$course->course_id) }}"><button class="btn main-btn fw-bold">مشاهده</button></a>
                    </div>
                </div>
            </div>
        @empty
            
        @endforelse
    </section>
    <!-- End user courses -->
@endsection
