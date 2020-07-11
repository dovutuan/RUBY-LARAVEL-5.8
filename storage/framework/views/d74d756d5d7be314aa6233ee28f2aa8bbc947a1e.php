<!DOCTYPE html>
<html class="no-js" lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>RUBYSHOP - Trang quản trị</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="<?php echo e(asset('logo')); ?>/icon_ruby.png" type="image/png">

    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <link rel="stylesheet" href="<?php echo e(asset('theme_admin')); ?>/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo e(asset('theme_admin')); ?>/assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo e(asset('theme_admin')); ?>/assets/css/themify-icons.css">
    <link rel="stylesheet" href="<?php echo e(asset('theme_admin')); ?>/assets/css/metisMenu.css">
    <link rel="stylesheet" href="<?php echo e(asset('theme_admin')); ?>/assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo e(asset('theme_admin')); ?>/assets/css/slicknav.min.css">

    <link rel="stylesheet" href="<?php echo e(asset('theme_admin')); ?>/assets/css/typography.css">
    <link rel="stylesheet" href="<?php echo e(asset('theme_admin')); ?>/assets/css/default-css.css">
    <link rel="stylesheet" href="<?php echo e(asset('theme_admin')); ?>/assets/css/styles.css">
    <link rel="stylesheet" href="<?php echo e(asset('theme_admin')); ?>/assets/css/new.css">
    <link rel="stylesheet" href="<?php echo e(asset('theme_admin')); ?>/assets/css/responsive.css">
    <script src="<?php echo e(asset('theme_admin')); ?>/assets/js/vendor/modernizr-2.8.3.min.js"></script>

    <link href="<?php echo e(asset('theme_admin')); ?>/select/dist/css/selectize.css" rel="stylesheet">
    <script src="<?php echo e(asset('theme_admin')); ?>/select/js/jquery.js"></script>
    <script src="<?php echo e(asset('theme_admin')); ?>/select/dist/js/standalone/selectize.js"></script>

    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
</head>

<body class="body-bg">
<div id="preloader">
    <div class="loader"></div>
</div>
<div class="horizontal-main-wrapper">
    <?php echo $__env->make('layouts_admin.main_header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->make('layouts_admin.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->make('layouts_admin.alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->yieldContent('content'); ?>

</div>
<script>
    $('#select-state').selectize({
        maxItems: 100
    });
</script>
<script src="<?php echo e(asset('theme_admin')); ?>/assets/js/vendor/jquery-2.2.4.min.js"></script>
<script src="<?php echo e(asset('theme_admin')); ?>/assets/js/popper.min.js"></script>
<script src="<?php echo e(asset('theme_admin')); ?>/assets/js/bootstrap.min.js"></script>
<script src="<?php echo e(asset('theme_admin')); ?>/assets/js/owl.carousel.min.js"></script>
<script src="<?php echo e(asset('theme_admin')); ?>/assets/js/metisMenu.min.js"></script>
<script src="<?php echo e(asset('theme_admin')); ?>/assets/js/jquery.slimscroll.min.js"></script>
<script src="<?php echo e(asset('theme_admin')); ?>/assets/js/jquery.slicknav.min.js"></script>
<script src="<?php echo e(asset('theme_admin')); ?>/assets/js/plugins.js"></script>

<script src="<?php echo e(asset('theme_admin')); ?>/assets/js/Chart.bundle.min.js"></script>

<script src="<?php echo e(asset('theme_admin')); ?>/assets/js/scripts.js"></script>
<script src="<?php echo e(asset('theme_admin')); ?>/ckeditor/ckeditor.js"></script>

<?php echo $__env->yieldContent('script'); ?>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\RUBY\resources\views/layouts_admin/app.blade.php ENDPATH**/ ?>