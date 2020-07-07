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
                                        <input type="date" name="date"
                                               value="{{ isset($date) ? $date : old('date') }}">
                                        <i class="ti-search"></i>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="card">
                                <div class="card-body bg4">
                                    <h4 class="header-title text-white">{{ __('messages.a-information') }}</h4>
                                    <div class="testimonial-carousel owl-carousel">
                                        <div class="tst-item">
                                            <div class="tstu-img">
                                                <i class="ti-money"></i>
                                            </div>
                                            <div class="tstu-content">
                                                <h4 class="tstu-name">
                                                    {{ __('messages.a-price') }}
                                                </h4>
                                                <p>{{number_format($price_bill)}} <sup>{{ __('messages.a-vnđ') }}</sup></p>
                                            </div>
                                        </div>
                                        <div class="tst-item">
                                            <div class="tstu-img">
                                                <i class="ti-shopping-cart"></i>
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
                                                <i class="ti-shopping-cart"></i>
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
                                        <table class="table table-hover progress-table text-center">
                                            <thead class="text-uppercase">
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
                                        <table class="table table-hover progress-table text-center">
                                            <thead class="text-uppercase">
                                            <tr>
                                                <th>Stt</th>
                                                <th>{{ __('messages.a-product') }}</th>
                                                <th>{{ __('messages.total-bill') }}</th>
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
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
