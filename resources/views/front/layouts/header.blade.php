<!doctype html>
<html class="no-js" lang="zxx">
<head>
    <!-- Meta Tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="Site keywords here">
    <meta name="description" content="">
    <meta name='copyright' content=''>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title -->
    <title>Samor Steel - @yield('title')</title>

    <!-- Favicon -->
    <link rel="icon" href="{{asset('storage/' . $settings->logo)}}">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Poppins:200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap"
        rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href={{asset('front/css/bootstrap.min.css')}}>
    <!-- Nice Select CSS -->
    <link rel="stylesheet" href={{asset('front/css/nice-select.css')}}>
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href={{asset('front/css/font-awesome.min.css')}}>
    <!-- icofont CSS -->
    <link rel="stylesheet" href={{asset('front/css/icofont.css')}}>
    <!-- Slicknav -->
    <link rel="stylesheet" href={{asset('front/css/slicknav.min.css')}}>
    <!-- Owl Carousel CSS -->
    <link rel="stylesheet" href={{asset('front/css/owl-carousel.css')}}>
    <!-- Datepicker CSS -->
    <link rel="stylesheet" href={{asset('front/css/datepicker.css')}}>
    <!-- Animate CSS -->
    <link rel="stylesheet" href={{asset('front/css/animate.min.css')}}>
    <!-- Magnific Popup CSS -->
    <link rel="stylesheet" href={{asset('front/css/magnific-popup.css')}}>

    <!-- Medipro CSS -->
    <link rel="stylesheet" href={{asset('front/css/normalize.css')}}>
    <link rel="stylesheet" href={{asset('front/style.css')}}>
    <link rel="stylesheet" href={{asset('front/css/responsive.css')}}>
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;700&display=swap" rel="stylesheet">


</head>
<body>
<a href="https://wa.me/{{$settings->phone_number}}?text=hello+123" target=”_blank” class="whatsapp-btn">
    <i class="fa fa-whatsapp"></i>
</a>

{{--<!-- Preloader -->--}}
{{--<div class="preloader">--}}
{{--    <div class="loader">--}}
{{--        <div class="loader-outter"></div>--}}
{{--        <div class="loader-inner"></div>--}}

{{--        <div class="indicator">--}}
{{--            <svg width="16px" height="12px">--}}
{{--                <polyline id="back" points="1 6 4 6 6 11 10 1 12 6 15 6"></polyline>--}}
{{--                <polyline id="front" points="1 6 4 6 6 11 10 1 12 6 15 6"></polyline>--}}
{{--            </svg>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
{{--<!-- End Preloader -->--}}

{{--<!-- Get Pro Button -->--}}
{{--<ul class="pro-features">--}}
{{--    <a class="get-pro" href="#">Get Pro</a>--}}
{{--    <li class="big-title">Pro Version Available on Themeforest</li>--}}
{{--    <li class="title">Pro Version Features</li>--}}
{{--    <li>2+ premade home pages</li>--}}
{{--    <li>20+ html pages</li>--}}
{{--    <li>Color Plate With 12+ Colors</li>--}}
{{--    <li>Sticky Header / Sticky Filters</li>--}}
{{--    <li>Working Contact Form With Google Map</li>--}}
{{--    <div class="button">--}}
{{--        <a href="http://preview.themeforest.net/item/mediplus-medical-and-doctor-html-template/full_screen_preview/26665910?_ga=2.145092285.888558928.1591971968-344530658.1588061879"--}}
{{--           target="_blank" class="btn">Pro Version Demo</a>--}}
{{--        <a href="https://themeforest.net/item/mediplus-medical-and-doctor-html-template/26665910" target="_blank"--}}
{{--           class="btn">Buy Pro Version</a>--}}
{{--    </div>--}}
{{--</ul>--}}

<!-- Header Area -->
<header class="header">
    <!-- Topbar -->
    <div class="topbar">
        <div class="container">
            <div class="row">

                <div class="col-lg-12 col-md-7 col-12">
                    <!-- Top Contact -->
                    <ul class="top-contact">
                        <li><i class="fa fa-phone"></i>+20 {{$settings->phone_number}}</li>
                        <li><i class="fa fa-envelope"></i><a href="mailto:{{$settings->email}}">{{$settings->email}}</a>
                        </li>
                    </ul>
                    <!-- End Top Contact -->
                </div>
            </div>
        </div>
    </div>
    <!-- End Topbar -->
    <!-- Header Inner -->
    <div class="header-inner">
        <div class="container">
            <div class="inner">
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-12 mb-15">
                        <!-- Start Logo -->
                        <div class="logo">
                            <a href="index.html"><img src="{{asset('storage/' . $settings->logo)}}" alt="#"></a>
                        </div>
                        <!-- End Logo -->
                        <!-- Mobile Nav -->
                        <div class="mobile-nav"></div>
                        <!-- End Mobile Nav -->
                    </div>
                    <div dir="rtl" class="col-lg-9 col-md-9 col-12" style="align-content: center;">
                        <!-- Main Menu -->
                        <div class="main-menu">
                            <nav class="navigation">
                                <ul class="nav menu">
                                    <li class="active"><a href="#">الرئيسية</a>
                                    </li>
                                    <li><a href="#">المنتجات </a></li>
                                    <li><a href="#">من نحن </a></li>
                                    <li><a href="#">معرض الصور</a></li>
                                    <li><a href="">تواصل معنا</a></li>
                                </ul>
                            </nav>
                        </div>
                        <!--/ End Main Menu -->
                    </div>
                    {{--                    <div class="col-lg-2 col-12">--}}
                    {{--                        <div class="get-quote">--}}
                    {{--                            <a href="appointment.html" class="btn">Book Appointment</a>--}}
                    {{--                        </div>--}}
                    {{--                    </div>--}}
                </div>
            </div>
        </div>
    </div>
    <!--/ End Header Inner -->
</header>
<!-- End Header Area -->
