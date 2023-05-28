<div class="col-12 ">
    <div class="coment mt-5 rounded-4">
      <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-3 col-12 section_messages">
          <div class="hgt"> 
            <?php if(!empty($user_counter['member_details']->relUser->image_url)): ?> 
                <img class="rounded-circle" src="<?php echo e(URL::to('/')); ?>/public/images/users/<?php echo e($user_counter['member_details']->relUser->image_url); ?>" width="100" height="100"> 
            <?php else: ?> 
                <img class="rounded-circle" src="<?php echo e(URL::to('/')); ?>/public/images/no-user.png" width="100" height="100"> 
            <?php endif; ?> 
            </div>
          <h5><?php echo e($user_counter['member_details']->relUser->username); ?></h5>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-12 2section_messages"> 
            <div class="btun">   
    	        <a type="button" href="<?php echo e(route('user-activity',$user_counter['member_details']->user_id)); ?>" class="bg-standard-<?php echo e((request()->segment(1) == 'user-activity') ? 'violet text-white' : 'white text-dark'); ?> base-radius px-3 py-2 mr-1">
    	            <?php echo e(__('public.Activity')); ?> 
    	        </a>
    	    </div>
    	    <div class="btun">   
    	        <a type="button" href="<?php echo e(route('user-photos',$user_counter['member_details']->user_id)); ?>" class="bg-standard-<?php echo e((request()->segment(1) == 'user-photos') ? 'violet text-white' : 'white text-dark'); ?> base-radius px-3 py-2 mr-1">
    	            <?php echo e(__('public.Photo')); ?> 
    	        </a>
    	    </div>
    	    <div class="btun">   
    	        <a type="button" href="<?php echo e(route('user-videos',$user_counter['member_details']->user_id)); ?>" class="bg-standard-<?php echo e((request()->segment(1) == 'user-videos') ? 'violet text-white' : 'white text-dark'); ?> base-radius px-3 py-2 mr-1">
    	            <?php echo e(__('public.Video')); ?> 
    	        </a>
    	    </div>
    	    
    	    <div class="btun">   
    	        <a type="button" href="<?php echo e(route('secret-add',$user_counter['member_details']->user_id)); ?>" class="bg-standard-<?php echo e((request()->segment(1) == 'secret-add') ? 'violet text-white' : 'white text-dark'); ?> base-radius px-3 py-2 mr-1">
    	            <?php echo e(__('public.Secret_Book')); ?> 
    	        </a>
    	    </div>
    	    
    	    <div class="btun3">
    	        <?php if(!empty($user_counter['block_exists'])): ?>
                <a href="javascript:void(0)" type="button" class="bg-standard-white text-dark base-radius px-3 py-2 mr-1"><?php echo e(__('public.Blacklisted')); ?></a>
				<?php else: ?>
    	        <a href="javascript:void(0)" type="button" class="bg-standard-white text-dark base-radius px-3 py-2 mr-1" onclick="addBlacklist(<?php echo e($user_counter['member_details']->user_id); ?>)" 
    	        id="blacklist_btn<?php echo e($user_counter['member_details']->user_id); ?>"><?php echo e(__('public.Blacklist')); ?></a>
    	        <?php endif; ?>
    	        
                
            </div>
    	</div>
        <div class="col-lg-3 col-md-3 col-sm-3 col-12 3section_messages">
          <div class="float-right">
            <div class="profileButtons">
              <form action="#" method="POST" id="add_follow_form" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <input type="hidden" name="follow_to" value="<?php echo e($user_counter['member_details']->user_id); ?>">
                <input type="hidden" name="follow_from" value="<?php echo e(Auth::user()->id); ?>">
                <button type="submit" id="add_follow_btn" class="bg-standard-violet  base-radius text-white px-2 py-2 mr-2"> <?php if(!empty($user_counter['follow_exists'])): ?>
                + <?php echo e(__('public.following')); ?>

                <?php else: ?>
                + <?php echo e(__('public.follow')); ?>

                <?php endif; ?> </button>
              </form>
              <a href="<?php echo e(route('messages',$user_counter['member_details']->user_id)); ?>" class="bg-standard-white text-dark  base-radius px-2 py-2 mr-2"><?php echo e(__('public.Messages')); ?></a>
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