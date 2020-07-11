@extends('layouts_admin.app')
@section('content')

    <div class="main-content-inner">
        <div class="row">
            <div class="col-12 mt-5">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-10 text-left">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="#">{{ __('messages.a-home') }}</a></li>
                                        <li class="breadcrumb-item active"
                                            aria-current="page">{{ __('messages.a-discount') }}</li>
                                    </ol>
                                </nav>
                            </div>
                            <div class="col-md-2 clearfix text-right">
                                <button type="button" class="btn btn-sm btn-success" data-toggle="modal"
                                        data-target="#myModal">
                                    <i class="fa fa-plus"></i>
                                </button>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-12 clearfix text-right">
                                <div class="search-box pull-right">
                                    <form action="" method="GET">
                                        <input type="text" name="key" placeholder="{{ __('messages.search...') }}"
                                               value="{{ isset($key) ? $key : old('key') }}">
                                        <i class="ti-search"></i>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="single-table">
                            <div class="table-responsive">
                                <table class="table table-hover progress-table text-center">
                                    <thead class="text-uppercase">
                                    <tr>
                                        <th>{{ __('messages.a-stt') }}</th>
                                        <th>{{ __('messages.a-code') }}</th>
                                        <th>{{ __('messages.a-information') }}</th>
                                        <th>{{ __('messages.a-date-create') }}</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($discounts as $stt => $discount)
                                        <tr>
                                            <th>{{$loop->iteration}}</th>
                                            <th>{{$discount->code}}</th>
                                            <td class="text-left">
                                                <ul>
                                                    <li><lable class="badge {{ $discount->getStatus($discount->status)['class'] }}">{{ $discount->getStatus($discount->status)['name'] }}</lable></li>
                                                    <li>{{ __('messages.a-price') }}: {{number_format($discount->price)}} <sup>{{ __('messages.a-vnđ') }}</sup></li>
                                                    <li>{{ __('messages.a-use') }}: {{$discount->use}}</li>
                                                    <li>{{ __('messages.a-time-remaining') }}: {{$discount->calculatingTime($discount->start, $discount->finish)}} <sup>{{ __('messages.a-day') }}</sup></li>
                                                    <li>{{ __('messages.a-quantity-remaining') }}: {{$discount->quantityRemaining($discount->amount, $discount->use)}}</li>
                                                    <li>{{ __('messages.a-expired') }}:  {{$discount->finish}}</li>
                                                </ul>
                                            </td>
                                            <td>{{$discount->created_at->format('H:i:s d-m-Y')}}</td>
                                            <td class="text-right">
                                                @can('discount-edit')
                                                    <a href="{{route('edit.discount', $discount->id)}}"
                                                       class="btn btn-xs btn-outline-success"><i
                                                            class="fa fa-edit"></i></a>
                                                @endcan
                                                @can('discount-delete')
                                                    <a href="{{route('destroy.discount', $discount->id)}}"
                                                       class="btn btn-xs btn-outline-danger"
                                                       onclick="return confirm('Do you want to delete?')"><i
                                                            class="fa fa-trash"></i></a>
                                                @endcan
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th colspan="6"
                                            class="text-right">{{ __('messages.a-total-discount:') }} {{$totalDiscount}}
                                            <sup>{{ __('messages.a-discount') }}</sup></th>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                        {{ $discounts->appends(['key' => $key])->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('admin.discount.modal')

@endsection
