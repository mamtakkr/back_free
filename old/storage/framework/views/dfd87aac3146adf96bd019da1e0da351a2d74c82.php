<?php $__env->startSection('content'); ?>
<div class="container ">
  <div class="row h-100 "> 
  <?php $__currentLoopData = $visits; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $visit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  <?php if(empty(get_block($visit->who_visit))): ?>
    <?php $userInfo = \App\Models\UserDetail::where('user_id',$visit->who_visit)->first(); ?>
    
    <div class="col-lg-4 col-md-6 col-sm-6">
      <div class="coment box_wold mt-3">
        <div class="row">
          <div class="col-3 px-0 ">
            <div class="text-center"> 
            <?php if(!empty($visit->userDetails->id)): ?>
            <a href="<?php echo e(route('member-details',$visit->userDetails->id)); ?>"> 
                <?php if(!empty($visit->userDetails->image_url)): ?> 
                <img class="rounded-circle" src="<?php echo e(URL::to('/')); ?>/public/images/users/<?php echo e($visit->userDetails->image_url); ?>" width="80" height="80"> 
                <?php else: ?> 
                <img class="rounded-circle" src="<?php echo e(URL::to('/')); ?>/public/images/no-user.png" width="80" height="80"> 
                <?php endif; ?> 
            </a> 
            <?php endif; ?>
            </div>
          </div>
          <div class="col-9 heading">
            <h6><?php if(!empty($visit->userDetails->username)): ?> <?php echo e($visit->userDetails->username); ?> <?php endif; ?></h6>
            <!--<p> complues heterous</p>-->
            <p><i class="fa fa-map-marker" aria-hidden="true"></i>
                <?php if(!empty($userInfo->city)): ?> <?php echo e(strtoupper($userInfo->city)); ?> <?php endif; ?>
            </p>
          </div>
          <div class="col-12 px-0 heading">
            <h5 class="mt-1"><?php if(!empty($visit->userDetails->username)): ?> <?php echo e($visit->userDetails->username); ?> <?php endif; ?></h5>
            <p class="pragraf"> <?php if(!empty($userInfo->about)): ?>
              <?php
                                $string = $userInfo->about;
                                $string = strip_tags($string);
                                $character_count = strlen($string);
                                ?>
              <?php if($character_count > 300): ?>
              <?php echo substr($userInfo->about, 0,300); ?>...
              <?php else: ?>
              <?php echo $userInfo->about; ?>

              <?php endif; ?>
              <?php endif; ?> </p>
			  
			  
			 <center><a href="javascript:;" class="btn btn-empty btn-pink"><?php echo e(date('d M Y h:i A',strtotime($visit->created_at))); ?></a></center>
			  
			  
          </div>
        </div>
      </div>
    </div>
    <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/demogswebtech/public_html/freely/resources/views/visits.blade.php ENDPATH**/ ?>