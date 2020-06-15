<?php $__env->startSection('content'); ?>

    <div class="main-content-inner">
        <div class="row">
            <div class="col-12 mt-5">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-10 text-left">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="#"><?php echo e(__('messages.a-home')); ?></a></li>
                                        <li class="breadcrumb-item active"
                                            aria-current="page"><?php echo e(__('messages.a-discount')); ?></li>
                                    </ol>
                                </nav>
                            </div>
                            <div class="col-md-2 clearfix text-right">
                                <button type="button" class="btn btn-sm btn-success" data-toggle="modal"
                                        data-target="#myModal">
                                    <i class="fa fa-plus"></i>
                                </button>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-12 clearfix text-right">
                                <div class="search-box pull-right">
                                    <form action="" method="GET">
                                        <input type="text" name="key" placeholder="<?php echo e(__('messages.search...')); ?>"
                                               value="<?php echo e(isset($key) ? $key : old('key')); ?>">
                                        <i class="ti-search"></i>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="single-table">
                            <div class="table-responsive">
                                <table class="table table-hover progress-table text-center">
                                    <thead class="text-uppercase">
                                    <tr>
                                        <th><?php echo e(__('messages.a-stt')); ?></th>
                                        <th><?php echo e(__('messages.a-code')); ?></th>
                                        <th><?php echo e(__('messages.a-information')); ?></th>
                                        <th><?php echo e(__('messages.a-date-create')); ?></th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $__currentLoopData = $discounts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $stt => $discount): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <th><?php echo e($loop->iteration); ?></th>
                                            <th><?php echo e($discount->code); ?></th>
                                            <td class="text-left">
                                                <ul>
                                                    <li><lable class="badge <?php echo e($discount->getStatus($discount->status)['class']); ?>"><?php echo e($discount->getStatus($discount->status)['name']); ?></lable></li>
                                                    <li><?php echo e(__('messages.a-price')); ?>: <?php echo e(number_format($discount->price)); ?> <sup><?php echo e(__('messages.a-vnđ')); ?></sup></li>
                                                    <li><?php echo e(__('messages.a-use')); ?>: <?php echo e($discount->use); ?></li>
                                                    <li><?php echo e(__('messages.a-time-remaining')); ?>: <?php echo e($discount->calculatingTime($discount->start, $discount->finish)); ?> <sup><?php echo e(__('messages.a-day')); ?></sup></li>
                                                    <li><?php echo e(__('messages.a-quantity-remaining')); ?>: <?php echo e($discount->quantityRemaining($discount->amount, $discount->use)); ?></li>
                                                    <li><?php echo e(__('messages.a-expired')); ?>:  <?php echo e($discount->finish); ?></li>
                                                </ul>
                                            </td>
                                            <td><?php echo e($discount->created_at->format('H:i:s d-m-Y')); ?></td>
                                            <td class="text-right">
                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('discount-edit')): ?>
                                                    <a href="<?php echo e(route('edit.discount', $discount->id)); ?>"
                                                       class="btn btn-xs btn-outline-success"><i
                                                            class="fa fa-edit"></i></a>
                                                <?php endif; ?>
                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('discount-delete')): ?>
                                                    <a href="<?php echo e(route('destroy.discount', $discount->id)); ?>"
                                                       class="btn btn-xs btn-outline-danger"
                                                       onclick="return confirm('Do you want to delete?')"><i
                                                            class="fa fa-trash"></i></a>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th colspan="6"
                                            class="text-right"><?php echo e(__('messages.a-total-discount:')); ?> <?php echo e($totalDiscount); ?>

                                            <sup><?php echo e(__('messages.a-discount')); ?></sup></th>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                        <?php echo e($discounts->appends(['key' => $key])->links()); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php echo $__env->make('admin.discount.modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts_admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\RUBY\resources\views/admin/discount/index.blade.php ENDPATH**/ ?>