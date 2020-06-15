<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale()), false); ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="<?php echo e(asset('logo'), false); ?>/icon_ruby.png">
    <meta name="csrf-token" content="<?php echo e(csrf_token(), false); ?>">
    <title>Ogani | Template</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;1,300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e(asset('theme_home_new'), false); ?>/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo e(asset('theme_home_new'), false); ?>/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo e(asset('theme_home_new'), false); ?>/css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="<?php echo e(asset('theme_home_new'), false); ?>/css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="<?php echo e(asset('theme_home_new'), false); ?>/css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo e(asset('theme_home_new'), false); ?>/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo e(asset('theme_home_new'), false); ?>/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo e(asset('theme_home_new'), false); ?>/css/style.css" type="text/css">
    <script src="<?php echo e(asset('theme_home_new'), false); ?>/js/numeral.min.js"></script>
</head>
<body>
<div id="preloder">
    <div class="loader"></div>
</div>
<?php echo $__env->make('layouts_account.alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo $__env->make('layouts_account.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>



<?php echo $__env->make('layouts_account.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<script src="<?php echo e(asset('theme_home_new'), false); ?>/js/jquery-3.3.1.min.js"></script>
<script src="<?php echo e(asset('theme_home_new'), false); ?>/js/bootstrap.min.js"></script>
<script src="<?php echo e(asset('theme_home_new'), false); ?>/js/jquery.nice-select.min.js"></script>
<script src="<?php echo e(asset('theme_home_new'), false); ?>/js/jquery-ui.min.js"></script>
<script src="<?php echo e(asset('theme_home_new'), false); ?>/js/jquery.slicknav.js"></script>
<script src="<?php echo e(asset('theme_home_new'), false); ?>/js/mixitup.min.js"></script>
<script src="<?php echo e(asset('theme_home_new'), false); ?>/js/owl.carousel.min.js"></script>

<script src="<?php echo e(asset('theme_home_new'), false); ?>/js/main.js"></script>

<?php echo $__env->yieldContent('script'); ?>
</body>

</html>
<?php /**PATH C:\xampp\htdocs\RUBY\resources\views/layouts_account/app.blade.php ENDPATH**/ ?>