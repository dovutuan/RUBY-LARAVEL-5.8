<div class="modal" id="myModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="<?php echo e(route('store.role')); ?>" method="post">
                <?php echo csrf_field(); ?>
                <div class="modal-header">
                    <h4 class="modal-title"><?php echo e(__('messages.create-role')); ?></h4>
                    <button type="button" class="close" data-dismiss="modal"><i class="fa fa-close"></i></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label class="control-label"><b><?php echo e(__('messages.a-name')); ?> <span class="text-danger">*</span></b></label>
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
                    <div class="form-group">
                        <div class="demo">
                            <div class="control-group">
                                <label class="control-label"><b><?php echo e(__('messages.a-permission')); ?></b></label>
                                <select id="select-state" name="permission_id[]" multiple class="demo-default">
                                    <?php $__currentLoopData = $permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($permission->id); ?>"><?php echo e($permission->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <?php if ($errors->has('permission_id')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('permission_id'); ?>
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
<?php /**PATH C:\xampp\htdocs\RUBY\resources\views/admin/role/modal.blade.php ENDPATH**/ ?>