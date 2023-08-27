@extends('frontend.layouts.master')

@section('title', 'Marketing')

@section('content')
    <div class="textContent marginTop">
        <div class="container">

            <div class="title">
                <h2 class="fw-bold">التسويق الالكتروني</h2>
            </div>
            <article class="fw-bold lh-lg mt-4">
                بادر الآن وانضم إلى فرصة مثيرة للعمل كجزء من فريق التسويق معنا! إذا كنت طالبًا لديك شغف بالتعلم وترغب في
                كسب دخل إضافي، فهذه هي الفرصة المثالية بالنسبة لك. ستتيح لك منصتنا الفريدة الفرصة للحصول على رابط خاص بك
                يمكنك مشاركته مع زملائك، وعندما يقوم أي منهم بشراء الدورة عبر هذا الرابط، ستحصل على نسبة ممتازة
                من سعر الدورة وهو <span class="main-color fw-bolder">1000 جنيه</span> كمكافأة على جهودك!
                إنها طريقة رائعة للربح من خلال شغفك بالتعلم ومشاركته مع الآخرين. بالإضافة إلى كسب الأموال، ستكسب أيضًا
                فرصة لبناء شبكة تواصل قوية وتطوير مهارات التسويق الخاصة بك. لا تفوت هذه الفرصة الرائعة لتحقيق النجاح
                المالي والمهني في وقت واحد. انضم إلينا اليوم وابدأ في مشروعك الشخصي نحو النجاح والاستقلالية!
            </article>
            <div class="row py-5">
                <div class="col-md-12 selectMenue">
                    <h2 class="h5 fw-bold py-1">اختر الدورة المراد التسويق لها</h2>
                    <select id="marketing" class="form-select " required aria-label="Default select example">
                        <option class="text-end" disabled selected>اختر الدورة المراد التسويق لها</option>
                        @foreach ($courses as $course)
                            <option class="text-end"
                                data-link="{{ route('checkout', $course->id) }}/?buyBy={{ Auth::id() }}">
                                {{ $course->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-12 userlink">
                    <div class="title mt-4">
                        <h2 class="h4 fw-bold">الرابط الخاص بك</h2>
                    </div>
                    <div class="userLink mt-4 position-relative">
                        <input type="text" class="form-control text-start" id='linkCourse' readonly name="userlink"
                            value="unique user link">
                        <i class="fa-regular fa-copy cursor-pointer main-color fs-4 position-absolute" id="copyIcon"></i>
                    </div>
                </div>
                <div class="col-md-12 mt-4">
                    <h2 class="h5 fw-bold py-1">الرصيد الحالي : <span id="moneyWallet">{{ Auth::user()->wallet }}</span>
                        جنيه</h2>
                    <div class="mb-5" id="moneyHaveing">
                        <div class="form-outline mb-3" id="walletData">
                            <input type="text" class="form-control " placeholder=' ادخل رقم الهاتف' id="phoneNumer"
                                required max="11" min="11" />
                        </div>
                        <div class="form-outline mb-3" id="walletData">
                            <input type="number" min="0" class="form-control " placeholder='حدد الملغ المراد سحبه'
                                id="moneyQty" required />
                        </div>
                        <button type="submit" id="withdrawBtn" class="btn main-btn btn-block fw-bold">سحب
                            الرصيد</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
