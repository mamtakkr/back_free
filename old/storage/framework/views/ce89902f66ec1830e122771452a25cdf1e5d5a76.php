<div class="col-12 ">
    <div class="coment mt-5 rounded-4">
      <div class="row">
        <div class="col-3">
          <div class="hgt"> 
            <?php if(!empty($user_counter['member_details']->relUser->image_url)): ?> 
                <img class="rounded-circle" src="<?php echo e(URL::to('/')); ?>/public/images/users/<?php echo e($user_counter['member_details']->relUser->image_url); ?>" width="100" height="100"> 
            <?php else: ?> 
                <img class="rounded-circle" src="<?php echo e(URL::to('/')); ?>/public/images/no-user.png" width="100" height="100"> 
            <?php endif; ?> 
            </div>
          <h5><?php echo e($user_counter['member_details']->relUser->username); ?></h5>
        </div>
        <div class="col-6"> 
            <div class="btun">   
    	        <a type="button" href="<?php echo e(route('user-activity',$user_counter['member_details']->user_id)); ?>" class="bg-standard-<?php echo e((request()->segment(1) == 'secret-add') ? 'violet text-white' : 'white text-dark'); ?> base-radius px-3 py-2 mr-1">
    	            <?php echo e(__('Activity')); ?> 
    	        </a>
    	    </div>
    	    <div class="btun">   
    	        <a type="button" href="<?php echo e(route('user-photos',$user_counter['member_details']->user_id)); ?>" class="bg-standard-<?php echo e((request()->segment(1) == 'secret-add') ? 'violet text-white' : 'white text-dark'); ?> base-radius px-3 py-2 mr-1">
    	            <?php echo e(__('Photo')); ?> 
    	        </a>
    	    </div>
    	    <div class="btun">   
    	        <a type="button" href="<?php echo e(route('secret-add',$user_counter['member_details']->user_id)); ?>" class="bg-standard-<?php echo e((request()->segment(1) == 'secret-add') ? 'violet text-white' : 'white text-dark'); ?> base-radius px-3 py-2 mr-1">
    	            <?php echo e(__('Video')); ?> 
    	        </a>
    	    </div>
    	    
    	    <div class="btun">   
    	        <a type="button" href="<?php echo e(route('secret-add',$user_counter['member_details']->user_id)); ?>" class="bg-standard-<?php echo e((request()->segment(1) == 'secret-add') ? 'violet text-white' : 'white text-dark'); ?> base-radius px-3 py-2 mr-1">
    	            <?php echo e(__('Secret Book')); ?> 
    	        </a>
    	    </div>
    	    
    	    <div class="btun3">
    	        <?php if(!empty($user_counter['block_exists'])): ?>
                <a href="javascript:void(0)" type="button" class="bg-standard-white text-dark base-radius px-3 py-2 mr-1">Blacklisted</a>
				<?php else: ?>
    	        <a href="javascript:void(0)" type="button" class="bg-standard-white text-dark base-radius px-3 py-2 mr-1" onclick="addBlacklist(<?php echo e($user_counter['member_details']->user_id); ?>)" 
    	        id="blacklist_btn<?php echo e($user_counter['member_details']->user_id); ?>"><?php echo e(__('Blacklist')); ?></a>
    	        <?php endif; ?>
    	        
                
            </div>
    	</div>
        <div class="col-3">
          <div class="float-right">
            <div class="profileButtons">
              <form action="#" method="POST" id="add_follow_form" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <input type="hidden" name="follow_to" value="<?php echo e($user_counter['member_details']->user_id); ?>">
                <input type="hidden" name="follow_from" value="<?php echo e(Auth::user()->id); ?>">
                <button type="submit" id="add_follow_btn" class="bg-standard-violet  base-radius text-white px-2 py-2 mr-2"> <?php if(!empty($user_counter['follow_exists'])): ?>
                + following
                <?php else: ?>
                + follow
                <?php endif; ?> </button>
              </form>
              <a href="<?php echo e(route('messages',$user_counter['member_details']->user_id)); ?>" class="bg-standard-white text-dark  base-radius px-2 py-2 mr-2">Messages</a>
              <form action="#" method="POST" id="add_like_form" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <input type="hidden" name="like_to" value="<?php echo e($user_counter['member_details']->user_id); ?>">
                <input type="hidden" name="like_from" value="<?php echo e(Auth::user()->id); ?>">
                <button type="submit" id="add_like_btn" class="fa <?php if(!empty($user_counter['like_exists'])): ?> fa-heart <?php else: ?> fa-heart-o <?php endif; ?>"></button>
                <!--<a href=""> <i class="fa fa-heart-o" aria-hidden="true"></i> </a>-->
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div><?php /**PATH /home/demogswebtech/public_html/freely/resources/views/partials/member-bar.blade.php ENDPATH**/ ?>