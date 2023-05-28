<?php $__env->startSection('content'); ?>

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><?php echo e($pro_view->username); ?></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active"><?php echo e($pro_view->username); ?></li>
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
                                                    <div class="col-3 trta">
                                                        <h4><b>Email:</b></h4>
                                                    </div>   
                                                    <div class="col-3 text_tre">
                                                        <p> <?php if(!empty($pro_view->email)): ?> <?php echo e($pro_view->email); ?> <?php else: ?> <?php echo e('N/A'); ?> <?php endif; ?></p>
                                                    </div>
                                                </div>
                                                
                                                <div class="row emi_row">
                                                    <div class="col-3 trta">
                                                        <h4><b>Nickname:</b></h4>
                                                    </div>   
                                                    <div class="col-3 text_tre">
                                                        <p> <?php if(!empty($pro_view->username)): ?> <?php echo e($pro_view->username); ?> <?php else: ?> <?php echo e('N/A'); ?> <?php endif; ?></p>
                                                    </div>
                                                </div>
                                                
                                                <div class="row emi_row">
                                                    <div class="col-3 trta">
                                                        <h4><b>Club Name:</b></h4>
                                                    </div>   
                                                    <div class="col-3 text_tre">
                                                        <p> <?php if(!empty($pro_view->club_name)): ?> <?php echo e($pro_view->club_name); ?> <?php else: ?> <?php echo e('N/A'); ?> <?php endif; ?></p>
                                                    </div>
                                                </div>
                                                
                                                <div class="row emi_row">
                                                    <div class="col-3 trta">
                                                        <h4><b>Website Url:</b></h4>
                                                    </div>   
                                                    <div class="col-3 text_tre">
                                                        <p> <?php if(!empty($pro_view->relUserDetail->website_url)): ?> <?php echo e($pro_view->relUserDetail->website_url); ?> <?php else: ?> <?php echo e('N/A'); ?> <?php endif; ?></p>
                                                    </div>
                                                </div>
                                                
                                                <div class="row emi_row">
                                                    <div class="col-3 trta">
                                                        <h4><b>Contact Number:</b></h4>
                                                    </div>   
                                                    <div class="col-3 text_tre">
                                                        <p> <?php if(!empty($pro_view->relUserDetail->contact)): ?> <?php echo e($pro_view->relUserDetail->contact); ?> <?php else: ?> <?php echo e('N/A'); ?> <?php endif; ?></p>
                                                    </div>
                                                </div>
                                                
                                                <div class="row emi_row">
                                                    <div class="col-3 trta">
                                                        <h4><b>Status:</b></h4>
                                                    </div>   
                                                    <div class="col-3 text_tre">
                                                        <p> <?php if(!empty($pro_view->relUserDetail->status)): ?> <?php echo e($pro_view->relUserDetail->status); ?> <?php else: ?> <?php echo e('N/A'); ?> <?php endif; ?></p>
                                                    </div>
                                                </div>
                                                
                                                <div class="row emi_row">
                                                    <div class="col-3 trta">
                                                        <h4><b>Address:</b></h4>
                                                    </div>   
                                                    <div class="col-3 text_tre">
                                                        <p> <?php if(!empty($pro_view->relUserDetail->address)): ?> <?php echo e($pro_view->relUserDetail->address); ?> <?php else: ?> <?php echo e('N/A'); ?> <?php endif; ?></p>
                                                    </div>
                                                </div>
                                                
                                                <div class="row emi_row">
                                                    <div class="col-3 trta">
                                                        <h4><b>Zipcode:</b></h4>
                                                    </div>   
                                                    <div class="col-3 text_tre">
                                                       <p> <?php if(!empty($pro_view->relUserDetail->zipcode)): ?> <?php echo e($pro_view->relUserDetail->zipcode); ?> <?php else: ?> <?php echo e('N/A'); ?> <?php endif; ?></p>
                                                    </div>
                                                </div>
                                                
                                                 <div class="row emi_row">
                                                    <div class="col-3 trta">
                                                       <h4><b>Country:</b></h4>
                                                    </div>   
                                                    <div class="col-3 text_tre">
                                                       <p> <?php if(!empty($pro_view->relUserDetail->country)): ?> <?php echo e($pro_view->relUserDetail->country); ?> <?php else: ?> <?php echo e('N/A'); ?> <?php endif; ?></p>
                                                    </div>
                                                </div>
                                                
                                                <div class="row emi_row">
                                                    <div class="col-3 trta">
                                                      <h4><b>City:</b></h4>
                                                    </div>   
                                                    <div class="col-3 text_tre">
                                                       <p> <?php if(!empty($pro_view->relUserDetail->city)): ?> <?php echo e($pro_view->relUserDetail->city); ?> <?php else: ?> <?php echo e('N/A'); ?> <?php endif; ?></p>
                                                    </div>
                                                </div>
                                                
                                                <div class="row emi_row">
                                                    <div class="col-3 trta">
                                                      <h4><b>About:</b></h4>
                                                    </div>   
                                                    <div class="col-3 text_tre">
                                                       <p> <?php if(!empty($pro_view->relUserDetail->about)): ?> <?php echo e($pro_view->relUserDetail->about); ?> <?php else: ?> <?php echo e('N/A'); ?> <?php endif; ?></p>

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
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/demogswebtech/public_html/freely/resources/views/admin/users/professional_view.blade.php ENDPATH**/ ?>