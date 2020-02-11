@extends('layouts_auth.app')

@section('content')
    <section class="login_part padding_top1">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12 col-md-12">
                    <div class="login_part_form2">
                        <div class="login_part_form_iner">
                            <h3>{{ __('messages.reset-password') }}</h3>
                            <br>
                            <form class="row contact_form" method="POST" action="{{ route('password.update') }}"
                                  novalidate="novalidate">
                                @csrf
                                <input type="hidden" name="token" value="{{ $token }}">
                                <div class="col-md-12 form-group p_star">
                                    <input type="email" class="form-control" name="email" value="{{ $email ?? old('email') }}" readonly>
                                    @error('email')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-12 form-group p_star">
                                    <input type="password" class="form-control" name="password"
                                           placeholder="{{ __('messages.password') }}" value="{{old('password')}}">
                                    @error('password')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-12 form-group p_star">
                                    <input type="password" class="form-control" name="password_confirmation"
                                           placeholder="{{ __('messages.password-confirmation') }}" value="{{old('password_confirmation')}}">
                                    @error('password-confirmation')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-12 form-group">
                                    <button type="submit" value="submit"
                                            class="btn_3">{{ __('messages.reset-password') }}</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

