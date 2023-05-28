<?php if($photos->count() > 0): ?>
<div class="row">
<?php $__currentLoopData = $photos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $photo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="col-4 pt-4 pra_img ">
        <img class="rounded" src="<?php echo e(URL::to('/')); ?>/public/images/photos/<?php echo e($photo->image_url); ?>">
    </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<?php else: ?>
<div class="row">
    <h1 class="text-center text-secondary my-5">No photos available!</h1>
</div>
<?php endif; ?><?php /**PATH /home/demogswebtech/public_html/freely/resources/views/photos/show_pub_photos.blade.php ENDPATH**/ ?>