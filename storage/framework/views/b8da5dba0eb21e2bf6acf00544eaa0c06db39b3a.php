<div class="modal" id="myModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="<?php echo e(route('store.discount')); ?>" method="post">
                <?php echo csrf_field(); ?>
                <div class="modal-header">
                    <h4 class="modal-title"><?php echo e(__('messages.create-discount')); ?></h4>
                    <button type="button" class="close" data-dismiss="modal"><i class="fa fa-close"></i></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label class="control-label"><b><?php echo e(__('messages.a-name-discount')); ?> <span class="text-danger">*</span></b></label>
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
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label"><b><?php echo e(__('messages.a-code-discount')); ?></b></label>
                                <input name="code" type="text" class="form-control" maxlength="5"
                                       placeholder="<?php echo e(__('messages.code')); ?>" value="<?php echo e(old('code')); ?>">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label"><b><?php echo e(__('messages.a-price')); ?> <span class="text-danger">*</span></b></label>
                                <input name="price" type="number" class="form-control" min="0"
                                       placeholder="<?php echo e(__('messages.price')); ?>" value="<?php echo e(old('price')); ?>">
                                <?php if ($errors->has('price')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('price'); ?>
                                <div class="text-danger"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label"><b><?php echo e(__('messages.a-amount')); ?> <span class="text-danger">*</span></b></label>
                                <input name="amount" type="number" class="form-control" min="0"
                                       placeholder="<?php echo e(__('messages.amount')); ?>" value="<?php echo e(old('amount')); ?>">
                                <?php if ($errors->has('amount')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('amount'); ?>
                                <div class="text-danger"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label"><b><?php echo e(__('messages.a-start')); ?> <span class="text-danger">*</span></b></label>
                                <input name="start" type="date" class="form-control" value="<?php echo e(old('start')); ?>">
                                <?php if ($errors->has('start')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('start'); ?>
                                <div class="text-danger"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label"><b><?php echo e(__('messages.a-finish')); ?> <span class="text-danger">*</span></b></label>
                                <input name="finish" type="date" class="form-control" value="<?php echo e(old('finish')); ?>">
                                <?php if ($errors->has('finish')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('finish'); ?>
                                <div class="text-danger"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                            </div>
                        </div>
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
<?php /**PATH C:\xampp\htdocs\RUBY\resources\views/admin/discount/modal.blade.php ENDPATH**/ ?>