<?php $__env->startSection('content'); ?>

    <div class="main-content-inner">
        <div class="row">
            <div class="col-12 mt-5">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 text-left">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="#"><?php echo e(__('messages.a-home')); ?></a></li>
                                        <li class="breadcrumb-item"><a href="#"><?php echo e(__('messages.a-product')); ?></a></li>
                                        <li class="breadcrumb-item active" aria-current="page"><?php echo e(__('messages.a-product-detail')); ?></li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card1">
                                            <div class="card1-body">
                                                <h4 class="header-title"><?php echo e(__('messages.a-product-information')); ?></h4>
                                                <div class="form-group">
                                                    <label class="control-label"><b><?php echo e(__('messages.a-name')); ?></b></label>
                                                    <input class="form-control input-rounded" type="text"
                                                           value="<?php echo e($product->name); ?>" Disabled>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label"><b><?php echo e(__('messages.a-category')); ?></b></label>
                                                    <input class="form-control input-rounded" type="text"
                                                           value="<?php echo e($product->categories->name); ?>" Disabled>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card1">
                                            <div class="card1-body">
                                                <h4 class="header-title"><?php echo e(__('messages.a-image')); ?></h4>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-md-2">
                                                            <img src="<?php echo e($product->image); ?>" class="img-fluid rounded">
                                                        </div>
                                                        <?php $__currentLoopData = $product->img; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <div class="col-md-2">
                                                                <img src="<?php echo e($image->image); ?>" class="img-fluid rounded">
                                                            </div>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card1">
                                            <div class="card1-body">
                                                <h4 class="header-title"><?php echo e(__('messages.a-option')); ?></h4>
                                                <?php $__currentLoopData = $product->optionProduct; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $optionProduct): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <div class="row">
                                                        <div class="col-md-5">
                                                            <div class="form-group">
                                                                <label class="control-label"><b><?php echo e(__('messages.a-amount')); ?> / <?php echo e(__('messages.a-species')); ?></b></label>
                                                                <div class="input-group mb-3">
                                                                    <input class="form-control" type="text"
                                                                           value="<?php echo e($optionProduct->amount); ?>" Disabled>
                                                                    <div class="input-group-append">
                                                                        <input class="form-control" type="text"
                                                                               value="<?php echo e($optionProduct->species->name); ?>" Disabled>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label class="control-label"><b><?php echo e(__('messages.a-pay')); ?></b></label>
                                                                <input class="form-control" type="text"
                                                                       value="<?php echo e($optionProduct->pay); ?>" Disabled>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label class="control-label"><b><?php echo e(__('messages.a-price')); ?></b></label>
                                                                <div class="input-group mb-3">
                                                                    <input type="text" class="form-control"
                                                                           value="<?php echo e(number_format($optionProduct->price)); ?>" Disabled>
                                                                    <div class="input-group-append">
                                                                        <span class="input-group-text">vnđ</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php if(!empty($product->sale)): ?>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="card1">
                                                <div class="card1-body">
                                                    <h4 class="header-title"><?php echo e(__('messages.a-sale')); ?></h4>
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label class="control-label"><b><?php echo e(__('messages.a-sale')); ?></b></label>
                                                                <div class="input-group mb-3">
                                                                    <input type="number" class="form-control"
                                                                           value="<?php echo e($product->sale->sale); ?>" Disabled>
                                                                    <div class="input-group-append">
                                                                        <span class="input-group-text">%</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label class="control-label"><b><?php echo e(__('messages.a-start')); ?></b></label>
                                                                <input class="form-control input-rounded" type="date"
                                                                       value="<?php echo e($product->sale->start); ?>" Disabled>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label class="control-label"><b><?php echo e(__('messages.a-finish')); ?></b></label>
                                                                <input class="form-control input-rounded" type="date"
                                                                       value="<?php echo e($product->sale->finish); ?>" Disabled>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <button class="btn btn-xs btn-outline-dark" onclick="window.history.go(-1); return false;">
                                <i
                                    class="fa fa-angle-double-left"> <?php echo e(__('messages.back-to-list')); ?></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts_admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\RUBY\resources\views/admin/product/show.blade.php ENDPATH**/ ?>