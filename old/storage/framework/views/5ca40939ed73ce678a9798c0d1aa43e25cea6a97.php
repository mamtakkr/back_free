<?php $__env->startSection('content'); ?>
<div class="container">
    	
    <form action="#" method="POST" id="search_form" enctype="multipart/form-data">
      <?php echo csrf_field(); ?>	
	<div class="col-12">
        <div class="dropdown resse my-3 py-1 rounded"> <span class="white px-2 "><?php echo e(__('Search')); ?></span>
          <div class="dropdown-content">
            <div class="row">
              <div class="col-md-4">
                <p class="name2"><?php echo e(__('Status')); ?></p>
                <input member-count="2" type="checkbox" class="checkd" name="status[]" value="<?php echo e(__('libertine discotheque club')); ?>">
                <label class="checkd"><?php echo e(__('Libertine discotheque club')); ?></label>
                <br>                            
                <input member-count="2" type="checkbox" class="checkd" name="status[]" value="<?php echo e(__('sauna club')); ?>">
                <label class="checkd"><?php echo e(__('Sauna club')); ?></label>
                <br>
                <input member-count="2" type="checkbox" class="checkd" name="status[]" value="<?php echo e(__('organizer')); ?>">
                <label class="checkd"><?php echo e(__('Organizer')); ?></label>
                <br>
                <input member-count="2" type="checkbox" class="checkd" name="status[]" value="<?php echo e(__('libertine camping')); ?>">
                <label class="checkd"><?php echo e(__('Libertine camping')); ?></label>
                <br>
                <input member-count="2" type="checkbox" class="checkd" name="status[]" value="<?php echo e(__('erotic writer')); ?>">
                <label class="checkd"><?php echo e(__('Erotic writer')); ?></label>
            </div>    
            <div class="col-md-4"> 
                <p class="status_2" style="visibility: hidden;">Status</p>
                <input member-count="2" type="checkbox" class="checkd" name="status[]" value="<?php echo e(__('photographer')); ?>">
                <label class="checkd"><?php echo e(__('Photographer')); ?></label>
                <br>
                <input member-count="1" type="checkbox" class="checkd" name="status[]" value="<?php echo e(__('tattoo artist')); ?>">
                <label class="checkd"><?php echo e(__('Tattoo artist')); ?></label>
                <br>
                <input member-count="1" type="checkbox" class="checkd" name="status[]" value="<?php echo e(__('erotic photographer')); ?>">
                <label class="checkd"><?php echo e(__('Erotic photographer')); ?></label>
                <br>
                <input  member-count="1" type="checkbox" class="checkd" name="status[]" value="<?php echo e(__('sex shop')); ?>">
                <label class="checkd"><?php echo e(__('Sex shop')); ?></label>
                <br>
                <input member-count="1" type="checkbox" class="checkd" name="status[]" value="<?php echo e(__('online sex shop')); ?>">
                <label class="checkd"><?php echo e(__('Online sex shop')); ?></label>
                <br>
              </div>
              <div class="col-md-4">
                  
                <div class="row">
                    <div class="col-6 pl-0">
                        <p class="name2"><?php echo e(__('Club Name')); ?></p>
                        <input type="text" class="form-control" name="club_name" placeholder="Club name" value="<?php echo e(old('club_name')); ?>">
                    </div>
                    <div class="col-6 pr-0">
                        <p class="name2"><?php echo e(__('Zipcode')); ?></p>
                         <input type="text" class="form-control" name="zipcode" placeholder="Zipcode" value="<?php echo e(old('zipcode')); ?>">
                    </div>     
                </div>  
                <br>  
                <p class="name2"><?php echo e(__('City')); ?></p>
                <!---->
                <input type="text" name="city" class="form-control mb-2" value="<?php echo e(old('city')); ?>" placeholder="City">
                
                <br>
                <button type="submit" id="search_btn" class="border-white border bg-standard-white w-100 text-center text-dark  base-radius px-2 py-2 mr-2">Search</button>
              </div>
            </div>
          </div>
        </div>
      </div>
      </form>
				
			<div class="row h-100 text-center" id="show_professionals">
			    <?php if($professionals->count()>0): ?>
			    <?php $__currentLoopData = $professionals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<div class="col-lg-3 col-md-6 col-sm-6">	
				    <a href="Professional_edit.html">
					<div class="coment mt-3 new_profie">
						<div class="row">
							<div class="col-12 px-0 ">
									<div class="text-center">
										<!--<img class="rounded-circle" src="imgs/profilwe.png" width="80" height="80">-->
										<a href="<?php echo e(route('professional-details',$pro->id)); ?>"> 
                                        <?php if(!empty($pro->image_url)): ?> 
                                        <img class="rounded-circle" src="<?php echo e(URL::to('/')); ?>/public/images/users/<?php echo e($pro->image_url); ?>" width="80" height="80"> 
                                        <?php else: ?> 
                                        <img class="rounded-circle" src="<?php echo e(URL::to('/')); ?>/public/images/no-user.png" width="80" height="80"> 
                                        <?php endif; ?> 
                                        </a>
									</div>
									<h5><?php echo e($pro->username); ?></h5>
							</div>
							
							<div class="col-12 px-0 heading" >
								
								<p><?php echo e($pro->club_name); ?></p>
								<p><i class="fa fa-map-marker" aria-hidden="true"></i>
								    <?php if(!empty($pro->relUserDetail->city)): ?> <?php echo e(strtoupper($pro->relUserDetail->city)); ?> <?php endif; ?>
								</p>
							</div>
						</div>
					</div>
					</a>
				</div>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				<?php else: ?>
                <div class="col-12 mt-4">
                  <div class="row h-100 justify-content-center" id="show_professionals">
                    <div class="coment mt-3 rounded">
                      <h1 class="text-center text-secondary my-5">No Professional Found In The Record!</h1>
                    </div>
                  </div>
                </div>
				<?php endif; ?>
				

			</div>
		</div>
		
<script>
$(function() {
      
	  $("#search_form").submit(function(e) {
        e.preventDefault();
        const fd = new FormData(this);
        $("#search_btn").text('Searching...');
        $.ajax({
          url: '<?php echo e(route('professional-search')); ?>',
          method: 'post',
          data: fd,
          cache: false,
          contentType: false,
          processData: false,
          dataType: 'json',
          success: function(response) {
		  	//alert(JSON.stringify(response));
			$("#show_professionals").html(response);
			$("#search_btn").text('Search');
          },
		  error: function(err)
		  {
		  //alert(JSON.stringify(err));
		  }
        });
        
      });
	  
	}); 
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/demogswebtech/public_html/freely/resources/views/professionals.blade.php ENDPATH**/ ?>