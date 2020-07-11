<div class="modal" id="myModal">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <form action="<?php echo e(route('store.supplier')); ?>" method="post">
                <?php echo csrf_field(); ?>
                <div class="modal-header">
                    <h4 class="modal-title"><?php echo e(__('messages.create_supplier')); ?></h4>
                    <button type="button" class="close" data-dismiss="modal"><i class="fa fa-close"></i></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label class="control-label"><b><?php echo e(__('messages.a-name')); ?> <span class="text-danger">*</span></b></label>
                        <input name="name" type="text" class="form-control"
                               placeholder="<?php echo e(__('messages.name')); ?>" value="<?php echo e(old('name')); ?>">
                        <?php if ($errors->has('name')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('name'); ?>
                        <div class="text-danger"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                    </div>
                    <div class="form-group">
                        <label class="control-label"><b><?php echo e(__('messages.a-company')); ?></b></label>
                        <input name="company" type="text" class="form-control"
                               placeholder="<?php echo e(__('messages.company')); ?>" value="<?php echo e(old('company')); ?>">
                        <?php if ($errors->has('company')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('company'); ?>
                        <div class="text-danger"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <label class="control-label"><b><?php echo e(__('messages.a-email')); ?> <span class="text-danger">*</span></b></label>
                                <input name="email" type="email" class="form-control"
                                       placeholder="<?php echo e(__('messages.email')); ?>" value="<?php echo e(old('email')); ?>">
                                <?php if ($errors->has('email')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('email'); ?>
                                <div class="text-danger"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                            </div>
                            <div class="col-md-4">
                                <label class="control-label"><b><?php echo e(__('messages.a-phone')); ?> <span class="text-danger">*</span></b></label>
                                <input name="phone" type="number" class="form-control"
                                       placeholder="<?php echo e(__('messages.phone-number')); ?>" value="<?php echo e(old('phone')); ?>">
                                <?php if ($errors->has('phone')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('phone'); ?>
                                <div class="text-danger"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                            </div>
                            <div class="col-md-4">
                                <label class="control-label"><b><?php echo e(__('messages.a-fax')); ?></b></label>
                                <input name="fax" type="text" class="form-control"
                                       placeholder="<?php echo e(__('messages.fax')); ?>" value="<?php echo e(old('fax')); ?>">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label"><b><?php echo e(__('messages.a-address')); ?> <span class="text-danger">*</span></b></label>
                        <input name="address" type="text" class="form-control"
                               placeholder="<?php echo e(__('messages.address')); ?>" value="<?php echo e(old('address')); ?>">
                        <?php if ($errors->has('address')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('address'); ?>
                        <div class="text-danger"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-sm btn-info"><i class="fa fa-check"></i></button>
                    <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal"><i
                            class="fa fa-close"></i></button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\RUBY\resources\views/admin/supplier/modal.blade.php ENDPATH**/ ?>