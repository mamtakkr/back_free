<?php if($professionals->count()>0): ?>
<?php $__currentLoopData = $professionals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="col-lg-3 col-md-6 col-sm-6">	
    <a href="<?php echo e(route('professional-details',$pro->user_id)); ?>">
	<div class="coment mt-3 new_profie">
		<div class="row">
			<div class="col-12 px-0 ">
					<div class="text-center">
						<a href="<?php echo e(route('professional-details',$pro->user_id)); ?>"> 
                        <?php if(!empty($pro->image_url)): ?> 
                        <img class="rounded-circle" src="<?php echo e(URL::to('/')); ?>/public/images/users/<?php echo e($pro->image_url); ?>" width="80" height="80"> 
                        <?php else: ?> 
                        <img class="rounded-circle" src="<?php echo e(URL::to('/')); ?>/public/images/no-user.png" width="80" height="80"> 
                        <?php endif; ?> 
                        </a>
					</div>
					<h5><?php echo e($pro->username); ?></h5>
			</div>
			
			<div class="col-12 px-0 heading" >
				
				<p><?php echo e($pro->club_name); ?></p>
				<p><i class="fa fa-map-marker" aria-hidden="true"></i>
				    <?php if(!empty($pro->city)): ?> <?php echo e(strtoupper($pro->city)); ?> <?php endif; ?>
				</p>
			</div>
		</div>
	</div>
	</a>
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php else: ?>
<div class="col-12 mt-4">
  <div class="row h-100 justify-content-center" id="show_professionals">
    <div class="coment mt-3 rounded">
      <h1 class="text-center text-secondary my-5">No Professional Found In The Record!</h1>
    </div>
  </div>
</div>
<?php endif; ?>

<?php /**PATH /home/demogswebtech/public_html/freely/resources/views/professionals/show_professionals.blade.php ENDPATH**/ ?>