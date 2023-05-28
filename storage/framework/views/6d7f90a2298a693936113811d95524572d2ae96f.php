<?php $__env->startSection('content'); ?>
<?php echo $__env->make('partials.modals', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="container" id="blocklisted">
  
  <?php echo $__env->make('partials.member-bar',['user_counter'=>$user_counter], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	
  <div class="row h-100 justify-content-center">
    <div class="col-lg-5 col-md-5 col-sm-6">
      <div class="coment bg-standard-grey mt-5 p-0">
        <div class="row">
          <div class="col-12 text-center resse py-2" style="border-radius: 8px 8px 0px 0px;">
            <h5><?php echo e(__('public.'.$user_counter['member_details']->relUser->you_are)); ?></h5>
          </div>
          <div class="col-7 px-0 py-1 text-center border-right">
            <div class="text-center">
              <p><?php echo e(__('public.Follows')); ?></p>
              <p><?php echo e(count($follows)); ?></p>
            </div>
          </div>
          <div class="col-5 py-1 text-center heading">
            <p><?php echo e(__('public.Like')); ?></p>
            <p><?php echo e(count($likes)); ?></p>
          </div>
          <div class="col-12 py-2 border-top heading"> 
            <span><i class="fa fa-map-marker" aria-hidden="true"></i>
                <?php if(!empty($user_counter['member_details']->city) && !empty($user_counter['member_details']->country)): ?>
                <?php echo e(strtoupper($user_counter['member_details']->city)); ?>

                <?php else: ?>
                <?php echo e(strtoupper($user_counter['member_details']->country)); ?>

                <?php endif; ?>
            </span> 
          </div>
        </div>
      </div>
      
       <div class="coment bg-standard-grey mt-5 p-0">
        <div class="row">
          <div class="col-12 text-center resse py-2" style="border-radius: 8px 8px 0px 0px;">
            <h5><?php echo e(__('public.Experience')); ?></h5>
          </div>
          <div class="col-12 px-0 py-1 text-center ">
            <div class="text-center">
              <p class="mt-2"><?php if(!empty($user_counter['member_details']->relUser->experience)): ?> <?php echo e(ucfirst($user_counter['member_details']->relUser->experience)); ?> <?php endif; ?></p>
            </div>
          </div>
        </div>
      </div>
      <div class="photos mt-5">
        <p class="text-white"><?php echo e(__('public.Photos')); ?>

        <p>
        <div class="coment bg-standard-grey pt-0" id="show_all_photos">
          <div class="row">
            <h1 class="text-center text-secondary my-5"><?php echo e(__('public.Loading')); ?></h1>
          </div>
        </div>
        <?php if($user_counter['member_details']->user_id==Auth::user()->id): ?>
        <button class="mt-3 rounded bg-standard-violet text-white  px-2 py-2" data-toggle="modal" data-target="#addPhotoModal"><?php echo e(__('public.Add_Photo')); ?></button>
        <?php else: ?>
        
        <?php endif; ?> </div>
      <div class="photos mt-5">
        <p class="text-white"><?php echo e(__('public.Videos')); ?>

        <p>
        <div class="coment bg-standard-grey pt-0" id="show_all_videos">
          <div class="row">
            <h1 class="text-center text-secondary my-5"><?php echo e(__('public.Loading')); ?></h1>
          </div>
        </div>
        <?php if($user_counter['member_details']->user_id==Auth::user()->id): ?>
        <button class="mt-3 rounded bg-standard-violet text-white  px-2 py-2" data-toggle="modal" data-target="#addVideoModal"><?php echo e(__('public.Add_Video')); ?></button>
        <?php else: ?>
        
        <?php endif; ?> </div>
    </div>
    <div class="col-lg-7 col-md-7 col-sm-6">
      <div class="coment bg-standard-grey mt-5">
        <div class="row">
          <div class="col-12 px-0 ">
            <p><?php echo e(__('public.I_look_for')); ?></p>
            <div class="menu">
              <ul class="like vf">
                <?php if(!empty($user_counter['member_details']->research)): ?>
                <?php $research = explode(',', $user_counter['member_details']->research); ?>
                <?php $__currentLoopData = $research; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><a class="bg-standard-white  base-radius text-dark px-2 py-2" href="#"><?php echo e($value); ?></a></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="coment bg-standard-grey mt-5">
        <div class="row">
          <div class="col-12 px-0 heading">
            <h5><?php if(!empty($user_counter['member_details']->relUser->username)): ?> <?php echo e($user_counter['member_details']->relUser->username); ?> <?php endif; ?></h5>
            <p><?php if(!empty($user_counter['member_details']->about)): ?> <?php echo e($user_counter['member_details']->about); ?> <?php endif; ?></p>
          </div>
        </div>
      </div>
      <div class="coment bg-standard-grey mt-5">
        <div class="row">
          <div class="col-4  heading">
            <p><?php echo e(__('public.Profile')); ?></p>
            <p class=" pl-1 py-1 bg-standard-grey_lite Age"><?php echo e(__('public.Age')); ?></p>
            <p class=" pl-1 py-1 bg-standard-grey_lite Age"><?php echo e(__('public.Size')); ?></p>
            <p class=" pl-1 py-1 bg-standard-grey_lite Age"><?php echo e(__('public.Weight')); ?></p>
            <p class=" pl-1 py-1 bg-standard-grey_lite Age"><?php echo e(__('public.Origin')); ?></p>
            <p class=" pl-1 py-1 bg-standard-grey_lite Age"><?php echo e(__('public.Hair_Size')); ?></p>
            <p class=" pl-1 py-1 bg-standard-grey_lite Age"><?php echo e(__('public.Hair_Color')); ?></p>
            <p class=" pl-1 py-1 bg-standard-grey_lite Age"><?php echo e(__('public.Eye_Colour')); ?></p>
          </div>
          <div class="col-4  heading">
            <p>Lui</p>
            <p class=" pl-1 py-1 bg-standard-blur Age"> <?php echo e(\Carbon\Carbon::parse($user_counter['member_details']->dob)->diff(\Carbon\Carbon::now())->format('%y years')); ?> </p>
            <p class=" pl-1 py-1 bg-standard-blur Age"><?php echo e($user_counter['member_details']->size); ?></p>
            <p class=" pl-1 py-1 bg-standard-blur Age"><?php echo e($user_counter['member_details']->weight); ?></p>
            <p class=" pl-1 py-1 bg-standard-blur Age"><?php echo e($user_counter['member_details']->origin); ?></p>
            <p class=" pl-1 py-1 bg-standard-blur Age"><?php echo e($user_counter['member_details']->hair_size); ?></p>
            <p class=" pl-1 py-1 bg-standard-blur Age"><?php echo e($user_counter['member_details']->hair_color); ?></p>
            <p class=" pl-1 py-1 bg-standard-blur Age"><?php echo e($user_counter['member_details']->eye_colour); ?></p>
          </div>
          
          <?php if(!empty($user_counter['member_details']->dob_couple)): ?>
          <div class="col-4  heading">
            <p>Elle</p>
            <p class=" pl-1 py-1 bg-standard-violet Age"> <?php echo e(\Carbon\Carbon::parse($user_counter['member_details']->dob_couple)->diff(\Carbon\Carbon::now())->format('%y years')); ?> </p>
            <p class=" pl-1 py-1 bg-standard-violet Age"><?php echo e($user_counter['member_details']->size_couple); ?></p>
            <p class=" pl-1 py-1 bg-standard-violet Age"><?php echo e($user_counter['member_details']->weight_couple); ?></p>
            <p class=" pl-1 py-1 bg-standard-violet Age"><?php echo e($user_counter['member_details']->origin_couple); ?></p>
            <p class=" pl-1 py-1 bg-standard-violet Age"><?php echo e($user_counter['member_details']->hair_size_couple); ?></p>
            <p class=" pl-1 py-1 bg-standard-violet Age"><?php echo e($user_counter['member_details']->hair_color_couple); ?></p>
            <p class=" pl-1 py-1 bg-standard-violet Age"><?php echo e($user_counter['member_details']->eye_colour_couple); ?></p>
          </div>
          <?php endif; ?>
          
          </div>
      </div>
      <div class="coment bg-standard-grey mt-5">
        <div class="row">
          <div class="col-12 px-0 ">
            <p><?php echo e(__('public.Type_of_meeting')); ?></p>
            <div class="menu">
              <ul class="like vf">
                <?php if(!empty($user_counter['member_details']->type_of_meeting)): ?>
                <?php $type_of_meeting = explode(',', $user_counter['member_details']->type_of_meeting); ?>
                <?php $__currentLoopData = $type_of_meeting; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li> <a class="bg-standard-white  base-radius text-dark px-2 py-2" href="#"> <?php echo e($value); ?> </a> </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="coment bg-standard-grey mt-5">
        <div class="row">
          <div class="col-12 px-0 ">
            <p><?php echo e(__('public.First_meeting')); ?></p>
            <div class="menu">
              <ul class="like vf">
                <?php if(!empty($user_counter['member_details']->first_meeting)): ?>
                <?php $first_meeting = explode(',', $user_counter['member_details']->first_meeting); ?>
                <?php $__currentLoopData = $first_meeting; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li> <a class="bg-standard-white  base-radius text-dark px-2 py-2" href="#"> <?php echo e($value); ?> </a> </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="coment bg-standard-grey mt-5">
        <div class="row">
          <div class="col-12 px-0 ">
            <p><?php echo e(__('public.Vibe')); ?></p>
            <div class="menu">
              <ul class="like vf">
                <?php if(!empty($user_counter['member_details']->vibe)): ?>
                <?php $vibe = explode(',', $user_counter['member_details']->vibe); ?>
                <?php $__currentLoopData = $vibe; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li> <a class="bg-standard-white  base-radius text-dark px-2 py-2" href="#"> <?php echo e($value); ?> </a> </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade bd-example-modal-lg photo-details" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

    </div>
  </div>
</div>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(function() {
        $("#add_like_form").submit(function(e) {
            e.preventDefault();
            const fd = new FormData(this);
            $.ajax({
                url: '<?php echo e(route('like-store')); ?>',
                method: 'post',
                data: fd,
                cache: false,
                contentType: false,
                processData: false,
                dataType: 'json',
                success: function(response) {
                    if (response.status == 200) {
                        $("#add_like_btn").removeClass('fa-heart-o');
                        $("#add_like_btn").addClass('fa-heart');
                        $("#add_like_form")[0].reset();
                    }
                    if (response.status == 400) {
                        $("#add_like_btn").removeClass('fa-heart');
                        $("#add_like_btn").addClass('fa-heart-o');
                        $("#add_like_form")[0].reset();
                    }
                }
            });

        });




        $("#add_follow_form").submit(function(e) {
            e.preventDefault();
            const fd = new FormData(this);
            $.ajax({
                url: '<?php echo e(route('follow-store')); ?>',
                method: 'post',
                data: fd,
                cache: false,
                contentType: false,
                processData: false,
                dataType: 'json',
                success: function(response) {
                    if (response.status == 200) {
                        $("#add_follow_btn").text('+ Following');
                        $("#add_follow_form")[0].reset();
                    }
                    if (response.status == 400) {
                        $("#add_follow_btn").text('+ Follow');
                        $("#add_follow_form")[0].reset();
                    }
                }
            });

        });
        
        
      $("#add_photo_form").submit(function(e) {
        e.preventDefault();
        const fd = new FormData(this);
        $("#add_photo_btn").text('Adding...');
        $.ajax({
          url: '<?php echo e(route('photo-store')); ?>',
          method: 'post',
          data: fd,
          cache: false,
          contentType: false,
          processData: false,
          dataType: 'json',
          success: function(response) {
              console.log(response);
            if (response.status == 200) {
                Swal.fire(
                'Added!',
                'Photo Added Successfully!',
                'success'
              )
              fetchAllPhotos(<?php echo e($user_counter['member_details']->user_id); ?>);
                $("#add_photo_btn").text('Add Photo');
                $("#add_photo_form")[0].reset();
                $("#addPhotoModal").modal('hide');
            }
            if (response.status == 401) {
                $("#img_errors").text(response.errors.image_url);
                $("#add_photo_btn").text('Not Added');
                $("#add_photo_form")[0].reset(); 
                $("#addPhotoModal").modal('fade');
            }
          }
        });
      });
      
      
      fetchAllPhotos(<?php echo e($user_counter['member_details']->user_id); ?>);

      function fetchAllPhotos(id) {
        var _token = "<?php echo e(csrf_token()); ?>";
        var qs = {
            id: id,
            _token: _token
        };  
        $.ajax({
          url: '<?php echo e(route('fetchAllPhotos')); ?>',
          method: 'get',
          data: qs,
          success: function(response) {
            $("#show_all_photos").html(JSON.parse(response));
          }
        });
      }
      
      
      
        
      $("#add_video_form").submit(function(e) {
        e.preventDefault();
        const fd = new FormData(this);
        $("#add_video_btn").text('Adding...');
        $.ajax({
          url: '<?php echo e(route('video-store')); ?>',
          method: 'post',
          data: fd,
          cache: false,
          contentType: false,
          processData: false,
          dataType: 'json',
          success: function(response) {
            if (response.status == 200) {
                Swal.fire(
                'Added!',
                'Video Added Successfully!',
                'success'
              )
              fetchAllVideos(<?php echo e($user_counter['member_details']->user_id); ?>);
                $("#add_video_btn").text('Add Video');
                $("#add_video_form")[0].reset();
                $("#addVideoModal").modal('hide');
            }
            if (response.status == 401) {
                $("#vid_errors").text(response.errors.video_url);
                $("#add_video_btn").text('Not Added');
                $("#add_video_form")[0].reset(); 
                // $("#addVideoModal").modal('fade');
            }
          }
        });
      });
      
      
      fetchAllVideos(<?php echo e($user_counter['member_details']->user_id); ?>);

      function fetchAllVideos(id) {
        var _token = "<?php echo e(csrf_token()); ?>";
        var qs = {
            id: id,
            _token: _token
        };  
        $.ajax({
          url: '<?php echo e(route('fetchAllVideos')); ?>',
          method: 'get',
          data: qs,
          success: function(response) {
            $("#show_all_videos").html(JSON.parse(response));
          }
        });
      }
     
    });
    
    
    
function addBlacklist(id) {
	var thiss = $(this);
    var _token = "<?php echo e(csrf_token()); ?>";
    var qs = {
        to_id: id,
        _token: _token
    };
    
    $.ajax({
        url: "<?php echo e(route('blacklist-store')); ?>",
        method: "Post",
        data: qs,
        success: function(response) {
			if (response.status == 200) {
                $("#blacklist_btn"+id).text('Blacklisted');
                document.getElementById("blacklist_btn"+id).disabled=true;
                window.location.reload();
            }
        },
        error: function(request, status, error) {
            console.log('Error is' + request.responseText);
        }
    });
}
        
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/demogswebtech/public_html/freely/resources/views/member_details.blade.php ENDPATH**/ ?>