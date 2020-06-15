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
                                            aria-current="page"><?php echo e(__('messages.a-product')); ?></li>
                                    </ol>
                                </nav>
                            </div>
                            <div class="col-md-2 clearfix text-right white-space-nowrap">
                                <a href="<?php echo e(route('export.product')); ?>" class="btn btn-sm btn-info"><i
                                        class="fa fa-file-excel-o"></i></a>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('product-create')): ?>
                                    <button type="button" class="btn btn-sm btn-success" data-toggle="modal"
                                            data-target="#myModal">
                                        <i class="fa fa-plus"></i>
                                    </button>
                                <?php endif; ?>
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
                                        <th class="text-left"><?php echo e(__('messages.a-name')); ?></th>
                                        <th><?php echo e(__('messages.a-date-create')); ?></th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <th><?php echo e($loop->iteration); ?></th>
                                            <td class="text-left">
                                                <a href="<?php echo e(route('show.product', $product->id)); ?>"><b><?php echo e($product->name); ?></b></a>
                                            </td>
                                            <td><?php echo e($product->created_at->format('H:i:s d-m-Y')); ?></td>
                                            <td class="text-right">
                                                <a href="<?php echo e(route('edit.product', $product->id)); ?>"
                                                   class="btn btn-xs btn-outline-success"><i
                                                        class="fa fa-edit"></i></a>
                                                <a href="<?php echo e(route('destroy.product', $product->id)); ?>"
                                                   class="btn btn-xs btn-outline-danger"
                                                   onclick="return confirm('Do you want to delete?')"><i
                                                        class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th colspan="4"
                                            class="text-right"><?php echo e(__('messages.a-total-product:')); ?> <?php echo e($totalProduct); ?>

                                            <sup><?php echo e(__('messages.a-product')); ?></sup></th>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                        <?php echo e($products->appends(['key' => $key])->links()); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php echo $__env->make('admin.product.modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


<?php $__env->startSection('script'); ?>
    <script>
        var i = 1;
        $(document).ready(function () {
            $('#addOption').click(function () {
                $('#rowOption').append('<div id="iOption' + i + '" style="display: contents"><div class="col-md-7"><div class="form-group"><label class="control-label"><b><?php echo e(__('messages.a-amount')); ?> / <?php echo e(__('messages.a-species')); ?></b></label><div class="input-group mb-3"><input name="amount[]" id="amount" type="number" min="0" class="form-control" value="<?php echo e(old('amount[]') ? old('amount[]') : 0); ?>"/><div class="input-group-prepend"><select name="specie_id[]" class="s-example-basic-single form-control"><?php $__currentLoopData = $species; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $specie): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><option value="<?php echo e($specie->id); ?>"><?php echo e($specie->name); ?></option><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></select></div></div></div></div><div class="col-md-4"><div class="form-group"><label class="control-label"><b><?php echo e(__('messages.a-price')); ?></b></label><div class="input-group mb-3"><input name="price[]" id="price" min="0" type="number" class="form-control" value="<?php echo e(old('price[]') ? old('price[]') :0); ?>"><div class="input-group-append"><span class="input-group-text">vnđ</span></div></div></div></div><div class="col-md-1"> <div class="form-group"> <button style="margin-top: 29px;margin-left: -8px;" type="button" name="remove" id="' + i + '" class="btn btn-sm btn-outline-danger btn_remove"><i class="fa fa-times"></i></button> </div></div></div>');
            });

            $(document).on('click', '.btn_remove', function () {
                var button_id = $(this).attr("id");
                $('#iOption' + button_id + '').remove();
            });
        });

        $(document).ready(function () {
            $('#addImageSecondary').click(function () {
                $('#rowImageSecondary').append('<span id="idImageSecondary' + i + '" style="display: contents"><div class="col-md-5"><div class="row"><div class="col-md-10"><input name="secondary_image[]" type="file" class="form-control" value="<?php echo e(old('secondary_image')); ?>"></div><div class="col-md-2"><button name="remove" id="' + i + '" type="button" class="btn btn-outline-danger btnRemoveImageSecondary"><i class="fa fa-times"></i></button></div></div></div><div class="col-md-1"></div></span>');
            });

            $(document).on('click', '.btnRemoveImageSecondary', function () {
                var button_id = $(this).attr("id");
                $('#idImageSecondary' + button_id + '').remove();
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts_admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\RUBY\resources\views/admin/product/index.blade.php ENDPATH**/ ?>