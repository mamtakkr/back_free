<?php $__env->startSection('content'); ?>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/AlertifyJS/1.13.1/css/alertify.min.css" integrity="sha512-IXuoq1aFd2wXs4NqGskwX2Vb+I8UJ+tGJEu/Dc0zwLNKeQ7CW3Sr6v0yU3z5OQWe3eScVIkER4J9L7byrgR/fA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 style="text-align:center; color:#fff;">Requested users for approval</h1>
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
                    <div class="card">
                        <div class="card-header">
                        </div>
                        <div class="card-body">
                            <div class="x_panel">
                                <div class="x_content">
                                    <?php if($req_photos->count()>0): ?>
                                    <table class="table table-striped table-bordered bulk_action datatable-checkbox" id="table_id">
                                        <thead>
                                            <tr>
                                                <th>Profile Picture</th>
                                                <th>Nickname</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $__currentLoopData = $req_photos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td>
                                                    <ul class="list-inline">
                                                        <li class="list-inline-item">
                                                            <?php if(!empty($row->relUser->image_url)): ?>
                                                            <img alt="Avatar" class="table-avatar" src="<?php echo e(URL::to('/')); ?>/public/images/users/<?php echo e($row->relUser->image_url); ?>" height="50" width="50">
                                                            <?php endif; ?>
                                                        </li>
                                                    </ul>
                                                </td>
                                                <td><?php echo e($row->relUser->username); ?></td>

                                                <td id="photo_status<?php echo e($row->id); ?>">
                                                    <?php if($row['status']=='approved'): ?> <?php echo e($row['status']); ?> <?php endif; ?>
                                                    <?php if($row['status']=='declined'): ?> <?php echo e($row['status']); ?> <?php endif; ?>
                                                    <?php if($row['status']=='pending'): ?>
                                                    <select id="status" onchange="updateStatus(<?php echo e($row['id']); ?>,this.selectedIndex)" name="status">
                                                        <option value="pending" <?php if ($row['status'] == 'pending') echo "Selected"; ?>>Pending</option>
                                                        <option value="approved" <?php if ($row['status'] == 'approved') echo "Selected"; ?>>Approved</option>
                                                        <option value="declined" <?php if ($row['status'] == 'declined') echo "Selected"; ?>>Declined</option>
                                                    </select>
                                                    <?php endif; ?>
                                                </td>
                                            </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>

                                    </table>
                                    <?php else: ?>
                                    No record found!
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/AlertifyJS/1.13.1/alertify.min.js" integrity="sha512-JnjG+Wt53GspUQXQhc+c4j8SBERsgJAoHeehagKHlxQN+MtCCmFDghX9/AcbkkNRZptyZU4zC8utK59M5L45Iw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>

<script>
$(document).ready( function () {
    $('#table_id').DataTable();
} );
    function updateStatus(id, selectedId) {
        console.log(id)
        var _token = "<?php echo e(csrf_token()); ?>";
        var status = document.getElementById('status').options[selectedId].value;
        var qs = {
            id: id,
            status: status,
            _token: _token
        };
        
        $.ajax({
            url: "<?php echo e(route('request-photos-update')); ?>",
            method: "POST",
            data: qs,
            success: function(result) {
                alertify.set('notifier', 'position', 'top-right');
                alertify.success(result.message);
                $('#photo_status'+id).load(location.href + ' #photo_status'+id);
            },
            error: function(request, status, error) {
                console.log('Error is' + request.responseText);
            }
        });
    }
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/demogswebtech/public_html/freely/resources/views/secrets/req_photos.blade.php ENDPATH**/ ?>