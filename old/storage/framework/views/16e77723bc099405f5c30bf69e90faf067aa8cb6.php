<?php if($comments->count() > 0): ?>
<?php $__currentLoopData = $comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<?php $userInfo = \App\Models\User::where('id',$comment->user_id)->first(); ?>
<div class="row">
    <div class="col-md-12">
	<p><strong><?php echo e($userInfo->username ?? '-'); ?>: </strong><?php echo e($comment->comment); ?></p> 
       </div>
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?><?php /**PATH /home/demogswebtech/public_html/freely/resources/views/posts/show_all_comments.blade.php ENDPATH**/ ?>