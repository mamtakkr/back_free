<?php $__env->startSection('content'); ?>

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Plans</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo e(route('admin-index')); ?>">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?php echo e(route('plans')); ?>">Plans</a></li>
                        <li class="breadcrumb-item active">Add Plan</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body bg-ytr">
                            <?php if($message=Session::get('success')): ?>
                            <div class="alert alert-success">
                                <p><?php echo e($message); ?></p>
                            </div>
                            <?php endif; ?><br>
                            <div class="tab-pane ladre" id="settings">
                                <form method="post" action="<?php echo e(route('plan-store')); ?>" enctype="multipart/form-data" class="form-horizontal">
                                    <?php echo csrf_field(); ?>
                                    
                                    <div class="form-group row">
                                        <label for="" class="col-sm-12 col-form-label">Name<span style="color: red;">*</span></label>
                                        <div class="col-sm-12">
                                            <input type="text" name="name" class="form-control" placeholder="Name" value="<?php echo e(old('name')); ?>">
                                        </div>
                                        <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span style="color:red;"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                    
                                    <div class="form-group row">
                                        <label for="" class="col-sm-12 col-form-label">Price<span style="color: red;">*</span></label>
                                        <div class="col-sm-12">
                                            <input type="number" name="price" class="form-control" placeholder="Price" value="<?php echo e(old('price')); ?>">
                                        </div>
                                        <?php $__errorArgs = ['price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span style="color:red;"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                    
                                    <div class="form-group row">
                                        <label for="" class="col-sm-12 col-form-label">Trial Days<span style="color: red;">*</span></label>
                                        <div class="col-sm-12">
                                            <input type="text" name="trial_days" class="form-control" placeholder="Trial Days" value="<?php echo e(old('trial_days')); ?>">
                                        </div>
                                        <?php $__errorArgs = ['trial_days'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span style="color:red;"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                    
                                    <div class="form-group row">
                                        <label for="" class="col-sm-12 col-form-label">Plan Type<span style="color: red;">*</span></label>
                                        <div class="col-sm-12">
                                            <select name="plan_type" class="form-control">
                                              <option value=""><?php echo e(__('Select Plan Type')); ?></option>
                                              <option value="monthly" <?php if(old('plan_type')=="monthly" ): ?> <?php echo e('selected'); ?> <?php endif; ?>><?php echo e(__('Monthly')); ?></option>
                                              <option value="yearly" <?php if(old('plan_type')=="yearly" ): ?> <?php echo e('selected'); ?> <?php endif; ?>><?php echo e(__('Yearly')); ?></option>
                                            </select>
                                        </div>
                                        <?php $__errorArgs = ['plan_type'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span style="color:red;"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>        
                                    
                                    <div class="form-group row">
                                        <label for="" class="col-sm-12 col-form-label">Description (Optional)</label>
                                        <div class="col-sm-12">
                                            <textarea name="description" id="myeditor" class="form-control desyt" placeholder="Description"><?php echo e(old('description')); ?></textarea>
                                        </div>
                                    </div>
                                    
                                    <div class="sumiy form-group row">
                                        <div class="offset-sm-2 col-sm-12">
                                            <button type="submit" class="btn btn-primary">Save</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/demogswebtech/public_html/freely/resources/views/admin/plans/create.blade.php ENDPATH**/ ?>