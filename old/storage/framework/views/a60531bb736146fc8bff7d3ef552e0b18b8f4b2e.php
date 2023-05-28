<?php $__env->startSection('content'); ?>
<?php echo $__env->make('partials.modals', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<div class="container">
	<?php echo $__env->make('partials.user-bar',['user_info'=>$user_info], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

	<div class="row h-100 justify-content-center">
		<div class="col-lg-7 col-md-7 col-sm-7">

            <?php if($secrets->count()>0): ?>
            <?php $__currentLoopData = $secrets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $secret): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if(empty(get_block($secret->sec_from_id))): ?>
			<div class="coment bg-standard-grey mt-5">
				<div class="row heading">
					<div class="col-md-6 col-sm-6 col-12">
						<div class="row align-items-center ">
							<div class="mb-2 mr-2 rounded_images">
							    <?php if(!empty($secret->relUser->image_url)): ?>
								<img class="rounded-circle" src="<?php echo e(URL::to('/')); ?>/public/images/users/<?php echo e($secret->relUser->image_url); ?>" width="80" height="80">
								<?php else: ?>
								<img class="rounded-circle" src="<?php echo e(URL::to('/')); ?>/public/images/no-user.png" width="80" height="80">
								<?php endif; ?>
							</div>
							<div>
								<h5 class="name_color mb-0"><?php echo e($secret->relUser->username); ?></h5>
								<labal class="while"><?php echo e($secret->relUser->you_are); ?></labal>
							</div>
						</div>
					</div>
					<div class="col-md-6 col-sm-6 col-12 text-right">
						<div class="bta">
						    <?php if($secret->status!='pending'): ?>
                    	        <?php if($secret->status=='rejected'): ?>
                                <button type="submit" class="mt-3 border-0 rounded bg-standard-violet text-white  px-2 py-2">
                                Rejected
                                </button>
                                <?php else: ?>
                                <button type="submit" class="mt-3 border-0 rounded bg-standard-violet text-white  px-2 py-2">
                                Accepted
                                </button>
                                <?php endif; ?>
                    		 <?php else: ?>
                    		    <?php if($secret->status=='pending' || $secret->status=='rejected'): ?>
    							<a href="javascript:void(0)" type="button" class=" mt-3 rounded bg-standard-violet text-white  px-2 py-2" 
    							onclick="addAccept(<?php echo e($secret['id']); ?>)" id="add_accept_btn<?php echo e($secret->id); ?>"><?php echo e(__('Accept')); ?></a>
    							<?php else: ?>
                                <button type="submit" class="mt-3 border-0 rounded bg-standard-violet text-white  px-2 py-2">
                                Accepted
                                </button>
                                <?php endif; ?>
                                <?php if($secret->status=='pending' || $secret->status=='accepted'): ?>
    							<a href="javascript:void(0)" type="button" class=" mt-3 rounded bg-standard-violet text-white  px-2 py-2"
    							onclick="addReject(<?php echo e($secret['id']); ?>)" id="add_reject_btn<?php echo e($secret->id); ?>"><?php echo e(__('Reject')); ?></a>
    							<?php else: ?>
                                <button type="submit" class="mt-3 border-0 rounded bg-standard-violet text-white  px-2 py-2">
                                Rejected
                                </button>
                                <?php endif; ?>
                            <?php endif; ?>
						</div>
					</div>
				</div>
				<p><?php echo e($secret->message); ?></p>
			</div>
			<?php endif; ?>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			<?php else: ?>
			<div class="coment bg-standard-grey mt-5">
				<div class="row heading">
					<div class="col-md-12 col-sm-12 col-12">
					    <?php echo e(__('There is no any secrets in your secret book.')); ?>

					</div>
				</div>

			</div>
			<?php endif; ?>


		</div>

	</div>

</div>

<script>
   
    function addAccept(id) {
            // alert(id);
			var thiss = $(this);
            var _token = "<?php echo e(csrf_token()); ?>";
            var qs = {
                secret_id: id,
                _token: _token
            };
            //  alert(JSON.stringify(qs));
            $.ajax({
                url: "<?php echo e(route('secret-accept-store')); ?>",
                method: "Post",
                data: qs,
                success: function(response) {
					if (response.status == 200) {
                        $("#add_accept_btn"+id).text('Accepted');
                        document.getElementById("add_accept_btn"+id).disabled=true;
                        document.getElementById("add_reject_btn"+id).style.display = 'none';
                        // $("#add_accept_form")[0].reset();
                        $('#all_secrets').load(location.href + ' #all_secrets');
                    }
                },
                error: function(request, status, error) {
                    console.log('Error is' + request.responseText);
                }
            });
        }
        
        
   function addReject(id) {
            // alert(id);
			var thiss = $(this);
            var _token = "<?php echo e(csrf_token()); ?>";
            var qs = {
                secret_id: id,
                _token: _token
            };
            //  alert(JSON.stringify(qs));
            $.ajax({
                url: "<?php echo e(route('secret-reject-store')); ?>",
                method: "Post",
                data: qs,
                success: function(response) {
					if (response.status == 200) {
                        $("#add_reject_btn"+id).text('Rejected');
                        document.getElementById("add_reject_btn"+id).disabled=true;
                        document.getElementById("add_accept_btn"+id).style.visibility = 'hidden';

                        // $("#add_reject_form")[0].reset();
                        $('#all_secrets').load(location.href + ' #all_secrets');
                    }
                },
                error: function(request, status, error) {
                    console.log('Error is' + request.responseText);
                }
            });
        }
        
        
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/demogswebtech/public_html/freely/resources/views/secrets/index.blade.php ENDPATH**/ ?>