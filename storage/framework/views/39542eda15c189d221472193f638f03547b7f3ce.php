<?php $__env->startSection('content'); ?>
    <div id="admin-main-control" class="col-md-9 p-x-3 p-y-1">
        <form class="row contact_form" method="POST" action=""
              novalidate="novalidate">
            <?php echo csrf_field(); ?>
            <div class="col-md-12 form-group p_star">
                <input type="password" class="form-control" name="new_password"
                       placeholder="<?php echo e(__('messages.password'), false); ?>" value="">
                <?php if ($errors->has('new_password')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('new_password'); ?>
                <div class="text-danger text-left"><?php echo e($message, false); ?></div>
                <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
            </div>
            <div class="col-md-12 form-group p_star">
                <input type="password" class="form-control" name="new_password_confirmation"
                       placeholder="<?php echo e(__('messages.password-confirmation'), false); ?>" value="">
                <?php if ($errors->has('new_password_confirmation')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('new_password_confirmation'); ?>
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

<?php echo $__env->make('layouts_account.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\RUBY\resources\views/account/change_password.blade.php ENDPATH**/ ?>