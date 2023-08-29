<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title')</title>
    <link rel="shortcut icon" href="{{ asset('assets/frontend/images/favicon-32x32.png') }}" type="image/x-icon">
    <!-- Bootstrap Css File -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/bootstrap/css/bootstrap.min.css') }}" />
    <!-- Fontawesome Library -->
    <link rel="stylesheet" href="{{  asset('assets/frontend/css/all.min.css')  }}" />
    <!-- Render Elements Normalize -->
    <link rel="stylesheet" href="{{  asset('assets/frontend/css/normalize.css')  }}" />
    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link rel="stylesheet" href="https://cdn.plyr.io/3.7.8/plyr.css" />
    <link
        href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;500;600;700;800&family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;1,300&family=Poppins:wght@200;300;400&family=Robohref:ital,wght@0,100;0,300;0,400;0,500;1,500&display=swap"
        rel="stylesheet" />
    <!--Main Css File -->
    <!-- AOS Animation Library -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/main.css') }}" />
</head>

<body dataSrc="home">
    @include('frontend.includes.navbar')
    @yield('content')
    <!-- Start Footer -->
    @include('frontend.includes.footer')
    <!-- End Footer -->
    <!-- Boostarp js File -->
    <script src="{{  asset('assets/frontend/css/bootstrap/js/bootstrap.bundle.min.js')  }}"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://cdn.plyr.io/3.7.8/plyr.polyfilled.js"></script>
    <script src="{{  asset('assets/frontend/js/app.js')  }}"></script>
</body>

</html>