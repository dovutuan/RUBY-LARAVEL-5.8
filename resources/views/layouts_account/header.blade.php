<div class="humberger__menu__overlay"></div>
<div class="humberger__menu__wrapper">
    <div class="humberger__menu__logo">
        <a href="{{route('home')}}"><img class="logo-image" src="{{ asset('logo') }}/icon_ruby.png" alt=""></a>
    </div>
    <div class="humberger__menu__widget">
        <div class="header__top__right__language">
            <div>{{ __('messages.language') }}</div>
            <span class="arrow_carrot-down"></span>
            <ul>
                <li><a href="{{route('lang',['lang' => 'vi'])}}">{{ __('messages.vietnamese') }}</a></li>
                <li><a href="{{route('lang',['lang' => 'en'])}}">{{ __('messages.english') }}</a></li>
            </ul>
        </div>
        <div class="header__top__right__auth">
            <div>{{ __('messages.hi') }}: {{\Auth::user()->name}}</div>
            <span class="arrow_carrot-down"></span>
            <ul>
                <li><a href="{{route('information')}}">{{ __('messages.information') }}</a></li>
                <li><a href="{{route('order-customer')}}">{{ __('messages.order') }}</a></li>
                <li>
                    <a href="{{ route('logout') }}"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> {{ __('messages.logout') }}</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                          style="display: none;">
                        @csrf
                    </form>
                </li>
            </ul>
        </div>
    </div>
    <div id="mobile-menu-wrap"></div>
    <div class="header__top__right__social">
        <a href="#"><i class="fa fa-facebook"></i></a>
        <a href="#"><i class="fa fa-twitter"></i></a>
        <a href="#"><i class="fa fa-linkedin"></i></a>
        <a href="#"><i class="fa fa-pinterest-p"></i></a>
    </div>
    <div class="humberger__menu__contact">
        <ul>
            <li><a class="color-a" href="mailto:ruby.RBS.shop@gmail.com"><i
                        class="fa fa-envelope"></i> {{ __('messages.ruby.RBS.shop@gmail.com') }}</a></li>
            <li>{{ __('messages.free-shipping') }}</li>
        </ul>
    </div>
</div>
<header class="header">
    <div class="header__top">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <div class="header__top__left">
                        <ul>
                            <li><a class="color-a" href="mailto:ruby.RBS.shop@gmail.com"><i
                                        class="fa fa-envelope"></i> {{ __('messages.ruby.RBS.shop@gmail.com') }}</a>
                            </li>
                            <li>{{ __('messages.free-shipping') }}</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="header__top__right">
                        <div class="header__top__right__social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-linkedin"></i></a>
                            <a href="#"><i class="fa fa-pinterest-p"></i></a>
                        </div>
                        <div class="header__top__right__language">
                            <div>{{ __('messages.language') }}</div>
                            <span class="arrow_carrot-down"></span>
                            <ul>
                                <li><a href="{{route('lang',['lang' => 'vi'])}}">{{ __('messages.vietnamese') }}</a>
                                </li>
                                <li><a href="{{route('lang',['lang' => 'en'])}}">{{ __('messages.english') }}</a></li>
                            </ul>
                        </div>
                        <div class="header__top__right__auth">
                            <div>{{ __('messages.hi') }}: {{\Auth::user()->name}}</div>
                            <span class="arrow_carrot-down"></span>
                            <ul>
                                <li><a href="{{route('information')}}">{{ __('messages.information') }}</a></li>
                                <li><a href="{{route('order-customer')}}">{{ __('messages.order') }}</a></li>
                                <li>
                                    <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> {{ __('messages.logout') }}</a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                          style="display: none;">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="header__logo">
                    <a href="{{route('home')}}"><img class="logo-image_account" src="{{ asset('logo') }}/icon_ruby.png"
                                                     alt=""></a>
                </div>
            </div>
            <div class="humberger__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </div>
</header>
<div class="container-half-fluid padding_top mt-5 mb-5">
    <div class="row">
        <div id="admin-sidebar" class="col-md-2 p-x-0 p-y-3">
            <ul class="sidenav admin-sidenav list-unstyled">
                <li class="{{\Request::route()->getName()==('information') ? 'active':''}}">
                    <a href="{{route('information')}}">{{ __('messages.information') }}</a></li>
                <li class="{{\Request::route()->getName()==('change-information') ?'active':''}}">
                    <a href="{{route('change-information')}}">{{ __('messages.change-information') }}</a></li>
                <li class="{{\Request::route()->getName()==('change-password') ?'active':''}}">
                    <a href="{{route('change-password')}}">{{ __('messages.change-password') }}</a></li>
                @foreach(\Auth::user()->getRoleNames() as $role)
                    @if($role == 'Customer' || $role == 'customer')
                        <li class="{{\Request::route()->getName()==('create-mini-shop') ?'active':''}}">
                            <a href="{{route('create-mini-shop')}}">{{ __('messages.create-mini-shop') }}</a></li>
                    @endif
                @endforeach
                <li class="{{\Request::route()->getName()==('order-customer') || \Request::route()->getName()==('detail-order-customer') ?'active':''}}">
                    <a href="{{route('order-customer')}}">{{ __('messages.order') }}</a></li>
            </ul>
        </div>
        <div class="col-md-1"></div>
        @yield('content')
    </div>
</div>
