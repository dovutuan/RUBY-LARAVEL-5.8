@extends('layouts_admin.app')
@section('content')

    <div class="main-content-inner">
        <div class="row">
            <div class="col-12 mt-5">
                <div class="card">
                    <div class="card-body">
                        @include('layouts_admin.alert')
                        <div class="row">
                            <div class="col-md-12 text-left">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="#">{{ __('messages.a-home') }}</a></li>
                                        <li class="breadcrumb-item"><a href="#">{{ __('messages.a-product') }}</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">{{ __('messages.a-product-detail') }}</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card1">
                                            <div class="card1-body">
                                                <h4 class="header-title">Product information</h4>
                                                <div class="form-group">
                                                    <label class="control-label"><b>Name</b></label>
                                                    <input class="form-control input-rounded" type="text"
                                                           value="{{$product->name}}" Disabled>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label"><b>Category</b></label>
                                                    <input class="form-control input-rounded" type="text"
                                                           value="{{$product->category->name}}" Disabled>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card1">
                                            <div class="card1-body">
                                                <h4 class="header-title">Image product</h4>
                                                <div class="form-group">
                                                    <div class="row">
                                                        @foreach($product->image as $image)
                                                            <div class="col-md-2">
                                                                <img src="{{$image->image}}" class="img-fluid rounded">
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card1">
                                            <div class="card1-body">
                                                <h4 class="header-title">Option</h4>
                                                @foreach($product->optionProduct as $optionProduct)
                                                    <div class="row">
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label class="control-label"><b>Size</b></label>
                                                                <input class="form-control input-rounded" type="text"
                                                                       value="{{$optionProduct->size->name}}" Disabled>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label class="control-label"><b>Color</b></label>
                                                                <div class="input-group mb-3">
                                                                    <input type="text" class="form-control"
                                                                           value="{{$optionProduct->color->name}}" Disabled>
                                                                    <div class="input-group-append">
                                                                    <span style="background: {{$optionProduct->size->code}}"
                                                                          class="input-group-text"></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label class="control-label"><b>Amount</b></label>
                                                                <input class="form-control input-rounded" type="text"
                                                                       value="{{$optionProduct->amount}}" Disabled>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label class="control-label"><b>Pay</b></label>
                                                                <input class="form-control input-rounded" type="text"
                                                                       value="{{$optionProduct->pay}}" Disabled>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label class="control-label"><b>Price</b></label>
                                                                <div class="input-group mb-3">
                                                                    <input type="text" class="form-control"
                                                                           value="{{number_format($optionProduct->price)}}" Disabled>
                                                                    <div class="input-group-append">
                                                                        <span class="input-group-text">vnđ</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @if(!empty($product->sale))
                                    <br>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="card1">
                                                <div class="card1-body">
                                                    <h4 class="header-title">Sale</h4>
                                                    <div class="form-group">
                                                        <label class="control-label"><b>Sale</b></label>
                                                        <div class="input-group mb-3">
                                                            <input type="number" class="form-control"
                                                                   value="{{$product->sale->sale}}" Disabled>
                                                            <div class="input-group-append">
                                                                <span class="input-group-text">%</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label"><b>Start</b></label>
                                                                <input class="form-control input-rounded" type="date"
                                                                       value="{{$product->sale->start}}" Disabled>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label"><b>Finish</b></label>
                                                                <input class="form-control input-rounded" type="date"
                                                                       value="{{$product->sale->finish}}" Disabled>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <button class="btn btn-xs btn-outline-dark" onclick="window.history.go(-1); return false;">
                                <i
                                    class="fa fa-angle-double-left"> {{ __('messages.back-to-list') }}</i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
