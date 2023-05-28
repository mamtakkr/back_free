<div class="col-12">
  <div class="coment mt-5 rounded-4">
    <div class="row">
      <div class="col-3">
        <div class="hgt"> 
		    <?php if(!empty($user_info->image_url)): ?> 
		        <img class="rounded-circle" src="<?php echo e(URL::to('/')); ?>/public/images/users/<?php echo e($user_info->image_url); ?>" width="100" height="100"> 
		    <?php else: ?> 
		        <img class="rounded-circle" src="<?php echo e(URL::to('/')); ?>/public/images/no-user.png" width="100" height="100"> 
		    <?php endif; ?>
		
		</div>
        <h5><?php echo e($user_info->username); ?></h5>
      </div>
      <div class="col-6"> 
	  <a type="button" href="<?php echo e(url('userPosts')); ?>" class="bg-standard-<?php echo e((request()->segment(1) == 'userPosts') ? 'violet text-white' : 'white text-dark'); ?> base-radius px-3 py-2 mr-1"> <?php echo e(__('Activity')); ?></a> 
	  <a type="button" href="<?php echo e(url('photos')); ?>" class="bg-standard-<?php echo e((request()->segment(1) == 'photos') ? 'violet text-white' : 'white text-dark'); ?>  base-radius px-3 py-2 mr-1"> <?php echo e(__('Photo')); ?></a> 
	  <a type="button" href="<?php echo e(url('videos')); ?>" class="bg-standard-<?php echo e((request()->segment(1) == 'videos') ? 'violet text-white' : 'white text-dark'); ?> base-radius px-3 py-2 mr-1"> <?php echo e(__('Video')); ?></a> 
	  <a type="button" href="<?php echo e(url('secrets')); ?>" class="bg-standard-<?php echo e((request()->segment(1) == 'secrets') ? 'violet text-white' : 'white text-dark'); ?> base-radius px-3 py-2 mr-1"> <?php echo e(__('Secret Book')); ?></a> 
      <a href="<?php echo e(route('messages')); ?>" class="bg-standard-<?php echo e((request()->segment(1) == 'messages') ? 'violet text-white' : 'white text-dark'); ?>  base-radius px-2 py-2 mr-2"> Messages </a>
	  </div>
      <div class="col-3 border border-light">
	  
	    <div class="row">
          <div class="col-6 px-0 py-1 text-center border-right">
            <div class="text-center">
              <p><?php echo e(__('Follows')); ?></p>
            <p><?php echo e(count(App\Models\Follow::where('follow_to', $user_info->id)->get())); ?></p>
            </div>
          </div>
          <div class="col-6 py-1 text-center heading">
            <p><?php echo e(__('Like')); ?></p>
            <p><?php echo e(count(App\Models\Like::where('like_to', $user_info->id)->get())); ?></p>
          </div>
        </div>
	  
      </div>
    </div>
  </div>
</div>
<?php /**PATH /home/demogswebtech/public_html/freely/resources/views/partials/user-bar.blade.php ENDPATH**/ ?>