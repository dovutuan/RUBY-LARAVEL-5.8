<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale()), false); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="<?php echo e(csrf_token(), false); ?>">
    <title>SIGN IN - SIGN UP</title>
    <link rel="icon" href="<?php echo e(asset('logo'), false); ?>/icon_ruby.png">
    <link rel="stylesheet" href="<?php echo e(asset('theme_auth'), false); ?>/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo e(asset('theme_auth'), false); ?>/css/all.css">
    <link rel="stylesheet" href="<?php echo e(asset('theme_auth'), false); ?>/css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
</head>
<body>
<header class="main_menu home_menu">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-12">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="navbar-brand" href="<?php echo e(route('home'), false); ?>"><img class="image-logo" src="<?php echo e(asset('logo'), false); ?>/icon_ruby.png" alt="logo"></a>
                    <div class="collapse navbar-collapse main-menu-item" id="navbarSupportedContent"></div>
                    <div class="hearer_icon d-flex">
                        <div class="dropdown">
                            <button class="btn btn-outline-primary dropdown-toggle" type="button"
                                    data-toggle="dropdown"><?php echo e(__('messages.lang'), false); ?><span class="caret"></span></button>
                            <ul class="dropdown-menu">
                                <li><a href="<?php echo e(route('lang',['lang' => 'vi']), false); ?>"><img src="<?php echo e(asset('icon'), false); ?>/vn.png"></a></li>
                                <li><a href="<?php echo e(route('lang',['lang' => 'en' ]), false); ?>"><img src="<?php echo e(asset('icon'), false); ?>/en.png"></a></li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>
<?php echo $__env->yieldContent('content'); ?>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\RUBY\resources\views/layouts_auth/app.blade.php ENDPATH**/ ?>