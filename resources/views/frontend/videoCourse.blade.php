@extends('frontend.layouts.master')

@section('title', 'Video Course')

@section('content')

    <div class="container-fluid">
        <header class="w-100 bg-body" style="height: 80px;">
            <button class="mt-3 border-0"> <a href="profile.html" class="btn main-btn float-left"><i
                        class="fa-solid fa-arrow-right"></i>
                    العودة للدورة</a>
            </button>
        </header>
        <div class="row">
            <!-- Sidebar -->
            <aside id="sidebar" class="col-md-4 col-lg-3 d-md-block ">
                <div class="accordion">
                    @foreach ($sections as $section)
                        <div class="accordion-item">
                            <h2 class="accordion-header d-flex justify-content-around align-items-center">
                                <button class="accordion-button collapsed fw-bold" data-bs-toggle="collapse"
                                    data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="false">
                                    {{ $section->name }}
                                </button>
                                <i class="fa-solid fa-chevron-down fs-5 ms-3 cursor-pointer"
                                    data-bs-target="#panelsStayOpen-collapseOne" data-bs-toggle="collapse"></i>
                            </h2>
                            <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse">
                                <div class="accordion-body" id="HtmlVideos">
                                    @foreach ($section->videos as $video)
                                        <div class="videoBox d-flex">
                                            <p data-name='{{ $video->name }}' class="fw-bold m-3 cursor-pointer video-title"
                                                data-video-src="{{ asset('assets/dashboard/upload/') . '/' . $video->video }}">
                                                {{ $video->name }}</p>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </aside>
            <main class="col-md-8 ms-sm-auto col-lg-9 px-md-4 mt-2 vh-100">
                @isset($sections[0]->videos[0])
                    <video id="player" src="{{ asset('assets/dashboard/upload/') . '/' . $sections[0]->videos[0]->video }}"
                        playsinline controls>
                        <p>للاسف المتصفح الخاص بك لايدعم نوع الفيديو جرب متصفح اخر</p>
                    </video>
                @else
                    <video id="player" src="{{ '' }}" playsinline controls>
                        <p>للاسف المتصفح الخاص بك لايدعم نوع الفيديو جرب متصفح اخر</p>
                    </video>
                @endisset

                <p class="fw-bold mt-3">مقدمه عن لغه Html</p>
            </main>
        </div>
    </div>

@endsection
