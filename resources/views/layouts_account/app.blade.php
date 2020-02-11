<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>RUBYSHOP</title>
    <link rel="icon" href="{{ asset('logo') }}/ruby.png">
    <link rel="stylesheet" href="{{ asset('theme_home') }}/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('theme_home') }}/css/animate.css">
    <link rel="stylesheet" href="{{ asset('theme_home') }}/css/owl.carousel.min.css">
    <link rel="stylesheet" href="{{ asset('theme_home') }}/css/all.css">
    <link rel="stylesheet" href="{{ asset('theme_home') }}/css/flaticon.css">
    <link rel="stylesheet" href="{{ asset('theme_home') }}/css/themify-icons.css">
    <link rel="stylesheet" href="{{ asset('theme_home') }}/css/magnific-popup.css">
    <link rel="stylesheet" href="{{ asset('theme_home') }}/css/slick.css">
    <link rel="stylesheet" href="{{ asset('theme_home') }}/css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
</head>
<body>
@include('layouts_account.header')

@include('layouts_account.footer')

<script src="{{ asset('theme_home') }}/js/jquery-1.12.1.min.js"></script>
<script src="{{ asset('theme_home') }}/js/popper.min.js"></script>
<script src="{{ asset('theme_home') }}/js/bootstrap.min.js"></script>
<script src="{{ asset('theme_home') }}/js/jquery.magnific-popup.js"></script>
<script src="{{ asset('theme_home') }}/js/swiper.min.js"></script>
<script src="{{ asset('theme_home') }}/js/masonry.pkgd.js"></script>
<script src="{{ asset('theme_home') }}/js/owl.carousel.min.js"></script>
<script src="{{ asset('theme_home') }}/js/slick.min.js"></script>
<script src="{{ asset('theme_home') }}/js/jquery.counterup.min.js"></script>
<script src="{{ asset('theme_home') }}/js/waypoints.min.js"></script>
<script src="{{ asset('theme_home') }}/js/contact.js"></script>
<script src="{{ asset('theme_home') }}/js/jquery.ajaxchimp.min.js"></script>
<script src="{{ asset('theme_home') }}/js/jquery.form.js"></script>
<script src="{{ asset('theme_home') }}/js/jquery.validate.min.js"></script>
<script src="{{ asset('theme_home') }}/js/mail-script.js"></script>
<script src="{{ asset('theme_home') }}/js/custom.js"></script>
</body>
</html>
