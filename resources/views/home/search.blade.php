@extends('layouts_home.app')
@section('content')

    <section class="breadcrumb-section set-bg" data-setbg="{{ asset('theme_home_new') }}/img/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>{{ __('messages.search') }}</h2>
                        <div class="breadcrumb__option">
                            <a href="{{route('home')}}">{{ __('messages.home') }}</a>
                            <span>{{ __('messages.search') }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-5">
                    <div class="sidebar">
                        <div class="sidebar__item">
                            <h4>{{ __('messages.a-category') }}</h4>
                            <ul>
                                @foreach($allCategories as $category)
                                    <li><a href="#">{{$category->name}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="sidebar__item">
                            <h4>{{ __('messages.a-supplier') }}</h4>
                            <ul>
                                @foreach($suppliers as $supplier)
                                    <li><a href="#">{{$supplier->name}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="sidebar__item">
                            <h4>{{ __('messages.a-species') }}</h4>
                            @foreach($species as $specie)
                                <div class="sidebar__item__size">
                                    <label for="large">
                                        {{$specie->name}}
                                        {{--                                        <input type="radio" id="large">--}}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                        <div class="sidebar__item">
                            <h4>{{ __('messages.a-price') }}</h4>
                            <div class="price-range-wrap">
                                <div
                                    class="price-range ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content"
                                    data-min="1000" data-max="100000000">
                                    <div class="ui-slider-range ui-corner-all ui-widget-header"></div>
                                    <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                                    <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                                </div>
                                <div class="range-slider">
                                    <div class="price-input">
                                        <input type="text" id="minamount" readonly>
                                        -
                                        <input type="text" id="maxamount" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="sidebar__item">
                            <div class="latest-product__text">
                                <h4>{{ __('messages.latest-products') }}</h4>
                                <div class="latest-product__slider owl-carousel">
                                    @foreach($productNews as $productNew)
                                        <div class="latest-prdouct__slider__item">
                                            <a href="{{route('detail-product', $productNew->id)}}" class="latest-product__item">
                                                <div class="latest-product__item__pic">
                                                    <img src="{{$productNew->image}}" alt="">
                                                </div>
                                                <div class="latest-product__item__text">
                                                    <h6>{{$productNew->name}}</h6>
                                                </div>
                                            </a>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 col-md-7">
                    <div class="product__discount">
                        <div class="section-title product__discount__title">
                            <h2>Sale Off</h2>
                        </div>
                        <div class="row">
                            <div class="product__discount__slider owl-carousel">
                                <div class="col-lg-4">
                                    <div class="product__discount__item">
                                        <div class="product__discount__item__pic set-bg"
                                             data-setbg="img/product/discount/pd-1.jpg">
                                            <div class="product__discount__percent">-20%</div>
                                            <ul class="product__item__pic__hover">
                                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                                <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="product__discount__item__text">
                                            <span>Dried Fruit</span>
                                            <h5><a href="#">Raisin’n’nuts</a></h5>
                                            <div class="product__item__price">$30.00 <span>$36.00</span></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="product__discount__item">
                                        <div class="product__discount__item__pic set-bg"
                                             data-setbg="img/product/discount/pd-2.jpg">
                                            <div class="product__discount__percent">-20%</div>
                                            <ul class="product__item__pic__hover">
                                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                                <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="product__discount__item__text">
                                            <span>Vegetables</span>
                                            <h5><a href="#">Vegetables’package</a></h5>
                                            <div class="product__item__price">$30.00 <span>$36.00</span></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="product__discount__item">
                                        <div class="product__discount__item__pic set-bg"
                                             data-setbg="img/product/discount/pd-3.jpg">
                                            <div class="product__discount__percent">-20%</div>
                                            <ul class="product__item__pic__hover">
                                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                                <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="product__discount__item__text">
                                            <span>Dried Fruit</span>
                                            <h5><a href="#">Mixed Fruitss</a></h5>
                                            <div class="product__item__price">$30.00 <span>$36.00</span></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="product__discount__item">
                                        <div class="product__discount__item__pic set-bg"
                                             data-setbg="img/product/discount/pd-4.jpg">
                                            <div class="product__discount__percent">-20%</div>
                                            <ul class="product__item__pic__hover">
                                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                                <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="product__discount__item__text">
                                            <span>Dried Fruit</span>
                                            <h5><a href="#">Raisin’n’nuts</a></h5>
                                            <div class="product__item__price">$30.00 <span>$36.00</span></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="product__discount__item">
                                        <div class="product__discount__item__pic set-bg"
                                             data-setbg="img/product/discount/pd-5.jpg">
                                            <div class="product__discount__percent">-20%</div>
                                            <ul class="product__item__pic__hover">
                                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                                <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="product__discount__item__text">
                                            <span>Dried Fruit</span>
                                            <h5><a href="#">Raisin’n’nuts</a></h5>
                                            <div class="product__item__price">$30.00 <span>$36.00</span></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="product__discount__item">
                                        <div class="product__discount__item__pic set-bg"
                                             data-setbg="img/product/discount/pd-6.jpg">
                                            <div class="product__discount__percent">-20%</div>
                                            <ul class="product__item__pic__hover">
                                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                                <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="product__discount__item__text">
                                            <span>Dried Fruit</span>
                                            <h5><a href="#">Raisin’n’nuts</a></h5>
                                            <div class="product__item__price">$30.00 <span>$36.00</span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="filter__item">
                        <div class="row">
                            <div class="col-lg-4 col-md-5">
                                <div class="filter__sort">
                                    <span>{{ __('messages.sort-by') }}</span>
                                    <select>
                                       <option value="created_at">{{ __('messages.new') }}</option>
                                       <option value="created_at">{{ __('messages.price-from-high-to-low') }}</option>
                                       <option value="created_at">{{ __('messages.price-from-low-to-high') }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-8 col-md-7">
                                <div class="filter__found">
                                    <h6><span>{{$counts}}</span> {{ __('messages.products-found') }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        @foreach($products as $product)
                            <div class="col-lg-3 col-md-4 col-sm-6 mix">
                                <div class="product__discount__item">
                                    <div class="product__discount__item__pic set-bg"
                                         data-setbg="{{$product->image}}">
                                        @if($product->sale)
                                            <div class="product__discount__percent">-{{$product->sale->sale}}%</div>
                                        @endif
                                        <ul class="product__item__pic__hover">
                                            <li><a href="{{route('detail-product', $product->id)}}"><i class="fa fa-eye"></i></a></li>
                                            <li><a href="{{route('heart-product', $product->id)}}"><i class="fa fa-heart"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="product__discount__item__text">
                                        <h6><a href="{{route('detail-product', $product->id)}}">{{$product->name}}</a></h6>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </section>

    {{--    <section class="cat_product_area section_padding">--}}
    {{--        <form action="{{route('search')}}" method="GET">--}}
    {{--            <div class="container">--}}
    {{--                <div class="row">--}}
    {{--                    <div class="col-lg-3">--}}
    {{--                        <div class="left_sidebar_area">--}}
    {{--                            <aside class="left_widgets p_filter_widgets">--}}
    {{--                                <div class="l_w_title">--}}
    {{--                                    <h3>Browse Categories</h3>--}}
    {{--                                </div>--}}
    {{--                                <div class="widgets_inner">--}}
    {{--                                    <ul class="list">--}}
    {{--                                        <li>--}}
    {{--                                            <a href="#">Frozen Fish</a>--}}
    {{--                                            <span>(250)</span>--}}
    {{--                                        </li>--}}
    {{--                                        <li>--}}
    {{--                                            <a href="#">Dried Fish</a>--}}
    {{--                                            <span>(250)</span>--}}
    {{--                                        </li>--}}
    {{--                                        <li>--}}
    {{--                                            <a href="#">Fresh Fish</a>--}}
    {{--                                            <span>(250)</span>--}}
    {{--                                        </li>--}}
    {{--                                        <li>--}}
    {{--                                            <a href="#">Meat Alternatives</a>--}}
    {{--                                            <span>(250)</span>--}}
    {{--                                        </li>--}}
    {{--                                        <li>--}}
    {{--                                            <a href="#">Fresh Fish</a>--}}
    {{--                                            <span>(250)</span>--}}
    {{--                                        </li>--}}
    {{--                                        <li>--}}
    {{--                                            <a href="#">Meat Alternatives</a>--}}
    {{--                                            <span>(250)</span>--}}
    {{--                                        </li>--}}
    {{--                                        <li>--}}
    {{--                                            <a href="#">Meat</a>--}}
    {{--                                            <span>(250)</span>--}}
    {{--                                        </li>--}}
    {{--                                    </ul>--}}
    {{--                                </div>--}}
    {{--                            </aside>--}}

    {{--                            <aside class="left_widgets p_filter_widgets">--}}
    {{--                                <div class="l_w_title">--}}
    {{--                                    <h3>Product filters</h3>--}}
    {{--                                </div>--}}
    {{--                                <div class="widgets_inner">--}}
    {{--                                    <ul class="list">--}}
    {{--                                        <li>--}}
    {{--                                            <a href="#">Apple</a>--}}
    {{--                                        </li>--}}
    {{--                                        <li>--}}
    {{--                                            <a href="#">Asus</a>--}}
    {{--                                        </li>--}}
    {{--                                        <li class="active">--}}
    {{--                                            <a href="#">Gionee</a>--}}
    {{--                                        </li>--}}
    {{--                                        <li>--}}
    {{--                                            <a href="#">Micromax</a>--}}
    {{--                                        </li>--}}
    {{--                                        <li>--}}
    {{--                                            <a href="#">Samsung</a>--}}
    {{--                                        </li>--}}
    {{--                                    </ul>--}}
    {{--                                    <ul class="list">--}}
    {{--                                        <li>--}}
    {{--                                            <a href="#">Apple</a>--}}
    {{--                                        </li>--}}
    {{--                                        <li>--}}
    {{--                                            <a href="#">Asus</a>--}}
    {{--                                        </li>--}}
    {{--                                        <li class="active">--}}
    {{--                                            <a href="#">Gionee</a>--}}
    {{--                                        </li>--}}
    {{--                                        <li>--}}
    {{--                                            <a href="#">Micromax</a>--}}
    {{--                                        </li>--}}
    {{--                                        <li>--}}
    {{--                                            <a href="#">Samsung</a>--}}
    {{--                                        </li>--}}
    {{--                                    </ul>--}}
    {{--                                </div>--}}
    {{--                            </aside>--}}

    {{--                            <aside class="left_widgets p_filter_widgets">--}}
    {{--                                <div class="l_w_title">--}}
    {{--                                    <h3>Color Filter</h3>--}}
    {{--                                </div>--}}
    {{--                                <div class="widgets_inner">--}}
    {{--                                    <ul class="list">--}}
    {{--                                        <li>--}}
    {{--                                            <a href="#">Black</a>--}}
    {{--                                        </li>--}}
    {{--                                        <li>--}}
    {{--                                            <a href="#">Black Leather</a>--}}
    {{--                                        </li>--}}
    {{--                                        <li class="active">--}}
    {{--                                            <a href="#">Black with red</a>--}}
    {{--                                        </li>--}}
    {{--                                        <li>--}}
    {{--                                            <a href="#">Gold</a>--}}
    {{--                                        </li>--}}
    {{--                                        <li>--}}
    {{--                                            <a href="#">Spacegrey</a>--}}
    {{--                                        </li>--}}
    {{--                                    </ul>--}}
    {{--                                </div>--}}
    {{--                            </aside>--}}

    {{--                            <aside class="left_widgets p_filter_widgets price_rangs_aside">--}}
    {{--                                <div class="l_w_title">--}}
    {{--                                    <h3>Price Filter</h3>--}}
    {{--                                </div>--}}
    {{--                                <div class="widgets_inner">--}}
    {{--                                    <div class="range_item">--}}
    {{--                                        <!-- <div id="slider-range"></div> -->--}}
    {{--                                        <input type="text" class="js-range-slider" value="" />--}}
    {{--                                        <div class="d-flex">--}}
    {{--                                            <div class="price_text">--}}
    {{--                                                <p>Price :</p>--}}
    {{--                                            </div>--}}
    {{--                                            <div class="price_value d-flex justify-content-center">--}}
    {{--                                                <input type="text" class="js-input-from" id="amount" readonly />--}}
    {{--                                                <span>to</span>--}}
    {{--                                                <input type="text" class="js-input-to" id="amount" readonly />--}}
    {{--                                            </div>--}}
    {{--                                        </div>--}}
    {{--                                    </div>--}}
    {{--                                </div>--}}
    {{--                            </aside>--}}
    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                    <div class="col-lg-9">--}}
    {{--                        <div class="row">--}}
    {{--                            <div class="col-lg-12">--}}
    {{--                                <div class="product_top_bar d-flex justify-content-between align-items-center">--}}
    {{--                                    <div class="single_product_menu">--}}
    {{--                                        <p><span>{{$counts}} </span> Prodict Found</p>--}}
    {{--                                    </div>--}}
    {{--                                    <div class="single_product_menu d-flex">--}}
    {{--                                        <div class="top_pageniation">--}}
    {{--                                            {{ $products->links() }}--}}
    {{--                                            <i class="ti ti-angle-left"></i>--}}
    {{--                                        </div>--}}
    {{--                                        <div>--}}
    {{--                                            <div class="dropdown show">--}}
    {{--                                                <a class="btn  btn-sm btn-outline-light dropdown-toggle" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
    {{--                                                    Dropdown link--}}
    {{--                                                </a>--}}
    {{--                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">--}}
    {{--                                                    <a class="dropdown-item" href="#">Action</a>--}}
    {{--                                                    <a class="dropdown-item" href="#">Another action</a>--}}
    {{--                                                    <a class="dropdown-item" href="#">Something else here</a>--}}
    {{--                                                </div>--}}
    {{--                                            </div>--}}
    {{--                                        </div>--}}
    {{--                                    </div>--}}
    {{--                                    <div class="single_product_menu d-flex">--}}
    {{--                                        <div class="input-group">--}}
    {{--                                            <input type="text" class="form-control" placeholder="search"--}}
    {{--                                                   aria-describedby="inputGroupPrepend">--}}
    {{--                                            <div class="input-group-prepend">--}}
    {{--                                            <span class="input-group-text" id="inputGroupPrepend"><i--}}
    {{--                                                        class="ti-search"></i></span>--}}
    {{--                                            </div>--}}
    {{--                                        </div>--}}
    {{--                                    </div>--}}
    {{--                                </div>--}}
    {{--                            </div>--}}
    {{--                        </div>--}}

    {{--                        <div class="row align-items-center latest_product_inner">--}}
    {{--                            <div class="col-lg-4 col-sm-6">--}}
    {{--                                <div class="single_product_item">--}}
    {{--                                    <img src="img/product/product_1.png" alt="">--}}
    {{--                                    <div class="single_product_text">--}}
    {{--                                        <h4>Quartz Belt Watch</h4>--}}
    {{--                                        <h3>$150.00</h3>--}}
    {{--                                        <a href="#" class="add_cart">+ add to cart<i class="ti-heart"></i></a>--}}
    {{--                                    </div>--}}
    {{--                                </div>--}}
    {{--                            </div>--}}
    {{--                            <div class="col-lg-4 col-sm-6">--}}
    {{--                                <div class="single_product_item">--}}
    {{--                                    <img src="img/product/product_2.png" alt="">--}}
    {{--                                    <div class="single_product_text">--}}
    {{--                                        <h4>Quartz Belt Watch</h4>--}}
    {{--                                        <h3>$150.00</h3>--}}
    {{--                                        <a href="#" class="add_cart">+ add to cart<i class="ti-heart"></i></a>--}}
    {{--                                    </div>--}}
    {{--                                </div>--}}
    {{--                            </div>--}}
    {{--                            <div class="col-lg-4 col-sm-6">--}}
    {{--                                <div class="single_product_item">--}}
    {{--                                    <img src="img/product/product_3.png" alt="">--}}
    {{--                                    <div class="single_product_text">--}}
    {{--                                        <h4>Quartz Belt Watch</h4>--}}
    {{--                                        <h3>$150.00</h3>--}}
    {{--                                        <a href="#" class="add_cart">+ add to cart<i class="ti-heart"></i></a>--}}
    {{--                                    </div>--}}
    {{--                                </div>--}}
    {{--                            </div>--}}
    {{--                            <div class="col-lg-4 col-sm-6">--}}
    {{--                                <div class="single_product_item">--}}
    {{--                                    <img src="img/product/product_4.png" alt="">--}}
    {{--                                    <div class="single_product_text">--}}
    {{--                                        <h4>Quartz Belt Watch</h4>--}}
    {{--                                        <h3>$150.00</h3>--}}
    {{--                                        <a href="#" class="add_cart">+ add to cart<i class="ti-heart"></i></a>--}}
    {{--                                    </div>--}}
    {{--                                </div>--}}
    {{--                            </div>--}}
    {{--                            <div class="col-lg-4 col-sm-6">--}}
    {{--                                <div class="single_product_item">--}}
    {{--                                    <img src="img/product/product_5.png" alt="">--}}
    {{--                                    <div class="single_product_text">--}}
    {{--                                        <h4>Quartz Belt Watch</h4>--}}
    {{--                                        <h3>$150.00</h3>--}}
    {{--                                        <a href="#" class="add_cart">+ add to cart<i class="ti-heart"></i></a>--}}
    {{--                                    </div>--}}
    {{--                                </div>--}}
    {{--                            </div>--}}
    {{--                            <div class="col-lg-4 col-sm-6">--}}
    {{--                                <div class="single_product_item">--}}
    {{--                                    <img src="img/product/product_6.png" alt="">--}}
    {{--                                    <div class="single_product_text">--}}
    {{--                                        <h4>Quartz Belt Watch</h4>--}}
    {{--                                        <h3>$150.00</h3>--}}
    {{--                                        <a href="#" class="add_cart">+ add to cart<i class="ti-heart"></i></a>--}}
    {{--                                    </div>--}}
    {{--                                </div>--}}
    {{--                            </div>--}}
    {{--                            <div class="col-lg-4 col-sm-6">--}}
    {{--                                <div class="single_product_item">--}}
    {{--                                    <img src="img/product/product_7.png" alt="">--}}
    {{--                                    <div class="single_product_text">--}}
    {{--                                        <h4>Quartz Belt Watch</h4>--}}
    {{--                                        <h3>$150.00</h3>--}}
    {{--                                        <a href="#" class="add_cart">+ add to cart<i class="ti-heart"></i></a>--}}
    {{--                                    </div>--}}
    {{--                                </div>--}}
    {{--                            </div>--}}
    {{--                            <div class="col-lg-4 col-sm-6">--}}
    {{--                                <div class="single_product_item">--}}
    {{--                                    <img src="img/product/product_8.png" alt="">--}}
    {{--                                    <div class="single_product_text">--}}
    {{--                                        <h4>Quartz Belt Watch</h4>--}}
    {{--                                        <h3>$150.00</h3>--}}
    {{--                                        <a href="#" class="add_cart">+ add to cart<i class="ti-heart"></i></a>--}}
    {{--                                    </div>--}}
    {{--                                </div>--}}
    {{--                            </div>--}}
    {{--                            <div class="col-lg-4 col-sm-6">--}}
    {{--                                <div class="single_product_item">--}}
    {{--                                    <img src="img/product/product_2.png" alt="">--}}
    {{--                                    <div class="single_product_text">--}}
    {{--                                        <h4>Quartz Belt Watch</h4>--}}
    {{--                                        <h3>$150.00</h3>--}}
    {{--                                        <a href="#" class="add_cart">+ add to cart<i class="ti-heart"></i></a>--}}
    {{--                                    </div>--}}
    {{--                                </div>--}}
    {{--                            </div>--}}
    {{--                            <div class="col-lg-12">--}}
    {{--                                <div class="pageination">--}}
    {{--                                    <nav aria-label="Page navigation example">--}}
    {{--                                        <ul class="pagination justify-content-center">--}}
    {{--                                            <li class="page-item">--}}
    {{--                                                <a class="page-link" href="#" aria-label="Previous">--}}
    {{--                                                    <i class="ti-angle-double-left"></i>--}}
    {{--                                                </a>--}}
    {{--                                            </li>--}}
    {{--                                            <li class="page-item"><a class="page-link" href="#">1</a></li>--}}
    {{--                                            <li class="page-item"><a class="page-link" href="#">2</a></li>--}}
    {{--                                            <li class="page-item"><a class="page-link" href="#">3</a></li>--}}
    {{--                                            <li class="page-item"><a class="page-link" href="#">4</a></li>--}}
    {{--                                            <li class="page-item"><a class="page-link" href="#">5</a></li>--}}
    {{--                                            <li class="page-item"><a class="page-link" href="#">6</a></li>--}}
    {{--                                            <li class="page-item">--}}
    {{--                                                <a class="page-link" href="#" aria-label="Next">--}}
    {{--                                                    <i class="ti-angle-double-right"></i>--}}
    {{--                                                </a>--}}
    {{--                                            </li>--}}
    {{--                                        </ul>--}}
    {{--                                    </nav>--}}
    {{--                                </div>--}}
    {{--                            </div>--}}
    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </form>--}}
    {{--    </section>--}}


@endsection
