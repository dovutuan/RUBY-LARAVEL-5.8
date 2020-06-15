<?php $__env->startSection('content'); ?>

    <div class="main-content-inner">
        <div class="row">
            <div class="col-12 mt-5">
                <div class="card">
                    <div class="card-body">
                        <?php echo $__env->make('layouts_admin.alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <div class="row">
                            <div class="col-md-11 text-left">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="#"><?php echo e(__('messages.a-home')); ?></a></li>
                                        <li class="breadcrumb-item"
                                            aria-current="page"><a href="#"><?php echo e(__('messages.a-permission')); ?></a></li>
                                        <li class="breadcrumb-item active"
                                            aria-current="page"><?php echo e(__('messages.a-permission-edit')); ?></li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                        <form action="" method="post">
                            <?php echo csrf_field(); ?>
                            <div class="form-group">
                                <label class="control-label"><b><?php echo e(__('messages.name-permission')); ?> <span class="text-danger">*</span></b></label>
                                <input name="name" type="text" class="form-control" value="<?php echo e($permission->name); ?>">
                                <?php if ($errors->has('name')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('name'); ?>
                                <div class="text-danger"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-xs btn-outline-dark" onclick="window.history.go(-1); return false;"><i
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

<?php echo $__env->make('layouts_admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\RUBY\resources\views/admin/permission/edit.blade.php ENDPATH**/ ?>