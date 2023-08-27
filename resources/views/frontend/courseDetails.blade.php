@extends('frontend.layouts.master')

@section('title', 'Course Details')

@section('content')
    <section class="courseDetails marginTop">
        <div class="contentDetails w-100 h-50 p-5">
            <h2 class="card-title fw-bold text-end">دورة تعلم تطبيقات الويب</h2>
            <p class="py-3">
                إذا كنت ترغب في أن تصبح جزءًا من هذا العالم المثير وتتعلم كيفية بناء
                تطبيقات الويب المذهلة، فإن دورتنا التعليمية هي ما تحتاجه! في دورتنا،
                ستتعلم العديد من المهارات الأساسية التي تمكنك من تطوير تطبيقات الويب
                بكل سهولة وإتقان. سنغطي لغات البرمجة الرئيسية التي تستخدم في تطوير
                الويب مثل HTML و CSS و Bootstrap و JavaScript و Python و PHP. ستحصل
                على فهم عميق لكل لغة وكيفية استخدامها لبناء واجهات المستخدم الجميلة
                والمتقدمة وتطبيقات الويب الديناميكية.
            </p>
            <h3>ماذا ستتعلم من هذه الدوره ؟</h3>
            <ul>
                <li>ستتيح لهم الفرصة لتطوير صفحات ويب مذهلة باستخدام لغة HTML</li>
                <li>سيتمكنون من تحقيق تناغم مثالي بين العناصر باستخدام لغة CSS</li>
                <li>الانطلاق بقوة مع Bootstrap: سيكتسبون المهارات اللازمة لاستخدام إطار العمل Bootstrap وبناء مواقع متجاوبة
                    واستثنائية</li>
                <li>إحياء التفاعل بواسطة JavaScript: سيتعلمون كيفية إضفاء الحياة والتفاعل على صفحاتهم باستخدام لغة
                    JavaScript</li>
                <li>بناء المستقبل مع PHP: سيتمكنون من تطوير تطبيقات ويب ديناميكية باستخدام لغة PHP</li>
                <li>سيتعلمون كيفية بناء واجهات مستخدم استثنائية باستخدام ReactJS</li>
                <li>سيمنحون أنفسهم الفرصة لبرمجة التطبيقات باستخدام لغة Python القوية والمتعددة الاستخدامات</li>
            </ul>
        </div>
    </section>
    <section class="card py-4 px-2 my-4 courseInfo">
        <div class="d-flex justify-content-around align-items-center ">
            <div class="courseImg ">
                <img src="{{ $course->image }}" alt="ImageCourseDetails" width="200">
            </div>
            <div class="coursePrice">
                <h4 class="fw-bold">السعر : {{ $course->price }} <span class="text-start">EGP</span></h4>
                <div class="buy">
                    <a href="checkout.html"><button class="btn main-btn fw-bold">اشتري الان</button></a>
                    <a href="checkout.html"><button class="btn main-btn fw-bold">اشتري الان</button></a>
                </div>
            </div>
        </div>
    </section>
@endsection
