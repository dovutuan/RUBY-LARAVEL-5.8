{{--<header class="main_menu home_menu">--}}
{{--    <div class="container">--}}
{{--        <div class="row align-items-center">--}}
{{--            <div class="col-lg-12">--}}
{{--                <nav class="navbar navbar-expand-lg navbar-light">--}}
{{--                    <a class="navbar-brand" href="{{route('home')}}"> <img src="{{ asset('theme_home') }}/img/logo.png"--}}
{{--                                                                           alt="logo"> </a>--}}
{{--                    <button class="navbar-toggler" type="button" data-toggle="collapse"--}}
{{--                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"--}}
{{--                            aria-expanded="false" aria-label="Toggle navigation">--}}
{{--                        <span class="menu_icon"><i class="ti-bar-chart"></i></span>--}}
{{--                    </button>--}}

{{--                    <div class="collapse navbar-collapse main-menu-item" id="navbarSupportedContent">--}}
{{--                        <ul class="navbar-nav">--}}
{{--                            <li class="nav-item">--}}
{{--                                <a class="nav-link" href="index.html">Home</a>--}}
{{--                            </li>--}}
{{--                            <li class="nav-item">--}}
{{--                                <a class="nav-link">Contact</a>--}}
{{--                            </li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                    <div class="hearer_icon d-flex">--}}
{{--                        <a id="search_1"><i class="ti-search"></i></a>--}}
{{--                        <div class="dropdown cart">--}}
{{--                            <a class="dropdown-toggle" href="{{route('cart')}}">--}}
{{--                                <i class="ti-shopping-cart"></i> <sup>{{Cart::count()}}</sup>--}}
{{--                            </a>--}}
{{--                        </div>--}}
{{--                        <div class="btn-group">--}}
{{--                            <a class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"--}}
{{--                               aria-expanded="false">--}}
{{--                                <i class="ti-user"></i>--}}
{{--                            </a>--}}
{{--                            <div class="dropdown-menu dropdown-menu-right">--}}
{{--                                <div class="dropdown-header"><b--}}
{{--                                            style="text-transform: uppercase;">HI: {{\Auth::user()->name}}</b></div>--}}
{{--                                <div class="dropdown-header">{{ __('messages.language') }}</div>--}}
{{--                                <a href="{{route('lang',['lang' => 'vi'])}}" class="dropdown-item"><img--}}
{{--                                            src="{{ asset('icon') }}/vn.png"></a>--}}
{{--                                <a href="{{route('lang',['lang' => 'en'])}}" class="dropdown-item"><img--}}
{{--                                            src="{{ asset('icon') }}/en.png"></a>--}}
{{--                                <div class="dropdown-divider"></div>--}}
{{--                                <div class="dropdown-header">{{ __('messages.account') }}</div>--}}
{{--                                <a href="{{route('information')}}"--}}
{{--                                   class="dropdown-item"> {{ __('messages.information') }}</a>--}}
{{--                                <a href=""--}}
{{--                                   class="dropdown-item"> {{ __('messages.order') }}</a>--}}
{{--                                <div class="dropdown-divider"></div>--}}
{{--                                <div class="dropdown-divider"></div>--}}
{{--                                <a class="dropdown-item" href="{{ route('logout') }}"--}}
{{--                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">--}}
{{--                                    {{ __('messages.logout') }}--}}
{{--                                </a>--}}
{{--                                <form id="logout-form" action="{{ route('logout') }}" method="POST"--}}
{{--                                      style="display: none;">--}}
{{--                                    @csrf--}}
{{--                                </form>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </nav>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <div class="search_input" id="search_input_box">--}}
{{--        <div class="container">--}}
{{--            <form class="d-flex justify-content-between search-inner" method="GET" action="{{route('search')}}">--}}
{{--                <input type="text" class="form-control" name="name" placeholder="{{ __('messages.search...') }}">--}}
{{--                @if($categories)--}}
{{--                    <select name="category" class="selectize-dropdown">--}}
{{--                        <option value="">Chọn category</option>--}}
{{--                        @foreach($categories as $category)--}}
{{--                            <option value="{{$category->id}}">{{$category->name}}</option>--}}
{{--                        @endforeach--}}
{{--                    </select>--}}
{{--                @endif--}}
{{--                <button type="submit" class="btn"></button>--}}
{{--                <span class="ti-close" id="close_search" title="Close Search"></span>--}}
{{--            </form>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</header>--}}


<div class="humberger__menu__overlay"></div>
<div class="humberger__menu__wrapper">
    <div class="humberger__menu__logo">
        <a href="{{route('home')}}"><img class="logo-image" src="{{ asset('logo') }}/icon_ruby.png" alt=""></a>
    </div>
    <div class="humberger__menu__cart">
        <ul>
            <li><a href="{{route('cart')}}"><i class="fa fa-shopping-bag"></i> <span>{{Cart::count()}}</span></a></li>
        </ul>
        <div class="header__cart__price">{{ __('messages.a-price') }}:
            <span>{{Cart::priceTotal(0, 3)}} {{ __('messages.a-vnđ') }}</span></div>
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
    <nav class="humberger__menu__nav mobile-menu">
        <ul>
            <li class="active"><a href="{{route('home')}}">{{ __('messages.home') }}</a></li>
            <li><a href="./shop-grid.html">Shop</a></li>
            <li><a href="{{route('contact')}}">Contact</a></li>
        </ul>
    </nav>
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
            <div class="col-lg-3">
                <div class="header__logo">
                    <a href="{{route('home')}}"><img class="logo-image" src="{{ asset('logo') }}/icon_ruby.png" alt=""></a>
                </div>
            </div>
            <div class="col-lg-6">
                <nav class="header__menu">
                    <ul>
                        <li class="active"><a href="{{route('home')}}">{{ __('messages.home') }}</a></li>
                        <li><a href="{{route('discount')}}">{{ __('messages.a-discount') }}</a></li>
                        <li><a href="{{route('contact')}}">{{ __('messages.contact') }}</a></li>
                    </ul>
                </nav>
            </div>
            <div class="col-lg-3">
                <div class="header__cart">
                    <ul>
                        <li><a href="{{route('cart')}}"><i class="fa fa-shopping-bag"></i>
                                <span>{{Cart::count()}}</span></a></li>
                    </ul>
                    <div class="header__cart__price">{{ __('messages.a-price') }}:
                        <span>{{Cart::priceTotal(0, 3)}} {{ __('messages.a-vnđ') }}</span></div>
                </div>
            </div>
        </div>
        <div class="humberger__open">
            <i class="fa fa-bars"></i>
        </div>
    </div>
</header>
<section class="hero hero-normal">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3">
                <div class="hero__categories">
                    <div class="hero__categories__all">
                        <i class="fa fa-bars"></i>
                        <span>{{ __('messages.all-departments') }}</span>
                    </div>
                    <ul>
                        @foreach($allCategories as $category)
                            <li><a href="{{route('search', 'category_id=' . $category->id)}}">{{$category->name}}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="hero__search">
                    <div class="hero__search__form">
                        <form method="GET" action="{{route('search')}}">
                            <input type="text" placeholder="{{ __('messages.search...') }}" name="name"
                                   value="{{ isset($name) ? $name : old('name') }}">
                            <button type="submit" class="site-btn">{{ __('messages.search') }}</button>
                        </form>
                    </div>
                    <div class="hero__search__phone">
                        <div class="hero__search__phone__icon">
                            <a class="color-a" href="tel:0398599888"><i class="fa fa-phone"></i></a>
                        </div>
                        <div class="hero__search__phone__text">
                            <a href="tel:0398599888"><h5>0398 599 888</h5></a>
                            <span>{{ __('messages.support-time') }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
