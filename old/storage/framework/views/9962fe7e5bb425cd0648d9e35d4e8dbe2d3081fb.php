<ul id="new_contact">
    <?php 
        $currentSession = '';
        $x=1; 
    ?>
    <?php if(!empty($members)): ?>
    <?php if(!empty($members[0]->id)): ?>
    <?php $currentSession = $members[0]->id; ?>
    <?php $__currentLoopData = $members; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    
	<li id="<?php echo e($user->id); ?>" class="contact <?php if($x==1): ?> active <?php endif; ?>" data-touserid="<?php echo e($user->id); ?>" data-tousername="<?php echo e($user->username); ?>">
		<div class="wrap"><span id="status_<?php echo e($user->id); ?>" class="contact-status <?php if($user->online==1): ?> online <?php else: ?> offline <?php endif; ?>"></span>
			<img src="<?php echo e(URL::to('/')); ?>/public/images/users/<?php echo e($user->image_url); ?>" alt="<?php echo e($user->username); ?>">
			<div class="meta">
			    <?php if($x % 2 == 0): ?>
                <p style="color: #F50087;font-size:20px;" class="user_name"><?php echo e($user->username); ?></p> 
                <?php else: ?>
                <p style="color: #50A8E2;font-size:20px;" class="user_name"><?php echo e($user->username); ?></p> 
                <?php endif; ?>
				<span id="unread_<?php echo e($user->id); ?>" class="unread"></span></p>
				<p class="second_name"><?php if($user->user_type=='member'): ?> <?php echo e($user->you_are); ?> <?php else: ?> <?php echo e($user->club_name); ?> <?php endif; ?></p>
				<p class="preview"><span id="isTyping_<?php echo e($user->id); ?>" class="isTyping"></span></p>
			</div>
		</div>
	</li>
	<?php $x++;?>
	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	<?php else: ?>
	<?php //$auth_user=\App\Models\User::where('id',Auth::user()->id)->pluck('current_session')->first();?>
	<?php //$user=\App\Models\User::where('id',$auth_user)->first();?>
    
	<?php endif; ?>
	<?php endif; ?>
	
	
</ul><?php /**PATH /home/demogswebtech/public_html/freely/resources/views/msg/userLists.blade.php ENDPATH**/ ?>