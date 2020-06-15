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
                                            aria-current="page"><?php echo e(__('messages.a-category')); ?></li>
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
                                        <th></th>
                                        <th>Stt</th>
                                        <th class="text-left"><?php echo e(__('messages.a-name')); ?></th>
                                        <th><?php echo e(__('messages.a-date-create')); ?></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td class="text-left">
                                                <?php if(!($category->category_id)): ?>
                                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('category-edit')): ?>
                                                        <a class="btn btn-xs btn-outline-success"><i
                                                                class="fa fa-edit"></i></a>
                                                    <?php endif; ?>
                                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('category-delete')): ?>
                                                        <a class="btn btn-xs btn-outline-danger"><i
                                                                class="fa fa-trash"></i></a>
                                                    <?php endif; ?>
                                                <?php else: ?>
                                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('category-edit')): ?>
                                                        <a href="<?php echo e(route('edit.category', $category->id)); ?>"
                                                           class="btn btn-xs btn-outline-success"><i
                                                                class="fa fa-edit"></i></a>
                                                    <?php endif; ?>
                                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('category-delete')): ?>
                                                        <a href="<?php echo e(route('destroy.category', $category->id)); ?>"
                                                           class="btn btn-xs btn-outline-danger"
                                                           onclick="return confirm('Do you want to delete?')"><i
                                                                class="fa fa-trash"></i></a>
                                                    <?php endif; ?>
                                                <?php endif; ?>
                                            </td>
                                            <th><?php echo e($loop->iteration); ?></th>
                                            <th class="text-left">
                                                <ul>
                                                    <li>
                                                        <?php echo e($category->name); ?>

                                                        <ul>
                                                            <?php $__currentLoopData = $category->childrenCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $childCategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <?php echo $__env->make('admin.category.child_category', ['child_category' => $childCategory], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </ul>
                                                    </li>
                                                </ul>

                                            </th>
                                            <td><?php echo e($category->created_at->format('H:i:s d-m-Y')); ?></td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th colspan="6"
                                            class="text-right"><?php echo e(__('messages.a-total-category:')); ?> <?php echo e($totalCategory); ?>

                                            <sup><?php echo e(__('messages.a-category')); ?></sup></th>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                        <?php echo e($categories->appends(['key' => $key])->links()); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php echo $__env->make('admin.category.modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts_admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\RUBY\resources\views/admin/category/index.blade.php ENDPATH**/ ?>