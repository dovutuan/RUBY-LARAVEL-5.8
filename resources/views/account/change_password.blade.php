@extends('layouts_account.app')
@section('content')
    <div id="admin-main-control" class="col-md-9 p-x-3 p-y-1">
        <form class="row contact_form" method="POST" action=""
              novalidate="novalidate">
            @csrf
            <div class="col-md-12 form-group p_star">
                <input type="password" class="form-control" name="new_password"
                       placeholder="{{ __('messages.password') }}" value="">
                @error('new_password')
                <div class="text-danger text-left">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-12 form-group p_star">
                <input type="password" class="form-control" name="new_password_confirmation"
                       placeholder="{{ __('messages.password-confirmation') }}" value="">
                @error('new_password_confirmation')
                <div class="text-danger text-left">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-3 form-group p_star">
                <button type="submit" class="btn btn-xs btn-outline-success">{{ __('messages.change') }}</button>
            </div>
        </form>
    </div>
@endsection
