<div class="modal" id="myModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="<?php echo e(route('store.permission')); ?>" method="post">
                <?php echo csrf_field(); ?>
                <div class="modal-header">
                    <h4 class="modal-title"><?php echo e(__('messages.create-permission')); ?></h4>
                    <button type="button" class="close" data-dismiss="modal"><i class="fa fa-close"></i></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label class="control-label"><b><?php echo e(__('messages.a-name-permission')); ?> <span class="text-danger">*</span></b></label>
                        <input name="name" id="name" type="text" class="form-control"
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
                <div class="modal-footer">
                    <button type="submit" class="btn btn-sm btn-info"><i class="fa fa-check"></i></button>
                    <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal"><i
                            class="fa fa-close"></i></button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\RUBY\resources\views/admin/permission/modal.blade.php ENDPATH**/ ?>