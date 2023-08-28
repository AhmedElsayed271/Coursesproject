<nav class="navbar navbar-expand-lg bg-body-tertiary shadow fixed-top">
    <div class="container">
        <div class="logo">
            <img src="{{ asset('assets/frontend/images/logo.AVIF') }}" alt="logo" />
            <a class="navbar-brand fw-bolder" href="{{ route('home') }}"><span class="main-color">Courza</a>
        </div>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active fs-6 fw-bold" aria-current="page" href="{{ route('home') }}">الصفحه
                        الرئيسيه</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active fs-6 fw-bold" aria-current="page"
                        href="{{ route('home') }}#ourTarget">اهدافنا</a>
                </li>
                @if (Auth::guard('admin')->check())
                    <li class="nav-item">
                        <a class="nav-link active fs-6 fw-bold" aria-current="page" href="{{ route('dashboard') }}">لوحه
                            التحكم</a>
                    </li>
                @endif
                <li class="nav-item">
                    <a class="nav-link active fs-6 fw-bold" aria-current="page"
                        href="{{ route('home') }}#contactUs">تواصل
                        معنا</a>
                </li>
                @guest
                    <li class="nav-item">
                        <a class="nav-link active fs-6 fw-bold" aria-current="page" href="{{ route('login') }}">تسجيل
                            الدخول</a>
                    </li>
                @endguest
                <li class="nav-item">
                    <a class="nav-link active fs-6 fw-bold" aria-current="page"
                        href="{{ route('profile.index') }}">حسابي
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active fs-6 fw-bold" aria-current="page" href="{{ route('marketing') }}">اعمل
                        كمسوق
                        الكتروني</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
