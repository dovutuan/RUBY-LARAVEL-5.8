<?php $__env->startSection('content'); ?>

    <div class="main-content-inner">
        <div class="row">
            <div class="col-12 mt-5">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-11 text-left">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="#"><?php echo e(__('messages.a-home')); ?></a></li>
                                        <li class="breadcrumb-item"
                                            aria-current="page"><a href="#"><?php echo e(__('messages.a-category')); ?></a></li>
                                        <li class="breadcrumb-item active"
                                            aria-current="page"><?php echo e(__('messages.a-category-edit')); ?></li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                        <form action="" method="post" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="txtImage">
                                            <img id="showImage" class="image-category"
                                                 src="<?php echo e($category->image ? fileUrl(CATEGORIES, $category->image) : asset('files') . '/categories/no_categories.jpg'); ?>"
                                                 alt="">
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-10">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label
                                                    class="control-label"><b><?php echo e(__('messages.a-parent-category')); ?></b></label>
                                                <select name="category_id" class="form-control">
                                                    <option></option>
                                                    <?php $__currentLoopData = $allCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($item->id); ?>"
                                                                <?php if($category->category_id == $item->id): ?> selected <?php endif; ?>><?php echo e($item->name); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label
                                                    class="control-label"><b><?php echo e(__('messages.a-status')); ?></b></label>
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
                                                <input name="name" type="text" class="form-control"
                                                       value="<?php echo e($category->name); ?>">
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
                                                <input type="text" class="form-control" name="icon"
                                                       value="<?php echo e($category->icon); ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <input name="image" id="txtImage" type="file" class="form-control display-none"
                                   value="<?php echo e($category->image); ?>">
                            <div class="form-group">
                                <button class="btn btn-xs btn-outline-dark"
                                        onclick="window.history.go(-1); return false;"><i
                                        class="fa fa-angle-double-left"> <?php echo e(__('messages.back-to-list')); ?></i></button>
                                <button type="submit" class="btn btn-xs btn-success"><?php echo e(__('messages.edit')); ?></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts_admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\RUBY\resources\views/admin/category/edit.blade.php ENDPATH**/ ?>