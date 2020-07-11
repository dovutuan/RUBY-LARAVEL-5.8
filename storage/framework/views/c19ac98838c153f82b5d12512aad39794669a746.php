<?php $__env->startSection('content'); ?>
    <section class="login_part padding_top1">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12 col-md-12">
                    <div class="login_part_text1 text-center">
                        <div class="login_part_text_iner">
                            <h2><?php echo e(__('messages.reset-password')); ?></h2>
                            <?php if(session('status')): ?>
                                <span class="label label-success"><?php echo e(__('messages.password-reset-link')); ?></span>
                            <?php endif; ?>
                            <p><?php echo e(__('messages.enter-your-email-address')); ?></p>
                            <br>
                            <form class="d-inline" method="POST" action="<?php echo e(route('password.email')); ?>">
                                <?php echo csrf_field(); ?>
                                <div class="form-group">
                                    <input id="email" type="email" class="form-control <?php if ($errors->has('email')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('email'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="email" value="<?php echo e(old('email')); ?>" required autocomplete="email" autofocus placeholder=" Please enter email" onfocus="this.placeholder = ''"
                                           onblur="this.placeholder = ' Please enter email'">
                                    <?php if ($errors->has('email')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('email'); ?>
                                    <div class="text-danger"><?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                                </div>
                                <button type="submit" class="btn_3"><?php echo e(__('messages.send')); ?></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts_auth.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\RUBY\resources\views/auth/passwords/email.blade.php ENDPATH**/ ?>