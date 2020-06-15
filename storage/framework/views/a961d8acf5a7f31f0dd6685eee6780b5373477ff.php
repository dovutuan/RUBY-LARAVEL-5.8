<div class="humberger__menu__overlay"></div>
<div class="humberger__menu__wrapper">
    <div class="humberger__menu__logo">
        <a href="<?php echo e(route('home'), false); ?>"><img class="logo-image" src="<?php echo e(asset('logo'), false); ?>/icon_ruby.png" alt=""></a>
    </div>
    <div class="humberger__menu__widget">
        <div class="header__top__right__language">
            <div><?php echo e(__('messages.language'), false); ?></div>
            <span class="arrow_carrot-down"></span>
            <ul>
                <li><a href="<?php echo e(route('lang',['lang' => 'vi']), false); ?>"><?php echo e(__('messages.vietnamese'), false); ?></a></li>
                <li><a href="<?php echo e(route('lang',['lang' => 'en']), false); ?>"><?php echo e(__('messages.english'), false); ?></a></li>
            </ul>
        </div>
        <div class="header__top__right__auth">
            <div><?php echo e(__('messages.hi'), false); ?>: <?php echo e(\Auth::user()->name, false); ?></div>
            <span class="arrow_carrot-down"></span>
            <ul>
                <li><a href="<?php echo e(route('information'), false); ?>"><?php echo e(__('messages.information'), false); ?></a></li>
                <li><a href="<?php echo e(route('order-customer'), false); ?>"><?php echo e(__('messages.order'), false); ?></a></li>
                <li>
                    <a href="<?php echo e(route('logout'), false); ?>"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> <?php echo e(__('messages.logout'), false); ?></a>
                    <form id="logout-form" action="<?php echo e(route('logout'), false); ?>" method="POST"
                          style="display: none;">
                        <?php echo csrf_field(); ?>
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
                        class="fa fa-envelope"></i> <?php echo e(__('messages.ruby.RBS.shop@gmail.com'), false); ?></a></li>
            <li><?php echo e(__('messages.free-shipping'), false); ?></li>
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
                                        class="fa fa-envelope"></i> <?php echo e(__('messages.ruby.RBS.shop@gmail.com'), false); ?></a>
                            </li>
                            <li><?php echo e(__('messages.free-shipping'), false); ?></li>
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
                            <div><?php echo e(__('messages.language'), false); ?></div>
                            <span class="arrow_carrot-down"></span>
                            <ul>
                                <li><a href="<?php echo e(route('lang',['lang' => 'vi']), false); ?>"><?php echo e(__('messages.vietnamese'), false); ?></a>
                                </li>
                                <li><a href="<?php echo e(route('lang',['lang' => 'en']), false); ?>"><?php echo e(__('messages.english'), false); ?></a></li>
                            </ul>
                        </div>
                        <div class="header__top__right__auth">
                            <div><?php echo e(__('messages.hi'), false); ?>: <?php echo e(\Auth::user()->name, false); ?></div>
                            <span class="arrow_carrot-down"></span>
                            <ul>
                                <li><a href="<?php echo e(route('information'), false); ?>"><?php echo e(__('messages.information'), false); ?></a></li>
                                <li><a href="<?php echo e(route('order-customer'), false); ?>"><?php echo e(__('messages.order'), false); ?></a></li>
                                <li>
                                    <a href="<?php echo e(route('logout'), false); ?>"
                                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> <?php echo e(__('messages.logout'), false); ?></a>
                                    <form id="logout-form" action="<?php echo e(route('logout'), false); ?>" method="POST"
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
            <div class="col-lg-12">
                <div class="header__logo">
                    <a href="<?php echo e(route('home'), false); ?>"><img class="logo-image_account" src="<?php echo e(asset('logo'), false); ?>/icon_ruby.png"
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
                <a class="color-a-red" href="<?php echo e(route('information'), false); ?>">
                    <li class="<?php echo e(\Request::route()->getName()==('information') ? 'active':'', false); ?>">
                        <?php echo e(__('messages.information'), false); ?></li>
                </a>
                <a class="color-a-red" href="<?php echo e(route('change-information'), false); ?>">
                    <li class="<?php echo e(\Request::route()->getName()==('change-information') ?'active':'', false); ?>">
                        <?php echo e(__('messages.change-information'), false); ?></li>
                </a>
                <a class="color-a-red" href="<?php echo e(route('change-password'), false); ?>">
                    <li class="<?php echo e(\Request::route()->getName()==('change-password') ?'active':'', false); ?>">
                        <?php echo e(__('messages.change-password'), false); ?></li>
                </a>
                <?php $__currentLoopData = \Auth::user()->getRoleNames(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($role == 'Customer' || $role == 'customer'): ?>
                        <a class="color-a-red" href="<?php echo e(route('create-mini-shop'), false); ?>">
                            <li class="<?php echo e(\Request::route()->getName()==('create-mini-shop') ?'active':'', false); ?>">
                                <?php echo e(__('messages.create-mini-shop'), false); ?></li>
                        </a>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <a class="color-a-red" href="<?php echo e(route('order-customer'), false); ?>">
                    <li class="<?php echo e(\Request::route()->getName()==('order-customer') || \Request::route()->getName()==('detail-order-customer') ?'active':'', false); ?>">
                        <?php echo e(__('messages.order'), false); ?></li>
                </a>
            </ul>
        </div>
        <div class="col-md-1"></div>
        <?php echo $__env->yieldContent('content'); ?>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\RUBY\resources\views/layouts_account/header.blade.php ENDPATH**/ ?>