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
                                            aria-current="page"><a href="#"><?php echo e(__('messages.a-user')); ?></a></li>
                                        <li class="breadcrumb-item active"
                                            aria-current="page"><?php echo e(__('messages.a-user-edit')); ?></li>
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
                                            <img id="showImage" class="image-user"
                                                 src="<?php echo e($user->image ? fileUrl(USERS, $user->image) : asset('files') . '/users/no_image_user.svg'); ?>"
                                                 alt="">
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-10">
                                    <div class="demo">
                                        <div class="control-group">
                                            <label class="control-label"><b><?php echo e(__('messages.a-role')); ?></b></label>
                                            <select id="select-state" name="role_id[]" multiple class="demo-default">
                                                <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($role->id); ?>"
                                                            <?php $__currentLoopData = $userRoles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $userRole): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php if($role->name == $userRole): ?> selected <?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>><?php echo e($role->name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                            <?php if ($errors->has('role_id')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('role_id'); ?>
                                            <div class="text-danger"><?php echo e($message); ?></div>
                                            <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-7">
                                                <label class="control-label"><b><?php echo e(__('messages.a-name')); ?> <span
                                                            class="text-danger">*</span></b></label>
                                                <input name="name" type="text" class="form-control"
                                                       value="<?php echo e($user->name); ?>">
                                                <?php if ($errors->has('name')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('name'); ?>
                                                <div class="text-danger"><?php echo e($message); ?></div>
                                                <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                                            </div>
                                            <div class="col-md-5">
                                                <label class="control-label"><b><?php echo e(__('messages.a-phone')); ?> <span
                                                            class="text-danger">*</span></b></label>
                                                <input name="phone" type="number" class="form-control"
                                                       value="<?php echo e($user->phone); ?>">
                                                <?php if ($errors->has('phone')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('phone'); ?>
                                                <div class="text-danger"><?php echo e($message); ?></div>
                                                <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label class="control-label"><b><?php echo e(__('messages.a-status')); ?></b></label>
                                        <select name="status" class="form-control">
                                            <option value="1"><?php echo e(__('messages.active')); ?></option>
                                            <option value="0"><?php echo e(__('messages.inactive')); ?></option>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="control-label"><b><?php echo e(__('messages.a-gender')); ?> <span
                                                    class="text-danger">*</span></b></label>
                                        <select name="gender" class="form-control">
                                            <option value="0"><?php echo e(__('messages.male')); ?></option>
                                            <option value="1"><?php echo e(__('messages.female')); ?></option>
                                            <option value="2"><?php echo e(__('messages.other')); ?></option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="control-label"><b><?php echo e(__('messages.a-birth')); ?> <span
                                                    class="text-danger">*</span></b></label>
                                        <input name="birth" type="date" class="form-control"
                                               value="<?php echo e($user->birth); ?>">
                                        <?php if ($errors->has('birth')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('birth'); ?>
                                        <div class="text-danger"><?php echo e($message); ?></div>
                                        <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                                    </div>
                                    <div class="col-md-1 display-none">
                                        <input name="image" id="txtImage" type="file" accept="<?php echo e(TYPE_FILES); ?>"
                                               class="form-control input-display-none"
                                               value="<?php echo e($user->image); ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-7">
                                        <label class="control-label"><b><?php echo e(__('messages.a-address')); ?> <span
                                                    class="text-danger">*</span></b></label>
                                        <input name="address" type="text" class="form-control"
                                               value="<?php echo e($user->address); ?>">
                                        <?php if ($errors->has('address')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('address'); ?>
                                        <div class="text-danger"><?php echo e($message); ?></div>
                                        <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                                    </div>
                                    <div class="col-md-5">
                                        <label class="control-label"><b><?php echo e(__('messages.a-email')); ?> <span
                                                    class="text-danger">*</span></b></label>
                                        <input name="email" type="email" class="form-control" value="<?php echo e($user->email); ?>">
                                        <?php if ($errors->has('email')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('email'); ?>
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

<?php echo $__env->make('layouts_admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\RUBY\resources\views/admin/user/edit.blade.php ENDPATH**/ ?>