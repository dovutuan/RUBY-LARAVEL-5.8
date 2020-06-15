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
                                            aria-current="page"><?php echo e(__('messages.a-supplier')); ?></li>
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
                                        <th><?php echo e(__('messages.a-company')); ?></th>
                                        <th><?php echo e(__('messages.a-information')); ?></th>
                                        <th><?php echo e(__('messages.a-date-create')); ?></th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $__currentLoopData = $suppliers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $supplier): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <th><?php echo e($loop->iteration); ?></th>
                                            <th><?php echo e($supplier->company); ?></th>
                                            <td class="text-left">
                                                <ul>
                                                    <li><b><?php echo e(__('messages.a-name')); ?></b>: <?php echo e($supplier->name); ?></li>
                                                    <li><b><?php echo e(__('messages.a-phone')); ?></b>: <?php echo e($supplier->phone); ?></li>
                                                    <li><b><?php echo e(__('messages.a-fax')); ?></b>: <?php echo e($supplier->fax); ?></li>
                                                    <li><b><?php echo e(__('messages.a-email')); ?></b>: <?php echo e($supplier->email); ?></li>
                                                    <li><b><?php echo e(__('messages.a-address')); ?></b>: <?php echo e($supplier->address); ?></li>
                                                </ul>
                                            </td>
                                            <td><?php echo e($supplier->created_at->format('H:i:s d-m-Y')); ?></td>
                                            <td class="text-right">
                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('supplier-edit')): ?>
                                                    <a href="<?php echo e(route('edit.supplier', $supplier->id)); ?>"
                                                       class="btn btn-xs btn-outline-success"><i
                                                            class="fa fa-edit"></i></a>
                                                <?php endif; ?>
                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('supplier-delete')): ?>
                                                    <a href="<?php echo e(route('destroy.supplier', $supplier->id)); ?>"
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
                                            class="text-right"><?php echo e(__('messages.a-total-supplier:')); ?> <?php echo e($totalSupplier); ?>

                                            <sup><?php echo e(__('messages.a-supplier')); ?></sup></th>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php echo $__env->make('admin.supplier.modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts_admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\RUBY\resources\views/admin/supplier/index.blade.php ENDPATH**/ ?>