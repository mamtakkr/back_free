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
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="row emi_row">
                                                    <div class="col-6 trta">
                                                        <h4><b>Username</b></h4>
                                                        <h4><b>Title</b></h4>
                                                        <h4><b>Event Type</b></h4>
                                                        <h4><b>Event Category</b></h4>
                                                        <h4><b>Address</b></h4>
                                                        <h4><b>Postal Code</b></h4>
                                                        <h4><b>Town</b></h4>
                                                        <h4><b>Email</b></h4>
                                                        <h4><b>Start Date</b></h4>
                                                        <h4><b>End Date</b></h4>
                                                        <h4><b>Registration Deadline</b></h4>
                                                        <h4><b>Registration Limit</b></h4>
                                                        <h4><b>Organizer</b></h4>
                                                        <h4><b>Couples</b></h4>
                                                        <h4><b>Women</b></h4>
                                                        <h4><b>Men</b></h4>
                                                        <h4><b>Transgender</b></h4>
                                                        <h4><b>Total Participants</b></h4>
                                                    </div>
                                                    <div class="col-6 text_tre">
                                                        <p> <?php if(!empty($event->relAllUser->username)): ?> <?php echo e($event->relAllUser->username); ?> <?php else: ?> <?php echo e('N/A'); ?> <?php endif; ?></p>
                                                        <p> <?php if(!empty($event->title)): ?> <?php echo e($event->title); ?> <?php else: ?> <?php echo e('N/A'); ?> <?php endif; ?></p>
                                                        <p> <?php if(!empty($event->event_type)): ?> <?php echo e($event->event_type); ?> <?php else: ?> <?php echo e('N/A'); ?> <?php endif; ?></p>
                                                        <p> <?php if(!empty($event->event_category)): ?> <?php echo e($event->event_category); ?> <?php else: ?> <?php echo e('N/A'); ?> <?php endif; ?></p>
                                                        <p> <?php if(!empty($event->address)): ?> <?php echo e($event->address); ?> <?php else: ?> <?php echo e('N/A'); ?> <?php endif; ?></p>
                                                        <p> <?php if(!empty($event->postal_code)): ?> <?php echo e($event->postal_code); ?> <?php else: ?> <?php echo e('N/A'); ?> <?php endif; ?></p>
                                                        <p> <?php if(!empty($event->town)): ?> <?php echo e($event->town); ?> <?php else: ?> <?php echo e('N/A'); ?> <?php endif; ?></p>
                                                        <p> <?php if(!empty($event->email)): ?> <?php echo e($event->email); ?> <?php else: ?> <?php echo e('N/A'); ?> <?php endif; ?></p>
                                                        <p> <?php if(!empty($event->start_date)): ?> <?php echo e(date("d-M-Y", strtotime($event->start_date))); ?> <?php else: ?> <?php echo e('N/A'); ?> <?php endif; ?></p>
                                                        <p> <?php if(!empty($event->end_date)): ?> <?php echo e(date("d-M-Y", strtotime($event->end_date))); ?> <?php else: ?> <?php echo e('N/A'); ?> <?php endif; ?></p>
                                                        <p> <?php if(!empty($event->registration_deadline)): ?> <?php echo e(date("d-M-Y", strtotime($event->registration_deadline))); ?> <?php else: ?> <?php echo e('N/A'); ?> <?php endif; ?></p>
                                                        <p> <?php if(!empty($event->registration_limit)): ?> <?php echo e($event->registration_limit); ?> <?php else: ?> <?php echo e('N/A'); ?> <?php endif; ?></p>
                                                        <p> <?php if(!empty($event->organizer)): ?> <?php echo e($event->organizer); ?> <?php else: ?> <?php echo e('N/A'); ?> <?php endif; ?></p>
                                                        <p> <?php if(!empty($event->couples)): ?> <?php echo e($event->couples); ?> <?php else: ?> <?php echo e('N/A'); ?> <?php endif; ?></p>
                                                        <p> <?php if(!empty($event->women)): ?> <?php echo e($event->women); ?> <?php else: ?> <?php echo e('N/A'); ?> <?php endif; ?></p>
                                                        <p> <?php if(!empty($event->men)): ?> <?php echo e($event->men); ?> <?php else: ?> <?php echo e('N/A'); ?> <?php endif; ?></p>
                                                        <p> <?php if(!empty($event->transgender)): ?> <?php echo e($event->transgender); ?> <?php else: ?> <?php echo e('N/A'); ?> <?php endif; ?></p>
                                                        <p> <?php if(!empty($event->total_participates)): ?> <?php echo e($event->total_participates); ?> <?php else: ?> <?php echo e('N/A'); ?> <?php endif; ?></p>
                                                    </div>
                                                </div>
                                            </div> 
                                            
                                        </div>    
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

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/demogswebtech/public_html/freely/resources/views/admin/events/completed_event_view.blade.php ENDPATH**/ ?>