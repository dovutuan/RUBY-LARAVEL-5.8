<?php $__env->startSection('content'); ?>
    <section class="login_part padding_top1">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12 col-md-12">
                    <div class="login_part_text1 text-center">
                        <div class="login_part_text_iner">
                            <h2><?php echo e(__('messages.verify-email')); ?></h2>
                            <?php if(session('resent')): ?>
                                <span class="label label-success"><?php echo e(__('messages.a-fresh-verification')); ?></span>
                            <?php endif; ?>
                            <p><?php echo e(__('messages.before-proceeding')); ?></p>
                            <a href="<?php echo e(route('verification.resend')); ?>" class="btn_3"><?php echo e(__('messages.send')); ?></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts_auth.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\RUBY\resources\views/auth/verify.blade.php ENDPATH**/ ?>