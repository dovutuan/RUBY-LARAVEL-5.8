@extends('layouts_account.app')
@section('content')
    <div id="admin-main-control" class="col-md-9 p-x-3 p-y-1">
        <form class="row contact_form" method="POST" action=""
              novalidate="novalidate">
            @csrf
            <div class="col-md-12 form-group p_star">
                <input type="text" class="form-control" name="name"
                       placeholder="{{ __('messages.name') }}" value="{{$user->name}}">
                @error('name')
                <div class="text-danger text-left">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-12 form-group p_star">
                <div class="row">
                    <div class="col-md-6">
                        <select name="gender" class="nice-select nice-select-full-width">
                            <option value="0" @if($user->gender == 0) selected @endif>{{ __('messages.male') }}</option>
                            <option value="1" @if($user->gender == 0) selected @endif>{{ __('messages.female') }}</option>
                            <option value="2" @if($user->gender == 0) selected @endif>{{ __('messages.other') }}</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <input type="date" class="form-control" name="birth" value="{{$user->birth}}">
                        @error('birth')
                        <div class="text-danger text-left">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="col-md-12 form-group p_star">
                <div class="row">
                    <div class="col-md-6">
                        <input type="number" class="form-control" name="phone"
                               placeholder="{{ __('messages.phone-number') }}" value="{{$user->phone}}">
                        @error('phone')
                        <div class="text-danger text-left">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <input type="email" class="form-control" name="email"
                               placeholder="{{ __('messages.email') }}" value="{{$user->email}}">
                        @error('email')
                        <div class="text-danger text-left">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="col-md-12 form-group p_star">
                                <textarea class="form-control" name="address"
                                          placeholder="{{ __('messages.address') }}">{{$user->address}}</textarea>
                @error('address')
                <div class="text-danger text-left">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-3 form-group p_star">
                <button type="submit" class="btn btn-xs btn-outline-success">{{ __('messages.change') }}</button>
            </div>
        </form>
    </div>
@endsection
