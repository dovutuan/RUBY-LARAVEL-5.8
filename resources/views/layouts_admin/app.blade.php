<!DOCTYPE html>
<html class="no-js" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>RUBYSHOP - Trang quản trị</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{ asset('logo') }}ruby.png" type="image/png">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="{{ asset('theme_admin') }}/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('theme_admin') }}/assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('theme_admin') }}/assets/css/themify-icons.css">
    <link rel="stylesheet" href="{{ asset('theme_admin') }}/assets/css/metisMenu.css">
    <link rel="stylesheet" href="{{ asset('theme_admin') }}/assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="{{ asset('theme_admin') }}/assets/css/slicknav.min.css">

    <link rel="stylesheet" href="{{ asset('theme_admin') }}/assets/css/typography.css">
    <link rel="stylesheet" href="{{ asset('theme_admin') }}/assets/css/default-css.css">
    <link rel="stylesheet" href="{{ asset('theme_admin') }}/assets/css/styles.css">
    <link rel="stylesheet" href="{{ asset('theme_admin') }}/assets/css/new.css">
    <link rel="stylesheet" href="{{ asset('theme_admin') }}/assets/css/responsive.css">
    <script src="{{ asset('theme_admin') }}/assets/js/vendor/modernizr-2.8.3.min.js"></script>

    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
</head>

<body class="body-bg">
<div id="preloader">
    <div class="loader"></div>
</div>
<div class="horizontal-main-wrapper">
    @include('layouts_admin.main_header')
    @include('layouts_admin.header')
    @yield('content')
</div>
<script src="{{ asset('theme_admin') }}/assets/js/vendor/jquery-2.2.4.min.js"></script>
<script src="{{ asset('theme_admin') }}/assets/js/popper.min.js"></script>
<script src="{{ asset('theme_admin') }}/assets/js/bootstrap.min.js"></script>
<script src="{{ asset('theme_admin') }}/assets/js/owl.carousel.min.js"></script>
<script src="{{ asset('theme_admin') }}/assets/js/metisMenu.min.js"></script>
<script src="{{ asset('theme_admin') }}/assets/js/jquery.slimscroll.min.js"></script>
<script src="{{ asset('theme_admin') }}/assets/js/jquery.slicknav.min.js"></script>

<script src="{{ asset('theme_admin') }}/assets/js/plugins.js"></script>
<script src="{{ asset('theme_admin') }}/assets/js/scripts.js"></script>

{{--@include('ckfinder::setup')--}}
{{--<script src="{{ asset('theme_admin') }}/assets/js/controller/ckfinder.js"></script>--}}


<script src="{{ asset('theme_admin') }}/ckeditor/ckeditor.js"></script>
<script>
    CKEDITOR.replace('content');
    CKEDITOR.replace('detail');
</script>
{{--<script>--}}
{{--    $(".ac1").click(function (event) {--}}
{{--        event.preventDefault();--}}
{{--        if ($(".form-image1").hasClass('hide') && $(".faac1").hasClass('fa-angle-double-down')) {--}}
{{--            $(".form-image1").addClass('show').removeClass('hide');--}}
{{--            $(".faac1").addClass('fa-angle-double-up').removeClass('fa-angle-double-down')--}}
{{--        } else {--}}
{{--            $(".form-image1").addClass('hide').removeClass('show');--}}
{{--            $(".faac1").addClass('fa-angle-double-down').removeClass('fa-angle-double-up')--}}
{{--        }--}}
{{--    })--}}
{{--    $(".ac2").click(function (event) {--}}
{{--        event.preventDefault();--}}
{{--        if ($(".form-image2").hasClass('hide') && $(".faac2").hasClass('fa-angle-double-down')) {--}}
{{--            $(".form-image2").addClass('show').removeClass('hide');--}}
{{--            $(".faac2").addClass('fa-angle-double-up').removeClass('fa-angle-double-down')--}}
{{--        } else {--}}
{{--            $(".form-image2").addClass('hide').removeClass('show');--}}
{{--            $(".faac2").addClass('fa-angle-double-down').removeClass('fa-angle-double-up')--}}
{{--        }--}}
{{--    })--}}
{{--</script>--}}

@yield('script')
</body>
</html>
