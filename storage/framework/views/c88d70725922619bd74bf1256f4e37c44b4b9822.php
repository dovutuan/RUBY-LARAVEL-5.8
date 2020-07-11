<?php $__env->startSection('content'); ?>
    <div id="admin-main-control" class="col-md-9 p-x-3 p-y-1">
        <form class="row contact_form" method="POST" action=""
              novalidate="novalidate">
            <?php echo csrf_field(); ?>
            <div class="col-md-12 form-group p_star">
                <input type="text" class="form-control" name="name"
                       placeholder="<?php echo e(__('messages.name'), false); ?>" value="<?php echo e($user->name, false); ?>">
                <?php if ($errors->has('name')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('name'); ?>
                <div class="text-danger text-left"><?php echo e($message, false); ?></div>
                <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
            </div>
            <div class="col-md-12 form-group p_star">
                <div class="row">
                    <div class="col-md-6">
                        <select name="gender" class="nice-select nice-select-full-width">
                            <option value="0" <?php if($user->gender == 0): ?> selected <?php endif; ?>><?php echo e(__('messages.male'), false); ?></option>
                            <option value="1" <?php if($user->gender == 0): ?> selected <?php endif; ?>><?php echo e(__('messages.female'), false); ?></option>
                            <option value="2" <?php if($user->gender == 0): ?> selected <?php endif; ?>><?php echo e(__('messages.other'), false); ?></option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <input type="date" class="form-control" name="birth" value="<?php echo e($user->birth, false); ?>">
                        <?php if ($errors->has('birth')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('birth'); ?>
                        <div class="text-danger text-left"><?php echo e($message, false); ?></div>
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
                               placeholder="<?php echo e(__('messages.phone-number'), false); ?>" value="<?php echo e($user->phone, false); ?>">
                        <?php if ($errors->has('phone')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('phone'); ?>
                        <div class="text-danger text-left"><?php echo e($message, false); ?></div>
                        <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                    </div>
                    <div class="col-md-6">
                        <input type="email" class="form-control" name="email"
                               placeholder="<?php echo e(__('messages.email'), false); ?>" value="<?php echo e($user->email, false); ?>">
                        <?php if ($errors->has('email')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('email'); ?>
                        <div class="text-danger text-left"><?php echo e($message, false); ?></div>
                        <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                    </div>
                </div>
            </div>
            <div class="col-md-12 form-group p_star">
                                <textarea class="form-control" name="address"
                                          placeholder="<?php echo e(__('messages.address'), false); ?>"><?php echo e($user->address, false); ?></textarea>
                <?php if ($errors->has('address')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('address'); ?>
                <div class="text-danger text-left"><?php echo e($message, false); ?></div>
                <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
            </div>
            <div class="col-md-3 form-group p_star">
                <button type="submit" class="btn btn-xs btn-outline-success"><?php echo e(__('messages.change'), false); ?></button>
            </div>
        </form>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts_account.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\RUBY\resources\views/account/change_information.blade.php ENDPATH**/ ?>