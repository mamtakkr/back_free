<?php $__env->startSection('content'); ?>
	 
		<div class="container " >
				<div class="row h-100 justify-content-center">	
				<div class="col-lg-4 col-md-4 col-sm-6">	
					<div class="coment bg-standard-grey mt-5 p-0">
						<div class="row">
							<div class="date_photo gyw w-100">
							    <?php if(!empty($event->banner)): ?> 
							        <img src="<?php echo e(URL::to('/')); ?>/public/images/events/<?php echo e($event->banner); ?>"> 
							    <?php else: ?> 
							        <img src="<?php echo e(URL::to('/')); ?>/public/images/default.jpg"> 
							    <?php endif; ?>	
							</div>
						</div>
					</div>
					
					
					<div class="photos mt-5">
						<p class="text-white">Participants<p>
						<div class="coment pt-0 ">
							<div class="row">
							    <?php if($participates->count() > 0): ?>
							    <?php $__currentLoopData = $participates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $participate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    							<div class="col-4 pt-4 pra_img ">
								    <a href="javascript:;" onclick="openParticipate('<?php echo e($participate->relUser->id); ?>');">
    							    <?php if(!empty($participate->relUser->image_url)): ?>
    									<img class="rounded" src="<?php echo e(URL::to('/')); ?>/public/images/users/<?php echo e($participate->relUser->image_url); ?>">	
    								<?php else: ?>
    									<img class="rounded" src="<?php echo e(URL::to('/')); ?>/public/images/no-user.png">	
    								<?php endif; ?>
    							    </a>
    							</div>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								<?php else: ?>
                                <div class="row">
                                    <h1 class="text-center text-secondary my-5">No Participant Found!</h1>
                                </div>
                                <?php endif; ?>
							</div>
						</div>
					</div>
				</div>	
					
			
				<div class="col-lg-8 col-md-8 col-sm-6">	
					<div class="coment  mt-5">
						<div class="row">
							<div class="col-6 px-0 " >
								<p><?php echo e(date('l', strtotime($event['start_date']))); ?> <span class="new_date"><?php echo e(date('d M Y', strtotime($event['start_date']))); ?></span></p>
								<h4><?php echo e(strtoupper($event->title)); ?></h4>
								<p><?php echo e($event->organizer); ?></p>
								<p><?php echo e($event->address); ?></p>
							</div>	
							<div class="col-6">	
								<div class="float-right">
								    
								    <?php
								    if($event->user_id!=Auth::user()->id){
                                        if(empty($participate_exists)){
                                    ?>
                                    <form action="#" method="POST" id="add_participate_form" enctype="multipart/form-data">
                                        <?php echo csrf_field(); ?>
                                        <input type="hidden" name="event_id" value="<?php echo e($event->id); ?>">
                                        <input type="hidden" name="participate_from" value="<?php echo e(Auth::user()->id); ?>"> 
                                        <button type="submit" id="add_participate_btn" class="bg-standard-violet base-radius text-white px-2 py-2">
                                        I Participate
                                        </button>
                                    </form>
                                    <?php }elseif($participate_exists->status=='pending'){ ?>
                                    <button type="submit" class="bg-standard-violet base-radius text-white px-2 py-2">
                                    <?php echo e(__('Participated')); ?>

                                    </button>
                                    <?php }elseif($participate_exists->status=='accepted'){ ?>
                                    <button type="submit" class="bg-standard-violet base-radius text-white px-2 py-2">
                                    <?php echo e(__('Request Accepted')); ?>

                                    </button>
                                    <?php }elseif($participate_exists->status=='rejected'){ ?>
                                    <button type="submit" class="bg-standard-violet base-radius text-white px-2 py-2">
                                    <?php echo e(__('Request Declined')); ?>

                                    </button>
                                    <?php
                                        }
								    }
                                    ?>    
								</div>	
							   </div> 
						</div>
						
						<div class="new_ted mt-3">
								<p><?php echo e(__('Event Prices')); ?></p>
								<div class="row">
									<div class="col-lg-3 col-md-3 col-6">
										<div class="boxsw text-white color_gr text-center pt-3 pb-2">
											<h4><?php echo e($event->couples); ?> <i class="fa fa-eur" aria-hidden="true"></i></h4>
											<p>Couples<p>
										</div>
										
									</div>
									<div class="col-lg-3 col-md-3 col-6">
										<div class="boxsw bg-standard-violet text-center text-white pt-3 pb-2">
											<h4><?php echo e($event->women); ?> <i class="fa fa-eur" aria-hidden="true"></i></h4>
											<p>Women<p>
										</div>
									</div>
									<div class="col-lg-3 col-md-3 col-6">	
										<div class="boxsw bg-standard-blur text-center text-white pt-3 pb-2">
											<h4><?php echo e($event->men); ?> <i class="fa fa-eur" aria-hidden="true"></i></h4>
											<p>Men<p>
										</div>
									</div>	
									<div class="col-lg-3 col-md-3 col-6">
										<div class="boxsw bg-warning text-center text-white pt-3 pb-2">
											<h4><?php echo e($event->transgender); ?> <i class="fa fa-eur" aria-hidden="true"></i></h4>
											<p>Transgender<p>
										</div>
									</div>	
								</div>
							</div>	
						</div>
						
						
						<div class="coment mt-5">
							<div class="row">
								<div class="col-12 px-0 heading" >
									<p><?php echo e($event->description); ?></p>
								</div>
							</div>
						</div>
					
					
				</div>
			</div>
			</div>
		</div>	
		


<div class="modal fade bd-example-modal-lg post-details modal_pofile" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

    </div>
  </div>
</div>


<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(function() {
        $("#add_participate_form").submit(function(e) {
            e.preventDefault();
            const fd = new FormData(this);
            $.ajax({
                url: '<?php echo e(route('participate-store')); ?>',
                method: 'post',
                data: fd,
                cache: false,
                contentType: false,
                processData: false,
                dataType: 'json',
                success: function(response) {
                    if (response.status == 200) {
                        $("#add_participate_btn").text('Participated');
                        document.getElementById("add_participate_btn").disabled=true;
                        $("#add_participate_form")[0].reset();
                    }
                    // if (response.status == 400) {
                    //     $("#add_participate_btn").text('I Participate');
                    //     $("#add_participate_form")[0].reset();
                    // }
                }
            });
        });
    });
    
    
    
    
function openParticipate(user_id)
{
	$.ajax({
      url: '<?php echo e(route('fetchParticipate')); ?>'+'?user_id='+user_id,
      method: 'get',
      success: function(response) {
        $(".modal-content").html(JSON.parse(response));
		//$('.show_comments').scrollTop($('.show_comments')[0].scrollHeight);

		$('.bd-example-modal-lg').modal('show');
      },
	  error: function(err)
	  {
	  	alert(JSON.stringify(err));
	  }
    });
}
</script>
		
		
		
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/demogswebtech/public_html/freely/resources/views/events/event_details.blade.php ENDPATH**/ ?>