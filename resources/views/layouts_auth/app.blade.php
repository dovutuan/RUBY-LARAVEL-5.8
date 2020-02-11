<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>SIGN IN - SIGN UP</title>
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
<header class="main_menu home_menu">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-12">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="navbar-brand" href="{{route('home')}}"><img src="{{ asset('theme_home') }}/img/logo.png" alt="logo"> </a>
                    <div class="collapse navbar-collapse main-menu-item" id="navbarSupportedContent"></div>
                    <div class="hearer_icon d-flex">
                        <div class="dropdown">
                            <button class="btn btn-outline-primary dropdown-toggle" type="button"
                                    data-toggle="dropdown">{{ __('messages.lang') }}<span class="caret"></span></button>
                            <ul class="dropdown-menu">
                                <li><a href="{{ route('lang',['lang' => 'vi']) }}"><img src="{{ asset('icon') }}/vn.png"></a></li>
                                <li><a href="{{ route('lang',['lang' => 'en' ]) }}"><img src="{{ asset('icon') }}/en.png"></a></li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>
@yield('content')
</body>
</html>
