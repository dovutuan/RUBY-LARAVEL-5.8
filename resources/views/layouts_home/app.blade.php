<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>RUBYSHOP</title>
    <link rel="icon" href="{{ asset('logo') }}/ruby.png">
    <link rel="stylesheet" href="{{ asset('theme_home') }}/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('theme_home') }}/css/animate.css">
    <link rel="stylesheet" href="{{ asset('theme_home') }}/css/owl.carousel.min.css">
    <link rel="stylesheet" href="{{ asset('theme_home') }}/css/all.css">
    <link rel="stylesheet" href="{{ asset('theme_home') }}/css/flaticon.css">
    <link rel="stylesheet" href="{{ asset('theme_home') }}/css/themify-icons.css">
    <link rel="stylesheet" href="{{ asset('theme_home') }}/css/magnific-popup.css">
    <link rel="stylesheet" href="{{ asset('theme_home') }}/css/slick.css">
    <link rel="stylesheet" href="{{ asset('theme_home') }}/css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
</head>
<body>
@include('layouts_home.header')

<section class="banner_part">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-12">
                <div class="banner_slider owl-carousel">
                    <div class="single_banner_slider">
                        <div class="row">
                            <div class="col-lg-5 col-md-8">
                                <div class="banner_text">
                                    <div class="banner_text_iner">
                                        <h1>Wood & Cloth
                                            Sofa</h1>
                                        <p>Incididunt ut labore et dolore magna aliqua quis ipsum
                                            suspendisse ultrices gravida. Risus commodo viverra</p>
                                        <a href="#" class="btn_2">buy now</a>
                                    </div>
                                </div>
                            </div>
                            <div class="banner_img d-none d-lg-block">
                                <img src="{{ asset('theme_home') }}/img/banner_img.png" alt="">
                            </div>
                        </div>
                    </div><div class="single_banner_slider">
                        <div class="row">
                            <div class="col-lg-5 col-md-8">
                                <div class="banner_text">
                                    <div class="banner_text_iner">
                                        <h1>Cloth & Wood
                                            Sofa</h1>
                                        <p>Incididunt ut labore et dolore magna aliqua quis ipsum
                                            suspendisse ultrices gravida. Risus commodo viverra</p>
                                        <a href="#" class="btn_2">buy now</a>
                                    </div>
                                </div>
                            </div>
                            <div class="banner_img d-none d-lg-block">
                                <img src="{{ asset('theme_home') }}/img/banner_img.png" alt="">
                            </div>
                        </div>
                    </div><div class="single_banner_slider">
                        <div class="row">
                            <div class="col-lg-5 col-md-8">
                                <div class="banner_text">
                                    <div class="banner_text_iner">
                                        <h1>Wood & Cloth
                                            Sofa</h1>
                                        <p>Incididunt ut labore et dolore magna aliqua quis ipsum
                                            suspendisse ultrices gravida. Risus commodo viverra</p>
                                        <a href="#" class="btn_2">buy now</a>
                                    </div>
                                </div>
                            </div>
                            <div class="banner_img d-none d-lg-block">
                                <img src="{{ asset('theme_home') }}/img/banner_img.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="slider-counter"></div>
            </div>
        </div>
    </div>
</section>
<section class="feature_part padding_top">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="section_tittle text-center">
                    <h2>Featured Category</h2>
                </div>
            </div>
        </div>
        <div class="row align-items-center justify-content-between">
            <div class="col-lg-7 col-sm-6">
                <div class="single_feature_post_text">
                    <p>Premium Quality</p>
                    <h3>Latest foam Sofa</h3>
                    <a href="#" class="feature_btn">EXPLORE NOW <i class="fas fa-play"></i></a>
                    <img src="{{ asset('theme_home') }}/img/feature/feature_1.png" alt="">
                </div>
            </div>
            <div class="col-lg-5 col-sm-6">
                <div class="single_feature_post_text">
                    <p>Premium Quality</p>
                    <h3>Latest foam Sofa</h3>
                    <a href="#" class="feature_btn">EXPLORE NOW <i class="fas fa-play"></i></a>
                    <img src="{{ asset('theme_home') }}/img/feature/feature_2.png" alt="">
                </div>
            </div>
            <div class="col-lg-5 col-sm-6">
                <div class="single_feature_post_text">
                    <p>Premium Quality</p>
                    <h3>Latest foam Sofa</h3>
                    <a href="#" class="feature_btn">EXPLORE NOW <i class="fas fa-play"></i></a>
                    <img src="{{ asset('theme_home') }}/img/feature/feature_3.png" alt="">
                </div>
            </div>
            <div class="col-lg-7 col-sm-6">
                <div class="single_feature_post_text">
                    <p>Premium Quality</p>
                    <h3>Latest foam Sofa</h3>
                    <a href="#" class="feature_btn">EXPLORE NOW <i class="fas fa-play"></i></a>
                    <img src="{{ asset('theme_home') }}/img/feature/feature_4.png" alt="">
                </div>
            </div>
        </div>
    </div>
</section>
<section class="product_list section_padding">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="section_tittle text-center">
                    <h2>awesome <span>shop</span></h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="product_list_slider owl-carousel">
                    <div class="single_product_list_slider">
                        <div class="row align-items-center justify-content-between">
                            <div class="col-lg-3 col-sm-6">
                                <div class="single_product_item">
                                    <img src="{{ asset('theme_home') }}/img/product/product_1.png" alt="">
                                    <div class="single_product_text">
                                        <h4>Quartz Belt Watch</h4>
                                        <h3>$150.00</h3>
                                        <a href="#" class="add_cart">+ add to cart<i class="ti-heart"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6">
                                <div class="single_product_item">
                                    <img src="{{ asset('theme_home') }}/img/product/product_2.png" alt="">
                                    <div class="single_product_text">
                                        <h4>Quartz Belt Watch</h4>
                                        <h3>$150.00</h3>
                                        <a href="#" class="add_cart">+ add to cart<i class="ti-heart"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6">
                                <div class="single_product_item">
                                    <img src="{{ asset('theme_home') }}/img/product/product_3.png" alt="">
                                    <div class="single_product_text">
                                        <h4>Quartz Belt Watch</h4>
                                        <h3>$150.00</h3>
                                        <a href="#" class="add_cart">+ add to cart<i class="ti-heart"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6">
                                <div class="single_product_item">
                                    <img src="{{ asset('theme_home') }}/img/product/product_4.png" alt="">
                                    <div class="single_product_text">
                                        <h4>Quartz Belt Watch</h4>
                                        <h3>$150.00</h3>
                                        <a href="#" class="add_cart">+ add to cart<i class="ti-heart"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6">
                                <div class="single_product_item">
                                    <img src="{{ asset('theme_home') }}/img/product/product_5.png" alt="">
                                    <div class="single_product_text">
                                        <h4>Quartz Belt Watch</h4>
                                        <h3>$150.00</h3>
                                        <a href="#" class="add_cart">+ add to cart<i class="ti-heart"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6">
                                <div class="single_product_item">
                                    <img src="{{ asset('theme_home') }}/img/product/product_6.png" alt="">
                                    <div class="single_product_text">
                                        <h4>Quartz Belt Watch</h4>
                                        <h3>$150.00</h3>
                                        <a href="#" class="add_cart">+ add to cart<i class="ti-heart"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6">
                                <div class="single_product_item">
                                    <img src="{{ asset('theme_home') }}/img/product/product_7.png" alt="">
                                    <div class="single_product_text">
                                        <h4>Quartz Belt Watch</h4>
                                        <h3>$150.00</h3>
                                        <a href="#" class="add_cart">+ add to cart<i class="ti-heart"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6">
                                <div class="single_product_item">
                                    <img src="{{ asset('theme_home') }}/img/product/product_8.png" alt="">
                                    <div class="single_product_text">
                                        <h4>Quartz Belt Watch</h4>
                                        <h3>$150.00</h3>
                                        <a href="#" class="add_cart">+ add to cart<i class="ti-heart"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="single_product_list_slider">
                        <div class="row align-items-center justify-content-between">
                            <div class="col-lg-3 col-sm-6">
                                <div class="single_product_item">
                                    <img src="{{ asset('theme_home') }}/img/product/product_1.png" alt="">
                                    <div class="single_product_text">
                                        <h4>Quartz Belt Watch</h4>
                                        <h3>$150.00</h3>
                                        <a href="#" class="add_cart">+ add to cart<i class="ti-heart"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6">
                                <div class="single_product_item">
                                    <img src="{{ asset('theme_home') }}/img/product/product_2.png" alt="">
                                    <div class="single_product_text">
                                        <h4>Quartz Belt Watch</h4>
                                        <h3>$150.00</h3>
                                        <a href="#" class="add_cart">+ add to cart<i class="ti-heart"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6">
                                <div class="single_product_item">
                                    <img src="{{ asset('theme_home') }}/img/product/product_3.png" alt="">
                                    <div class="single_product_text">
                                        <h4>Quartz Belt Watch</h4>
                                        <h3>$150.00</h3>
                                        <a href="#" class="add_cart">+ add to cart<i class="ti-heart"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6">
                                <div class="single_product_item">
                                    <img src="{{ asset('theme_home') }}/img/product/product_4.png" alt="">
                                    <div class="single_product_text">
                                        <h4>Quartz Belt Watch</h4>
                                        <h3>$150.00</h3>
                                        <a href="#" class="add_cart">+ add to cart<i class="ti-heart"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6">
                                <div class="single_product_item">
                                    <img src="{{ asset('theme_home') }}/img/product/product_5.png" alt="">
                                    <div class="single_product_text">
                                        <h4>Quartz Belt Watch</h4>
                                        <h3>$150.00</h3>
                                        <a href="#" class="add_cart">+ add to cart<i class="ti-heart"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6">
                                <div class="single_product_item">
                                    <img src="{{ asset('theme_home') }}/img/product/product_6.png" alt="">
                                    <div class="single_product_text">
                                        <h4>Quartz Belt Watch</h4>
                                        <h3>$150.00</h3>
                                        <a href="#" class="add_cart">+ add to cart<i class="ti-heart"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6">
                                <div class="single_product_item">
                                    <img src="{{ asset('theme_home') }}/img/product/product_7.png" alt="">
                                    <div class="single_product_text">
                                        <h4>Quartz Belt Watch</h4>
                                        <h3>$150.00</h3>
                                        <a href="#" class="add_cart">+ add to cart<i class="ti-heart"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6">
                                <div class="single_product_item">
                                    <img src="{{ asset('theme_home') }}/img/product/product_8.png" alt="">
                                    <div class="single_product_text">
                                        <h4>Quartz Belt Watch</h4>
                                        <h3>$150.00</h3>
                                        <a href="#" class="add_cart">+ add to cart<i class="ti-heart"></i></a>
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
<section class="our_offer section_padding">
    <div class="container">
        <div class="row align-items-center justify-content-between">
            <div class="col-lg-6 col-md-6">
                <div class="offer_img">
                    <img src="{{ asset('theme_home') }}/img/offer_img.png" alt="">
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="offer_text">
                    <h2>Weekly Sale on
                        60% Off All Products</h2>
                    <div class="date_countdown">
                        <div id="timer">
                            <div id="days" class="date"></div>
                            <div id="hours" class="date"></div>
                            <div id="minutes" class="date"></div>
                            <div id="seconds" class="date"></div>
                        </div>
                    </div>
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="enter email address"
                               aria-label="Recipient's username" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <a href="#" class="input-group-text btn_2" id="basic-addon2">book now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="product_list best_seller section_padding">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="section_tittle text-center">
                    <h2>Best Sellers <span>shop</span></h2>
                </div>
            </div>
        </div>
        <div class="row align-items-center justify-content-between">
            <div class="col-lg-12">
                <div class="best_product_slider owl-carousel">
                    <div class="single_product_item">
                        <img src="{{ asset('theme_home') }}/img/product/product_1.png" alt="">
                        <div class="single_product_text">
                            <h4>Quartz Belt Watch</h4>
                            <h3>$150.00</h3>
                        </div>
                    </div>
                    <div class="single_product_item">
                        <img src="{{ asset('theme_home') }}/img/product/product_2.png" alt="">
                        <div class="single_product_text">
                            <h4>Quartz Belt Watch</h4>
                            <h3>$150.00</h3>
                        </div>
                    </div>
                    <div class="single_product_item">
                        <img src="{{ asset('theme_home') }}/img/product/product_3.png" alt="">
                        <div class="single_product_text">
                            <h4>Quartz Belt Watch</h4>
                            <h3>$150.00</h3>
                        </div>
                    </div>
                    <div class="single_product_item">
                        <img src="{{ asset('theme_home') }}/img/product/product_4.png" alt="">
                        <div class="single_product_text">
                            <h4>Quartz Belt Watch</h4>
                            <h3>$150.00</h3>
                        </div>
                    </div>
                    <div class="single_product_item">
                        <img src="{{ asset('theme_home') }}/img/product/product_5.png" alt="">
                        <div class="single_product_text">
                            <h4>Quartz Belt Watch</h4>
                            <h3>$150.00</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="subscribe_area section_padding">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="subscribe_area_text text-center">
                    <h5>Join Our Newsletter</h5>
                    <h2>Subscribe to get Updated
                        with new offers</h2>
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="enter email address"
                               aria-label="Recipient's username" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <a href="#" class="input-group-text btn_2" id="basic-addon2">subscribe now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="client_logo padding_top">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-12">
                <div class="single_client_logo">
                    <img src="{{ asset('theme_home') }}/img/client_logo/client_logo_1.png" alt="">
                </div>
                <div class="single_client_logo">
                    <img src="{{ asset('theme_home') }}/img/client_logo/client_logo_2.png" alt="">
                </div>
                <div class="single_client_logo">
                    <img src="{{ asset('theme_home') }}/img/client_logo/client_logo_3.png" alt="">
                </div>
                <div class="single_client_logo">
                    <img src="{{ asset('theme_home') }}/img/client_logo/client_logo_4.png" alt="">
                </div>
                <div class="single_client_logo">
                    <img src="{{ asset('theme_home') }}/img/client_logo/client_logo_5.png" alt="">
                </div>
                <div class="single_client_logo">
                    <img src="{{ asset('theme_home') }}/img/client_logo/client_logo_3.png" alt="">
                </div>
                <div class="single_client_logo">
                    <img src="{{ asset('theme_home') }}/img/client_logo/client_logo_1.png" alt="">
                </div>
                <div class="single_client_logo">
                    <img src="{{ asset('theme_home') }}/img/client_logo/client_logo_2.png" alt="">
                </div>
                <div class="single_client_logo">
                    <img src="{{ asset('theme_home') }}/img/client_logo/client_logo_3.png" alt="">
                </div>
                <div class="single_client_logo">
                    <img src="{{ asset('theme_home') }}/img/client_logo/client_logo_4.png" alt="">
                </div>
            </div>
        </div>
    </div>
</section>

@include('layouts_home.footer')

<script src="{{ asset('theme_home') }}/js/jquery-1.12.1.min.js"></script>
<script src="{{ asset('theme_home') }}/js/popper.min.js"></script>
<script src="{{ asset('theme_home') }}/js/bootstrap.min.js"></script>
<script src="{{ asset('theme_home') }}/js/jquery.magnific-popup.js"></script>
<script src="{{ asset('theme_home') }}/js/swiper.min.js"></script>
<script src="{{ asset('theme_home') }}/js/masonry.pkgd.js"></script>
<script src="{{ asset('theme_home') }}/js/owl.carousel.min.js"></script>
<script src="{{ asset('theme_home') }}/js/jquery.nice-select.min.js"></script>
<script src="{{ asset('theme_home') }}/js/slick.min.js"></script>
<script src="{{ asset('theme_home') }}/js/jquery.counterup.min.js"></script>
<script src="{{ asset('theme_home') }}/js/waypoints.min.js"></script>
<script src="{{ asset('theme_home') }}/js/contact.js"></script>
<script src="{{ asset('theme_home') }}/js/jquery.ajaxchimp.min.js"></script>
<script src="{{ asset('theme_home') }}/js/jquery.form.js"></script>
<script src="{{ asset('theme_home') }}/js/jquery.validate.min.js"></script>
<script src="{{ asset('theme_home') }}/js/mail-script.js"></script>
<script src="{{ asset('theme_home') }}/js/custom.js"></script>
</body>
</html>