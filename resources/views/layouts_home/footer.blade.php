<footer class="footer spad">
    <div class="container-half-fluid">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="footer__about">
                    <div class="footer__about__logo">
                        <a href="{{route('home')}}"><img class="logo-image" src="{{ asset('logo') }}/icon_ruby.png" alt=""></a>
                    </div>
                    <ul>
                        <li>{{ __('messages.a-address') }}: Hà Nội</li>
                        <li>{{ __('messages.a-phone') }}: +65 11.188.888</li>
                        <li>{{ __('messages.a-email') }}: {{ __('messages.ruby.RBS.shop@gmail.com') }}</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 offset-lg-1">
                <div class="footer__widget">
                    <h6>{{ __('messages.link') }}</h6>
                    <ul>
                        <li><a href="#">{{ __('messages.about-us') }}</a></li>
                        <li><a href="#">{{ __('messages.about-our-shop') }}</a></li>
                        <li><a href="#">{{ __('messages.secure-shopping') }}</a></li>
                        <li><a href="#">{{ __('messages.delivery-information') }}</a></li>
                        <li><a href="#">{{ __('messages.privacy-policy') }}</a></li>
                        <li><a href="#">{{ __('messages.our-sitemap') }}</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-12">
                <div class="footer__widget">
                    <h6>{{ __('messages.join-our-news-letter-now') }}</h6>
                    <p>{{ __('messages.get-e-mail-updates-about-our-latest-shop-and-special-offers.') }}</p>
                    <form action="#">
                        <input type="text" placeholder="{{ __('messages.email') }}">
                        <button type="submit" class="site-btn">{{ __('messages.subscribe') }}</button>
                    </form>
                    <div class="footer__widget__social">
                        <a href="#"><i class="fa fa-facebook"></i></a>
                        <a href="#"><i class="fa fa-instagram"></i></a>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                        <a href="#"><i class="fa fa-pinterest"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="footer__copyright">
                    <div class="footer__copyright__payment"><img src="{{ asset('theme_home_new') }}/img/payment-item.png" alt=""></div>
                </div>
            </div>
        </div>
    </div>
</footer>
