


<ul>
    <?php $__currentLoopData = $conversation; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $msg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php if($msg->sender_id==auth()->user()->id && $msg->receiver_id==$user->id || $msg->sender_id==$user->id && $msg->receiver_id==auth()->user()->id): ?>
        <?php if($msg->sender_id==auth()->user()->id): ?>
    	<li class="incoming sent">
    	    <img width="22px" height="22px" src="<?php echo e(URL::to('/')); ?>/public/images/users/<?php echo e($msg->relSender->image_url); ?>" alt="<?php echo e($msg->relSender->username); ?>">
    		<p><?php echo e($msg->message); ?> <br> <?php echo e($msg->created_at->diffForHumans(null,false,true)); ?></p>
    	</li>
    	<?php else: ?>
    	<li class="outgoing sent">
    	    <img width="22px" height="22px" src="<?php echo e(URL::to('/')); ?>/public/images/users/<?php echo e($msg->relSender->image_url); ?>" alt="<?php echo e($msg->relSender->username); ?>">
    		<p><?php echo e($msg->message); ?> <br> <?php echo e($msg->created_at->diffForHumans(null,false,true)); ?></p>
    	</li>
    	<?php endif; ?>
    <?php endif; ?>
	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</ul>


<?php /**PATH /home/demogswebtech/public_html/freely/resources/views/msg/conversation.blade.php ENDPATH**/ ?>