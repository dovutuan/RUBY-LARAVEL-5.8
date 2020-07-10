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
                        <th></th>
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
                            <td>
                                @if($bill->status === THREE)
                                    <button type="button" class="open-dialog-rate btn btn-sm btn-outline-success"
                                            data-toggle="modal" data-target="#exampleModalCenter"
                                            data-id="{{$billDetail->product_id}}">
                                        <i class="fa fa-star"></i>
                                    </button>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content review_box">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">{{ __('messages.add-a-review') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('rate-product')}}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <input style="display: none" class="display-none" type="text" name="product_id" id="product_id" value=""/>
                        <div class="form-group">
                            <ul class="list list_star">
                                @for($i = ONE; $i <= FIVE; $i++)
                                    <li><i class="fa fa-star" data-key="{{$i}}"></i></li>
                                @endfor
                                <span class="rsStar list_text"></span>
                                <input type="hidden" value="" class="number_rating"
                                       name="star">
                            </ul>
                        </div>
                        <div class="form-group">
                              <textarea class="form-control different-control w-100 content"
                                        name="content" rows="30" cols="30" id="content"
                                        placeholder="{{ __('messages.enter-content') }}"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-sm btn-info"><i class="fa fa-check"></i></button>
                        <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal"><i
                                class="fa fa-close"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('theme_home_new') }}/js/rating.js"></script>
    <script>CKEDITOR.replace('content');</script>
@endsection
