<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
</head>
<body>
<div style="padding: 0 10px; background-color: #f2f2f2;">
    <table role="presentation" cellpadding="0" cellspacing="0" style="font-size: 0px; width: 100%;" border="0">
        <tbody>
        <tr>
            <td>
                <div style="margin: 0px auto; max-width: 600px;">
                    <table role="presentation" cellpadding="0" cellspacing="0" style="font-size: 0px; width: 100%;"
                           align="center" border="0">
                        <tbody>
                        <tr>
                            <td style="text-align: center; vertical-align: top; direction: ltr; font-size: 0px; padding: 40px 0px 30px;">
                                <div class="m_2860634586473474317mj-column-per-100"
                                     style="vertical-align: middle; display: inline-block; direction: ltr; font-size: 13px; text-align: left; width: 100%;">
                                    <table role="presentation" cellpadding="0" cellspacing="0"
                                           style="vertical-align: middle;" width="100%" border="0">
                                        <tbody>
                                        <tr>
                                            <td style="word-wrap: break-word; font-size: 0px; padding: 0px;"
                                                align="center">
                                                <div
                                                    style="
                                                                                    color: #4a4a4a;
                                                                                    font-family: 'Open Sans', Helvetica, 'Hiragino Kaku Gothic ProN', Meiryo, Arial, sans-serif;
                                                                                    font-size: inherit;
                                                                                    line-height: inherit;
                                                                                    text-align: center;
                                                                                "
                                                >
                                                    <a
                                                        href="{{env('APP_URL_PROJECT')}}"
                                                        style="color: #4cbd9b; text-decoration: none;"
                                                        target="_blank"
                                                    >
                                                        <img
                                                            width="158"
                                                            src="https://giaysneakerhcm.com/wp-content/uploads/2018/06/ruby-store.png"
                                                            class="CToWUd"
                                                        />
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </td>
        </tr>
        </tbody>
    </table>
    <div style="margin: 0px auto; background: #4cbd9b;">
        <table role="presentation" cellpadding="0" cellspacing="0"
               style="font-size: 0px; width: 100%; background: #4cbd9b;" align="center" border="0">
            <tbody>
            <tr>
                <td style="text-align: center; vertical-align: top; direction: ltr; font-size: 0px; padding: 28px 15px;">
                    <div class="m_2860634586473474317mj-column-per-100"
                         style="vertical-align: top; display: inline-block; direction: ltr; font-size: 13px; text-align: left; width: 100%;">
                        <table role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
                            <tbody>
                            <tr>
                                <td style="word-wrap: break-word; font-size: 0px; padding: 10px 0px;"
                                    align="center">
                                    <div
                                        style="
                                                                    color: #fff;
                                                                    font-family: 'Open Sans', Helvetica, 'Hiragino Kaku Gothic ProN', Meiryo, Arial, sans-serif;
                                                                    font-size: 24px;
                                                                    font-weight: 600;
                                                                    line-height: 36px;
                                                                    text-align: center;
                                                                "
                                    >
                                        <div class="m_2860634586473474317contents-section-block"
                                             style="padding-right: 25px; padding-left: 25px;">
                                            {{__('messages.[RUBY]-contact')}}
                                            <p style="font-size: 21px; font-weight: 400; margin-top: 3px; margin-bottom: 0;">
                                                {{\Carbon\Carbon::now()->hour .  __('messages.hour') . \Carbon\Carbon::now()->minute . __('messages.minute') . ',' .  __('messages.day') . \Carbon\Carbon::now()->day .  __('messages.month') . \Carbon\Carbon::now()->month .  __('messages.year') . \Carbon\Carbon::now()->year }}</p>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
    <div style="margin: 0px auto; background: #fff;">
        <table role="presentation" cellpadding="0" cellspacing="0"
               style="font-size: 0px; width: 100%; background: #fff;" align="center" border="0">
            <tbody>
            <tr>
                <td style="text-align: center; vertical-align: top; direction: ltr; font-size: 0px; padding: 10px 15px;">
                    <div class="m_2860634586473474317mj-column-per-100"
                         style="vertical-align: top; display: inline-block; direction: ltr; font-size: 13px; text-align: left; width: 100%;">
                        <table role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
                            <tbody>
                            <tr>
                                <td style="word-wrap: break-word; font-size: 0px; padding: 10px 0px;" align="left">
                                    <div
                                        style="color: #4a4a4a; font-family: 'Open Sans', Helvetica, 'Hiragino Kaku Gothic ProN', Meiryo, Arial, sans-serif; font-size: 16px; line-height: 30px; text-align: left;">
                                        <div class="m_2860634586473474317contents-section-block"
                                             style="padding-right: 25px; padding-left: 25px;">
                                            <table style="margin: auto">
                                                <tr>
                                                    <th>{{ __('messages.check-out-name') }}</th>
                                                    <td>: {{$user->name}}</td>
                                                </tr>
                                                <tr>
                                                    <th>{{ __('messages.check-out-phone') }}</th>
                                                    <td>: {{$user->phone}}</td>

                                                </tr>
                                                <tr>
                                                    <th>{{ __('messages.check-out-email') }}</th>
                                                    <td>: {{$user->email}}</td>
                                                </tr>
                                                <tr>
                                                    <th>{{ __('messages.check-out-address') }}</th>
                                                    <td>: {{$user->address}}</td>
                                                </tr>
                                                <tr>
                                                    <th>{{ __('messages.messages') }}</th>
                                                    <td style="white-space: pre">: {{$messages}}</td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
    <div style="margin:0px auto;max-width:600px;background:#f2f2f2">
        <table role="presentation" cellpadding="0" cellspacing="0" style="font-size:0px;width:100%;background:#f2f2f2"
               align="center" border="0">
            <tbody>
            <tr>
                <td style="text-align:center;vertical-align:top;direction:ltr;font-size:0px;padding:0px">
                    <div
                        style="vertical-align:top;display:inline-block;direction:ltr;font-size:13px;text-align:left;width:100%">
                        <table role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
                            <tbody>
                            <tr>
                                <td style="word-wrap:break-word;font-size:0px">
                                    <div style="font-size:1px;line-height:40px;white-space:nowrap">&nbsp;</div>
                                </td>
                            </tr>
                            <tr>
                                <td style="word-wrap:break-word;font-size:0px">
                                    <div
                                        style="vertical-align:top;display:inline-block;direction:ltr;font-size:13px;text-align:left;width:100%">
                                        <table role="presentation" cellpadding="0" cellspacing="0" width="100%"
                                               border="0">
                                            <tbody></tbody>
                                        </table>
                                    </div>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</div>
</body>
</html>
