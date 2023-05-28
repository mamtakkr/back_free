<?php $__env->startSection('content'); ?>

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>City</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo e(route('admin-index')); ?>">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?php echo e(route('cities-index')); ?>">City</a></li>
                        <li class="breadcrumb-item active">Edit City</li>
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
                                <form method="post" action="<?php echo e(route('city-update')); ?>" enctype="multipart/form-data" class="form-horizontal">
                                    <?php echo csrf_field(); ?>
                                    <input type="hidden" name="_method" value="Patch" />
                                    <input type="hidden" name="id" class="form-control <?php echo e($errors->has('body')? 'is-invalid':''); ?> " value="<?php echo e(old('id',$city->id)); ?>">

                                    <div class="form-group row">
                                        <label for="" class="col-sm-12 col-form-label">Country Name</label>
                                        <div class="col-sm-12">
                                            <select id="country_id" name="country_id" class="form-control">
                                                <option value="">Select a Country</option>
                                                <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($country->id); ?>" <?php if($country->id==$city->country_id): ?> selected <?php endif; ?> ><?php echo e($country->name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                        <?php $__errorArgs = ['country_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span style="color:red;"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="" class="col-sm-12 col-form-label">City Name</label>
                                        <div class="col-sm-12">
                                            <input type="text" name="name" class="form-control" placeholder="City Name" value="<?php echo e(old('name',$city->name)); ?>">
                                        </div>
                                        <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span style="color:red;"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> </div>
                                    </div>
                                    <div class="sumiy form-group row">
                                        <div class="offset-sm-2 col-sm-12">
                                            <button type="submit" class="btn btn-primary">Update</button>
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
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/demogswebtech/public_html/freely/resources/views/admin/cities/edit.blade.php ENDPATH**/ ?>