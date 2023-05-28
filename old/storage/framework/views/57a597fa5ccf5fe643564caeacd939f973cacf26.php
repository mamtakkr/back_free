
<?php $__env->startSection('content'); ?>

<section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Profile</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <!-- Content Header (Page header) -->
    <section class="content">
        <div class="container-fluid">
            <div class="row mb-2">
				
				<?php if($error=Session::get('error')): ?>
				<div class="alert bg-red alert-dismissible" role="alert" id="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
					<?php echo e($error); ?>

				</div>

				<?php endif; ?>
				<?php if($message=Session::get('success')): ?>
				<div class="alert bg-green alert-dismissible" role="alert" id="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
					<?php echo e($message); ?>

				</div>

				<?php endif; ?><br>
                <div class="col-sm-12">
			
				<?php if(count($errors)>0): ?>
				<div class='alert alert-danger'>
					<ul>
						<?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<li><?php echo e($error); ?></li>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</ul>
				</div>
				<?php endif; ?><br>
                
                    <div class="bg-ytr col-4 m-auto"> 
        			   	<form method="post" action="<?php echo e(route('profileImg-update-action')); ?>" enctype="multipart/form-data" class="form-horizontal">
        					<?php echo csrf_field(); ?>
        					<input type="hidden" name="_method" value="Patch" />
        					<input type="hidden" name="id" value="<?php echo e(old('id',Auth::user()->id)); ?>">
        
        					
        					<div class="col-sm-12">
        						<div class="profile">
        							<img class="img-thumbnail" src="<?php echo e(URL::to('/')); ?>/public/images/users/<?php echo e(Auth::user()->image_url); ?>" id="output" alt="..." height="100" width="100">
        							<input type="hidden" name="old_image_url" value="df" class="form-control"><br>
        							<input type="file" name="new_image_url" id="image" accept="image/*" onchange="loadFile(event)">
        							<script>
        								var loadFile = function(event) {
        									var image = document.getElementById('output');
        									image.src = URL.createObjectURL(event.target.files[0]);
        									$('#output').slideDown();
        								};
        							</script>	
        						</div>
        					</div>
        					<div class="sumiy">
        						<button type="submit" class="btn btn-danger">Update</button>
        					</div>	
        				</form> 
        			</div>	
                
                   <div class="bg-ytr col-8 m-auto"> 
    			   	<form method="post" action="<?php echo e(route('profile-update-action')); ?>" enctype="multipart/form-data" class="form-horizontal">
    					<?php echo csrf_field(); ?>
    					<input type="hidden" name="_method" value="Patch" />
    					<input type="hidden" name="id" value="<?php echo e(old('id',Auth::user()->id)); ?>">
    
    
    					<div class="col-sm-12">
    						<div class="from_add">
    							<label for="email">Email:</label>
    							<input type="email" id="email" name="email" value="<?php echo e(Auth::user()->email); ?>"><br>
    							<label for="fname">First name:</label>
    							<input type="text" id="first_name" name="first_name" value="<?php echo e(Auth::user()->first_name); ?>"><br>
    							<label for="lname">Last name:</label>
    							<input type="text" id="last_name" name="last_name" value="<?php echo e(Auth::user()->last_name); ?>"><br>
    							<label for="username">Username:</label>
    							<input type="text" id="username" name="username" value="<?php echo e(Auth::user()->username); ?>"><br>
    						</div>
    					</div>
    					<div class="sumiy">
    						<button type="submit" class="btn btn-danger">Update</button>
    					</div>	
    				</form> 
    			</div>	
    				
            </div>
        </div><!-- /.container-fluid -->
    </section>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/demogswebtech/public_html/freely/resources/views/admin/profile/profile_show.blade.php ENDPATH**/ ?>