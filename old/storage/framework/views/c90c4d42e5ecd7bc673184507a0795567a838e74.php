<div class="btun">   
    	        <a type="button" href="<?php echo e(route('secret-add',$member_details->user_id)); ?>" class="bg-standard-<?php echo e((request()->segment(1) == 'secret-add') ? 'violet text-white' : 'white text-dark'); ?> base-radius px-3 py-2 mr-1">
    	            <?php echo e(__('Secret Book')); ?> 
    	        </a>
    	    </div>
    	    <div class="btun3">
    	        <?php if(!empty($block_exists)): ?>
                <a href="javascript:void(0)" type="button" class="bg-standard-white text-dark base-radius px-3 py-2 mr-1">Blacklisted</a>
				<?php else: ?>
    	        <a href="javascript:void(0)" type="button" class="bg-standard-white text-dark base-radius px-3 py-2 mr-1" onclick="addBlacklist(<?php echo e($member_details->user_id); ?>)" 
    	        id="blacklist_btn<?php echo e($member_details->user_id); ?>"><?php echo e(__('Blacklist')); ?></a>
    	        <?php endif; ?>
    	        
                
            </div><?php /**PATH /home/demogswebtech/public_html/freely/resources/views/partials/pro-user-bar.blade.php ENDPATH**/ ?>