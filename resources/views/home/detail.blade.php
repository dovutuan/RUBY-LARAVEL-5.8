@extends('layouts_home.app')
@section('content')

    <section class="breadcrumb-section set-bg" data-setbg="{{ asset('theme_home_new') }}/img/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>{{$product->name}}</h2>
                        <div class="breadcrumb__option">
                            <a href="{{route('home')}}">{{ __('messages.home') }}</a>
                            <a href="">{{$product->categories->name}}</a>
                            <span>{{$product->name}}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="product-details spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-md-5">
                    <div class="product__details__pic">
                        <div class="product__details__pic__item">
                            <img class="product__details__pic__item--large"
                                 src="{{fileUrl(PRODUCTS, $product->image)}}" alt="">
                            @if($product->sale)
                                <lable class="product-discount-label">- {{$product->sale->sale}} %</lable>
                            @endif
                        </div>
                        <div class="product__details__pic__slider owl-carousel">
                            <img data-imgbigurl="{{$product->image}}"
                                 src="{{$product->image}}" alt="">
                            @if($product->img)
                                @foreach($product->img->image as $image)
                                    <img data-imgbigurl="{{fileUrl(PRODUCTS, $image)}}"
                                         src="{{fileUrl(PRODUCTS, $image)}}" alt="">
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-lg-7 col-md-7">
                    <form action="{{route('add-shopping-cart', $product->id)}}" method="GET">
                        <div class="product__details__text">
                            <h3>{{$product->name}}</h3>
                            <div class="product__details__rating">
                                <div class="fb-like" data-href="{{env('APP_URL_NAME_DETAIL')}}{{$product->id}}"
                                     data-width="" data-layout="box_count" data-action="like" data-size="small"
                                     data-share="true"></div>
                            </div>
                            <div class="product__details__rating">
                                @for($i = ONE; $i <= $point; $i++)
                                    <i class="fa fa-star"></i>
                                @endfor
                                <span>({{$total_rate}} {{ __('messages.innings') }})</span>
                            </div>
                            @if($product->sale)
                                <div class="product__details__price">
                                    {{ __('messages.price-old') }}
                                    @foreach($product->optionProduct as $optionProduct)
                                        <p class="text-price-detail">{{number_format($optionProduct->price)}} {{ __('messages.a-vnđ') }}
                                            - {{$optionProduct->amount}} {{$optionProduct->species->name}}</p>
                                    @endforeach
                                </div>
                            @endif
                            <select name="option" id="option_product" class="nice-select height-select">
                                @foreach($product->optionProduct as $optionProduct)
                                    <option
                                        value="{{$optionProduct->id}}">{{number_format($optionProduct->getPrice())}} {{ __('messages.a-vnđ') }}
                                        - {{$optionProduct->amount}} {{$optionProduct->species->name}}</option>
                                @endforeach
                            </select>
                            <div class="product__details__quantity">
                                <div class="quantity">
                                    <div class="pro-qty">
                                        <input type="text" value="1" name="amount" id="amount" min="1" readonly>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="primary-btn btn btn-xs"
                                    onclick="return confirm('Are you sure you want to buy this product?')"><i
                                    class="fa fa-shopping-cart"></i>
                            </button>
                            <a href="{{route('heart-product', $product->id)}}" class="heart-icon"><span
                                    class="icon_heart_alt"></span></a>
                            <ul>
                                {{--                                <li><b>Availability</b> <span>In Stock</span></li>--}}
                                <li><b>{{ __('messages.seller') }}</b> <span><b>{{$product->Users->name}}</b></span>
                                </li>
                                <li><b>{{ __('messages.category') }}</b>
                                    <span><b>{{$product->categories->name}}</b></span>
                                </li>
                                @if($product->sale)
                                    <li><b>{{ __('messages.a-sale') }}</b>
                                        <span>{{$product->sale->sale}} <sup>%</sup></span></li>
                                @endif
                                <li><b>{{ __('messages.view') }}</b>
                                    <span>{{$product->views}} <sup>{{ __('messages.innings') }}</sup></span></li>
                                <li><b>{{ __('messages.like') }}</b>
                                    <span>{{$product->likes}} <sup>{{ __('messages.innings') }}</sup></span></li>
                                <li><b>{{ __('messages.share-on') }}</b>
                                    <div class="share">
                                        <a href="#"><i class="fa fa-facebook"></i></a>
                                        <a href="#"><i class="fa fa-twitter"></i></a>
                                        <a href="#"><i class="fa fa-instagram"></i></a>
                                        <a href="#"><i class="fa fa-pinterest"></i></a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </form>
                </div>
                <div class="col-lg-12">
                    <div class="product__details__tab">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tabs-1" role="tab"
                                   aria-selected="true">{{ __('messages.description') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab"
                                   aria-selected="false">{{ __('messages.comment-facebook') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#tabs-3" role="tab"
                                   aria-selected="false">{{ __('messages.reviews') }}</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane" id="tabs-1" role="tabpanel">
                                <div class="product__details__tab__desc">
                                    <h6>{{ __('messages.a-content') }}</h6>
                                    {!! $product->content !!}
                                    <h6>{{ __('messages.a-detail') }}</h6>
                                    {!! $product->detail !!}
                                </div>
                            </div>
                            <div class="tab-pane" id="tabs-2" role="tabpanel">
                                <div class="product__details__tab__desc">
                                    <div class="fb-comments" data-href="{{env('APP_URL_NAME_DETAIL')}}{{$product->id}}"
                                         data-width="100%" data-numposts="20"></div>
                                </div>
                            </div>
                            <div class="tab-pane active" id="tabs-3" role="tabpanel">
                                <div class="product__details__tab__desc">
                                    <div class="row">
                                        <div class="col-lg-7 col-md-7">
                                            <div class="total_rate">
                                                <div class="box_total">
                                                    <h5>{{ __('messages.overall') }}</h5>
                                                    <h4>{{$point}} / {{FIVE}} <i class="fa fa-star"></i></h4>
                                                    <h6>({{$total_rate}} {{ __('messages.innings') }})</h6>
                                                </div>
                                            </div>
                                            <div class="review_list">
                                                @foreach($rates as $rate)
                                                    <div class="review_item">
                                                        <div class="media">
                                                            <img class="image-review"
                                                                 src="https://ptetutorials.com/images/user-profile.png"
                                                                 alt=""/>
                                                            <div class="media-body">
                                                                <h4>{{$rate->users->name}}</h4>
                                                                @for($i = ONE; $i <= $rate->star; $i++)
                                                                    <i class="fa fa-star"></i>
                                                                @endfor
                                                            </div>
                                                        </div>
                                                        <p class="text-area-white-space">{!! $rate->content !!}</p>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="col-md-5 col-lg-5">
                                            <div class="review_box">
                                                <form action="{{route('review-product', $product->id)}}"
                                                      class="form-contact form-review mt-3" method="post">
                                                    @csrf
                                                    <h4>{{ __('messages.add-a-review') }}</h4>
                                                    <div class="form-group">
                                                        <p class="margin-text-review">{{ __('messages.your-review:') }}</p>
                                                        <ul class="list list_star">
                                                            @for($i = ONE; $i <= FIVE; $i++)
                                                                <li><i class="fa fa-star" data-key="{{$i}}"></i></li>
                                                            @endfor
                                                            <span class="rsStar list_text"></span>
                                                            <input type="hidden" value="" class="number_rating"
                                                                   name="star">
                                                        </ul>
                                                    </div>
                                                    <div class="form-group">
                                                        <textarea class="form-control different-control w-100 content"
                                                                  name="content" rows="30" cols="30" id="content"
                                                                  placeholder="{{ __('messages.enter-content') }}"></textarea>
                                                    </div>
                                                    <div class="form-group text-center text-md-right mt-3">
                                                        <button type="submit"
                                                                class="btn btn-xs btn-outline-success">{{ __('messages.review') }}
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="related-product">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title related__product__title">
                        <h2>Related Product</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                {{--                <div class="product__discount">--}}
                {{--                    <div class="product__discount__slider owl-carousel">--}}
                {{--                        @foreach($product_category as $product)--}}
                {{--                            <div class="col-lg-4">--}}
                {{--                                <div class="product__discount__item">--}}
                {{--                                    <div class="product__discount__item__pic set-bg"--}}
                {{--                                         data-setbg="{{$product->image}}">--}}
                {{--                                        <div class="product__discount__percent">-20%</div>--}}
                {{--                                        <ul class="product__item__pic__hover">--}}
                {{--                                            <li><a href="{{route('detail-product', $product->id)}}"><i class="fa fa-eye"></i></a></li>--}}
                {{--                                            <li><a href="{{route('heart-product', $product->id)}}"><i class="fa fa-heart"></i></a></li>--}}
                {{--                                        </ul>--}}
                {{--                                    </div>--}}
                {{--                                    <div class="product__discount__item__text">--}}
                {{--                                        <h5><a href="{{route('detail-product', $product->id)}}">{{$product->name}}</a></h5>--}}
                {{--                                    </div>--}}
                {{--                                </div>--}}
                {{--                            </div>--}}
                {{--                        @endforeach--}}
                {{--                        <div class="col-lg-4">--}}
                {{--                            <div class="product__discount__item">--}}
                {{--                                <div class="product__discount__item__pic set-bg"--}}
                {{--                                     data-setbg="img/product/discount/pd-2.jpg">--}}
                {{--                                    <div class="product__discount__percent">-20%</div>--}}
                {{--                                    <ul class="product__item__pic__hover">--}}
                {{--                                        <li><a href="#"><i class="fa fa-heart"></i></a></li>--}}
                {{--                                        <li><a href="#"><i class="fa fa-retweet"></i></a></li>--}}
                {{--                                        <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>--}}
                {{--                                    </ul>--}}
                {{--                                </div>--}}
                {{--                                <div class="product__discount__item__text">--}}
                {{--                                    <span>Vegetables</span>--}}
                {{--                                    <h5><a href="#">Vegetables’package</a></h5>--}}
                {{--                                    <div class="product__item__price">$30.00 <span>$36.00</span></div>--}}
                {{--                                </div>--}}
                {{--                            </div>--}}
                {{--                        </div>--}}
                {{--                        <div class="col-lg-4">--}}
                {{--                            <div class="product__discount__item">--}}
                {{--                                <div class="product__discount__item__pic set-bg"--}}
                {{--                                     data-setbg="img/product/discount/pd-3.jpg">--}}
                {{--                                    <div class="product__discount__percent">-20%</div>--}}
                {{--                                    <ul class="product__item__pic__hover">--}}
                {{--                                        <li><a href="#"><i class="fa fa-heart"></i></a></li>--}}
                {{--                                        <li><a href="#"><i class="fa fa-retweet"></i></a></li>--}}
                {{--                                        <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>--}}
                {{--                                    </ul>--}}
                {{--                                </div>--}}
                {{--                                <div class="product__discount__item__text">--}}
                {{--                                    <span>Dried Fruit</span>--}}
                {{--                                    <h5><a href="#">Mixed Fruitss</a></h5>--}}
                {{--                                    <div class="product__item__price">$30.00 <span>$36.00</span></div>--}}
                {{--                                </div>--}}
                {{--                            </div>--}}
                {{--                        </div>--}}
                {{--                        <div class="col-lg-4">--}}
                {{--                            <div class="product__discount__item">--}}
                {{--                                <div class="product__discount__item__pic set-bg"--}}
                {{--                                     data-setbg="img/product/discount/pd-4.jpg">--}}
                {{--                                    <div class="product__discount__percent">-20%</div>--}}
                {{--                                    <ul class="product__item__pic__hover">--}}
                {{--                                        <li><a href="#"><i class="fa fa-heart"></i></a></li>--}}
                {{--                                        <li><a href="#"><i class="fa fa-retweet"></i></a></li>--}}
                {{--                                        <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>--}}
                {{--                                    </ul>--}}
                {{--                                </div>--}}
                {{--                                <div class="product__discount__item__text">--}}
                {{--                                    <span>Dried Fruit</span>--}}
                {{--                                    <h5><a href="#">Raisin’n’nuts</a></h5>--}}
                {{--                                    <div class="product__item__price">$30.00 <span>$36.00</span></div>--}}
                {{--                                </div>--}}
                {{--                            </div>--}}
                {{--                        </div>--}}
                {{--                        <div class="col-lg-4">--}}
                {{--                            <div class="product__discount__item">--}}
                {{--                                <div class="product__discount__item__pic set-bg"--}}
                {{--                                     data-setbg="img/product/discount/pd-5.jpg">--}}
                {{--                                    <div class="product__discount__percent">-20%</div>--}}
                {{--                                    <ul class="product__item__pic__hover">--}}
                {{--                                        <li><a href="#"><i class="fa fa-heart"></i></a></li>--}}
                {{--                                        <li><a href="#"><i class="fa fa-retweet"></i></a></li>--}}
                {{--                                        <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>--}}
                {{--                                    </ul>--}}
                {{--                                </div>--}}
                {{--                                <div class="product__discount__item__text">--}}
                {{--                                    <span>Dried Fruit</span>--}}
                {{--                                    <h5><a href="#">Raisin’n’nuts</a></h5>--}}
                {{--                                    <div class="product__item__price">$30.00 <span>$36.00</span></div>--}}
                {{--                                </div>--}}
                {{--                            </div>--}}
                {{--                        </div>--}}
                {{--                        <div class="col-lg-4">--}}
                {{--                            <div class="product__discount__item">--}}
                {{--                                <div class="product__discount__item__pic set-bg"--}}
                {{--                                     data-setbg="img/product/discount/pd-6.jpg">--}}
                {{--                                    <div class="product__discount__percent">-20%</div>--}}
                {{--                                    <ul class="product__item__pic__hover">--}}
                {{--                                        <li><a href="#"><i class="fa fa-heart"></i></a></li>--}}
                {{--                                        <li><a href="#"><i class="fa fa-retweet"></i></a></li>--}}
                {{--                                        <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>--}}
                {{--                                    </ul>--}}
                {{--                                </div>--}}
                {{--                                <div class="product__discount__item__text">--}}
                {{--                                    <span>Dried Fruit</span>--}}
                {{--                                    <h5><a href="#">Raisin’n’nuts</a></h5>--}}
                {{--                                    <div class="product__item__price">$30.00 <span>$36.00</span></div>--}}
                {{--                                </div>--}}
                {{--                            </div>--}}
                {{--                        </div>--}}
                {{--                    </div>--}}
                {{--                </div>--}}
                @foreach($product_category as $product)
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="product__discount__item">
                            <div class="product__discount__item__pic set-bg"
                                 data-href="{{route('detail-product', $product->id)}}"
                                 data-setbg="{{fileUrl(PRODUCTS, $product->image)}}">
                                @if($product->sale)
                                    <div class="product__discount__percent">- {{$product->sale->sale}} %</div>
                                @endif
                                <ul class="product__item__pic__hover">
                                    <li><a href="{{route('detail-product', $product->id)}}"><i
                                                class="fa fa-eye"></i></a></li>
                                    <li><a href="{{route('heart-product', $product->id)}}"><i
                                                class="fa fa-heart"></i></a></li>
                                </ul>
                            </div>
                            <div class="product__discount__item__text">
                                <h6><a href="{{route('detail-product', $product->id)}}">{{$product->name}}</a></h6>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>


@section('script')
    <script src="{{ asset('theme_home_new') }}/js/rating.js"></script>
    <script>CKEDITOR.replace('content');</script>
@stop

@endsection
