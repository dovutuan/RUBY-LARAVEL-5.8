@extends('layouts_home.app')
@section('content')

    <br><br>
    <section class="cart_area padding_top">
        <div class="container">
            @include('layouts_home.alert')
            <div class="cart_inner">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">{{ __('messages.a-product') }}</th>
                            <th scope="col">{{ __('messages.a-option') }}</th>
                            <th scope="col">{{ __('messages.a-amount') }}</th>
                            <th scope="col">{{ __('messages.a-total') }}</th>
                            <th scope="col"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($carts as $key => $cart)
                            <tr>
                                <td>
                                    <div class="media">
                                        <div class="d-flex max-width-image">
                                            <img src="{{$cart->options->image}}"
                                                 alt=""/>
                                        </div>
                                        <div class="media-body">
                                            <p>{{$cart->name}}</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="text-white-space">
                                    <h5>{{number_format($cart->price)}} <sup>{{ __('messages.a-vnđ') }}</sup>
                                        - {{$cart->options->amount}} <sup>{{$cart->options->species}}</sup></h5>
                                </td>
                                <form action="{{route('update-cart', $key)}}" method="GET">
                                    <td>
                                        <div class="product_count">
                                            <span class="input-number-decrement"> <i class="ti-angle-down"></i></span>
                                            <input id="{{$key}}" class="input-number" type="text" name="amount" value="{{$cart->qty}}" min="0" max="20">
                                            <span class="input-number-increment"> <i class="ti-angle-up"></i></span>
                                        </div>
                                    </td>
                                    <td class="text-white-space">
                                        <h5>{{number_format($cart->qty*$cart->price)}} <sup>{{ __('messages.a-vnđ') }}</sup>
                                        </h5>
                                    </td>
                                    <td class="text-right text-white-space">
                                        <button type="submit" class="btn btn-sm btn-outline-info"><i class="fa fa-edit"></i></button>
                                        <a href="{{route('delete-cart', $key)}}"
                                           class="btn btn-sm btn-outline-danger"
                                           onclick="return confirm('Are you sure you want to delete this product from the cart?')"><i
                                                class="fa fa-trash"></i></a>
                                    </td>
                                </form>
                            </tr>
                        @endforeach
                        @if(Cart::count() > 0)
                            <tr class="bottom_button">
                                <td colspan="5" class="text-right">
                                    <a class="btn_1" href="{{route('cart')}}">{{ __('messages.update-cart') }}</a>
                                    <a class="btn_1" href="{{route('delete-all-cart')}}"
                                       onclick="return confirm('Are you sure you want to delete all products in your cart?')">{{ __('messages.delete-all') }}</a>
                                </td>
                            </tr>
                        @endif
                        <tr>
                            <td colspan="5" class="text-right">
                                <table class="text-margin-left-auto text-right">
                                    <tr>
                                        <th>{{ __('messages.money-goods') }}</th>
                                        <th><span class="text-white-space">{{Cart::priceTotal(0, 3)}} <sup>{{ __('messages.a-vnđ') }}</sup></span></th>
                                    </tr>
                                    <tr>
                                        <th>{{ __('messages.transport-fee') }}</th>
                                        <th><span class="text-white-space">{{Cart::tax(0, 3)}} <sup>{{ __('messages.a-vnđ') }}</sup></span></th>
                                    </tr>
                                    <tr>
                                        <th>{{ __('messages.total-payment') }}</th>
                                        <th><span class="text-white-space">{{Cart::total(0, 3)}} <sup>{{ __('messages.a-vnđ') }}</sup></span></th>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    <div class="checkout_btn_inner float-right">
                        <a class="btn_1" href="{{route('home')}}">{{ __('messages.continue-shopping') }}</a>
                        <a class="btn_1 checkout_btn_1" href="#">Proceed to checkout</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
