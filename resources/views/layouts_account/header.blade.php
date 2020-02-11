<header class="main_menu home_menu">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-12">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="navbar-brand" href="{{route('home')}}"> <img src="{{ asset('theme_home') }}/img/logo.png"
                                                                           alt="logo"> </a>
                    <div class="collapse navbar-collapse main-menu-item" id="navbarSupportedContent">
                    </div>
                    <div class="hearer_icon d-flex">
                        <div class="btn-group">
                            <a class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                               aria-expanded="false">
                                <i class="ti-user"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <div class="dropdown-header"><b
                                        style="text-transform: uppercase;">HI: {{\Auth::user()->name}}</b></div>
                                <div class="dropdown-header">{{ __('messages.language') }}</div>
                                <a href="{{route('lang',['lang' => 'vi'])}}" class="dropdown-item"><img
                                        src="{{ asset('icon') }}/vn.png"></a>
                                <a href="{{route('lang',['lang' => 'en'])}}" class="dropdown-item"><img
                                        src="{{ asset('icon') }}/en.png"></a>
                                <div class="dropdown-divider"></div>
                                <div class="dropdown-header">{{ __('messages.account') }}</div>
                                <a href="{{route('information')}}"
                                   class="dropdown-item">{{ __('messages.information') }}</a>
                                <a href=""
                                   class="dropdown-item">{{ __('messages.order') }}</a>
                                <div class="dropdown-divider"></div>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    {{ __('messages.logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>
<div class="container padding_top">
    @include('layouts_account.alert')
    <div class="row">
        <div id="admin-sidebar" class="col-md-2 p-x-0 p-y-3">
            <ul class="sidenav admin-sidenav list-unstyled">
                <li class="{{\Request::route()->getName()==('information') || \Request::route()->getName()==('information') ?'active':''}}">
                    <a href="{{route('information')}}">{{ __('messages.information') }}</a></li>
                <li class="{{\Request::route()->getName()==('change-information') || \Request::route()->getName()==('change-information') ?'active':''}}">
                    <a href="{{route('change-information')}}">{{ __('messages.change-information') }}</a></li>
                <li class="{{\Request::route()->getName()==('change-password') || \Request::route()->getName()==('change-password') ?'active':''}}">
                    <a href="{{route('change-password')}}">{{ __('messages.change-password') }}</a></li>
                <li><a href="#">{{ __('messages.order') }}</a></li>
            </ul>
        </div>
        <div class="col-md-1"></div>
        @yield('content')
    </div>
</div>

