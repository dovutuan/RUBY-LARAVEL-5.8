<header class="main_menu home_menu">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-12">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="navbar-brand" href="{{route('home')}}"> <img src="{{ asset('theme_home') }}/img/logo.png"
                                                                           alt="logo"> </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                        <span class="menu_icon"><i class="ti-bar-chart"></i></span>
                    </button>

                    <div class="collapse navbar-collapse main-menu-item" id="navbarSupportedContent">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="index.html">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" >Contact</a>
                            </li>
                        </ul>
                    </div>
                    <div class="hearer_icon d-flex">
                        <a id="search_1" href="javascript:void(0)"><i class="ti-search"></i></a>
                        <div class="dropdown cart">
                            <a class="dropdown-toggle" href="#" id="navbarDropdown3" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="ti-shopping-cart"></i> <sup>{{Cart::count()}}</sup>
                            </a>
                        </div>
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
                                   class="dropdown-item"> {{ __('messages.information') }}</a>
                                <a href=""
                                   class="dropdown-item"> {{ __('messages.order') }}</a>
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
    <div class="search_input" id="search_input_box">
        <div class="container ">
            <form class="d-flex justify-content-between search-inner">
                <input type="text" class="form-control" id="search_input" placeholder="Search Here">
                <button type="submit" class="btn"></button>
                <span class="ti-close" id="close_search" title="Close Search"></span>
            </form>
        </div>
    </div>
</header>
