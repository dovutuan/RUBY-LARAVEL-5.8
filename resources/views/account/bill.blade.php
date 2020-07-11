@extends('layouts_account.app')
@section('content')

    <div id="admin-main-control" class="col-md-9 p-x-3 p-y-1">
        <div class="row">
            <table class="table table-hover">
                <thead class="thead-dark">
                <tr>
                    <th>Stt</th>
                    <th>{{ __('messages.a-customer') }}</th>
                    <th>{{ __('messages.money-paid') }}</th>
                    <th>{{ __('messages.a-price') }}</th>
                    <th>{{ __('messages.a-tax-rate') }}</th>
                    <th class="text-left">{{ __('messages.a-discount') }}</th>
                    <th>{{ __('messages.a-status') }}</th>
                    <th>{{ __('messages.a-date-create') }}</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($bills as $bill)
                    <tr>
                        <th>{{$loop->iteration}}</th>
                        <th>{{$bill->users->name}}</th>
                        <th>{{number_format($bill->price_paid)}} <sup>{{ __('messages.a-vnđ') }}</sup></th>
                        <td>{{number_format($bill->price)}} <sup>{{ __('messages.a-vnđ') }}</sup>
                        </td>
                        <td>{{number_format($bill->tax_rate)}} <sup>{{ __('messages.a-vnđ') }}</sup>
                        </td>
                        <td class="text-left">
                            <ul>
                                <li>{{ __('messages.a-discount-name') }}:
                                    <b>{{$bill->discount_name}}</b></li>
                                <li>{{ __('messages.a-discount-code') }}:
                                    <b>{{$bill->discount_code}}</b></li>
                                <li>{{ __('messages.a-discount-price') }}:
                                    <b>- {{number_format($bill->discount_price)}}
                                        <sup>{{ __('messages.a-vnđ') }}</sup></b></li>
                            </ul>
                        </td>
                        <td>
                            <lable
                                class="badge {{ $bill->getStatus($bill->status)['class'] }}">{{ $bill->getStatus($bill->status)['name'] }}</lable>
                        </td>
                        <td>{{$bill->created_at->format('H:i:s d-m-Y')}}</td>
                        <td class="text-left white-space-nowrap">
                            <a href="{{route('detail-order-customer', $bill->id)}}"
                               class="btn btn-sm btn-outline-info"><i
                                    class="fa fa-eye"></i></a>
                            <a target="_blank" href="{{route('print-order-customer', $bill->id)}}"
                               class="btn btn-sm btn-outline-primary"><i
                                    class="fa fa-print"></i></a>
                            @if($bill->status === ZERO || $bill->status === ONE)
                                <a href="{{route('cancel-order-customer', $bill->id)}}"
                                   class="btn btn-sm btn-outline-danger"
                                   onclick="return confirm('Do you want to delete?')"><i
                                        class="fa fa-trash"></i></a>
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $bills->links() }}
        </div>
    </div>

@endsection
