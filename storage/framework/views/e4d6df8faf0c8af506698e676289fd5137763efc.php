<div class="modal" id="myModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="<?php echo e(route('store.category')); ?>" method="post" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="modal-header">
                    <h4 class="modal-title"><?php echo e(__('messages.create-category')); ?></h4>
                    <button type="button" class="close" data-dismiss="modal"><i class="fa fa-close"></i></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="txtImage" class="label-margin-left">
                            <img id="showImage" class="image-category"
                                 src="<?php echo e(asset('files') . '/categories/no_categories.jpg'); ?>"
                                 alt="">
                        </label>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label
                                        class="control-label"><b><?php echo e(__('messages.a-parent-category')); ?></b></label>
                                    <select name="category_id" class="form-control">
                                        <option></option>
                                        <?php $__currentLoopData = $allCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($item->id); ?>"><?php echo e($item->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label"><b><?php echo e(__('messages.a-status')); ?></b></label>
                                    <select name="status" class="form-control">
                                        <option value="1"><?php echo e(__('messages.active')); ?></option>
                                        <option value="0"><?php echo e(__('messages.inactive')); ?></option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label class="control-label"><b><?php echo e(__('messages.a-name')); ?> <span
                                                class="text-danger">*</span></b></label>
                                    <input name="name" type="text" class="form-control" value="<?php echo e(old('name')); ?>">
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
                                    <label class="control-label"><b><?php echo e(__('messages.a-icon')); ?></b></label>
                                    <input type="text" class="form-control" name="icon" value="<?php echo e(old('icon')); ?>">
                                </div>
                            </div>
                        </div>
                        <div class="form-group display-none">
                                <input name="image" id="txtImage" type="file" class="form-control"
                                       value="<?php echo e(old('image')); ?>">
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
<?php /**PATH C:\xampp\htdocs\RUBY\resources\views/admin/category/modal.blade.php ENDPATH**/ ?>