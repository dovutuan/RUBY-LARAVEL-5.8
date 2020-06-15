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
                                        <li class="breadcrumb-item"><a href="#"><?php echo e(__('messages.a-home'), false); ?></a></li>
                                        <li class="breadcrumb-item active"
                                            aria-current="page"><?php echo e(__('messages.a-user'), false); ?></li>
                                    </ol>
                                </nav>
                            </div>
                            <div class="col-md-1 clearfix text-right white-space-nowrap">
                                <a href="<?php echo e(route('export.user'), false); ?>" class="btn btn-sm btn-info"><i
                                        class="fa fa-file-excel-o"></i></a>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('user-create')): ?>
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
                                        <input type="text" name="key" placeholder="<?php echo e(__('messages.search...'), false); ?>"
                                               value="<?php echo e(isset($key) ? $key : old('key'), false); ?>">
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
                                        <th><?php echo e(__('messages.a-stt'), false); ?></th>
                                        <th><?php echo e(__('messages.a-name'), false); ?></th>
                                        <th><?php echo e(__('messages.a-status'), false); ?></th>
                                        <th><?php echo e(__('messages.a-role'), false); ?></th>
                                        <th><?php echo e(__('messages.a-date-create'), false); ?></th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <th><?php echo e($loop->iteration, false); ?></th>
                                            <th class="text-left"><img class="img-user" src="<?php echo e($user->image, false); ?>"
                                                                       alt=""> <?php echo e($user->name, false); ?></th>
                                            <td>
                                                <a href="<?php echo e(route('change.status.user', $user->id), false); ?>">
                                                    <input readonly
                                                           type="radio" <?php echo e($user->getStatus($user->status)['check'], false); ?>>
                                                    <?php echo e($user->getStatus($user->status)['name'], false); ?>

                                                </a>
                                            </td>
                                            <td>
                                                <?php $__currentLoopData = $user->getRoleNames(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $getRoleName): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <lable class="badge badge-success"><?php echo e($getRoleName, false); ?></lable>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </td>
                                            <td><?php echo e($user->created_at->format('H:i:s d-m-Y'), false); ?></td>
                                            <td class="text-right">
                                                <a title="reset password"
                                                   href="<?php echo e(route('refresh.password.user', $user->id), false); ?>"
                                                   class="btn btn-xs btn-outline-info"
                                                   onclick="return confirm('Do you want to update the password?')"><i
                                                        class="fa fa-refresh"></i></a>
                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('user-edit')): ?>
                                                    <a href="<?php echo e(route('edit.user', $user->id), false); ?>"
                                                       class="btn btn-xs btn-outline-success"><i
                                                            class="fa fa-edit"></i></a>
                                                <?php endif; ?>
                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('user-delete')): ?>
                                                    <a href="<?php echo e(route('destroy.user', $user->id), false); ?>"
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
                                            class="text-right"><?php echo e(__('messages.a-total-user:'), false); ?> <?php echo e($totalUser, false); ?>

                                            <sup><?php echo e(__('messages.a-user'), false); ?></sup></th>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                        <?php echo e($users->appends(['key' => $key])->links(), false); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php echo $__env->make('admin.user.modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts_admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\RUBY\resources\views/admin/user/index.blade.php ENDPATH**/ ?>