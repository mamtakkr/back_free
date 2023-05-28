<?php $__env->startSection('content'); ?>
<?php echo $__env->make('partials.modals', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<div class="container">
    
  <?php echo $__env->make('partials.member-bar',['user_counter'=>$user_counter], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  
	<div class="row h-100 justify-content-center">
		<div class="col-lg-7 col-md-7 col-sm-7">
		    <?php if($message=Session::get('success')): ?>
            <div class="alert bg-green alert-dismissible" role="alert" id="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <?php echo e($message); ?>

            </div>
            <?php endif; ?>
            <form action="<?php echo e(route('secret-store')); ?>" method="post">
                <?php echo csrf_field(); ?>
    			<div class="coment bg-standard-grey mt-3 heading">
    				<h5 class="white"><?php echo e(__('Release the secret')); ?></h5>
    				<input type="hidden" name="sec_to_id" value="<?php echo e($user_counter['member_details']->user_id); ?>">
    				<input type="hidden" name="sec_from_id" value="<?php echo e(Auth::user()->id); ?>">
    				<textarea class="form-control" name="message" rows="4" placeholder="Message" required><?php echo e(old('message')); ?></textarea>
    			</div>
    			<div class="text-center mt-2">
                    <button type="submit" class="boder-0 py-2 px-3 rounded bg-standard-violet text-white ">Publish</button>
                  </div>
    		</form>


            <?php if($secrets->count()>0): ?>
            <?php $__currentLoopData = $secrets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $secret): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<div class="coment bg-standard-grey mt-5">
				<div class="row">
					<div class="col-12 px-0 heading">
						<div class="row align-items-center ">
							<div class="mb-2 mr-2 rounded_images">
								<?php if(!empty($secret->relUser->image_url)): ?>
								<img class="rounded-circle" src="<?php echo e(URL::to('/')); ?>/public/images/users/<?php echo e($secret->relUser->image_url); ?>" width="80" height="80">
								<?php else: ?>
								<img class="rounded-circle" src="<?php echo e(URL::to('/')); ?>/public/images/no-user.png" width="80" height="80">
								<?php endif; ?>
							</div>
							<div>
								<h5 class="name_color"><?php echo e($secret->relUser->username); ?></h5>
								<labal class="while"><?php echo e($secret->relUser->you_are); ?></labal>
							</div>
						</div>
						<p><?php echo e($secret->message); ?></p>
					</div>
				</div>
			</div>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			<?php else: ?>
			<div class="coment bg-standard-grey mt-5">
				<div class="row heading">
					<div class="col-md-12 col-sm-12 col-12">
					    <?php echo e(__('There are no secrets in your secret book.')); ?>

					</div>
				</div>

			</div>
			<?php endif; ?>


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
<?php echo $__env->make('layouts.front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/demogswebtech/public_html/freely/resources/views/secrets/secretAdd.blade.php ENDPATH**/ ?>