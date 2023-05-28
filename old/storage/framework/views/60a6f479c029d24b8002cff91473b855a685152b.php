<?php $__env->startSection('content'); ?>

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Slider</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Slider</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div align="right">
                        <a href="<?php echo e(route('slider-create')); ?>" class="btn btn-primary">Add New Slider</a><br>
                    </div>
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
                    <div class="card">
                        <div class="card-header">
                        </div>
                        <div class="card-body">
                            <div class="x_panel">
                                <div class="x_content">
                                    <table class="table table-striped table-bordered bulk_action datatable-checkbox">
                                        <thead>
                                            <tr>
                                                <th>Title</th>
                                                <th>Image</th>
                                                <th>Status</th>
                                                <th style="width: 10%;">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $__currentLoopData = $sliders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e($row['title']); ?></td>
                                                <td>
                                                    <ul class="list-inline">
                                                        <li class="list-inline-item">
                                                            <?php if(!empty($row->image_url)): ?>
                                                            <img alt="Avatar" class="table-avatar" src="<?php echo e(URL::to('/')); ?>/public/images/sliders/<?php echo e($row->image_url); ?>" height="50" width="50">
                                                            <?php endif; ?>
                                                        </li>
                                                    </ul>
                                                </td>
                                                <td>
                                                    <input type="checkbox" name="toogle" value="<?php echo e($row->id); ?>" data-toggle="switchbutton" <?php echo e($row['status']=='show' ? 'checked' : ''); ?> data-onlabel="show" data-offlabel="&nbsp; hide" data-size="sm" data-onstyle="success" data-offstyle="danger">
                                                </td>
                                                <td>
                                                    <a class="btn btn-info btn-sm" href="<?php echo e(route('slider-edit',$row['id'])); ?>"><i class="fa fa-edit"></i></a>
                                                    <form name="myForm" method="POST" action="<?php echo e(route('slider-delete',$row['id'])); ?>" class="float-right">
                                                        <?php echo csrf_field(); ?>
                                                        <input type="hidden" name="_method" value="Delete" />
                                                        <a href="#" data-toggle="tooltip" title="delete" class="btn btn-danger btn-sm dltBtn" data-id="<?php echo e($row->id); ?>">
                                                            <i class="fa fa-trash"></i></a>
                                                    </form>
                                                </td>
                                            </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>

                                    </table>
                                    <?php echo $sliders->links(); ?>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<script>
    $(document).ready(function() {
        $('input[name=toogle]').change(function() {
            var mode = $(this).prop('checked');
            var id = $(this).val();
            // alert(id);
            $.ajax({
                url: "<?php echo e(route('ajax-slider-status-update')); ?>",
                method: "POST",
                data: {
                    _token: '<?php echo e(csrf_token()); ?>',
                    mode: mode,
                    id: id
                },
                success: function(result) {
                    if (result.status) {
                        alertify.set('notifier', 'position', 'top-right');
                        alertify.success(result.msg);
                    } else {
                        alertify.set('notifier', 'position', 'top-right');
                        alertify.error("Please Try Again!");
                    }
                },
                error: function(request, status, error) {
                    console.log('Error is' + request.responseText);
                }
            });
        });
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/demogswebtech/public_html/freely/resources/views/admin/sliders/sliders_show.blade.php ENDPATH**/ ?>