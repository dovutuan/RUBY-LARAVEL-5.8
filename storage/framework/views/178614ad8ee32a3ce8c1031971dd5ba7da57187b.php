<?php $__env->startSection('content'); ?>
    <section class="login_part padding_top1">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12 col-md-12">
                    <div class="login_part_form2">
                        <div class="login_part_form_iner">
                            <h3><?php echo e(__('messages.reset-password')); ?></h3>
                            <br>
                            <form class="row contact_form" method="POST" action="<?php echo e(route('password.update')); ?>"
                                  novalidate="novalidate">
                                <?php echo csrf_field(); ?>
                                <input type="hidden" name="token" value="<?php echo e($token); ?>">
                                <div class="col-md-12 form-group p_star">
                                    <input type="email" class="form-control" name="email" value="<?php echo e($email ?? old('email')); ?>" readonly>
                                    <?php if ($errors->has('email')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('email'); ?>
                                    <div class="text-danger"><?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                                </div>
                                <div class="col-md-12 form-group p_star">
                                    <input type="password" class="form-control" name="password"
                                           placeholder="<?php echo e(__('messages.password')); ?>" value="<?php echo e(old('password')); ?>">
                                    <?php if ($errors->has('password')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('password'); ?>
                                    <div class="text-danger"><?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                                </div>
                                <div class="col-md-12 form-group p_star">
                                    <input type="password" class="form-control" name="password_confirmation"
                                           placeholder="<?php echo e(__('messages.password-confirmation')); ?>" value="<?php echo e(old('password_confirmation')); ?>">
                                    <?php if ($errors->has('password-confirmation')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('password-confirmation'); ?>
                                    <div class="text-danger"><?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                                </div>
                                <div class="col-md-12 form-group">
                                    <button type="submit" value="submit"
                                            class="btn_3"><?php echo e(__('messages.reset-password')); ?></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts_auth.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\RUBY\resources\views/auth/passwords/reset.blade.php ENDPATH**/ ?>