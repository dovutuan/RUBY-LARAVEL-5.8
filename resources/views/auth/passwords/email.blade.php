@extends('layouts_auth.app')

@section('content')
    <section class="login_part padding_top1">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12 col-md-12">
                    <div class="login_part_text1 text-center">
                        <div class="login_part_text_iner">
                            <h2>{{ __('messages.reset-password') }}</h2>
                            @if (session('status'))
                                <span class="label label-success">{{ __('messages.password-reset-link') }}</span>
                            @endif
                            <p>{{ __('messages.enter-your-email-address') }}</p>
                            <br>
                            <form class="d-inline" method="POST" action="{{ route('password.email') }}">
                                @csrf
                                <div class="form-group">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder=" Please enter email" onfocus="this.placeholder = ''"
                                           onblur="this.placeholder = ' Please enter email'">
                                    @error('email')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <button type="submit" class="btn_3">{{ __('messages.send') }}</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
