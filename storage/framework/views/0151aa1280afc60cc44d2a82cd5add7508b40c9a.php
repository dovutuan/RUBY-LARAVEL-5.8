<?php $__env->startSection('content'); ?>
    <section class="login_part padding_top">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6">
                    <div class="login_part_text text-center">
                        <div class="login_part_text_iner">
                            <h2><?php echo e(__('messages.already-have-an-account-login?')); ?></h2>
                            <p><?php echo e(__('messages.sign-in-to-receive-the-latest-offers-for-you.')); ?></p>
                            <a href="<?php echo e(route('login')); ?>" class="btn_3"><?php echo e(__('messages.sign-in')); ?></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="login_part_form">
                        <div class="login_part_form_iner">
                            <h3><?php echo e(__('messages.sign-up-now')); ?></h3>
                            <form class="row contact_form" method="POST" action="<?php echo e(route('register')); ?>"
                                  novalidate="novalidate">
                                <?php echo csrf_field(); ?>
                                <div class="col-md-12 form-group p_star">
                                    <input type="text" class="form-control" name="name"
                                           placeholder="<?php echo e(__('messages.name')); ?>" value="<?php echo e(old('name')); ?>">
                                    <?php if ($errors->has('name')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('name'); ?>
                                    <div class="text-danger text-left"><?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                                </div>
                                <div class="col-md-12 form-group p_star">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <select name="gender" class="form-control">
                                                <option value="0"><?php echo e(__('messages.male')); ?></option>
                                                <option value="1"><?php echo e(__('messages.female')); ?></option>
                                                <option value="2"><?php echo e(__('messages.other')); ?></option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="date" class="form-control" name="birth" value="<?php echo e(old('birth')); ?>">
                                            <?php if ($errors->has('birth')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('birth'); ?>
                                            <div class="text-danger text-left"><?php echo e($message); ?></div>
                                            <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 form-group p_star">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <input type="number" class="form-control" name="phone"
                                                   placeholder="<?php echo e(__('messages.phone-number')); ?>" value="<?php echo e(old('phone')); ?>">
                                            <?php if ($errors->has('phone')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('phone'); ?>
                                            <div class="text-danger text-left"><?php echo e($message); ?></div>
                                            <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="email" class="form-control" name="email"
                                                   placeholder="<?php echo e(__('messages.email')); ?>" value="<?php echo e(old('email')); ?>">
                                            <?php if ($errors->has('email')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('email'); ?>
                                            <div class="text-danger text-left"><?php echo e($message); ?></div>
                                            <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 form-group p_star">
                                <textarea class="form-control" name="address"
                                          placeholder="<?php echo e(__('messages.address')); ?>"><?php echo e(old('address')); ?></textarea>
                                    <?php if ($errors->has('address')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('address'); ?>
                                    <div class="text-danger text-left"><?php echo e($message); ?></div>
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
                                    <div class="text-danger text-left"><?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                                </div>
                                <div class="col-md-12 form-group p_star">
                                    <input type="password" class="form-control"
                                           name="password_confirmation" placeholder="<?php echo e(__('messages.password-confirmation')); ?>" value="<?php echo e(old('password_confirmation')); ?>">
                                </div>
                                <div class="col-md-12 form-group p_star">
                                    <label for="f-option2"><?php echo e(__('messages.by-clicking')); ?> <a href=""><?php echo e(__('messages.terms-of-service')); ?></a> <?php echo e(__('messages.and')); ?> <a href=""><?php echo e(__('messages.privacy-policy')); ?></a></label>
                                </div>
                                <div class="col-md-12 form-group p_star">
                                    <button type="submit" class="button button-login w-100"><?php echo e(__('messages.sign-up')); ?></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts_auth.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\RUBY\resources\views/auth/register.blade.php ENDPATH**/ ?>