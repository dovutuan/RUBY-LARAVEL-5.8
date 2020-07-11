<?php $__env->startSection('content'); ?>
    <section class="login_part padding_top">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6">
                    <div class="login_part_text text-center">
                        <div class="login_part_text_iner">
                            <h2><?php echo e(__('messages.new-to-our-shop?')); ?></h2>
                            <p><?php echo e(__('messages.create-account')); ?></p>
                            <a href="<?php echo e(route('register')); ?>" class="btn_3"><?php echo e(__('messages.create-an-account')); ?></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="login_part_form">
                        <div class="login_part_form_iner">
                            <h3><?php echo e(__('messages.welcome-back')); ?> <br>
                                <?php echo e(__('messages.please-sign-in-now')); ?></h3>
                            <form class="row contact_form" method="POST" action="<?php echo e(route('login')); ?>"
                                  novalidate="novalidate">
                                <?php echo csrf_field(); ?>
                                <div class="col-md-12 form-group p_star">
                                    <input type="email" class="form-control" name="email"
                                           placeholder="<?php echo e(__('messages.email')); ?>" value="<?php echo e(old('email')); ?>">
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
                                <div class="col-md-12 form-group">
                                    <div class="creat_account d-flex align-items-center">
                                        <input type="checkbox" name="remember selector"
                                               id="remember" <?php echo e(old('remember') ? 'checked' : ''); ?> checked>
                                        <label for="remember"><?php echo e(__('messages.remember-me')); ?></label>
                                    </div>
                                    <button type="submit" value="submit"
                                            class="btn_3"><?php echo e(__('messages.sign-in')); ?></button>
                                    <?php if(Route::has('password.request')): ?>
                                        <a class="lost_pass" href="<?php echo e(route('password.request')); ?>">
                                            <?php echo e(__('messages.forget-password?')); ?>

                                        </a>
                                    <?php endif; ?>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts_auth.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\RUBY\resources\views/auth/login.blade.php ENDPATH**/ ?>