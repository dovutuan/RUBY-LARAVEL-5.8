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
{{--                        <div class="single-table">--}}
{{--                            <div class="table-responsive">--}}
{{--                                <table class="table table-hover progress-table text-center">--}}
{{--                                    <thead class="text-uppercase">--}}
{{--                                    <tr>--}}
{{--                                        <th>Stt</th>--}}
{{--                                        <th>{{ __('messages.a-customer') }}</th>--}}
{{--                                        <th>{{ __('messages.money-paid') }}</th>--}}
{{--                                        <th>{{ __('messages.a-price') }}</th>--}}
{{--                                        <th>{{ __('messages.a-tax-rate') }}</th>--}}
{{--                                        <th class="text-left">{{ __('messages.a-discount') }}</th>--}}
{{--                                        <th>{{ __('messages.a-status') }}</th>--}}
{{--                                        <th>{{ __('messages.a-date-create') }}</th>--}}
{{--                                        <th></th>--}}
{{--                                    </tr>--}}
{{--                                    </thead>--}}
{{--                                    <tbody>--}}
{{--                                    @foreach($bills as $bill)--}}
{{--                                        <tr>--}}
{{--                                            <th>{{$loop->iteration}}</th>--}}
{{--                                            <th>{{$bill->users->name}}</th>--}}
{{--                                            <th>{{number_format($bill->price_paid)}} <sup>{{ __('messages.a-vnđ') }}</sup></th>--}}
{{--                                            <td>{{number_format($bill->price)}} <sup>{{ __('messages.a-vnđ') }}</sup>--}}
{{--                                            </td>--}}
{{--                                            <td>{{number_format($bill->tax_rate)}} <sup>{{ __('messages.a-vnđ') }}</sup>--}}
{{--                                            </td>--}}
{{--                                            <td class="text-left">--}}
{{--                                                <ul>--}}
{{--                                                    <li>{{ __('messages.a-discount-name') }}:--}}
{{--                                                        <b>{{$bill->discount_name}}</b></li>--}}
{{--                                                    <li>{{ __('messages.a-discount-code') }}:--}}
{{--                                                        <b>{{$bill->discount_code}}</b></li>--}}
{{--                                                    <li>{{ __('messages.a-discount-price') }}:--}}
{{--                                                        <b>- {{number_format($bill->discount_price)}}--}}
{{--                                                            <sup>{{ __('messages.a-vnđ') }}</sup></b></li>--}}
{{--                                                </ul>--}}
{{--                                            </td>--}}
{{--                                            <td>--}}
{{--                                                <a href="{{route('change.status.bill', $bill->id)}}">--}}
{{--                                                    <lable--}}
{{--                                                        class="badge {{ $bill->getStatus($bill->status)['class'] }}">{{ $bill->getStatus($bill->status)['name'] }}</lable>--}}
{{--                                                </a>--}}
{{--                                            </td>--}}
{{--                                            <td>{{$bill->created_at->format('H:i:s d-m-Y')}}</td>--}}
{{--                                            <td class="text-left">--}}
{{--                                                @can('bill-detail')--}}
{{--                                                    <a href="{{route('detail.bill', $bill->id)}}"--}}
{{--                                                       class="btn btn-xs btn-outline-info"><i--}}
{{--                                                            class="fa fa-eye"></i></a>--}}
{{--                                                @endcan--}}
{{--                                            </td>--}}
{{--                                        </tr>--}}
{{--                                    @endforeach--}}
{{--                                    </tbody>--}}
{{--                                    <tfoot>--}}
{{--                                    <tr>--}}
{{--                                        <th colspan="9"--}}
{{--                                            class="text-right">{{ __('messages.a-total-bill:') }} {{$totalBill}}--}}
{{--                                            <sup>{{ __('messages.a-bill') }}</sup></th>--}}
{{--                                    </tr>--}}
{{--                                    </tfoot>--}}
{{--                                </table>--}}
{{--                            </div>--}}
{{--                        </div>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
