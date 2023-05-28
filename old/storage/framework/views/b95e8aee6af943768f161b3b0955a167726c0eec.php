<?php $__env->startSection('content'); ?>

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Event Category</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo e(route('admin-index')); ?>">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?php echo e(route('event-categories')); ?>">Event Category</a></li>
                        <li class="breadcrumb-item active">Add Event Category</li>
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
                                <form method="post" action="<?php echo e(route('event-category-store')); ?>" enctype="multipart/form-data" class="form-horizontal">
                                    <?php echo csrf_field(); ?>
                                    <div class="form-group row">
                                        <label for="" class="col-sm-2 col-form-label">Title<span style="color: red;">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" name="title" class="form-control" placeholder="Title" value="<?php echo e(old('title')); ?>">
                                        </div>
                                        <?php $__errorArgs = ['title'];
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
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/demogswebtech/public_html/freely/resources/views/admin/event_categories/create.blade.php ENDPATH**/ ?>