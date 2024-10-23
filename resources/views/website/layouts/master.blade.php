<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">

<head>
    <title>Shoppers &mdash; Colorlib e-Commerce Template</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Mukta:300,400,700">
    <link rel="stylesheet" href="{{asset("assets/fonts/icomoon/style.css")}}">

    <link rel="stylesheet" href="{{asset("assets/css/bootstrap.min.css")}}">
    <link rel="stylesheet" href="{{asset("assets/css/magnific-popup.css")}}">
    <link rel="stylesheet" href="{{asset("assets/css/jquery-ui.css")}}">
    <link rel="stylesheet" href="{{asset("assets/css/owl.carousel.min.css")}}">
    <link rel="stylesheet" href="{{asset("assets/css/owl.theme.default.min.css")}}">
    <link rel="stylesheet" href="{{asset("assets/css/aos.css")}}">
    <link rel="stylesheet" href="{{asset("assets/css/style.css")}}">
    <title>@yield('title')</title>
 {{-- font awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <!-- Template Main CSS File -->
    @if(app()->getLocale() == 'ar')
        <link href='{{ asset("assets/dashboard/assets/css/style-rtl.css")}}' rel="stylesheet">
    @else
        <link href='{{ asset("assets/dashboard/assets/css/style.css")}}' rel="stylesheet">
    @endif
</head>

<body>
    <div class="site-wrap">
    {{-- Navbar --}}
    @include('website.includes.navbar')

    {{-- Ssection   --}}
    <div class="container mt-2">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
    </div>

    @yield('main-content')

    {{-- Fotter  --}}
    @include('website.includes.footer')
    </div>

    <script src='{{asset("assets/js/jquery-3.3.1.min.js")}}'></script>
    <script src='{{asset("assets/js/jquery-ui.js")}}'></script>
    <script src='{{asset("assets/js/popper.min.js")}}'></script>
    <script src='{{asset("assets/js/bootstrap.min.js")}}'></script>
    <script src='{{asset("assets/js/owl.carousel.min.js")}}'></script>
    <script src='{{asset("assets/js/jquery.magnific-popup.min.js")}}'></script>
    <script src='{{asset("assets/js/aos.js")}}'></script>

    <script src='{{asset("assets/js/main.js")}}'></script>

</body>

</html>
