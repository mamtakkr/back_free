<?php $__env->startSection('content'); ?>

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Contacts</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Contacts</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                        </div>
                        <div class="card-body">
                            <div class="x_panel">
                                <div class="x_content">
                                    <table class="table table-striped table-bordered bulk_action datatable-checkbox">
                                        <thead>
                                            <tr>
                                                <th>Email</th>
                                                <th>Title</th>
                                                <th>Message</th>
                                                <th>Date</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $__currentLoopData = $contacts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e($row['email']); ?></td>
                                                <td><?php echo e($row['title']); ?></td>
                                                <td>
                                                    <?php
                                                    $string = $row['message'];
                                                    $string = strip_tags($string);
                                                    $character_count = strlen($string);
                                                    ?>
                                                    <?php if($character_count > 20): ?>
                                                    <?php echo substr($row['message'], 0,50); ?>...
                                                    <?php else: ?>
                                                    <?php echo $row['message']; ?>

                                                    <?php endif; ?>
                                                </td>
                                                <td><?php echo e(date('d-M-Y', strtotime($row->created_at))); ?></td>
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
    </section>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/demogswebtech/public_html/freely/resources/views/admin/cms/contacts_show.blade.php ENDPATH**/ ?>