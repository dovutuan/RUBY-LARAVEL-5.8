<!DOCTYPE html>
<html class="no-js" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>RUBYSHOP - Trang quản trị</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{ asset('logo') }}/ruby.png" type="image/png">

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

    <link href="{{ asset('theme_admin') }}/select/dist/css/selectize.css" rel="stylesheet">
    <script src="{{ asset('theme_admin') }}/select/js/jquery.js"></script>
    <script src="{{ asset('theme_admin') }}/select/dist/js/standalone/selectize.js"></script>
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
<script>
    $('#select-state').selectize({
        maxItems: 100
    });
</script>
<script src="{{ asset('theme_admin') }}/assets/js/vendor/jquery-2.2.4.min.js"></script>
<script src="{{ asset('theme_admin') }}/assets/js/popper.min.js"></script>
<script src="{{ asset('theme_admin') }}/assets/js/bootstrap.min.js"></script>
<script src="{{ asset('theme_admin') }}/assets/js/owl.carousel.min.js"></script>
<script src="{{ asset('theme_admin') }}/assets/js/metisMenu.min.js"></script>
<script src="{{ asset('theme_admin') }}/assets/js/jquery.slimscroll.min.js"></script>
<script src="{{ asset('theme_admin') }}/assets/js/jquery.slicknav.min.js"></script>

<script src="{{ asset('theme_admin') }}/assets/js/plugins.js"></script>
<script src="{{ asset('theme_admin') }}/assets/js/scripts.js"></script>
@include('ckfinder::setup')
<script src="{{ asset('theme_admin') }}/assets/js/controller/ckfinder.js"></script>
<script src="{{ asset('theme_admin') }}/ckeditor/ckeditor.js"></script>
<script>
    CKEDITOR.replace('content');
    CKEDITOR.replace('detail');
</script>

<script>
    $(document).ready(function(){
        $('#add').click(function(){
            $('#dynamic_field').append('<div class="col-md-3"><div class="form-group"> <label class="control-label"><b>{{ __('messages.a-size') }}</b></label> <select name="size_id[]" class="s-example-basic-single form-control">@foreach($sizes as $size)<option value="{{$size->id}}">{{$size->name}}</option>@endforeach</select></div></div><div class="col-md-3"><div class="form-group"><label class="control-label"><b>{{ __('messages.a-color') }}</b></label><select name="color_id[]" class="s-example-basic-single form-control">@foreach($colors as $color)<option value="{{$color->id}}">{{$color->name}}</option>@endforeach</select></div></div><div class="col-md-3"><div class="form-group"><label class="control-label"><b>{{ __('messages.a-amount') }}</b></label><input name="amount[]" id="amount" type="number" min="0"class="form-control" value="{{old('amount')}}"/></div></div><div class="col-md-3"><div class="form-group"><label class="control-label"><b>{{ __('messages.a-price') }}</b></label><div class="input-group mb-3"><input name="price[]" id="price" min="0" type="number" class="form-control" value="{{old('price')}}"><div class="input-group-append"><span class="input-group-text">vnđ</span></div></div></div></div>');
        });
    });
</script>
@yield('script')
</body>
</html>
