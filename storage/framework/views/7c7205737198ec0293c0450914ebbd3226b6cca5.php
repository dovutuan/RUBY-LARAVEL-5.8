<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="<?php echo e(asset('logo')); ?>/icon_ruby.png">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title>Ogani | Template</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;1,300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e(asset('theme_home_new')); ?>/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo e(asset('theme_home_new')); ?>/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo e(asset('theme_home_new')); ?>/css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="<?php echo e(asset('theme_home_new')); ?>/css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="<?php echo e(asset('theme_home_new')); ?>/css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo e(asset('theme_home_new')); ?>/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo e(asset('theme_home_new')); ?>/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo e(asset('theme_home_new')); ?>/css/style.css" type="text/css">
    <script src="<?php echo e(asset('theme_home_new')); ?>/js/numeral.min.js"></script>
</head>
<body>
<div id="preloder">
    <div class="loader"></div>
</div>

<?php echo $__env->make('layouts_home.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo $__env->make('layouts_home.alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo $__env->yieldContent('content'); ?>

<?php echo $__env->make('layouts_home.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>












<script src="<?php echo e(asset('theme_home_new')); ?>/js/jquery-3.3.1.min.js"></script>
<script src="<?php echo e(asset('theme_home_new')); ?>/js/bootstrap.min.js"></script>
<script src="<?php echo e(asset('theme_home_new')); ?>/js/jquery.nice-select.min.js"></script>
<script src="<?php echo e(asset('theme_home_new')); ?>/js/jquery-ui.min.js"></script>
<script src="<?php echo e(asset('theme_home_new')); ?>/js/jquery.slicknav.js"></script>
<script src="<?php echo e(asset('theme_home_new')); ?>/js/mixitup.min.js"></script>
<script src="<?php echo e(asset('theme_home_new')); ?>/js/owl.carousel.min.js"></script>

<script src="<?php echo e(asset('theme_home_new')); ?>/js/main.js"></script>
<script src="<?php echo e(asset('theme_home_new')); ?>/ckeditor/ckeditor.js"></script>

<?php echo $__env->yieldContent('script'); ?>
</body>

</html>
<?php /**PATH C:\xampp\htdocs\RUBY\resources\views/layouts_home/app.blade.php ENDPATH**/ ?>