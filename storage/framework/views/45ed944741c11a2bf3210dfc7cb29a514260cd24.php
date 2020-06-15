<?php $__env->startSection('content'); ?>
    <div id="admin-main-control" class="col-md-9 p-x-3 p-y-1">
        <div class="row">
            <div class="col-md-9">
                <div class="col-md-12 form-group p_star">
                    <div class="row">
                        <div class="col-md-3">
                            <lable class="form-control1"><?php echo e(__('messages.a-name')); ?></lable>
                        </div>
                        <div class="col-md-9">
                            <input type="text" class="form-control" readonly value="<?php echo e($user->name); ?>">
                        </div>
                    </div>
                </div>
                <div class="col-md-12 form-group p_star">
                    <div class="row">
                        <div class="col-md-3">
                            <lable class="form-control1"><?php echo e(__('messages.a-gender')); ?></lable>
                        </div>
                        <div class="col-md-9">
                            <div class="form-control1">
                                <label class="radio-inline "><input type="radio" <?php if($user->gender == 0): ?> checked <?php endif; ?> readonly> <?php echo e(__('messages.male')); ?></label>
                                &nbsp;&nbsp;
                                <label class="radio-inline "><input type="radio" <?php if($user->gender == 1): ?> checked <?php endif; ?> readonly> <?php echo e(__('messages.female')); ?></label>
                                &nbsp;&nbsp;
                                <label class="radio-inline "><input type="radio" <?php if($user->gender == 2): ?> checked <?php endif; ?> readonly> <?php echo e(__('messages.other')); ?></label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 form-group p_star">
                    <div class="row">
                        <div class="col-md-3">
                            <lable class="form-control1"><?php echo e(__('messages.a-birth')); ?></lable>
                        </div>
                        <div class="col-md-9">
                            <input type="date" class="form-control" readonly value="<?php echo e($user->birth); ?>">
                        </div>
                    </div>
                </div>
                <div class="col-md-12 form-group p_star">
                    <div class="row">
                        <div class="col-md-3">
                            <lable class="form-control1"><?php echo e(__('messages.a-phone')); ?></lable>
                        </div>
                        <div class="col-md-9">
                            <input type="text" class="form-control" readonly value="<?php echo e($user->phone); ?>">
                        </div>
                    </div>
                </div>
                <div class="col-md-12 form-group p_star">
                    <div class="row">
                        <div class="col-md-3">
                            <lable class="form-control1"><?php echo e(__('messages.a-email')); ?></lable>
                        </div>
                        <div class="col-md-9">
                            <input type="email" class="form-control" readonly value="<?php echo e($user->email); ?>">
                        </div>
                    </div>
                </div>
                <div class="col-md-12 form-group p_star">
                    <div class="row">
                        <div class="col-md-3">
                            <lable class="form-control1"><?php echo e(__('messages.a-address')); ?></lable>
                        </div>
                        <div class="col-md-9">
                            <textarea class="form-control" readonly><?php echo e($user->address); ?></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <img src="<?php echo e(asset('logo')); ?>/ruby.png" alt="">
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts_account.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\RUBY\resources\views/account/index.blade.php ENDPATH**/ ?>