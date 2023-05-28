<?php $__env->startSection('content'); ?>

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Events</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo e(route('admin-index')); ?>">Home</a></li>
                        <li class="breadcrumb-item active">Events</li>
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
                                    <table class="table table-striped table-bordered bulk_action datatable-checkbox">
                                        <thead>
                                            <tr>
                                                <th>Username</th>
                                                <th>Title</th>
                                                <th>Event Type</th>
                                                <th>Event Category</th>
                                                <th>Address</th>
                                                <th>Postal Code</th>
                                                <th>Town</th>
                                                <th>Email</th>
                                                <th>Start Date</th>
                                                <th>End Date</th>
                                                <th>Registration Deadline</th>
                                                <th>Registration Limit</th>
                                                <th>Organizer</th>
                                                <th>Couples</th>
                                                <th>Women</th>
                                                <th>Men</th>
                                                <th>Transgender</th>
                                                <th>Total Participates</th>
                                                <th>Total Registration</th>
                                                <th style="width: 10%;">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $__currentLoopData = $events; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e($row->relUser->username); ?></td>
                                                <td><?php echo e($row->title); ?></td>
                                                <td><?php echo e($row->event_type); ?></td>
                                                <td><?php echo e($row->event_category); ?></td>
                                                <td><?php echo e($row->address); ?></td>
                                                <td><?php echo e($row->postal_code); ?></td>
                                                <td><?php echo e($row->town); ?></td>
                                                <td><?php echo e($row->email); ?></td>
                                                <td><?php echo e(date("d-M-Y", strtotime($row->start_date))); ?></td>
                                                <td><?php echo e(date("d-M-Y", strtotime($row->end_date))); ?></td>
                                                <td><?php echo e(date("d-M-Y", strtotime($row->registration_deadline))); ?></td>
                                                <td><?php echo e($row->registration_limit); ?></td>
                                                <td><?php echo e($row->organizer); ?></td>
                                                <td><?php echo e($row->couples); ?></td>
                                                <td><?php echo e($row->women); ?></td>
                                                <td><?php echo e($row->men); ?></td>
                                                <td><?php echo e($row->transgender); ?></td>
                                                <td><?php echo e($row->total_participates); ?></td>
                                                <td><?php echo e($row->total_registration); ?></td>
                                            </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>

                                    </table>
                                    <?php echo $events->links(); ?>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/demogswebtech/public_html/freely/resources/views/admin/events/index.blade.php ENDPATH**/ ?>