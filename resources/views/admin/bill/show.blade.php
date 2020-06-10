@extends('layouts_admin.app')
@section('content')

    <div class="main-content-inner">
        <div class="row">
            <div class="col-12 mt-5">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 text-left">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="#">{{ __('messages.a-home') }}</a></li>
                                        <li class="breadcrumb-item"><a href="#">{{ __('messages.a-bill') }}</a></li>
                                        <li class="breadcrumb-item active"
                                            aria-current="page">{{ __('messages.a-bill-detail') }}</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card1">
                                            <div class="card1-body">
                                                <h4 class="header-title">{{ __('messages.a-bill-information') }}</h4>
                                                <div class="form-group">
                                                    <label class="control-label"><b>{{ __('messages.a-customer') }}</b></label>
                                                    <input class="form-control" type="text"
                                                           value="{{$bill->users->name}}" Disabled>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label
                                                                class="control-label"><b>{{ __('messages.a-price') }}</b></label>
                                                            <div class="input-group mb-3">
                                                                <input type="text" class="form-control"
                                                                       value="{{number_format($bill->price)}}" Disabled>
                                                                <div class="input-group-append">
                                                                    <span
                                                                        class="input-group-text">{{ __('messages.a-vnđ') }}</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label
                                                                class="control-label"><b>{{ __('messages.a-tax-rate') }}</b></label>
                                                            <div class="input-group mb-3">
                                                                <input type="text" class="form-control"
                                                                       value="{{number_format($bill->tax_rate)}}"
                                                                       Disabled>
                                                                <div class="input-group-append">
                                                                    <span
                                                                        class="input-group-text">{{ __('messages.a-vnđ') }}</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label"><b>{{ __('messages.a-discount-name') }}
                                                            / {{ __('messages.a-discount-code') }}
                                                            / {{ __('messages.a-discount-price') }}</b></label>
                                                    <div class="input-group mb-3">
                                                        <input class="form-control" type="text"
                                                               value="{{$bill->discount_name}}" Disabled>
                                                        <div class="input-group-append">
                                                            <input class="form-control" type="text"
                                                                   value="{{$bill->discount_code}}" Disabled>
                                                        </div>
                                                        <div class="input-group-append">
                                                            <input class="form-control" type="text"
                                                                   value="- {{number_format($bill->discount_price)}}"
                                                                   Disabled>
                                                            <span
                                                                class="input-group-text">{{ __('messages.a-vnđ') }}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-7">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card1">
                                            <div class="card1-body">
                                                <h4 class="header-title">{{ __('messages.a-bill-detail-information') }}</h4>
                                                @foreach($bill->billDetail as $billDetail)
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label class="control-label"><b>{{ __('messages.a-product') }}</b></label>
                                                                <input class="form-control" type="text"
                                                                       value="{{$billDetail->products->name}}" Disabled>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label class="control-label"><b>{{ __('messages.a-amount') }} / {{ __('messages.a-species') }}</b></label>
                                                                <div class="input-group mb-3">
                                                                    <input class="form-control" type="text"
                                                                           value="{{$billDetail->amount}}" Disabled>
                                                                    <div class="input-group-append">
                                                                        <input class="form-control" type="text"
                                                                               value="{{$billDetail->species->name}}" Disabled>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label class="control-label"><b>{{ __('messages.a-qty') }}</b></label>
                                                                <input class="form-control" type="text"
                                                                       value="{{$billDetail->qty}}" Disabled>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label class="control-label"><b>{{ __('messages.a-price') }}</b></label>
                                                                <div class="input-group mb-3">
                                                                    <input type="text" class="form-control"
                                                                           value="{{number_format($billDetail->price)}}" Disabled>
                                                                    <div class="input-group-append">
                                                                        <span class="input-group-text">{{ __('messages.a-vnđ') }}</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <button class="btn btn-xs btn-outline-dark" onclick="window.history.go(-1); return false;">
                                <i class="fa fa-angle-double-left"> {{ __('messages.back-to-list') }}</i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
