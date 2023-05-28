
<div class="contact-profile" id="userSection">
	<img src="<?php echo e(URL::to('/')); ?>/public/images/users/<?php echo e($user->image_url); ?>" alt="<?php echo e($user->username); ?>">
	<div class="user_detalis">
	    <p><?php echo e($user->username); ?> <br>
    	    <span class="new_name">
    	        <?php if($user->user_type=='member'): ?> <?php echo e($user->you_are); ?> <?php else: ?> <?php echo e($user->club_name); ?> <?php endif; ?>
    	    </span>
	    </p>
	    
	</div>   
</div>


<div class="messages" id="conversation">
	<ul>
        <?php $messages = getUserChat($user->id,Auth::user()->id);?>
        <?php if($messages->count()>0): ?>
            <?php $__currentLoopData = $messages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $msg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
        <?php endif; ?>
    </ul>
</div>

<div class="message-input" id="replySection">
	<div class="message-input" id="replyContainer">
		<div class="wrap emoji-picker-container">
		    <input class="chatMessage" type="text" name="message" data-emojiable="true" id="chatMessage<?php echo e($user->id); ?>" autocomplete="off"  placeholder="Write your message...">
			<button class="submit chatButton" id="chatButton<?php echo e($user->id); ?>"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
		</div>
	</div>
</div>


<script src="<?php echo e(URL::to('/')); ?>/public/frontend/emoji/js/config.min.js"></script>
<script src="<?php echo e(URL::to('/')); ?>/public/frontend/emoji/js/util.min.js"></script>
<script src="<?php echo e(URL::to('/')); ?>/public/frontend/emoji/js/jquery.emojiarea.min.js"></script>
<script src="<?php echo e(URL::to('/')); ?>/public/frontend/emoji/js/emoji-picker.min.js"></script>
<script>
  $(function() {
    // Initializes and creates emoji set from sprite sheet
    window.emojiPicker = new EmojiPicker({
      emojiable_selector: '[data-emojiable=true]',
      assetsPath: '<?php echo e(URL::to('/')); ?>/public/frontend/emoji/img/',
      popupButtonClasses: 'fa fa-smile-o'
    });

    window.emojiPicker.discover();
  });

</script>
<?php /**PATH /home/demogswebtech/public_html/freely/resources/views/msg/userSection.blade.php ENDPATH**/ ?>