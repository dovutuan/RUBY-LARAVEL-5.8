@extends('layouts_auth.app')

@section('content')
    <section class="login_part padding_top">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6">
                    <div class="login_part_text text-center">
                        <div class="login_part_text_iner">
                            <h2>{{ __('messages.new-to-our-shop?') }}</h2>
                            <p>{{ __('messages.create-account') }}</p>
                            <a href="{{route('register')}}" class="btn_3">{{ __('messages.create-an-account') }}</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="login_part_form">
                        <div class="login_part_form_iner">
                            <h3>{{ __('messages.welcome-back') }} <br>
                                {{ __('messages.please-sign-in-now') }}</h3>
                            <form class="row contact_form" method="POST" action="{{ route('login') }}"
                                  novalidate="novalidate">
                                @csrf
                                <div class="col-md-12 form-group p_star">
                                    <input type="email" class="form-control" name="email"
                                           placeholder="{{ __('messages.email') }}" value="{{old('email')}}">
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
                                <div class="col-md-12 form-group">
                                    <div class="creat_account d-flex align-items-center">
                                        <input type="checkbox" name="remember selector"
                                               id="remember" {{ old('remember') ? 'checked' : '' }} checked>
                                        <label for="remember">{{ __('messages.remember-me') }}</label>
                                    </div>
                                    <button type="submit" value="submit"
                                            class="btn_3">{{ __('messages.sign-in') }}</button>
                                    @if (Route::has('password.request'))
                                        <a class="lost_pass" href="{{ route('password.request') }}">
                                            {{ __('messages.forget-password?') }}
                                        </a>
                                    @endif
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
