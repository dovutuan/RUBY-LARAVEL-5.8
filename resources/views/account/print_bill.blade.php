<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <link rel="icon" href="{{ asset('logo') }}/icon_ruby.png">
    <title>RUBY</title>
    <style type="text/css">
        body {
            margin: 0;
            padding: 0;
            background-color: #FAFAFA;
            font: 12pt "Times New Roman";
        }

        * {
            box-sizing: border-box;
            -moz-box-sizing: border-box;
        }

        .page {
            width: 21cm;
            overflow: hidden;
            min-height: 297mm;
            padding: 2.5cm;
            margin-left: auto;
            margin-right: auto;
            background: white;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        }

        .subpage {
            padding: 1cm;
            border: 5px red solid;
            height: 237mm;
            outline: 2cm #FFEAEA solid;
        }

        @page {
            size: A4;
            margin: 0;
        }

        button {
            width: 100px;
            height: 24px;
        }

        .header {
            overflow: hidden;
        }

        .logo {
            background-color: #FFFFFF;
            text-align: left;
            float: left;
        }

        .logo img {
            width: 100px;
            height: 100px;
        }

        .company {
            background-color: #FFFFFF;
            text-align: left;
            float: right;
            font-size: 16px;
        }

        .title {
            text-align: center;
            position: relative;
            color: #FC0808;
            font-size: 24px;
            top: 15px;
        }

        .title1 {
            text-align: left;
            position: relative;
            color: #000000;
            font-size: 15px;
            top: 15px;
        }

        .footer-right {
            text-align: center;
            text-transform: uppercase;
            padding-top: 30px;
            position: relative;
            height: 150px;
            width: 50%;
            color: #000;
            font-size: 12px;
            float: right;
            bottom: 1px;
        }

        .TableData {
            background: #ffffff;
            width: 100%;
            border-collapse: collapse;
            font-family: Verdana, Arial, Helvetica, sans-serif;
            font-size: 12px;
            border: thin solid #d3d3d3;
        }

        .TableData TH {
            background: rgba(0, 0, 255, 0.1);
            text-align: center;
            font-weight: bold;
            color: #000;
            border: solid 1px #ccc;
            height: 24px;
        }

        .TableData TR {
            height: 24px;
            border: thin solid #d3d3d3;
        }

        .TableData TR TD {
            text-align: center;
            padding-right: 2px;
            padding-left: 2px;
            border: thin solid #d3d3d3;
        }

        .TableData TR:hover {
            background: rgba(0, 0, 0, 0.05);
        }

        .TableData .cotSTT {
            text-align: center;
            width: 10%;
        }

        .TableData .cotTenSanPham {
            text-align: left;
            width: 40%;
        }

        .TableData .cotHangSanXuat {
            text-align: left;
            width: 20%;
        }

        .TableData .cotGia {
            text-align: right;
            width: 120px;
        }

        .TableData .cotSoLuong {
            text-align: center;
            width: 50px;
        }

        .TableData .cotSo {
            text-align: center;
            width: 120px;
        }

        .TableData .tong {
            text-align: right;
            font-weight: bold;
            text-transform: uppercase;
            padding-right: 4px;
        }

        .TableData .cotSoLuong input {
            text-align: center;
        }

        @media print {
            @page {
                margin: 0;
                border: initial;
                border-radius: initial;
                width: initial;
                min-height: initial;
                box-shadow: initial;
                background: initial;
                page-break-after: always;
            }
        }
    </style>
</head>
<body onload="window.print();">
<div id="page" class="page">
    <div class="header">
        <div class="logo"><img src="{{ asset('logo') }}/icon_ruby.png"/></div>
        <div class="company">
            <p>{{ __('messages.a-address') }}: Thái Bình</p>
            <p>{{ __('messages.a-phone') }}: 0398599888</p>
            <p>{{ __('messages.a-email') }}: traitimcuatuan@gmail.com</p>
        </div>
    </div>
    <br>
    <div class="title">
        {{ __('messages.bill') }}
        <br>
        -------oOo-------
    </div>
    <br>
    <div class="title1">
        <p>{{ __('messages.a-customer') }}: {{$bill->users->name}}</p>
        <p>{{ __('messages.a-address') }}: {{$bill->users->address}}</p>
        <p>{{ __('messages.shipping-address') }}: {{$bill->address ? $bill->address : $bill->users->address}}</p>
        <p>{{ __('messages.a-phone') }}: 0{{$bill->users->phone}}</p>
        <p>{{ __('messages.check-out-note') }}: {{$bill->note}}</p>
    </div>
    <br><br>
    <table class="TableData">
        <thead>
        <tr>
            <th>STT</th>
            <th>{{ __('messages.a-product') }}</th>
            <th>{{ __('messages.a-amount') }} / {{ __('messages.a-species') }}</th>
            <th>{{ __('messages.a-qty') }}</th>
            <th>{{ __('messages.a-price') }}</th>
        </tr>
        </thead>
        <tbody>
        @foreach($bill->billDetail as $billDetail)
            <tr>
                <th>{{$loop->iteration}}</th>
                <td>{{$billDetail->products->name}}</td>
                <td>{{$billDetail->amount}} <sup>{{$billDetail->species->name}}</sup></td>
                <td>{{$billDetail->qty}}</td>
                <td>{{number_format($billDetail->price)}} <sup>{{ __('messages.a-vnđ') }}</sup></td>
            </tr>
        @endforeach
        <tr>
            <td colspan="4" class="tong">{{ __('messages.a-tax-rate') }}</td>
            <td class="cotSo">{{$bill->tax_rate}} <sup>{{ __('messages.a-vnđ') }}</sup></td>
        </tr>
        <tr>
            <td colspan="4" class="tong">{{ __('messages.a-discount') }}</td>
            <td class="cotSo">{{$bill->discount_price}} <sup>{{ __('messages.a-vnđ') }}</sup></td>
        </tr>
        <tr>
            <td colspan="4" class="tong">{{ __('messages.money_paid') }}</td>
            <td class="cotSo">{{$bill->price_paid}} <sup>{{ __('messages.a-vnđ') }}</sup></td>
        </tr>
        <tr>
            <td colspan="4" class="tong">{{ __('messages.total-payment') }}</td>
            <td class="cotSo">{{$bill->price}} <sup>{{ __('messages.a-vnđ') }}</sup></td>
        </tr>
        </tbody>
    </table>
    <div class="footer-right">{{__('messages.day') . \Carbon\Carbon::now()->day .  __('messages.month') . \Carbon\Carbon::now()->month .  __('messages.year') . \Carbon\Carbon::now()->year }}
        <br/><br>
        {{ __('messages.staff') }}
    </div>
</div>
</body>
</html>
