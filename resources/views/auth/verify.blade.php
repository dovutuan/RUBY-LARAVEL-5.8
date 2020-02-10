@extends('layouts_auth.app')

@section('content')
    <section class="login_part padding_top1">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12 col-md-12">
                    <div class="login_part_text1 text-center">
                        <div class="login_part_text_iner">
                            <h2>{{ __('messages.verify-email') }}</h2>
                            @if (session('resent'))
                                <span class="label label-success">{{ __('messages.a-fresh-verification') }}</span>
                            @endif
                            <p>{{ __('messages.before-proceeding') }}</p>
                            <a href="{{ route('verification.resend') }}" class="btn_3">{{ __('messages.send') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

