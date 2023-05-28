<?php $__env->startSection('content'); ?>
<?php echo $__env->make('partials.modals', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<div class="container">

  <?php echo $__env->make('partials.member-bar',['user_counter'=>$user_counter], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

  <div class="row h-100 justify-content-center">
    <div class="col-lg-9 col-md-6 col-sm-6">
      <div class="row">
        <div class="col-md-6">
          <div class="photos mt-5">
            <p class="text-white">Photo <span class="public">Public</span> </p>
            
            <div class="coment bg-standard-grey pt-0">
              <div class="row">
			  	<?php if($pub_photos->count() > 0): ?>
                <div class="row">
                <?php $__currentLoopData = $pub_photos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $photo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-4 pt-4 pra_img ">
                        <img class="rounded" src="<?php echo e(URL::to('/')); ?>/public/images/photos/<?php echo e($photo->image_url); ?>">
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <?php else: ?>
                <div class="row">
                    <h1 class="text-center text-secondary my-5">No photos available!</h1>
                </div>
                <?php endif; ?>
              </div>
            </div>
          </div>
        </div>
        
        <div class="col-md-6">
          <div class="photos mt-5">
            <p class="text-white">Photo<span class="public">Private</span></p>
            
                <?php if(!empty($request_exists) && $request_exists->status == 'pending'): ?>
                <a href="javascript:void(0)" type="button" class="boder py-2 px-3 mt-3 rounded bg-standard-violet text-white float-right" style="margin-top:-54px !important;"> 
                    <?php echo e(__('Request sent')); ?>

                </a>
                <?php elseif(!empty($request_exists) && $request_exists->status == 'approved'): ?>
                <a href="javascript:void(0)" type="button" class="boder py-2 px-3 mt-3 rounded bg-standard-violet text-white float-right" style="margin-top:-54px !important;"> 
                    <?php echo e(__('Request approved')); ?>

                </a>
                <?php elseif(!empty($request_exists) && $request_exists->status == 'declined'): ?>
                <a href="javascript:void(0)" type="button" class="boder py-2 px-3 mt-3 rounded bg-standard-violet text-white float-right" style="margin-top:-54px !important;"> 
                    <?php echo e(__('Request declined')); ?>

                </a>
				<?php else: ?>
    	        <a href="javascript:void(0)" type="button" class="boder py-2 px-3 mt-3 rounded bg-standard-violet text-white float-right" style="margin-top:-54px !important;"
    	        onclick="addPriRequest(<?php echo e($user_counter['member_details']->user_id); ?>)" 
    	        id="add_request_btn<?php echo e($user_counter['member_details']->user_id); ?>"><?php echo e(__('Request to see private photos')); ?></a>
    	        <?php endif; ?>
    							
            <div class="coment <?php if(empty($request_exists)): ?> private_photos <?php elseif(!empty($request_exists) && $request_exists->status != 'approved'): ?> private_photos <?php endif; ?> bg-standard-grey pt-0 ">
              <div class="row">
			  	<?php if($pri_photos->count() > 0): ?>
                <div class="row">
                <?php $__currentLoopData = $pri_photos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $photo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-4 pt-4 pra_img ">
                        <img class="rounded" src="<?php echo e(URL::to('/')); ?>/public/images/photos/<?php echo e($photo->image_url); ?>">
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <?php else: ?>
                <div class="row">
                    <h1 class="text-center text-secondary my-5">No photos available!</h1>
                </div>
                <?php endif; ?>
              </div>
            </div>
          </div>
        </div>
        
      </div>
    </div>
  </div>

</div>
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
          $("#blacklist_btn" + id).text('Blacklisted');
          document.getElementById("blacklist_btn" + id).disabled = true;
          window.location.reload();
        }
      },
      error: function(request, status, error) {
        console.log('Error is' + request.responseText);
      }
    });
  }
  
  
  function addPriRequest(id) {
    var thiss = $(this);
    var _token = "<?php echo e(csrf_token()); ?>";
    var qs = {
      user_id: id,
      _token: _token
    };

    $.ajax({
      url: "<?php echo e(route('photo-request-store')); ?>",
      method: "Post",
      data: qs,
      success: function(response) {
        if (response.status == 200) {
          $("#add_request_btn" + id).text('Request sent');
          document.getElementById("add_request_btn" + id).disabled = true;
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
<?php echo $__env->make('layouts.front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/demogswebtech/public_html/freely/resources/views/secrets/userPhotos.blade.php ENDPATH**/ ?>