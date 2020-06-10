@extends('layouts_account.app')
@section('content')

    <div id="admin-main-control" class="col-md-9 p-x-3 p-y-1">
        <div class="row">
            <div class="col-md-4">
                <table class="table table-hover">
                    <tr>
                        <th>{{ __('messages.a-customer') }}</th>
                        <td>{{$bill->users->name}}</td>
                    </tr>
                    <tr>
                        <th>{{ __('messages.a-price') }}</th>
                        <td>{{number_format($bill->price)}} <sup>{{ __('messages.a-vnđ') }}</sup></td>
                    </tr>
                    <tr>
                        <th>{{ __('messages.a-tax-rate') }}</th>
                        <td>{{number_format($bill->tax_rate)}} <sup>{{ __('messages.a-vnđ') }}</sup></td>
                    </tr>
                    <tr>
                        <table class="table table-hover">
                            <thead class="thead-light">
                            <tr>
                                <th>{{ __('messages.a-discount-name') }}</th>
                                <th>{{ __('messages.a-discount-code') }}</th>
                                <th>{{ __('messages.a-discount-price') }}</th>
                            </tr>
                            </thead>
                            <tr>
                                <td>{{$bill->discount_name}}</td>
                                <td>{{$bill->discount_code}}</td>
                                <td>- {{number_format($bill->discount_price)}} <sup>{{ __('messages.a-vnđ') }}</sup>
                                </td>
                            </tr>
                        </table>
                    </tr>
                </table>
            </div>
            <div class="col-md-8">
                <table class="table table-hover">
                    <thead class="thead-dark">
                    <tr>
                        <th>STT</th>
                        <th>{{ __('messages.a-product') }}</th>
                        <th>{{ __('messages.a-amount') }} / {{ __('messages.a-species') }}</th>
                        <th>{{ __('messages.a-qty') }}</th>
                        <th>{{ __('messages.a-price') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($bill->billDetail as $billDetail)
                        <tr>
                            <th>{{$loop->iteration}}</th>
                            <td>{{$billDetail->products->name}}</td>
                            <td>{{$billDetail->amount}} <sup>{{$billDetail->species->name}}</sup></td>
                            <td>{{$billDetail->qty}}</td>
                            <td>{{number_format($billDetail->price)}} <sup>{{ __('messages.a-vnđ') }}</sup></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
