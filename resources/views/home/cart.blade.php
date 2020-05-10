@extends('layouts_home.app')
@section('content')

    <section class="breadcrumb-section set-bg" data-setbg="{{ asset('theme_home_new') }}/img/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>{{ __('messages.shopping-cart') }}</h2>
                        <div class="breadcrumb__option">
                            <a href="{{route('home')}}">{{ __('messages.home') }}</a>
                            <span>{{ __('messages.shopping-cart') }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="shoping-cart spad">
        <div class="container">
            @include('layouts_home.alert')
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__table">
                        <table>
                            <thead>
                            <tr>
                                <th class="shoping__product">{{ __('messages.a-product') }}</th>
                                <th>{{ __('messages.a-option') }}</th>
                                <th>{{ __('messages.a-amount') }}</th>
                                <th>{{ __('messages.a-total') }}</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($carts as $key => $cart)
                                <form action="{{route('update-cart', $key)}}" method="GET">
                                    <tr>
                                        <td class="shoping__cart__item">
                                            <img class="image-cart" src="{{$cart->options->image}}" alt="">
                                            <a href="{{route('detail-product', $cart->id)}}"> <h5>{{$cart->name}}</h5></a>
                                        </td>
                                        <td class="shoping__cart__price white-space-nowrap">
                                            {{$cart->options->amount}} <sup>{{$cart->options->species}}</sup>
                                            - {{number_format($cart->price)}} <sup>{{ __('messages.a-vnđ') }}</sup>
                                        </td>
                                        <td class="shoping__cart__quantity">
                                            <div class="quantity">
                                                <div class="pro-qty">
                                                    <input type="text" name="amount" value="{{$cart->qty}}" min="1" readonly>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="shoping__cart__total white-space-nowrap">
                                            {{number_format($cart->qty*$cart->price)}}
                                            <sup>{{ __('messages.a-vnđ') }}</sup>
                                        </td>
                                        <td class="shoping__cart__item__close white-space-nowrap">
                                            <button type="submit" class="btn btn-sm btn-outline-info"><i
                                                    class="fa fa-edit"></i></button>
                                            <a href="{{route('delete-cart', $key)}}"
                                               class="btn btn-sm btn-outline-danger"
                                               onclick="return confirm('Are you sure you want to delete this product from the cart?')"><i
                                                    class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                </form>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__btns">
                        <a href="{{route('home')}}"
                           class="primary-btn cart-btn">{{ __('messages.continue-shopping') }}</a>
                        @if(Cart::count() > 0)
                            <a class="primary-btn cart-btn cart-btn-right" href="{{route('delete-all-cart')}}"
                               onclick="return confirm('Are you sure you want to delete all products in your cart?')">{{ __('messages.delete-all') }}</a>
                        @endif
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="shoping__continue">
                        <div class="shoping__discount">
                            <h5>Discount Codes</h5>
                            <form action="{{route('check-discount')}}" method="POST">
                                @csrf
                                <input type="text" placeholder="Enter your coupon code" name="discount">
                                <button type="submit" class="site-btn">APPLY COUPON</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="shoping__checkout">
                        <h5>{{ __('messages.cart-total') }}</h5>
                        <ul>
                            <li>{{ __('messages.money-goods') }} <span>{{Cart::priceTotal(0, 3)}} <sup>{{ __('messages.a-vnđ') }}</sup></span></li>
                            <li>{{ __('messages.transport-fee') }} <span>{{Cart::tax(0, 3)}} <sup>{{ __('messages.a-vnđ') }}</sup></span></li>
                            <li>{{ __('messages.total-payment') }} <span>{{Cart::total(0, 3)}} <sup>{{ __('messages.a-vnđ') }}</sup></span></li>
                        </ul>
                        <a href="{{route('pay')}}" class="primary-btn">{{ __('messages.proceed-to-checkout') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
