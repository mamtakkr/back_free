<?php $__env->startSection('content'); ?>

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Professionals</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo e(route('admin-index')); ?>">Home</a></li>
                        <li class="breadcrumb-item active">Professionals</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
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
                                    <div class="data-scroll">
                                        <table class="table table-striped table-bordered bulk_action datatable-checkbox" id="user_update">
                                            <thead>
                                                <tr>
                                                    <th>Nickname</th>
                                                    <th>Email</th>
                                                    <th>Club Name</th>
                                                    <th>Status</th>
                                                    <th style="width: 10%;">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $__currentLoopData = $professionals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <td><?php echo e($row->username); ?></td>
                                                    <td><?php echo e($row->email); ?></td>
                                                    <td><?php echo e($row->club_name); ?></td>
                                                    <td>
                                                        <select id="active_status" onchange="updateStatus(<?php echo e($row['id']); ?>,this.selectedIndex)" name="active_status">
                                                            <option value="active" <?php if ($row['active_status'] == 'active') echo "Selected"; ?>>Active</option>
                                                            <option value="inactive" <?php if ($row['active_status'] == 'inactive') echo "Selected"; ?>>Inactive</option>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <a class="btn btn-info btn-sm" href="<?php echo e(route('pro-view',$row['id'])); ?>"><i class="fa fa-eye"></i></a>
                                                    </td>
                                                </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </tbody>
    
                                        </table>
                                    </div>
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
    function updateStatus(id, selectedId) {
        var _token = "<?php echo e(csrf_token()); ?>";
        var active_status = document.getElementById('active_status').options[selectedId].value;
        var qs = {
            id: id,
            status: active_status,
            _token: _token
        };
        
        $.ajax({
            url: "<?php echo e(route('user-update-active-status')); ?>",
            method: "POST",
            data: qs,
            success: function(result) {
                alertify.set('notifier', 'position', 'top-right');
                alertify.success(result.message);
                $('#user_update').load(location.href + ' #user_update');
            },
            error: function(request, status, error) {
                console.log('Error is' + request.responseText);
            }
        });
    }
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/demogswebtech/public_html/freely/resources/views/admin/users/professionals.blade.php ENDPATH**/ ?>