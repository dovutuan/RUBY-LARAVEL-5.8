





















































































<div class="humberger__menu__overlay"></div>
<div class="humberger__menu__wrapper">
    <div class="humberger__menu__logo">
        <a href="<?php echo e(route('home')); ?>"><img class="logo-image" src="<?php echo e(asset('logo')); ?>/icon_ruby.png" alt=""></a>
    </div>
    <div class="humberger__menu__cart">
        <ul>
            <li><a href="<?php echo e(route('cart')); ?>"><i class="fa fa-shopping-bag"></i> <span><?php echo e(Cart::count()); ?></span></a></li>
        </ul>
        <div class="header__cart__price"><?php echo e(__('messages.a-price')); ?>:
            <span><?php echo e(Cart::priceTotal(0, 3)); ?> <?php echo e(__('messages.a-vnđ')); ?></span></div>
    </div>
    <div class="humberger__menu__widget">
        <div class="header__top__right__language">
            <div><?php echo e(__('messages.language')); ?></div>
            <span class="arrow_carrot-down"></span>
            <ul>
                <li><a href="<?php echo e(route('lang',['lang' => 'vi'])); ?>"><?php echo e(__('messages.vietnamese')); ?></a></li>
                <li><a href="<?php echo e(route('lang',['lang' => 'en'])); ?>"><?php echo e(__('messages.english')); ?></a></li>
            </ul>
        </div>
        <div class="header__top__right__auth">
            <div><?php echo e(__('messages.hi')); ?>: <?php echo e(\Auth::user()->name); ?></div>
            <span class="arrow_carrot-down"></span>
            <ul>
                <li><a href="<?php echo e(route('information')); ?>"><?php echo e(__('messages.information')); ?></a></li>
                <li><a href="<?php echo e(route('order-customer')); ?>"><?php echo e(__('messages.order')); ?></a></li>
                <li>
                    <a href="<?php echo e(route('logout')); ?>"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> <?php echo e(__('messages.logout')); ?></a>
                    <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST"
                          style="display: none;">
                        <?php echo csrf_field(); ?>
                    </form>
                </li>
            </ul>
        </div>
    </div>
    <nav class="humberger__menu__nav mobile-menu">
        <ul>
            <li class="active"><a href="<?php echo e(route('home')); ?>"><?php echo e(__('messages.home')); ?></a></li>
            <li><a href="./shop-grid.html">Shop</a></li>
            <li><a href="#">Pages</a>
                <ul class="header__menu__dropdown">
                    <li><a href="./shop-details.html">Shop Details</a></li>
                    <li><a href="./shoping-cart.html">Shoping Cart</a></li>
                    <li><a href="./checkout.html">Check Out</a></li>
                    <li><a href="./blog-details.html">Blog Details</a></li>
                </ul>
            </li>
            <li><a href="./blog.html">Blog</a></li>
            <li><a href="<?php echo e(route('contact')); ?>">Contact</a></li>
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
                        class="fa fa-envelope"></i> <?php echo e(__('messages.ruby.RBS.shop@gmail.com')); ?></a></li>
            <li><?php echo e(__('messages.free-shipping')); ?></li>
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
                                        class="fa fa-envelope"></i> <?php echo e(__('messages.ruby.RBS.shop@gmail.com')); ?></a>
                            </li>
                            <li><?php echo e(__('messages.free-shipping')); ?></li>
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
                            <div><?php echo e(__('messages.language')); ?></div>
                            <span class="arrow_carrot-down"></span>
                            <ul>
                                <li><a href="<?php echo e(route('lang',['lang' => 'vi'])); ?>"><?php echo e(__('messages.vietnamese')); ?></a>
                                </li>
                                <li><a href="<?php echo e(route('lang',['lang' => 'en'])); ?>"><?php echo e(__('messages.english')); ?></a></li>
                            </ul>
                        </div>
                        <div class="header__top__right__auth">
                            <div><?php echo e(__('messages.hi')); ?>: <?php echo e(\Auth::user()->name); ?></div>
                            <span class="arrow_carrot-down"></span>
                            <ul>
                                <li><a href="<?php echo e(route('information')); ?>"><?php echo e(__('messages.information')); ?></a></li>
                                <li><a href="<?php echo e(route('order-customer')); ?>"><?php echo e(__('messages.order')); ?></a></li>
                                <li>
                                    <a href="<?php echo e(route('logout')); ?>"
                                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> <?php echo e(__('messages.logout')); ?></a>
                                    <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST"
                                          style="display: none;">
                                        <?php echo csrf_field(); ?>
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
                    <a href="<?php echo e(route('home')); ?>"><img class="logo-image" src="<?php echo e(asset('logo')); ?>/icon_ruby.png" alt=""></a>
                </div>
            </div>
            <div class="col-lg-6">
                <nav class="header__menu">
                    <ul>
                        <li class="active"><a href="<?php echo e(route('home')); ?>"><?php echo e(__('messages.home')); ?></a></li>
                        <li class=""><a href="./shop-grid.html">Shop</a></li>
                        <li><a href="#">Pages</a>
                            <ul class="header__menu__dropdown">
                                <li><a href="./shop-details.html">Shop Details</a></li>
                                <li><a href="./shoping-cart.html">Shoping Cart</a></li>
                                <li><a href="./checkout.html">Check Out</a></li>
                                <li><a href="./blog-details.html">Blog Details</a></li>
                            </ul>
                        </li>
                        <li><a href="./blog.html">Blog</a></li>
                        <li><a href="<?php echo e(route('contact')); ?>">Contact</a></li>
                    </ul>
                </nav>
            </div>
            <div class="col-lg-3">
                <div class="header__cart">
                    <ul>
                        <li><a href="<?php echo e(route('cart')); ?>"><i class="fa fa-shopping-bag"></i>
                                <span><?php echo e(Cart::count()); ?></span></a></li>
                    </ul>
                    <div class="header__cart__price"><?php echo e(__('messages.a-price')); ?>:
                        <span><?php echo e(Cart::priceTotal(0, 3)); ?> <?php echo e(__('messages.a-vnđ')); ?></span></div>
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
                        <span><?php echo e(__('messages.all-departments')); ?></span>
                    </div>
                    <ul>
                        <?php $__currentLoopData = $allCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><a href="<?php echo e(route('search', 'category_id=' . $category->id)); ?>"><?php echo e($category->name); ?></a>
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="hero__search">
                    <div class="hero__search__form">
                        <form method="GET" action="<?php echo e(route('search')); ?>">
                            <input type="text" placeholder="<?php echo e(__('messages.search...')); ?>" name="name"
                                   value="<?php echo e(isset($name) ? $name : old('name')); ?>">
                            <button type="submit" class="site-btn"><?php echo e(__('messages.search')); ?></button>
                        </form>
                    </div>
                    <div class="hero__search__phone">
                        <div class="hero__search__phone__icon">
                            <a class="color-a" href="tel:0398599888"><i class="fa fa-phone"></i></a>
                        </div>
                        <div class="hero__search__phone__text">
                            <a href="tel:0398599888"><h5>0398 599 888</h5></a>
                            <span><?php echo e(__('messages.support-time')); ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php /**PATH C:\xampp\htdocs\RUBY\resources\views/layouts_home/header.blade.php ENDPATH**/ ?>