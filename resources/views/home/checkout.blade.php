@extends('layouts_home.app')
@section('content')

    <section class="breadcrumb-section set-bg" data-setbg="{{ asset('theme_home_new') }}/img/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>{{ __('messages.checkout') }}</h2>
                        <div class="breadcrumb__option">
                            <a href="{{route('home')}}">{{ __('messages.home') }}</a>
                            <span>{{ __('messages.checkout') }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="checkout spad">
        <div class="container-half-fluid">
            <div class="checkout__form">
                <h4>{{ __('messages.billing-details') }}</h4>
                <form action="#">
                    <div class="row">
                        <div class="col-lg-8 col-md-6">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>{{ __('messages.check-out-name') }} <span>*</span></p>
                                        <input type="text" value="{{\Auth::user()->name}}" readonly>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>{{ __('messages.check-out-birth') }} <span>*</span></p>
                                        <input type="date" value="{{\Auth::user()->birth}}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>{{ __('messages.check-out-phone') }} <span>*</span></p>
                                        <input type="number" value="{{\Auth::user()->phone}}" readonly>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>{{ __('messages.check-out-email') }} <span>*</span></p>
                                        <input type="email" value="{{\Auth::user()->email}}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="checkout__input">
                                <p>{{ __('messages.check-out-address') }} <span>*</span></p>
                                <input type="text" value="{{\Auth::user()->address}}" readonly>
                            </div>
                            <div class="checkout__input">
                                <p>{{ __('messages.check-out-other-address') }}</p>
                                <textarea class="text-area" placeholder="{{ __('messages.check-out-address-about') }}"></textarea>
                            </div>
                            <div class="checkout__input">
                                <p>{{ __('messages.check-out-note') }}</p>
                                <textarea class="text-area" placeholder="{{ __('messages.check-out-note-about') }}"></textarea>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="checkout__order">
                                <h4>{{ __('messages.your-order') }}</h4>
                                <div class="checkout__order__products">{{ __('messages.a-product') }}
                                    <span>{{ __('messages.a-total') }}</span></div>
                                <ul>
                                    @foreach($carts as $cart)
                                        <li>{{$cart->name}} <span>{{$cart->options->amount}} <sup>{{$cart->options->species}}</sup> - {{number_format($cart->price)}} <sup>{{ __('messages.a-vnđ') }}</sup> x {{$cart->qty}} </span></li>
                                    @endforeach
                                </ul>
                                <div class="checkout__order__subtotal">{{ __('messages.money-goods') }} <span>{{Cart::priceTotal(0, 3)}} <sup>{{ __('messages.a-vnđ') }}</sup></span></div>
                                <div class="checkout__order__subtotal">{{ __('messages.transport-fee') }} <span>{{Cart::tax(0, 3)}} <sup>{{ __('messages.a-vnđ') }}</sup></span></div>
                                <div class="checkout__order__subtotal">{{ __('messages.total-payment') }} <span>{{Cart::total(0, 3)}} <sup>{{ __('messages.a-vnđ') }}</sup></span></div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>

@endsection
