<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <style type="text/css">
        @import url(https://fonts.googleapis.com/css?family=Roboto&display=swap);

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            -webkit-font-smoothing: antialiased;
            -moz-font-smoothing: antialiased;
            -o-font-smoothing: antialiased;
            font-smoothing: antialiased;
            text-rendering: optimizeLegibility;
        }

        body {
            font-family: 'Roboto', sans-serif;
            font-weight: 300;
            font-size: 18px;
            line-height: 30px;
            color: #777;
        }

        .container {
            max-width: 800px;
            width: 100%;
            margin: 0 auto;
            position: relative;
        }

        #contact input[type="text"], #contact input[type="email"], #contact input[type="tel"], #contact input[type="url"], #contact textarea, #contact button[type="submit"] {
            font: 400 15px/16px 'Roboto', sans-serif;
        }

        #contact {
            background: #F9F9F9;
            padding: 25px;
            margin: 50px 0;
        }

        #contact h3 {
            color: #F96;
            display: block;
            font-size: 30px;
            font-weight: 400;
        }

        #contact h4 {
            margin: 5px 0 15px;
            display: block;
            font-size: 18px;
        }

        fieldset {
            border: medium none !important;
            margin: 0 0 10px;
            min-width: 100%;
            padding: 0;
            width: 100%;
        }

        #contact input[type="text"], #contact input[type="email"], #contact input[type="tel"], #contact input[type="url"], #contact textarea {
            width: 100%;
            border: 1px solid #CCC;
            background: #CCC;
            margin: 0 0 5px;
            padding: 10px;
        }

        #contact input[type="text"]:hover, #contact input[type="email"]:hover, #contact input[type="tel"]:hover, #contact input[type="url"]:hover, #contact textarea:hover {
            -webkit-transition: border-color 0.3s ease-in-out;
            -moz-transition: border-color 0.3s ease-in-out;
            transition: border-color 0.3s ease-in-out;
            border: 1px solid #AAA;
        }

        ::-webkit-input-placeholder {
            color: #888;
        }

        :-moz-placeholder {
            color: #888;
        }

        ::-moz-placeholder {
            color: #888;
        }

        :-ms-input-placeholder {
            color: #888;
        }

        .container #contact .label {
            width: 15%;
        }

        .container #contact .input {
            width: 85%;
            float: right;
            border: none;
        }

    </style>
</head>
<body>
<div class="container">
    <form id="contact">
        <h3>{{ __('messages.title-create-minishop') }}</h3>
        <h4>{{ __('messages.title-header-create-minishop') }}</h4>
        <fieldset>
            <label class="label"><b>{{ __('messages.a-name') }}</b></label>
            <input class="input" type="text" readonly value="{{$user->name}}">
        </fieldset>
        <fieldset>
            <label class="label"><b>{{ __('messages.a-name-minishop') }}</b></label>
            <input class="input" type="text" readonly value="{{$user->name}}">
        </fieldset>
        <fieldset>
            <label class="label"><b>{{ __('messages.a-phone') }}</b></label>
            <input class="input" type="text" readonly value="0{{$user->phone}}">
        </fieldset>
        <fieldset>
            <label class="label"><b>{{ __('messages.a-email') }}</b></label>
            <input class="input" type="text" readonly value="{{$user->email}}">
        </fieldset>
        <fieldset>
            <label class="label"><b>{{ __('messages.a-address') }}</b></label>
            <input class="input" type="text" readonly value="{{$user->address}}">
        </fieldset>
    </form>
</div>
</body>
</html>
