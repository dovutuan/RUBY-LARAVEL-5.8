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
                                            aria-current="page"><a href="#"><?php echo e(__('messages.a-role')); ?></a></li>
                                        <li class="breadcrumb-item active"
                                            aria-current="page"><?php echo e(__('messages.a-role-edit')); ?></li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                        <form action="" method="post">
                            <?php echo csrf_field(); ?>
                            <div class="form-group">
                                <label class="control-label"><b><?php echo e(__('messages.name-role')); ?> <span class="text-danger">*</span></b></label>
                                <input name="name" type="text" class="form-control" value="<?php echo e($role->name); ?>">
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
                                        <label class="control-label"><b>Permission</b></label>
                                        <select id="select-state" name="permission_id[]" multiple class="demo-default">
                                            <?php $__currentLoopData = $permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($permission->id); ?>"
                                                        <?php $__currentLoopData = $rolePermissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rolePermission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php if($permission->id == $rolePermission): ?> selected <?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>><?php echo e($permission->name); ?></option>
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

<?php echo $__env->make('layouts_admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\RUBY\resources\views/admin/role/edit.blade.php ENDPATH**/ ?>