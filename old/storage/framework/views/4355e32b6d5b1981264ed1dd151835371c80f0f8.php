
<?php if(Auth::check()): ?>
    <?php echo $__env->make('layouts.partials.auth_header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php else: ?>
    <?php echo $__env->make('layouts.partials.without_auth_header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>

<?php echo $__env->yieldContent('content'); ?>

<?php if(Auth::check()): ?>
   	<?php echo $__env->make('layouts.partials.auth_footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php else: ?>
   	<?php echo $__env->make('layouts.partials.without_auth_footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>



<?php /**PATH C:\xampp\htdocs\freely\resources\views/layouts/front.blade.php ENDPATH**/ ?>