<li>
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('category-edit')): ?>
        <a href="<?php echo e(route('edit.category', $child_category->id)); ?>" class="btn btn-xs btn-outline-success"><i
                class="fa fa-edit"></i></a>
    <?php endif; ?>
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('category-delete')): ?>
        <a href="<?php echo e(route('destroy.category', $child_category->id)); ?>"
           class="btn btn-xs btn-outline-danger"
           onclick="return confirm('Do you want to delete?')"><i
                class="fa fa-trash"></i></a>
    <?php endif; ?>
    &nbsp;
    <?php echo e($child_category->name); ?>

</li>
<?php if($child_category->categories): ?>
    <ul>
        <?php $__currentLoopData = $child_category->categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $childCategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php echo $__env->make('admin.category.child_category', ['child_category' => $childCategory], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\RUBY\resources\views/admin/category/child_category.blade.php ENDPATH**/ ?>