<?php if(session('success')): ?>
    <div class="toast toast-success" data-autohide="false">
        <div class="toast-header">
            <strong class="mr-auto text-success"><i class="fa fa-check-circle"></i> <?php echo e(__('messages.success')); ?>

            </strong>
            <button type="button" class="ml-2 mb-1 close" data-dismiss="toast">&times;</button>
        </div>
        <div class="toast-body">
            <strong> <?php echo e(session('success')); ?></strong>
        </div>
    </div>
<?php endif; ?>
<?php if(session('warning')): ?>
    <div class="toast fade toast-warning" data-delay="3000" data-autohide="true">
        <div class="toast-header">
            <strong class="mr-auto text-warning"><i class="fa fa-exclamation-circle"></i> <?php echo e(__('messages.warning')); ?>

            </strong>
            <button type="button" class="ml-2 mb-1 close" data-dismiss="toast">&times;</button>
        </div>
        <div class="toast-body">
            <strong> <?php echo e(session('warning')); ?></strong>
        </div>
    </div>
<?php endif; ?>
<?php if(session('error')): ?>
    <div class="toast toast-danger" data-autohide="false">
        <div class="toast-header">
            <strong class="mr-auto text-danger"><i class="fa fa-times-circle"></i> <?php echo e(__('messages.error')); ?>

            </strong>
            <button type="button" class="ml-2 mb-1 close" data-dismiss="toast">&times;</button>
        </div>
        <div class="toast-body">
            <strong> <?php echo e(session('error')); ?></strong>
        </div>
    </div>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\RUBY\resources\views/layouts_admin/alert.blade.php ENDPATH**/ ?>