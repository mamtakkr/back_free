<!-- Modal Header -->
      
        <button type="button" class="close" data-dismiss="modal">&times;</button>

<div class="row h-100 justify-content-center "> 
    <div class="col-lg-12 col-md-12 col-sm-12">
      <div class="coment box_wold mt-3">
        <div class="row">
          <div class="col-3 px-0 ">
            <div class="text-center"> 
            
            <?php if(!empty($user->image_url)): ?> 
            <img class="rounded-circle" src="<?php echo e(URL::to('/')); ?>/public/images/users/<?php echo e($user->image_url); ?>" width="80" height="80"> 
            <?php else: ?> 
            <img class="rounded-circle" src="<?php echo e(URL::to('/')); ?>/public/images/no-user.png" width="80" height="80"> 
            <?php endif; ?> 
            
            </div>
          </div>
          <div class="col-9 heading">
            <h6><?php echo e($user->username); ?></h6>
            <p><?php echo e($user->you_are); ?></p>
            <p><i class="fa fa-map-marker" aria-hidden="true"></i>
                <?php if(!empty($user->relUserDetail->city)): ?> <?php echo e(strtoupper($user->relUserDetail->city)); ?> <?php endif; ?>
            </p>
          </div>
          <div class="col-12 px-0 heading">
            <h5 class="mt-1"><?php echo e($user->username); ?></h5>
            <p class="pragraf"> <?php if(!empty($user->relUserDetail->about)): ?>
              <?php
                                $string = $user->relUserDetail->about;
                                $string = strip_tags($string);
                                $character_count = strlen($string);
                                ?>
              <?php if($character_count > 300): ?>
              <?php echo substr($user->relUserDetail->about, 0,300); ?>...
              <?php else: ?>
              <?php echo $user->relUserDetail->about; ?>

              <?php endif; ?>
              <?php endif; ?> </p>
          </div>
          
            <div class="col-12">
                 <div class="row">
                    <div class="col-md-6"> 
                        <ul class="like">
                            <li class="pl-0">
                              <p><?php echo e($user->total_likes); ?></p>
                              <p>like</p>
                            </li>
                            <li>
                              <p><?php echo e($user->total_followers); ?></p>
                              <p>followers</p>
                            </li>
                          </ul>
                    </div>   
                    <?php if($participate->relEvent->user_id==Auth::user()->id): ?>
                      <div class="col-md-6 col-sm-6 col-12 text-right">
                    	 <div class="new_button_accept">
                    	     <?php if($participate->status!='pending'): ?>
                    	        <?php if($participate->status=='rejected'): ?>
                                <button type="submit" class="mt-3 rounded bg-standard-violet text-white  px-2 py-2">
                                Rejected
                                </button>
                                <?php else: ?>
                                <button type="submit" class="mt-3 rounded bg-standard-violet text-white  px-2 py-2">
                                Accepted
                                </button>
                                <?php endif; ?>
                    		 <?php else: ?>
                    		    <?php if($participate->status=='pending' || $participate->status=='rejected'): ?>
                                <form action="#" method="POST" id="add_accept_form" enctype="multipart/form-data">
                                    <?php echo csrf_field(); ?>
                                    <input type="hidden" name="event_id" value="<?php echo e($participate->event_id); ?>">
                                    <input type="hidden" name="participate_from" value="<?php echo e($participate->participate_from); ?>">
                                    <button type="submit" id="add_accept_btn" class="mt-3 rounded bg-standard-violet text-white  px-2 py-2">
                                    Accept
                                    </button>
                                </form>
                                <?php else: ?>
                                <button type="submit" class="mt-3 rounded bg-standard-violet text-white  px-2 py-2">
                                Accepted
                                </button>
                                <?php endif; ?>
                    		    
                    		    
                    		    
                    		    <?php if($participate->status=='pending' || $participate->status=='accepted'): ?>
                                <form action="#" method="POST" id="add_reject_form" enctype="multipart/form-data">
                                    <?php echo csrf_field(); ?>
                                    <input type="hidden" name="event_id" value="<?php echo e($participate->event_id); ?>">
                                    <input type="hidden" name="participate_from" value="<?php echo e($participate->participate_from); ?>">
                                    <button type="submit" id="add_reject_btn" class="mt-3 rounded bg-standard-violet text-white  px-2 py-2">
                                    Reject
                                    </button>
                                </form>
                                <?php else: ?>
                                <button type="submit" class="mt-3 rounded bg-standard-violet text-white  px-2 py-2">
                                Rejected
                                </button>
                                <?php endif; ?>
                            <?php endif; ?>
                    		    
                    		    
                    		    
                    	 </div>   
                    </div>
                    <?php endif; ?>
                </div> 
            </div>
        
        </div>
      </div>
    </div>
    </div>
    
    
    <script>
        
    $(function() {
        $("#add_accept_form").submit(function(e) {
            e.preventDefault();
            const fd = new FormData(this);
            $.ajax({
                url: '<?php echo e(route('accept-store')); ?>',
                method: 'post',
                data: fd,
                cache: false,
                contentType: false,
                processData: false,
                dataType: 'json',
                success: function(response) {
                    if (response.status == 200) {
                        $("#add_accept_btn").text('Accepted');
                        document.getElementById("add_accept_btn").disabled=true;
                        document.getElementById("add_reject_btn").style.visibility = 'hidden';
                        $("#add_accept_form")[0].reset();
                    }
                    
                    if (response.status == 400) {
                        $("#add_accept_btn").text('Limit Exceeded');
                        document.getElementById("add_accept_btn").disabled=true;
                        document.getElementById("add_reject_btn").style.visibility = 'hidden';
                        $("#add_accept_form")[0].reset();
                    }
                }
            });
        });
        
        $("#add_reject_form").submit(function(e) {
            e.preventDefault();
            const fd = new FormData(this);
            $.ajax({
                url: '<?php echo e(route('reject-store')); ?>',
                method: 'post',
                data: fd,
                cache: false,
                contentType: false,
                processData: false,
                dataType: 'json',
                success: function(response) {
                    if (response.status == 200) {
                        $("#add_reject_btn").text('Rejected');
                        document.getElementById("add_reject_btn").disabled=true;
                        document.getElementById("add_accept_btn").style.visibility = 'hidden';

                        $("#add_reject_form")[0].reset();
                    }
                }
            });
        });
        
    });
    </script><?php /**PATH /home/demogswebtech/public_html/freely/resources/views/events/show_participate.blade.php ENDPATH**/ ?>