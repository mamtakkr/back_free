<?php if($videos->count() > 0): ?>
<div class="row">
<?php $__currentLoopData = $videos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $video): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="col--lg-6 col-md-6 col-sm-12 col-12 pt-4 pra_img ">
        <!--<img class="rounded" src="<?php echo e(URL::to('/')); ?>/public/images/photos/">-->
        <a href="javascript:;" onclick="openVideo('<?php echo e($video->id); ?>');">
            <video class="rounded sidebarVideoGallery" controlsList="nodownload">
              <source src="<?php echo e(URL::to('/')); ?>/public/videos/<?php echo e($video->video_url); ?>" type="video/mp4">
            </video>
        </a>
    </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<?php else: ?>
<div class="row">
    <h1 class="text-center text-secondary my-5"><?php echo e(__('public.No_videos_available')); ?></h1>
</div>
<?php endif; ?>


<script>
    

  function openVideo(video_id) {
    $.ajax({
      url: '<?php echo e(route('fetchVideo')); ?>' + '?video_id=' + video_id,
      method: 'get',
      success: function(response) {
        $(".modal-content").html(JSON.parse(response));
        // //$('.show_comments').scrollTop($('.show_comments')[0].scrollHeight);

        $('.bd-example-modal-lg').modal('show');
      },
      error: function(err) {
        alert(JSON.stringify(err));
      }
    });
}
</script><?php /**PATH /home/demogswebtech/public_html/freely/resources/views/videos/show_all_videos.blade.php ENDPATH**/ ?>