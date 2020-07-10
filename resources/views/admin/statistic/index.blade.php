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
                                        <li class="breadcrumb-item active"
                                            aria-current="page">{{ __('messages.a-bill') }}</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-12 clearfix text-right">
                                <div class="search-box pull-right">
                                    <form action="" method="GET">
                                        <input class="input-radius-unset" type="date" name="date"
                                               value="{{ isset($date) ? $date : old('date') }}">
                                        <button type="submit" class="btn btn-i btn-outline-primary"> <i class="ti-search"></i></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="card col-md-12">
                                <div class="seo-fact sbg4">
                                    <div class="p-4 d-flex justify-content-between align-items-center">
                                        <div class="seofct-icon">{{ __('messages.rate') }}</div>
                                        <h1 class="text-right">
                                            {{$star_shop . ' / ' . FIVE . ' (' . $count_rate . ' ' . __('messages.innings')  .')'}}
                                            @for($i = ONE; $i <= $star_shop; $i++)
                                                <i class="fa fa-star"></i>
                                            @endfor
                                        </h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-5">
                            <div class="card">
                                <div class="card-body bg4">
                                    <h4 class="header-title text-white">{{ __('messages.a-information') }}</h4>
                                    <div class="testimonial-carousel owl-carousel">
                                        <div class="tst-item">
                                            <div class="tstu-img">
                                                <img class="image-owl" src="{{asset('icon')}}/price.jpg">
                                            </div>
                                            <div class="tstu-content">
                                                <h4 class="tstu-name">
                                                    {{ __('messages.a-price') }}
                                                </h4>
                                                <p>{{number_format($price_bill)}} <sup>{{ __('messages.a-vnđ') }}</sup>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="tst-item">
                                            <div class="tstu-img">
                                                <img class="image-owl" src="{{asset('icon')}}/order.png">
                                            </div>
                                            <div class="tstu-content">
                                                <h4 class="tstu-name">
                                                    {{ __('messages.total-bill') }}
                                                </h4>
                                                <p>{{$total_bill}}</p>
                                            </div>
                                        </div>
                                        <div class="tst-item">
                                            <div class="tstu-img">
                                                <img class="image-owl" src="{{asset('icon')}}/product.png">
                                            </div>
                                            <div class="tstu-content">
                                                <h4 class="tstu-name">
                                                    {{ __('messages.total-product') }}
                                                </h4>
                                                <p>{{$count_products}}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-5">
                            <div class="col-md-6">
                                <div class="single-table">
                                    <div class="table-responsive">
                                        <table class="table table-hover progress-table text-center table-bordered">
                                            <thead class="text-uppercase bg-warning">
                                            <tr>
                                                <th>Stt</th>
                                                <th>{{ __('messages.a-product') }}</th>
                                                <th>{{ __('messages.total-bill') }}</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($count_product_to_bills as $count_product_to_bill)
                                                <tr>
                                                    <th>{{$loop->iteration}}</th>
                                                    <th>{{$count_product_to_bill->name}}</th>
                                                    <th>{{number_format($count_product_to_bill->bill_detail_count)}}</th>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="single-table">
                                    <div class="table-responsive">
                                        <table class="table table-hover progress-table text-center table-bordered">
                                            <thead class="text-uppercase bg-success">
                                            <tr>
                                                <th>Stt</th>
                                                <th>{{ __('messages.a-product') }}</th>
                                                <th>{{ __('messages.sold') }}</th>
                                                <th>{{ __('messages.time-of-purchase') }}</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($count_product_bills as $count_product_bill)
                                                <tr>
                                                    <th>{{$loop->iteration}}</th>
                                                    <th>{{$count_product_bill['product_name']}}</th>
                                                    <th>{{number_format($count_product_bill['product_qty'])}}</th>
                                                    <th>{{$count_product_bill['updated_at']->format('H:i:s d-m-Y')}}</th>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-5">
                            <div class="col-md-6">
                                <div class="single-table">
                                    <div class="table-responsive">
                                        <table class="table table-hover progress-table text-center table-bordered">
                                            <thead class="text-uppercase bg-info">
                                            <tr>
                                                <th>{{ __('messages.a-user') }}</th>
                                                <th>{{ __('messages.a-product') }}</th>
                                                <th>{{ __('messages.star') }}</th>
                                                <th>{{ __('messages.evaluation-time') }}</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($rate_products as $rate_product)
                                                @foreach($rate_product->rate as $key => $rate)
                                                    <tr>
                                                        <th>{{$rate->users->name}}</th>
                                                        <th>{{$rate->products->name}}</th>
                                                        <th>{{$rate->star}} <sup></sup></th>
                                                        <th>{{$rate->created_at->format('H:i:s d-m-Y')}}</th>
                                                    </tr>
                                                @endforeach
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
