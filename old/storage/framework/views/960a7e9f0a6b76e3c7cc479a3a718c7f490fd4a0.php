<?php $__env->startSection('content'); ?>
<?php echo $__env->make('partials.modals', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<div class="container">
    
	<?php echo $__env->make('partials.member-bar',['member_details'=>$member_details,'follow_exists'=>$follow_exists,'like_exists'=>$like_exists], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  
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
    				<input type="hidden" name="sec_to_id" value="<?php echo e($member_details->user_id); ?>">
    				<input type="hidden" name="sec_from_id" value="<?php echo e(Auth::user()->id); ?>">
    				<textarea class="form-control" name="message" rows="4" placeholder="Message" required><?php echo e(old('message')); ?></textarea>
    			</div>
    			<div class="text-center mt-2">
                    <button type="submit" class="boder-0 py-2 px-3 rounded bg-standard-violet text-white ">Publish</button>
                  </div>
    		</form>


            <?php if($photos->count() > 0): ?>
            <div class="row">
                
            <?php $__currentLoopData = $photos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $photo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($photo->photo_type==1): ?>
                <div class="col-4 pt-4 pra_img ">
                    <img class="rounded" src="<?php echo e(URL::to('/')); ?>/public/images/photos/<?php echo e($photo->image_url); ?>">
                </div>
            <?php endif; ?>
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
<?php echo $__env->make('layouts.front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/demogswebtech/public_html/freely/resources/views/photos/user_photos.blade.php ENDPATH**/ ?>