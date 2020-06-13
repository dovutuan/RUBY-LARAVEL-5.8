@extends('layouts_account.app')
@section('content')
    <div id="admin-main-control" class="col-md-9 p-x-3 p-y-1">
        <div class="row">
            <div class="col-md-9">
                <div class="col-md-12 form-group p_star">
                    <div class="row">
                        <div class="col-md-3">
                            <lable class="form-control1">{{ __('messages.a-name') }}</lable>
                        </div>
                        <div class="col-md-9">
                            <input type="text" class="form-control" readonly value="{{$user->name}}">
                        </div>
                    </div>
                </div>
                <div class="col-md-12 form-group p_star">
                    <div class="row">
                        <div class="col-md-3">
                            <lable class="form-control1">{{ __('messages.a-gender') }}</lable>
                        </div>
                        <div class="col-md-9">
                            <div class="form-control1">
                                <label class="radio-inline "><input type="radio" @if($user->gender == 0) checked @endif readonly> {{ __('messages.male') }}</label>
                                &nbsp;&nbsp;
                                <label class="radio-inline "><input type="radio" @if($user->gender == 1) checked @endif readonly> {{ __('messages.female') }}</label>
                                &nbsp;&nbsp;
                                <label class="radio-inline "><input type="radio" @if($user->gender == 2) checked @endif readonly> {{ __('messages.other') }}</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 form-group p_star">
                    <div class="row">
                        <div class="col-md-3">
                            <lable class="form-control1">{{ __('messages.a-birth') }}</lable>
                        </div>
                        <div class="col-md-9">
                            <input type="date" class="form-control" readonly value="{{$user->birth}}">
                        </div>
                    </div>
                </div>
                <div class="col-md-12 form-group p_star">
                    <div class="row">
                        <div class="col-md-3">
                            <lable class="form-control1">{{ __('messages.a-phone') }}</lable>
                        </div>
                        <div class="col-md-9">
                            <input type="text" class="form-control" readonly value="{{$user->phone}}">
                        </div>
                    </div>
                </div>
                <div class="col-md-12 form-group p_star">
                    <div class="row">
                        <div class="col-md-3">
                            <lable class="form-control1">{{ __('messages.a-email') }}</lable>
                        </div>
                        <div class="col-md-9">
                            <input type="email" class="form-control" readonly value="{{$user->email}}">
                        </div>
                    </div>
                </div>
                <div class="col-md-12 form-group p_star">
                    <div class="row">
                        <div class="col-md-3">
                            <lable class="form-control1">{{ __('messages.a-address') }}</lable>
                        </div>
                        <div class="col-md-9">
                            <textarea class="form-control" readonly>{{$user->address}}</textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <img src="{{fileUrl(USERS, $user->image)}}" alt="">
            </div>
        </div>
    </div>
@endsection
