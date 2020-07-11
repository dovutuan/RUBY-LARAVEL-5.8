@extends('layouts_home.app')
@section('content')

    <section class="breadcrumb-section set-bg" data-setbg="{{ asset('theme_home_new') }}/img/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>{{ __('messages.a-discount') }}</h2>
                        <div class="breadcrumb__option">
                            <a href="{{route('home')}}">{{ __('messages.home') }}</a>
                            <span>{{ __('messages.a-discount') }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="mt-5 mb-5">
        <div class="container-half-fluid">
            <div class="row blog">
                @foreach($discounts as $discount)
                    <div class="col-lg-3 col-md-6 col-sm-6 mb-5">
                        <div class="our-team">
                            <div class="pic">
                                @if($discount->users->image || $discount->users->image != '')
                                    <img src="{{fileUrl(USERS, $discount->users->image)}}">
                                @else
                                    <img src="{{asset('files/shops/shop.png')}}">
                                @endif
                            </div>
                            <div class="team-content">
                                <h3 class="title">{{$discount->name}}</h3>
                                <span
                                    class="post">{{ __('messages.used') }}: {{number_format($discount->use)}} <sup>{{ __('messages.innings') }}</sup></span>
                                <span
                                    class="post">{{ __('messages.rest') }}: {{number_format($discount->amount)}} <sup>{{ __('messages.innings') }}</sup></span>
                            </div>
                            <ul class="social">
                                <h3 class="text-our-team">{{$discount->code}}</h3>
                            </ul>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

@endsection
