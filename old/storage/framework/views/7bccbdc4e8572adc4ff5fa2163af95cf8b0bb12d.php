<div class="container ">
  <div class="heading text-center pt-2">
    <h4>New Member</h4>
  </div>
  <div class="row h-100 justify-content-center">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 login-area pt-2 pb-3">
      <div class="owl-carousel owl-theme"> 
        <?php $__currentLoopData = $members; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $member): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if(empty(get_block($member->id))): ?>
            <a href="<?php echo e(route('member-details',$member->id)); ?>">
                <div class="item"> 
                  <div class="fsesd">
                    <div class="usdsd"> 
                        <?php if(!empty($member->image_url)): ?> 
                            <img src="<?php echo e(URL::to('/')); ?>/public/images/users/<?php echo e($member->image_url); ?>"> 
                        <?php else: ?> 
                            <img src="<?php echo e(URL::to('/')); ?>/public/images/no-user.png"> 
                        <?php endif; ?> 
                    </div>
                    <div class="text_t">
                      <h5> <?php echo e($member->username); ?> </h5>
                    </div>
                  </div>
                </div>
            </a>
        <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
      </div>
    </div>
  </div>
</div>
<div class="container">
  <div class="row h-100 justify-content-center">
    <div class="col-xl-2 col-lg-2 col-md-12 col-sm-12 login-area pt-5 pb-3">
	<video autoplay="" muted="" loop="" id="myVideo" style="height: 412px; width: 110%;object-fit: cover;object-position: center center;opacity: 1;">
	  <source src="https://video.wixstatic.com/video/eab394_e27438dbd7b64a9282dc088e3998336f/720p/mp4/file.mp4" type="video/mp4">
	</video>
      <div class="bg-img text-center" style="position: absolute;top: 50px;">
        <div class="profie">
        <?php if(Auth::user()->user_type=='professional'): ?>
        <a href="<?php echo e(route('professional-details',Auth::user()->id)); ?>">
        <?php else: ?>
        <a href="<?php echo e(route('member-details',Auth::user()->id)); ?>">
        <?php endif; ?>
            <div class="round"> 
            <?php if(!empty(Auth::user()->image_url)): ?> 
            <img src="<?php echo e(URL::to('/')); ?>/public/images/users/<?php echo e(Auth::user()->image_url); ?>"> 
            <?php else: ?> 
            <img src="<?php echo e(URL::to('/')); ?>/public/images/no-user.png"> 
            <?php endif; ?> 
            </div>
            <h5><?php echo e(Auth::user()->username); ?><span></span></h5>
        </a>
          <!--<p class="text-white">lorem ipsum</p>-->
          <div class="frd text-left">
            <p><i class="fa fa-user" aria-hidden="true"></i><a href="<?php echo e(route('profile-edit',Auth::user()->id)); ?>"> Profile Settings</a></p>
            <p><i class="fa fa-ban" aria-hidden="true"></i><a href="<?php echo e(route('blacklist-show',Auth::user()->id)); ?>">Blacklisted</a></p>
            <!--<p><i class="fa fa-ban" aria-hidden="true"></i><a href="<?php echo e(route('request-photos-show',Auth::user()->id)); ?>">Request For Private Photos</a></p>-->
            <p><i class="fa fa-thumbs-o-up" aria-hidden="true"></i><a href="<?php echo e(route('subscriptions',Auth::user()->id)); ?>">Subscriptions</a></p>
            
            <p><i class="fa fa-trash" aria-hidden="true"></i>
            <form name="myForm" method="POST" action="<?php echo e(route('account-delete',Auth::user()->id)); ?>">
                                                        <?php echo csrf_field(); ?>
                                                        <input type="hidden" name="_method" value="Delete" />
                                                        <a href="#" class="dltBtn" data-id="<?php echo e(Auth::user()->id); ?>">
                                                           Delete My Account
                                                        </a>
                                                    </form></p>
            <p><i class="fa fa-sign-out"></i> 
                <a href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> 
                    <?php echo e(__('Logout')); ?> 
                </a>
                <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                <?php echo csrf_field(); ?>
                </form>
            </p>
          </div>
        </div>
        <div class="view"> 
		<ul>
		    <li>
		        <a href="<?php echo e(url('visits')); ?>" class="text-white w-100 border border-white rounded mt-2" type="button">
		            <i class="fa fa-user" aria-hidden="true"></i> Visits <span><?php echo e($counters['visits']); ?></span>
		        </a>
		    </li> 
		<?php if(Auth::user()->user_type=='member'): ?>
    		<li>
    		    <a href="<?php echo e(url('messages')); ?>" class="text-white w-100 border border-white rounded mt-2" type="button">
    		        <i class="fa fa-envelope-o" aria-hidden="true"></i> Messages <span>0</span>
    		    </a>
    		</li> 
    		<li>
    		    <a href="<?php echo e(url('secrets')); ?>" class="text-white w-100 border border-white rounded mt-2" type="button">
    		        <i class="fa fa-star" aria-hidden="true"></i> Secret Book <span><?php echo e($counters['secrets']); ?></span>
    		    </a>
    		</li>  
    		<li>
    		    <a href="<?php echo e(url('videos')); ?>" class="text-white w-100 border border-white rounded mt-2" type="button">
    		        <i class="fa fa-camera-retro" aria-hidden="true"></i> My Videos <span><?php echo e($counters['videos']); ?></span>
    		    </a>
    		</li> 
		<?php endif; ?>
		    <li>
		        <a href="<?php echo e(url('photos')); ?>" class="text-white w-100 border border-white rounded mt-2" type="button">
		            <i class="fa fa-camera" aria-hidden="true"></i> My Pictures <span><?php echo e($counters['pictures']); ?></span>
		        </a>
		    </li>  
		    <li>
		        <a href="<?php echo e(route('request-photos-show',Auth::user()->id)); ?>" class="text-white w-100 border border-white rounded mt-2" type="button">
		            <i class="fa fa-camera" aria-hidden="true"></i> <?php echo e(__('Request For Private Photos')); ?> <span><?php echo e($counters['pri_photos']); ?></span>
		        </a>
		    </li>  
		</ul> 
		
		</div>
      </div>
    </div>
    <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 login-area pt-5 pb-3">
      <div class="coment rounded">
        <div class="row">
          <div class="col-sm-2 col-4">
            <div class="round text-center"> <?php if(!empty(Auth::user()->image_url)): ?> <img src="<?php echo e(URL::to('/')); ?>/public/images/users/<?php echo e(Auth::user()->image_url); ?>"> <?php else: ?> <img src="<?php echo e(URL::to('/')); ?>/public/images/no-user.png"> <?php endif; ?> </div>
          </div>
          <div class="col-sm-10 col-8">
            <form action="#" method="POST" id="add_post_form" enctype="multipart/form-data">
              <?php echo csrf_field(); ?>
              <div class="foem">
                <textarea class="form-control" type="text" name="description" style="resize: none;"><?php echo e(old('description')); ?></textarea>
                <span id="des_errors" style="color:red;"></span> </div>
              <div class="row">
                <div class="col-lg-4 col-sm-3 col-8">
                  <div class="uplod text-center mt-2"> <a type="button" href="javascript:;" class="chooseFile"><i class="fa fa-upload" aria-hidden="true"></i> Photo</a>
                    <input type="file" name="image_url" id="image_url" class="" style="display:none;">
                    <span id="img_errors" style="color:red;"></span> </div>
                </div>
                <div class="col-lg-4 col-sm-3 col-4"> </div>
                <div class="col-sm-4 col-8">
                  <div class="bujer text-center mt-2">
                    <button type="submit" id="add_post_btn" class="bg-standard-violet">Publish</button>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
      <div class="rounded" id="show_all_posts">
        <div class="coment mt-3 rounded">
          <h1 class="text-center text-secondary my-5">Loading...</h1>
        </div>
      </div>
    </div>
    <div class="col-xl-2 col-lg-2 col-md-12 col-sm-12 login-area pt-5 pb-3">
      <div class="coment px-1 py-3 rounded"> 
        <?php $__currentLoopData = $members; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $member): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if(empty(get_block($member->id))): ?>
            <div class="row mt-2 align-items-center ">
              <div class="col-5 px-0">
                <div class="<?php if($member->online==1): ?> img_status_online <?php else: ?> img_status_offline <?php endif; ?> round text-center"> 
                <?php if(!empty($member->image_url)): ?> 
                    <img src="<?php echo e(URL::to('/')); ?>/public/images/users/<?php echo e($member->image_url); ?>"> 
                <?php else: ?> 
                    <img src="<?php echo e(URL::to('/')); ?>/public/images/no-user.png"> 
                <?php endif; ?> 
                </div>
              </div>
              <div class="col-7 px-1">
                <h6 class="text-white mb-0 name_online "><?php echo e($member->username); ?></h6>
              </div>
            </div>
        <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> </div>
    </div>
  </div>
</div>
</div>

<?php if(!empty(auth()->user()->trial_ends_at) && Auth::user()->trial_ends_at > date("Y-m-d")): ?>
<div class="modal fade" id="daysModal" tabindex="-1" aria-labelledby="exampleModalLabel" data-backdrop="static" aria-modal="true" role="dialog">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">×</button>
      </div>
      
        <div class="modal-body">
            

            <?php if(!empty(auth()->user()->trial_ends_at)): ?>
            <p>You are on a free trial of 7 days for using this website. After 7 days, you will have to subscribe to the plan.</p>
                <p>Your trial days left - <?php echo e(Carbon::now()->diffInDays(\Carbon\Carbon::parse(auth()->user()->trial_ends_at))); ?> days</p>
            <?php endif; ?>
        </div>
        
    </div>
  </div>
</div>
<?php elseif(!empty(auth()->user()->trial_ends_at) && Auth::user()->trial_ends_at < date("Y-m-d")): ?>
<div class="modal fade show" id="daysModal" tabindex="-1" aria-labelledby="exampleModalLabel" data-backdrop="static" aria-modal="true" role="dialog">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <!--<div class="modal-header">-->
      <!--  <button type="button" class="close" data-dismiss="modal">×</button>-->
      <!--</div>-->
      
        <div class="modal-body">
        <p>Your free trial pack has been expired. To avail services without interruption, please subscribe to the plan by clicking on subscribe button below.</p>
            <a class="btn btn-info" href="<?php echo e(route('subscriptions',Auth::user()->id)); ?>">Subscribe</a>
        </div>
        
    </div>
  </div>
</div>

<?php elseif(!empty(auth()->user()->ends_at) && Auth::user()->ends_at < date("Y-m-d")): ?>
<div class="modal fade show" id="daysModal" tabindex="-1" aria-labelledby="exampleModalLabel" data-backdrop="static" aria-modal="true" role="dialog">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <!--<div class="modal-header">-->
      <!--  <button type="button" class="close" data-dismiss="modal">×</button>-->
      <!--</div>-->
      
        <div class="modal-body">
        <p>Your package has been expired. To avail services without interruption, please subscribe to the plan by clicking on subscribe button below.</p>
            <a class="btn btn-info" href="<?php echo e(route('subscriptions',Auth::user()->id)); ?>">Subscribe</a>
        </div>
        
    </div>
  </div>
</div>

<?php endif; ?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.js"></script>

<script>
$(document).ready(function() {
			
// 			if ($.cookie("new_popup") == null) {
				$('#daysModal').modal('show');
// 				$.cookie("new_popup", "2");
// 			}


// 		var modal = document.getElementById("popup3");
// 	modal.style.display = "block";
//     var closeModal = document.getElementById("closeModal");
    
//     if ($.cookie("new_popup") != null) {
//         modal.style.display = "none";
//     }
//     closeModal.onclick = function() {
//         if ($.cookie("new_popup") == null) {
//             $.cookie("new_popup", "2");
//             modal.style.display = "none";
//         }
//     }
    
$(document).on("click",".chooseFile",function(){
   $("#image_url").trigger('click');
});

$(document).on("change","#image_url",function(){
   $("#img_errors").text(this.value.replace(/C:\\fakepath\\/i, ''));
   $("#img_errors").css('display','block');
});
});  
</script>
   
<script>
    
    $('.dltBtn').click(function(e) {
      var form = $(this).closest('form');
      var dataID = $(this).data('id');
      e.preventDefault();
      swal({
          title: "Are you sure?",
          text: "You want to delete yourself!",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {
            form.submit();
            swal("This member has been unblocked", {
              icon: "success",
            });
          } else {
            swal("Your Record is safe!");
          }
        });
    });
</script><?php /**PATH /home/demogswebtech/public_html/freely/resources/views/partials/after_login_index.blade.php ENDPATH**/ ?>