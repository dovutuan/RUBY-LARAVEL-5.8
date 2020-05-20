<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Thanh toán qua payPal</title>
    <link rel="stylesheet" href="{{ asset('theme_paypal') }}/style.css" type="text/css">
</head>
<body>
<section id="contact">
    <div class="section-content">
        <h1 class="section-header">
            <span class="content-header wow fadeIn " data-wow-delay="0.2s"
                  data-wow-duration="2s"> Đang điều hướng vui lòng chờ</span>
        </h1>
    </div>
</section>
<form class="form-pay-pal" method="POST" name="myForm" action="{{ route('create-payment') }}">
    @csrf
    <input type="text" name="amount" placeholder="Amount" value="{{$total_price_usd}}" readonly>
    <button type="submit" class="site-btn">PLACE ORDER</button>
</form>
<script src="{{ asset('theme_paypal') }}/redirect.js"></script>
</body>
</html>


{{--<!DOCTYPE html>--}}
{{--<html>--}}
{{--<head>--}}
{{--    <title>Laravel Paypal</title>--}}
{{--    <style type="text/css">--}}
{{--        * {--}}
{{--            box-sizing: border-box;--}}
{{--        }--}}

{{--        body {--}}
{{--            display: flex;--}}
{{--            background: #c3c3c3;--}}
{{--            min-height: 100vh;--}}
{{--            justify-content: center;--}}
{{--            align-items: center;--}}
{{--        }--}}

{{--        .pay-area {--}}
{{--            display: block;--}}
{{--            width: 300px;--}}
{{--            padding: 35px;--}}
{{--            background: #ffffff;--}}
{{--        }--}}

{{--        input {--}}
{{--            display: block;--}}
{{--            width: 100%;--}}
{{--            padding: 5px 15px;--}}
{{--        }--}}

{{--        button {--}}
{{--            padding: 5px 10px;--}}
{{--            background: #3c3c3c;--}}
{{--            cursor: pointer;--}}
{{--            color: #ffffff;--}}
{{--        }--}}

{{--        .m-2 {--}}
{{--            margin: 20px auto;--}}
{{--            display: block;--}}
{{--        }--}}

{{--        .error {--}}
{{--            color: red;--}}
{{--            font-size: small;--}}
{{--        }--}}

{{--        .success {--}}
{{--            color: green;--}}
{{--        }--}}
{{--    </style>--}}
{{--</head>--}}
{{--<body>--}}
{{--<section class="pay-area">--}}
{{--    <div>--}}
{{--        <img height="60" src="https://www.paypalobjects.com/images/shared/paypal-logo-129x32.svg">--}}
{{--        @if (session('error') || session('success'))--}}
{{--            <p class="{{ session('error') ? 'error':'success' }}">--}}
{{--                {{ session('error') ?? session('success') }}--}}
{{--            </p>--}}
{{--        @endif--}}
{{--        <form method="POST" name="myForm" action="{{ route('create-payment') }}">--}}
{{--            @csrf--}}
{{--            <div class="m-2">--}}
{{--                <input type="text" name="amount" placeholder="Amount" value="{{$total_price_usd}}" readonly>--}}
{{--                @if ($errors->has('amount'))--}}
{{--                    <span class="error"> {{ $errors->first('amount') }} </span>--}}
{{--                @endif--}}
{{--            </div>--}}
{{--            <button type="submit">Pay Now</button>--}}
{{--        </form>--}}
{{--    </div>--}}
{{--</section>--}}
{{--<script type="text/javascript">--}}
{{--    window.onload = function () {--}}
{{--        submitform();--}}

{{--        function submitform() {--}}
{{--            document.forms["myForm"].submit();--}}
{{--        }--}}
{{--    }--}}
{{--</script>--}}
{{--</body>--}}
{{--</html>--}}
