<?php $__env->startSection('content'); ?>

<section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Equal Mentions</h1>
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
                <div class="bg-ytr col-8 m-auto">
    				<form method="post" action="<?php echo e(route('equal-ment-update')); ?>" enctype="multipart/form-data" class="form-horizontal">
    					<?php echo csrf_field(); ?>
    					<?php if(!empty($equal_m->id)): ?>
    					<input type="hidden" name="_method" value="POST" />
    					<input type="hidden" name="id" value="<?php echo e(old('id',$equal_m->id)); ?>">
                        <?php else: ?>
    					<input type="hidden" name="id" value="">
    					<?php endif; ?>
    					<div class="col-sm-12">
    						<div class="from_add">
    							<label>Title:</label>
    							<input type="text" class="block mt-1 w-full" name="equal_men_title" value="<?php if(!empty($equal_m->equal_men_title)): ?> <?php echo e($equal_m->equal_men_title); ?> <?php else: ?> <?php echo e(old('equal_men_title')); ?> <?php endif; ?>" required><br>
    							<label>Description:</label>
    							<textarea name="equal_men_description" id="myeditor" class="form-control" placeholder="Description"><?php if(!empty($equal_m->equal_men_description)): ?> <?php echo e($equal_m->equal_men_description); ?> <?php else: ?> <?php echo e(old('equal_men_description')); ?> <?php endif; ?></textarea>
    						</div>
    					</div>
    					    <div class="sumiy">
    						    <button type="submit" class="btn btn-danger">Save</button>
    						</div>   
    					</div>	
    				</form> 
				</div>
            </div>
        </div>
    </section>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/demogswebtech/public_html/freely/resources/views/admin/cms/equal_mention_edit.blade.php ENDPATH**/ ?>