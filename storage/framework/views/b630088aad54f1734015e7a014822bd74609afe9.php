<div class="mainheader-area">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-md-3">
                <div class="logo">
                    <a href="index.html"><img src="<?php echo e(asset('theme_admin'), false); ?>/assets/images/icon/logo2.png"
                                              alt="logo"></a>
                </div>
            </div>
            <div class="col-md-9 clearfix text-right">
                <div class="d-md-inline-block d-block mr-md-4">
                    <ul class="notification-area">
                        <li id="full-view"><i class="fa fa-fullse ti-fullscreen"></i></li>
                        <li id="full-view-exit"><i class="ti-zoom-out"></i></li>
                    </ul>
                </div>
                <div class="clearfix d-md-inline-block d-block">
                    <div class="user-profile m-0">
                        <img class="avatar user-thumb"
                             src="<?php echo e(Auth::user()->image ? fileUrl(USERS, Auth::user()->image) : '', false); ?>"
                             alt="avatar">
                        <h4 class="user-name dropdown-toggle" data-toggle="dropdown"><?php echo e(Auth::user()->name, false); ?> <i
                                class="fa fa-angle-down"></i></h4>
                        <div class="dropdown-menu">
                            <a href="<?php echo e(route('lang',['lang' => 'vi']), false); ?>" class="dropdown-item"><img
                                    src="<?php echo e(asset('icon'), false); ?>/vn.png"></a>
                            <a href="<?php echo e(route('lang',['lang' => 'en']), false); ?>" class="dropdown-item"><img
                                    src="<?php echo e(asset('icon'), false); ?>/en.png"></a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="<?php echo e(route('logout'), false); ?>"
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><?php echo e(__('messages.logout'), false); ?></a>
                            <form id="logout-form" action="<?php echo e(route('logout'), false); ?>" method="POST" style="display: none;">
                                <?php echo csrf_field(); ?>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\RUBY\resources\views/layouts_admin/main_header.blade.php ENDPATH**/ ?>