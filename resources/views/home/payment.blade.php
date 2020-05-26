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
