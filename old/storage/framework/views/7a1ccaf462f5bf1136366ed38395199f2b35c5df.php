<!-- Modal Header -->
      
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      
<div class="row">
<?php if(!empty($post->image_url)): ?>
  <div class="col-md-6">
    <div class="col-12 text-center"> 
	
	
    <img class="fsdew rounded" src="<?php echo e(URL::to('/')); ?>/public/images/posts/<?php echo e($post->image_url); ?>">
	
	
	</div>
  </div>
  <?php endif; ?>
  <div class="<?php if(!empty($post->image_url)): ?> col-md-6 <?php else: ?> offset-md-3 col-md-6 <?php endif; ?>">
    <div class="">
	<div class="row">
	<div class="col-md-4">
	<?php if(!empty($post->relUser->image_url)): ?> <img src="<?php echo e(URL::to('/')); ?>/public/images/users/<?php echo e($post->relUser->image_url); ?>" class="user-profile"> <?php else: ?> <img src="<?php echo e(URL::to('/')); ?>/public/images/no-user.png" class="user-profile"> <?php endif; ?>
	</div>
	<div class="col-md-8">
	<div class="post-info">
	<h6 class="text-white"><?php echo e($post->relUser->username); ?></h6>
      <p><?php echo e($post->description); ?></p>
	  </div>
	  </div>
	</div>
	
	<div class="show_comments" id="show_post_comment<?php echo e($post->id); ?>">
	<?php if(!empty($post->all_comments)): ?>
	<?php $__currentLoopData = $post->all_comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <div class="row">
        <div class="col-md-12">
		<?php $userInfo = \App\Models\User::where('id',$comment->user_id)->first(); ?>
          <p><strong><?php echo e($userInfo->username ?? '-'); ?>: </strong><?php echo e($comment->comment); ?></p> 
        </div>
      </div>
	  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		<?php endif; ?>
		</div>
      
      
      <hr />
      <div class="col-sm-12 col-12 post-comment">
        <form action="#" method="POST" class="add_comment_form" id="myFrm<?php echo e($post->id); ?>" enctype="multipart/form-data">
          <?php echo csrf_field(); ?>
          <div class="gter text-center emoji-picker-container">
            <input type="hidden" name="user_id" value="<?php echo e(Auth::user()->id); ?>">
            <input type="hidden" name="post_id" value="<?php echo e($post->id); ?>">
			<input type="hidden" name="comment_limit" value="no">
            <input class="form-control" type="text" name="comment" data-emojiable="true" id="comments" value="<?php echo e(old('comment')); ?>">
            <button type="submit" id="add_comment_btn" class="bg-standard-violet text-while">Publish</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>-->
<!--<script>
        (function() {
			alert("show_post_comment<?php echo e($post->id); ?>");
            var objDiv = document.getElementById("show_post_comment<?php echo e($post->id); ?>");
			alert(objDiv.scrollHeight);
            objDiv.scrollTop = objDiv.scrollHeight;
        });
    </script>-->
<?php /**PATH /home/demogswebtech/public_html/freely/resources/views/posts/show_post.blade.php ENDPATH**/ ?>