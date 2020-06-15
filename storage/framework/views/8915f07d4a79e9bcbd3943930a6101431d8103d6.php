<div class="modal" id="myModal">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <form action="<?php echo e(route('store.user'), false); ?>" method="post" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="modal-header">
                    <h4 class="modal-title">Create user</h4>
                    <button type="button" class="close" data-dismiss="modal"><i class="fa fa-close"></i></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-2">
                            <label for="txtImage">
                                <img id="showImage" class="image-user"
                                     src="<?php echo e(asset('files') . '/users/no_image_user.svg', false); ?>"
                                     alt="">
                            </label>
                        </div>
                        <div class="col-md-10">
                            <div class="demo">
                                <div class="control-group">
                                    <label class="control-label"><b><?php echo e(__('messages.a-role'), false); ?> <span
                                                class="text-danger">*</span></b></label>
                                    <select id="select-state" name="role_id[]" multiple class="demo-default">
                                        <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($role->id, false); ?>"><?php echo e($role->name, false); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <?php if ($errors->has('role_id')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('role_id'); ?>
                                    <div class="text-danger"><?php echo e($message, false); ?></div>
                                    <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-7">
                                        <label class="control-label"><b><?php echo e(__('messages.a-name'), false); ?> <span
                                                    class="text-danger">*</span></b></label>
                                        <input name="name" id="name" type="text" class="form-control"
                                               placeholder="<?php echo e(__('messages.name'), false); ?>" value="<?php echo e(old('name'), false); ?>">
                                        <?php if ($errors->has('name')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('name'); ?>
                                        <div class="text-danger"><?php echo e($message, false); ?></div>
                                        <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                                    </div>
                                    <div class="col-md-5">
                                        <label class="control-label"><b><?php echo e(__('messages.a-phone'), false); ?> <span
                                                    class="text-danger">*</span></b></label>
                                        <input name="phone" id="phone" type="number" class="form-control"
                                               placeholder="<?php echo e(__('messages.phone-number'), false); ?>" value="<?php echo e(old('phone'), false); ?>">
                                        <?php if ($errors->has('phone')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('phone'); ?>
                                        <div class="text-danger"><?php echo e($message, false); ?></div>
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
                            <div class="col-md-4">
                                <label class="control-label"><b><?php echo e(__('messages.a-status'), false); ?></b></label>
                                <select name="status" id="status" class="form-control">
                                    <option value="1"><?php echo e(__('messages.active'), false); ?></option>
                                    <option value="0"><?php echo e(__('messages.inactive'), false); ?></option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label class="control-label"><b><?php echo e(__('messages.a-gender'), false); ?> <span class="text-danger">*</span></b></label>
                                <select name="gender" id="gender" class="form-control">
                                    <option value="0"><?php echo e(__('messages.male'), false); ?></option>
                                    <option value="1"><?php echo e(__('messages.female'), false); ?></option>
                                    <option value="2"><?php echo e(__('messages.other'), false); ?></option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label class="control-label"><b><?php echo e(__('messages.a-birth'), false); ?> <span
                                            class="text-danger">*</span></b></label>
                                <input name="birth" id="birth" type="date" class="form-control"
                                       value="<?php echo e(old('birth'), false); ?>">
                                <?php if ($errors->has('birth')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('birth'); ?>
                                <div class="text-danger"><?php echo e($message, false); ?></div>
                                <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                            </div>
                            <div class="col-md-2 display-none">
                                <input name="image" id="txtImage" type="file"
                                       class="form-control"
                                       value="<?php echo e(old('image'), false); ?>">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-7">
                                <label class="control-label"><b><?php echo e(__('messages.a-address'), false); ?> <span
                                            class="text-danger">*</span></b></label>
                                <input name="address" id="address" type="text" class="form-control"
                                       placeholder="<?php echo e(__('messages.address'), false); ?>" value="<?php echo e(old('address'), false); ?>">
                                <?php if ($errors->has('address')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('address'); ?>
                                <div class="text-danger"><?php echo e($message, false); ?></div>
                                <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                            </div>
                            <div class="col-md-5">
                                <label class="control-label"><b><?php echo e(__('messages.a-email'), false); ?> <span
                                            class="text-danger">*</span></b></label>
                                <input name="email" id="email" type="email" class="form-control"
                                       placeholder="<?php echo e(__('messages.email'), false); ?>" value="<?php echo e(old('email'), false); ?>">
                                <?php if ($errors->has('email')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('email'); ?>
                                <div class="text-danger"><?php echo e($message, false); ?></div>
                                <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label"><b><?php echo e(__('messages.a-password'), false); ?> <span
                                    class="text-danger">*</span></b></label>
                        <input name="password" id="password" type="password" class="form-control"
                               placeholder="<?php echo e(__('messages.password'), false); ?>" value="<?php echo e(old('password'), false); ?>">
                        <?php if ($errors->has('password')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('password'); ?>
                        <div class="text-danger"><?php echo e($message, false); ?></div>
                        <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                    </div>
                    <div class="form-group">
                        <label class="control-label"><b><?php echo e(__('messages.a-password-confirmation'), false); ?> <span
                                    class="text-danger">*</span></b></label>
                        <input name="password_confirmation" id="password_confirmation" type="password"
                               class="form-control"
                               placeholder="<?php echo e(__('messages.password-confirmation'), false); ?>"
                               value="<?php echo e(old('password_confirmation'), false); ?>">
                        <?php if ($errors->has('password_confirmation')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('password_confirmation'); ?>
                        <div class="text-danger"><?php echo e($message, false); ?></div>
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
<?php /**PATH C:\xampp\htdocs\RUBY\resources\views/admin/user/modal.blade.php ENDPATH**/ ?>