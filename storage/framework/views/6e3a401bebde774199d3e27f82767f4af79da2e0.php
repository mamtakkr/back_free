<?php if($photos->count() > 0): ?>
<div class="row">
    
<?php $__currentLoopData = $photos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $photo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<?php if($photo->photo_type==1): ?>
    <div class="col-4 pt-4 pra_img ">
        <a href="javascript:;" onclick="openPhoto('<?php echo e($photo->id); ?>');">
            <img class="rounded" src="<?php echo e(URL::to('/')); ?>/public/images/photos/<?php echo e($photo->image_url); ?>">
        </a>
    </div>
<?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<?php else: ?>
<div class="row">
    <h1 class="text-center text-secondary my-5"><?php echo e(__('public.No_photos_available')); ?></h1>
</div>
<?php endif; ?>

<script>
    
  function openPhoto(photo_id) {
    $.ajax({
      url: '<?php echo e(route('fetchPhoto')); ?>' + '?photo_id=' + photo_id,
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
</script><?php /**PATH /home/demogswebtech/public_html/freely/resources/views/photos/show_all_photos.blade.php ENDPATH**/ ?>