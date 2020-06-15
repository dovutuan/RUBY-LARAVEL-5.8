<div class="header-area header-bottom">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-lg-9  d-none d-lg-block">
                <div class="horizontal-menu">
                    <nav>
                        <ul id="nav_menu">
                            <li>
                                <a href="<?php echo e(route('dashboard')); ?>"><i
                                        class="fa fa-fw fa-dashboard"></i><span><?php echo e(__('messages.a-dashboard')); ?></span></a>
                            </li>
                            <li class="<?php echo e(\Request::route()->getName()==('list.role') || \Request::route()->getName()==('list.user') || \Request::route()->getName()==('list.permission') ?'active':''); ?>">
                                <a href="javascript:void(0)"><i
                                        class="fa fa-fw fa-users"></i><span><?php echo e(__('messages.a-user')); ?></span></a>
                                <ul class="submenu">
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('user-list')): ?>
                                        <li class="<?php echo e(\Request::route()->getName()=='list.user'?'active':''); ?>"><a
                                                href="<?php echo e(route('list.user')); ?>"><?php echo e(__('messages.a-user')); ?></a></li>
                                    <?php endif; ?>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('role-list')): ?>
                                        <li class="<?php echo e(\Request::route()->getName()=='list.role'?'active':''); ?>"><a
                                                href="<?php echo e(route('list.role')); ?>"><?php echo e(__('messages.a-role')); ?></a></li>
                                    <?php endif; ?>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('permission-list')): ?>
                                        <li class="<?php echo e(\Request::route()->getName()=='list.permission'?'active':''); ?>"><a
                                                href="<?php echo e(route('list.permission')); ?>"><?php echo e(__('messages.a-permission')); ?></a>
                                        </li>
                                    <?php endif; ?>
                                </ul>
                            </li>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('category-list')): ?>
                                <li class="<?php echo e(\Request::route()->getName()=='list.category'?'active':''); ?>">
                                    <a href="<?php echo e(route('list.category')); ?>"><i
                                            class="fa fa-fw fa-list-alt"></i><span><?php echo e(__('messages.a-category')); ?></span></a>
                                </li>
                            <?php endif; ?>
                            <li class="<?php echo e(\Request::route()->getName()==('list.supplier') || \Request::route()->getName()==('list.species') || \Request::route()->getName()==('list.product') ?'active':''); ?>">
                                <a href="javascript:void(0)"><i
                                        class="fa fa-fw fa-users"></i><span><?php echo e(__('messages.a-product')); ?></span></a>
                                <ul class="submenu">
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('product-list')): ?>
                                        <li class="<?php echo e(\Request::route()->getName()=='list.product'?'active':''); ?>"><a
                                                href="<?php echo e(route('list.product')); ?>"><?php echo e(__('messages.a-product')); ?></a></li>
                                    <?php endif; ?>
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('supplier-list')): ?>
                                            <li class="<?php echo e(\Request::route()->getName()=='list.supplier'?'active':''); ?>"><a
                                                    href="<?php echo e(route('list.supplier')); ?>"><?php echo e(__('messages.a-supplier')); ?></a></li>
                                        <?php endif; ?>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('species-list')): ?>
                                        <li class="<?php echo e(\Request::route()->getName()=='list.species'?'active':''); ?>"><a
                                                href="<?php echo e(route('list.species')); ?>"><?php echo e(__('messages.a-species')); ?></a></li>
                                    <?php endif; ?>
                                </ul>
                            </li>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('discount-list')): ?>
                                <li class="<?php echo e(\Request::route()->getName()=='list.discount'?'active':''); ?>">
                                    <a href="<?php echo e(route('list.discount')); ?>"><i
                                            class="fa fa-fw fa-list-alt"></i><span><?php echo e(__('messages.a-discount')); ?></span></a>
                                </li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('bill-list')): ?>
                                <li class="<?php echo e(\Request::route()->getName()=='list.bill'?'active':''); ?>">
                                    <a href="<?php echo e(route('list.bill')); ?>"><i
                                            class="fa fa-fw fa-shopping-cart"></i><span><?php echo e(__('messages.a-bill')); ?></span></a>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </nav>
                </div>
            </div>
            <div class="col-12 d-block d-lg-none">
                <div id="mobile_menu"></div>
            </div>
        </div>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\RUBY\resources\views/layouts_admin/header.blade.php ENDPATH**/ ?>