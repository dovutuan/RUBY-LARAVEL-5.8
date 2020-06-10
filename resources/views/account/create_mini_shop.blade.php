@extends('layouts_account.app')
@section('content')
    <div id="admin-main-control" class="col-md-9 p-x-3 p-y-1">
        <form class="row contact_form" method="POST" action=""
              novalidate="novalidate">
            @csrf
            <div class="col-md-12 form-group p_star">
                <p>{{ __('messages.create-mini-shop') }}</p>
            </div>
            <div class="col-md-12 form-group p_star">
                <input readonly type="text" class="form-control" name="name"
                       placeholder="{{ __('messages.name') }}" value="{{$user->name}}">
                @error('name')
                <div class="text-danger text-left">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-12 p_star">
                <div class="row">
                    <div class="col-md-6 form-group">
                        <input readonly type="number" class="form-control" name="phone"
                               placeholder="{{ __('messages.phone-number') }}" value="{{$user->phone}}">
                        @error('phone')
                        <div class="text-danger text-left">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 form-group">
                        <input readonly type="email" class="form-control" name="email"
                               placeholder="{{ __('messages.email') }}" value="{{$user->email}}">
                        @error('email')
                        <div class="text-danger text-left">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="col-md-12 form-group p_star">
                                <textarea readonly class="form-control" name="address"
                                          placeholder="{{ __('messages.address') }}">{{$user->address}}</textarea>
                @error('address')
                <div class="text-danger text-left">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-3 form-group p_star">
                <button type="submit" class="btn btn-xs btn-outline-success">{{ __('messages.submit') }}</button>
            </div>
        </form>
    </div>
@endsection
