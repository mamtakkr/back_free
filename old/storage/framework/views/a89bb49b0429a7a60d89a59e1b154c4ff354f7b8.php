<?php if($events->count() > 0): ?>
<?php $__currentLoopData = $events; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<?php //$user = \App\Models\Blacklist::where(['to_id'=>$event->user_id, 'from_id'=>Auth::user()->id])->first(); ?>
<?php if(empty(get_block($event->user_id))): ?>
    <?php if(!empty($event->relUser)): ?>
    <div class="col-lg-4 col-md-6 col-sm-6 event_new"> 
    <a class="w-100 text-white" href="<?php echo e(route('event-details',$event->id)); ?>">
      <div class="coment bg-standard-violet p-0 mt-3">
        <div class="row">
          <div class="col-12 gfr px-0 ">
            <div class="date_photo"> 
            <?php if(!empty($event->banner)): ?> 
            <img src="<?php echo e(URL::to('/')); ?>/public/images/events/<?php echo e($event->banner); ?>"> 
            <?php else: ?> 
            <img src="<?php echo e(URL::to('/')); ?>/public/images/default.jpg"> 
            <?php endif; ?>
            </div>
          </div>
          <div class=" octr ">
            <ul class="like">
              <li class="bg-standard-white base-radius px-2 py-2 text-dark mr-2 text-center ">
                <p><?php echo e(date('d',strtotime($event->start_date))); ?></p>
                <p><?php echo e(date('F',strtotime($event->start_date))); ?></p>
              </li>
              <li class="bg-standard-white base-radius px-2 py-2 text-dark mr-2 text-center">
                <p><?php echo e($event->total_participates); ?></p>
                <p><i class="fa fa-user" aria-hidden="true"></i></p>
              </li>
            </ul>
          </div>
          <div class=" m-3">
            <div class="text_tr">
              <p class="m-0"><span><?php echo e(date('d M Y',strtotime($event->start_date))); ?></span> - <span><?php echo e(date('d M Y',strtotime($event->end_date))); ?></span></p>
              <p class="text_events">
                  <?php
                    $string = strip_tags($event->description);
                    $character_count = strlen($string);
                    ?>
                    <?php if($character_count > 100): ?>
                    <?php echo e(substr($event->description,0,100)); ?>...
                    <?php else: ?>
                    <?php echo e($event->description); ?>

                    <?php endif; ?>
                  
              </p>
              <ul class="like">
                <li class="pl-0"><a class="bg-standard-white base-radius px-2 py-2 text-dark text-center" href="javascript:;"><?php echo e($event->event_category); ?></a></li>
                <li> <a class="bg-standard-white base-radius px-2 py-2 text-dark text-center" href="javascript:;"><?php echo e($event->event_type); ?></a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      </a> </div>
    </div>
    <?php endif; ?>
<?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php else: ?>
<div class="col-12 mt-4">
  <div class="row h-100 justify-content-center" id="show_events">
    <div class="coment mt-3 rounded">
      <h1 class="text-center text-secondary my-5">No Event Found In The Record!</h1>
    </div>
  </div>
</div>
<?php endif; ?><?php /**PATH /home/demogswebtech/public_html/freely/resources/views/events/show_all_events.blade.php ENDPATH**/ ?>