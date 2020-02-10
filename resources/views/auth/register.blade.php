@extends('layouts_auth.app')

@section('content')
    <section class="login_part padding_top">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6">
                    <div class="login_part_text text-center">
                        <div class="login_part_text_iner">
                            <h2>{{ __('messages.already-have-an-account-login?') }}</h2>
                            <p>{{ __('messages.sign-in-to-receive-the-latest-offers-for-you.') }}</p>
                            <a href="{{route('login')}}" class="btn_3">{{ __('messages.sign-in') }}</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="login_part_form">
                        <div class="login_part_form_iner">
                            <h3>{{ __('messages.sign-up-now') }}</h3>
                            <form class="row contact_form" method="POST" action="{{ route('register') }}"
                                  novalidate="novalidate">
                                @csrf
                                <div class="col-md-12 form-group p_star">
                                    <input type="text" class="form-control" name="name"
                                           placeholder="{{ __('messages.name') }}" value="{{old('name')}}">
                                    @error('name')
                                    <div class="text-danger text-left">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-12 form-group p_star">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <select name="gender" class="form-control">
                                                <option value="0">{{ __('messages.male') }}</option>
                                                <option value="1">{{ __('messages.female') }}</option>
                                                <option value="2">{{ __('messages.other') }}</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="date" class="form-control" name="birth">
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
                                                   placeholder="{{ __('messages.phone-number') }}" value="{{old('phone')}}">
                                            @error('phone')
                                            <div class="text-danger text-left">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <input type="email" class="form-control" name="email"
                                                   placeholder="{{ __('messages.email') }}" value="{{old('email')}}">
                                            @error('email')
                                            <div class="text-danger text-left">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 form-group p_star">
                                <textarea class="form-control" name="address"
                                          placeholder="{{ __('messages.address') }}">{{old('address')}}</textarea>
                                    @error('address')
                                    <div class="text-danger text-left">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-12 form-group p_star">
                                    <input type="password" class="form-control" name="password"
                                           placeholder="{{ __('messages.password') }}" value="{{old('password')}}">
                                    @error('password')
                                    <div class="text-danger text-left">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-12 form-group p_star">
                                    <input type="password" class="form-control"
                                           name="password_confirmation" placeholder="{{ __('messages.password-confirmation') }}" value="{{old('password_confirmation')}}">
                                </div>
                                <div class="col-md-12 form-group p_star">
                                    <label for="f-option2">{{ __('messages.by-clicking') }} <a href="">{{ __('messages.terms-of-service') }}</a> {{ __('messages.and') }} <a href="">{{ __('messages.privacy-policy') }}</a></label>
                                </div>
                                <div class="col-md-12 form-group p_star">
                                    <button type="submit" class="button button-login w-100">{{ __('messages.sign-up') }}</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
