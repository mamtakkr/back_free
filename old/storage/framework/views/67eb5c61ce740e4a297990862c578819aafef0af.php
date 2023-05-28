<?php if($members->count() > 0): ?>
<!--<div class="row h-100 "> -->
    <?php $__currentLoopData = $members; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $member): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php //$user = \App\Models\Blacklist::where(['to_id'=>$member->user_id, 'from_id'=>Auth::user()->id])->first(); ?>
    <?php if(empty(get_block($member->user_id))): ?>
    <div class="col-lg-4 col-md-6 col-sm-6">
      <div class="coment box_wold mt-3">
        <div class="row">
          <div class="col-3 px-0 ">
            <div class="text-center"> 
            <a href="<?php echo e(route('member-details',$member->user_id)); ?>"> 
            <?php if(!empty($member->image_url)): ?> 
            <img class="rounded-circle" src="<?php echo e(URL::to('/')); ?>/public/images/users/<?php echo e($member->image_url); ?>" width="80" height="80"> 
            <?php else: ?> 
            <img class="rounded-circle" src="<?php echo e(URL::to('/')); ?>/public/images/no-user.png" width="80" height="80"> 
            <?php endif; ?> 
            </a> 
            </div>
          </div>
          <div class="col-9 heading">
            <h6><?php echo e($member->username); ?></h6>
            <p><?php echo e($member->you_are); ?></p>
            <p><i class="fa fa-map-marker" aria-hidden="true"></i>
                <?php if(!empty($member->city)): ?> <?php echo e(strtoupper($member->city)); ?> <?php endif; ?>
            </p>
          </div>
          <div class="col-12 px-0 heading">
            <h5 class="mt-1"><?php echo e($member->username); ?></h5>
            <p class="pragraf"> <?php if(!empty($member->about)): ?>
              <?php
                                $string = $member->about;
                                $string = strip_tags($string);
                                $character_count = strlen($string);
                                ?>
              <?php if($character_count > 300): ?>
              <?php echo substr($member->about, 0,300); ?>...
              <?php else: ?>
              <?php echo $member->about; ?>

              <?php endif; ?>
              <?php endif; ?> </p>
          </div>
          <ul class="like">
            <li class="pl-0">
              <p><?php echo e($member->total_likes); ?></p>
              <p>like</p>
            </li>
            <li>
              <p><?php echo e($member->total_followers); ?></p>
              <p>followers</p>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
<!--</div>-->
<?php else: ?>
<div class="col-12 mt-4">
  <div class="row h-100 justify-content-center" id="show_members">
    <div class="coment mt-3 rounded">
      <h1 class="text-center text-secondary my-5">No Member Found In The Record!</h1>
    </div>
  </div>
</div>
<?php endif; ?><?php /**PATH /home/demogswebtech/public_html/freely/resources/views/members/show_members.blade.php ENDPATH**/ ?>