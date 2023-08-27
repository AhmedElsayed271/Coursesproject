@extends('frontend.layouts.master')

@section('title', 'home')

@section('content')
    <div class="container">
        <!-- start Nav -->
        @include('frontend.includes.navbar')
        <!-- End Nav -->
        <!-- Start HomePage -->
        <main class="homePage row justify-content-center align-content-center">
            <div class="textContent text-center w-100 py-1 col-md-6">
                <h1 class="fw-bold"> دورة تطوير مواقع الويب رحلتك نحو إتقان البرمجة</h1>
            </div>
            <div class="image homeImg col-md-6">
                <img src="{{ asset('assets/frontend/images/homeimg.AVIF') }}" alt="homeimg" class="img-fluid">
            </div>
        </main>
        <!-- End HomePage -->
        <!-- Start BuyNow Btn -->
        <div class="buyNow text-center">


            @isset($courses[0]->id)
                <a href="{{ route('course.details', $courses[0]->id) }}"> <button class="btn main-btn fw-bold">اشتري الان
                    </button>
                </a>
            @else
                <a href="{{ route('home') }}"> <button class="btn main-btn fw-bold">اشتري الان
                    </button>
                </a>
            @endisset
        </div>
        <!-- End BuyNow Btn -->
        <!-- Start Icons Banner -->
        <div class="ImagesIcons text-center my-5 py-2">
            <div class="Icons row">
                <div class="icon my-3 col-6 col-md-4 col-lg-2 ">
                    <img src="{{ asset('assets/frontend/images/php.AVIF') }}" alt="phpIcon" width="60">
                </div>
                <div class="icon my-3 col-6 col-md-4 col-lg-2">
                    <img src="{{ asset('assets/frontend/images/js.AVIF') }}" alt="jsIcon" width="60">
                </div>
                <div class="icon my-3 col-6 col-md-4 col-lg-2">
                    <img src="{{ asset('assets/frontend/images/bootstrapIcon.AVIF') }}" alt="bootstrapIcon" width="60">
                </div>
                <div class="icon my-3 col-6 col-md-4 col-lg-2">
                    <img src="{{ asset('assets/frontend/images/react.AVIF') }}" alt="reactIcon" width="60">
                </div>
                <div class="icon my-3 col-6 col-md-4 col-lg-2">
                    <img src="{{ asset('assets/frontend/images/python.AVIF') }}" alt="pythonIcon" width="60">
                </div>
                <div class="icon my-3 col-6 col-md-4 col-lg-2">
                    <img src="{{ asset('assets/frontend/images/html.AVIF') }}" alt="htmlIcon" width="60">
                </div>
            </div>
        </div>
        <!-- End Icons Banner -->
        <!-- Scroll Btn -->
        <div class="scrollbtn display-none" id="scrollBtn">
            <button class="btn main-btn position-fixed ">
                <i class="fa-solid fa-caret-up"></i>
            </button>
        </div>
        <!-- End Scroll Btn -->
        <section class="whoUS row align-items-center" data-aos-delay="500">
            <div class="content col-md-6" data-aos="fade-left">
                <div class="title">
                    <h2 class="fw-bold">نبذة عن الكورس</h2>
                </div>
                <p class="py-3 lh-base fs-5">
                    استعد لاكتشاف عالم تطوير مواقع الويب من خلال دورتنا المميزة. ستمنحك هذه الدورة الفرصة لاحتراف تصميم
                    وبرمجه مواقع الويب . ستتعلم كيفية بناء واجهات مستخدم جذابة ومتجاوبة باستخدام HTML وCSS،
                    وتجربة التفاعل باستخدام JavaScript، بالإضافة
                    إلى إتقان تطوير الخلفيات وقواعد البيانات باستحدام لغة Php انضم إلينا اليوم واحصل على المهارات
                    اللازمة لتكون مبرمج
                    ويب متميزًا يمتلك القدرة على بناء تجارب رقمية شاملة ومبتكرة.</p>
            </div>
            <div class="image col-md-6 mx-auto" data-aos="fade-right" data-aos-delay="500">
                <img src="{{ asset('assets/frontend/images/img1.AVIF') }}" alt="image-1" class="rounded-2 course-image" />
            </div>
        </section>
        <!-- study Section -->
        <section class="studyPlan my-5 mx-1">
            <div class="title">
                <h2 class="fw-bold">خطط الدراسة</h2>
            </div>
            <div class="cards row mt-5 gap-3 justify-content-center position-relative">
                <div class="row mt-5 gap-3 justify-content-center ">
                    <div class="card col-md-3 p-0 cardCourse border-0" data-aos="flip-left" data-aos-delay="500">
                        <div class="images">
                            <img src="{{ asset('assets/frontend/images/htmlCss.AVIF') }}" class="card-img" alt="HtmlCss">
                        </div>
                        <div class="card-body">
                            <div class="cardContent d-flex justify-content-between ">
                                <h5 class="card-title fw-bold text-start">Html-Css Course</h5>
                            </div>
                            <p class="card-text"> سوف تتعلم في هذه الدوره أساسيات تطوير الويب بأسلوب مبسّط ومحترف. اكتسب
                                مهارات تصميم وبرمجة
                                مواقع جذابة ومتجاوبة</p>
                        </div>
                    </div>
                    <div class="card col-md-3 p-0 cardCourse border-0" data-aos="flip-left" data-aos-delay="600">
                        <div class="images">
                            <img src="{{ asset('assets/frontend/images/JsCourse.AVIF') }}" class="card-img" alt="Js Image">
                        </div>
                        <div class="card-body">
                            <div class="cardContent d-flex justify-content-between ">
                                <h5 class="card-title fw-bold text-start">Java Script Course</h5>
                            </div>
                            <p class="card-text"> سوف تكتشف فنون تطوير الويب من الصفر إلى الاحتراف لبناء تجارب مستخدم
                                مذهلة
                                وديناميّة.</p>
                        </div>
                    </div>
                    <div class="card col-md-3 p-0 cardCourse border-0" data-aos="flip-left" data-aos-delay="700">
                        <div class="images">
                            <img src="{{ asset('assets/frontend/images/ReactCourse.AVIF') }}" class="card-img"
                                alt="ReactJSImage">
                        </div>
                        <div class="card-body">
                            <div class="cardContent d-flex justify-content-between ">
                                <h5 class="card-title fw-bold text-start">ReactJs Course</h5>
                            </div>
                            <p class="card-text"> ستكتشف عالم تطوير الواجهات الحديثة مع ReactJs,لبناء تطبيقات متفاعلة
                                وقوية
                                تتيح تجارب مستخدم استثنائية.</p>
                        </div>
                    </div>
                </div>
                <div class="row gap-3 justify-content-center">
                    <div class="card col-md-3 p-0 cardCourse border-0" data-aos="flip-left" data-aos-delay="900">
                        <div class="images">
                            <img src="{{ asset('assets/frontend/images/bootstrapImg.AVIF') }}" class="card-img"
                                alt="bootstrapImg">
                        </div>
                        <div class="card-body">
                            <div class="cardContent d-flex justify-content-between ">
                                <h5 class="card-title fw-bold text-start">Bootstrap Course</h5>
                            </div>
                            <p class="card-text">من خلال دراسة دورة Bootstrap، ستمكن نفسك من تطوير واجهات مستخدم متجاوبة
                                وذات تصميم رائع، مما يعزز تجربة المستخدم عبر مختلف الأجهزة والشاشات.</p>
                        </div>
                    </div>
                    <div class="card col-md-3 p-0 cardCourse border-0" data-aos="flip-left" data-aos-delay="1100">
                        <div class="images">
                            <img src="{{ asset('assets/frontend/images/phpImage.AVIF') }}" class="card-img"
                                alt="phpImg">
                        </div>
                        <div class="card-body">
                            <div class="cardContent d-flex justify-content-between ">
                                <h5 class="card-title fw-bold text-start">Php Course</h5>
                            </div>
                            <p class="card-text">من خلال دراسة دورة PHP، ستكتسب المعرفة والمهارات اللازمة لتطوير تطبيقات
                                مبتكرة ومتطورة، والتفاعل مع قواعد البيانات لتخزين واسترجاع المعلومات بكفاءة.</p>
                        </div>
                    </div>
                    <div class="card col-md-3 p-0 cardCourse border-0" data-aos="flip-left" data-aos-delay="1300">
                        <div class="images">
                            <img src="{{ asset('assets/frontend/images/PythonImg.AVIF') }}" class="card-img"
                                alt="PythonImg">
                        </div>
                        <div class="card-body">
                            <div class="cardContent d-flex justify-content-between ">
                                <h5 class="card-title fw-bold text-start">Python Course</h5>
                            </div>
                            <p class="card-text"> سيتمكن الطلاب من تطبيق مفاهيم Python بشكل عملي، مما يمكّنهم من تطوير
                                تطبيقات وحلول برمجية إبداعية تلبي احتياجات السوق .</p>
                        </div>
                    </div>
                </div>
        </section>
        <!-- End study Section -->
        <!-- Start courses Section -->
        <section class="courses" id='currentCourses'>
            <div class="title">
                <h2 class="fw-bold">الدورات الحاليه</h2>
            </div>
            <div class="courses">
                @foreach ($courses as $course)
                    <a href="{{ route('course.details', $course->id) }}">
                        <div class="card col-md-3 p-0 cardCourse mt-4  mx-auto cursor-pointer border-0"
                            data-aos="flip-left" data-aos-delay="500">
                            <div class="courseImage">
                                <img src="{{ $course->image }}" class="card-img" alt="PythonImg">
                            </div>
                            <div class="card-body ">

                                <div class="cardContent">
                                    <h5 class="card-title fw-bold text-end ">{{ $course->name }}</h5>

                                    <h3 class="fw-bold h6">السعر : <del>{{ $course->old_price }}</del>
                                        {{ $course->price }}
                                        <span class="text-start">EGP</span>
                                    </h3>
                                    <div class="buy">
                                        <a href="{{ route('checkout', $course->id) }}"><button
                                                class="btn main-btn fw-bold">اشتري
                                                الان</button></a>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </section>
        <!-- End courses Section -->
        <section class="mission my-5" id="ourTarget">
            <div class="missionText ">
                <div class="title">
                    <h2 class="fw-bold">اهدافنا </h2>
                </div>
                <p class="py-3 px-2 lh-base fs-5">هدفنا هي تمكين المتعلمين على موقع الدورات الخاص بنا بمجموعة شاملة من
                    مهارات
                    تطوير الويب. من خلال
                    مناهجنا المصممة بعناية، نرشدك خلال لغات البرمجة الأساسية مثل HTML، CSS، وBootstrap، لضمان تمكنك من
                    صناعة واجهات ويب جذابة ومتجاوبة. اغمر نفسك في عالم JavaScript لإضافة التفاعل والديناميكية إلى
                    إبداعاتك.

                    مع تقدمنا، تتوسع مهمتنا لتشمل إتقان قوة PHP، مما يمكّنك من بناء خلفيات قوية ووظائف ديناميكية . وليس
                    هذا كلّ شيء – نسعى إلى الأمام مع ReactJS، لنزودك بالقدرات اللازمة لإبداع تجارب مستخدم حديثة وسلسة
                    وفعّالة.

                    انضم إلينا في هذه الرحلة التحويلية حيث نجعل من مهمتنا تزويدك بالمهارات الضرورية لتفوق في عالم تطوير
                    الويب المتغير باستمرار نجاحك هو هدفنا النهائي.
                    الدورة ستزوّد الطلاب بالمهارات والمعرفة التي تجعلهم قادرين بسهولة على العثور على فرص عمل فور
                    انتهائهم منها، حيث سيكتسبون الخبرات العملية التي يبحث عنها أصحاب العمل في سوق العمل الحالي.
                    </b>
            </div>
        </section>
        <section class="contactUs" id="contactUs">
            <div class="title">
                <h2 class="fw-bold">تواصل معنا</h2>
            </div>
            <div class="contactForm my-5">
                <form class="form my-3">
                    <div class="row g-3">
                        <div class="col-md-6 my-2">
                            <input type="text" class="form-control" placeholder="الاسم" name="firstName" />
                        </div>
                        <div class="col-md-6 my-2">
                            <input type="email" class="form-control" placeholder="البريد الالكتروني" name="email" />
                        </div>
                    </div>
                    <div class="my-2">
                        <textarea class="form-control" placeholder="اترك استفسارك هنا وسيتم الرد عليك " name="textcontent"></textarea>
                    </div>
                    <button class="btn main-btn fw-bold"> ارسال</button>
                </form>
            </div>
        </section>
    </div>
@endsection
