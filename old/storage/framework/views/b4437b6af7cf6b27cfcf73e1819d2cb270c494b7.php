<?php $__env->startSection('content'); ?>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 style="text-align:center; color:#fff;">Blacklisted Members</h1>
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
                                    <?php if($members->count()>0): ?>
                                    <table class="table table-striped table-bordered bulk_action datatable-checkbox" id="table_id">
                                        <thead>
                                            <tr>
                                                <th>Profile Picture</th>
                                                <th>Nickname</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $__currentLoopData = $members; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
                                                
                                                <td>
                                                    <form name="myForm" method="POST" action="<?php echo e(route('blacklist-delete',$row['id'])); ?>" class="float-right">
                                                        <?php echo csrf_field(); ?>
                                                        <input type="hidden" name="_method" value="Delete" />
                                                        <a href="#" data-toggle="tooltip" title="delete" class="btn btn-danger btn-sm dltBtn" data-id="<?php echo e($row->id); ?>">
                                                           Unblock
                                                        </a>
                                                    </form>
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
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>
<script>
    
$(document).ready( function () {
    $('#table_id').DataTable();
} );

    $('.dltBtn').click(function(e) {
      var form = $(this).closest('form');
      var dataID = $(this).data('id');
      e.preventDefault();
      swal({
          title: "Are you sure?",
          text: "You want to unblock this user!",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {
            form.submit();
            swal("This member has been unblocked", {
              icon: "success",
            });
          } else {
            swal("Your Record is safe!");
          }
        });
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/demogswebtech/public_html/freely/resources/views/members/blacklists.blade.php ENDPATH**/ ?>