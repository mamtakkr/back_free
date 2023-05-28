<?php if($videos->count() > 0): ?>
<div class="row">
<?php $__currentLoopData = $videos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $video): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="col--lg-6 col-md-6 col-sm-12 col-12 pt-4 pra_img ">
        <video class="rounded sidebarVideoGallery" controls controlsList="nodownload">
          <source src="<?php echo e(URL::to('/')); ?>/public/videos/<?php echo e($video->video_url); ?>" type="video/mp4">
        </video>
    </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<?php else: ?>
<div class="row">
    <h1 class="text-center text-secondary my-5">No videos available!</h1>
</div>
<?php endif; ?>
<?php /**PATH /home/demogswebtech/public_html/freely/resources/views/videos/show_pub_videos.blade.php ENDPATH**/ ?>