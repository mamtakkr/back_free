
<?php $__env->startSection('content'); ?>

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><?php echo e($member->username); ?></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active"><?php echo e($member->username); ?></li>
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
                                        <div class="row emi_row">
                                            <div class="col-md-6">
                                                <h1>He</h1>
                                                <div class="row emi_row">
                                                    <div class="col-3 trta">
                                                        <h4><b>Email:</b></h4>
                                                    </div>
                                                    <div class="col-3 text_tre">
                                                        <p> <?php if(!empty($member->email)): ?> <?php echo e($member->email); ?> <?php else: ?> <?php echo e('N/A'); ?> <?php endif; ?></p>
                                                    </div> 
                                                </div>
                                                <div class="row emi_row">
                                                    <div class="col-3 trta">
                                                        <h4><b>Experience:</b></h4>
                                                    </div>   
                                                    <div class="col-3 text_tre">
                                                        <p> <?php if(!empty($member->experience)): ?> <?php echo e($member->experience); ?> <?php else: ?> <?php echo e('N/A'); ?> <?php endif; ?></p>
                                                    </div>
                                                </div>    
                                                <div class="row emi_row">
                                                    <div class="col-3 trta">
                                                        <h4><b>You Are:</b></h4>
                                                    </div>   
                                                    <div class="col-3 text_tre">
                                                        <p> <?php if(!empty($member->you_are)): ?> <?php echo e($member->you_are); ?> <?php else: ?> <?php echo e('N/A'); ?> <?php endif; ?></p>
                                                    </div>
                                                </div>  
                                                <div class="row emi_row">
                                                    <div class="col-3 trta">
                                                         <h4><b>Who Am I:</b></h4>
                                                    </div>   
                                                    <div class="col-3 text_tre">
                                                        <p> <?php if(!empty($member->relUserDetail->who_i)): ?> <?php echo e($member->relUserDetail->who_i); ?> <?php else: ?> <?php echo e('N/A'); ?> <?php endif; ?></p>
                                                    </div>
                                                </div> 
                                                <div class="row emi_row">
                                                    <div class="col-3 trta">
                                                         <h4><b>Date Of Birth:</b></h4>
                                                    </div>   
                                                    <div class="col-3 text_tre">
                                                        <p> <?php if(!empty($member->relUserDetail->dob)): ?> <?php echo e($member->relUserDetail->dob); ?> <?php else: ?> <?php echo e('N/A'); ?> <?php endif; ?></p>
                                                    </div>
                                                </div> 
                                                
                                                <div class="row emi_row">
                                                    <div class="col-3 trta">
                                                        <h4><b>Age:</b></h4>
                                                    </div>   
                                                    <div class="col-3 text_tre">
                                                         <p> <?php if(!empty($member->relUserDetail->age)): ?> <?php echo e($member->relUserDetail->age); ?> <?php else: ?> <?php echo e('N/A'); ?> <?php endif; ?></p>
                                                    </div>
                                                </div> 
                                                
                                                <div class="row emi_row">
                                                    <div class="col-3 trta">
                                                        <h4><b>Size:</b></h4>
                                                    </div>   
                                                    <div class="col-3 text_tre">
                                                         <p> <?php if(!empty($member->relUserDetail->size)): ?> <?php echo e($member->relUserDetail->size); ?> <?php else: ?> <?php echo e('N/A'); ?> <?php endif; ?></p>
                                                    </div>
                                                </div> 
                                                
                                                 <div class="row emi_row">
                                                    <div class="col-3 trta">
                                                       <h4><b>Weight:</b></h4>
                                                    </div>   
                                                    <div class="col-3 text_tre">
                                                         <p> <?php if(!empty($member->relUserDetail->weight)): ?> <?php echo e($member->relUserDetail->weight); ?> <?php else: ?> <?php echo e('N/A'); ?> <?php endif; ?></p>
                                                    </div>
                                                </div> 
                                                
                                                <div class="row emi_row">
                                                    <div class="col-3 trta">
                                                       <h4><b>Hair Size:</b></h4>
                                                    </div>   
                                                    <div class="col-3 text_tre">
                                                        <p> <?php if(!empty($member->relUserDetail->hair_size)): ?> <?php echo e($member->relUserDetail->hair_size); ?> <?php else: ?> <?php echo e('N/A'); ?> <?php endif; ?></p>
                                                    </div>
                                                </div>
                                                
                                                <div class="row emi_row">
                                                    <div class="col-3 trta">
                                                        <h4><b>Hair Color:</b></h4>
                                                    </div>   
                                                    <div class="col-3 text_tre">
                                                         <p> <?php if(!empty($member->relUserDetail->hair_color)): ?> <?php echo e($member->relUserDetail->hair_color); ?> <?php else: ?> <?php echo e('N/A'); ?> <?php endif; ?></p>
                                                    </div>
                                                </div>
                                                <div class="row emi_row">
                                                    <div class="col-3 trta">
                                                        <h4><b>Eye Color:</b></h4>
                                                    </div>   
                                                    <div class="col-3 text_tre">
                                                         <p> <?php if(!empty($member->relUserDetail->eye_color)): ?> <?php echo e($member->relUserDetail->eye_color); ?> <?php else: ?> <?php echo e('N/A'); ?> <?php endif; ?></p>
                                                    </div>
                                                </div>
                                                <div class="row emi_row">
                                                    <div class="col-3 trta">
                                                         <h4><b>Origin:</b></h4>
                                                    </div>   
                                                    <div class="col-3 text_tre">
                                                         <p> <?php if(!empty($member->relUserDetail->origin)): ?> <?php echo e($member->relUserDetail->origin); ?> <?php else: ?> <?php echo e('N/A'); ?> <?php endif; ?></p>
                                                    </div>
                                                </div>
                                                
                                                <div class="row emi_row">
                                                    <div class="col-3 trta">
                                                         <h4><b>Country:</b></h4>
                                                    </div>   
                                                    <div class="col-3 text_tre">
                                                         <p> <?php if(!empty($member->relUserDetail->country)): ?> <?php echo e($member->relUserDetail->country); ?> <?php else: ?> <?php echo e('N/A'); ?> <?php endif; ?></p>
                                                    </div>
                                                </div>
                                                
                                                <div class="row emi_row">
                                                    <div class="col-3 trta">
                                                        <h4><b>City:</b></h4>
                                                    </div>   
                                                    <div class="col-3 text_tre">
                                                        <p> <?php if(!empty($member->relUserDetail->city)): ?> <?php echo e($member->relUserDetail->city); ?> <?php else: ?> <?php echo e('N/A'); ?> <?php endif; ?></p>
                                                    </div>
                                                </div>
                                                
                                                <div class="row emi_row">
                                                    <div class="col-3 trta">
                                                        <h4><b>Sillhouette:</b></h4>
                                                    </div>   
                                                    <div class="col-3 text_tre">
                                                      <p> <?php if(!empty($member->relUserDetail->sillhouette)): ?> <?php echo e($member->relUserDetail->sillhouette); ?> <?php else: ?> <?php echo e('N/A'); ?> <?php endif; ?></p>
                                                    </div>
                                                </div>
                                                
                                                <br>

                                                <div class="row emi_row">
                                                    <div class="col-3 trta">
                                                        <h4><b>Research:</b></h4>
                                                    </div>   
                                                    <div class="col-3 text_tre">
                                                       <p> <?php if(!empty($member->relUserDetail->research)): ?> <?php echo e($member->relUserDetail->research); ?> <?php else: ?> <?php echo e('N/A'); ?> <?php endif; ?></p>
                                                    </div>
                                                </div>
                                                
                                                <div class="row emi_row">
                                                    <div class="col-3 trta">
                                                       <h4><b>Type Of Meeting:</b></h4>
                                                    </div>   
                                                    <div class="col-3 text_tre">
                                                       <p> <?php if(!empty($member->relUserDetail->type_of_meeting)): ?> <?php echo e($member->relUserDetail->type_of_meeting); ?> <?php else: ?> <?php echo e('N/A'); ?> <?php endif; ?></p>
                                                    </div>
                                                </div>
                                                
                                                <div class="row emi_row">
                                                    <div class="col-3 trta">
                                                       <h4><b>First Meeting:</b></h4>
                                                    </div>   
                                                    <div class="col-3 text_tre">
                                                       <p> <?php if(!empty($member->relUserDetail->first_meeting)): ?> <?php echo e($member->relUserDetail->first_meeting); ?> <?php else: ?> <?php echo e('N/A'); ?> <?php endif; ?></p>
                                                    </div>
                                                </div>
                                                
                                                <div class="row emi_row">
                                                    <div class="col-3 trta">
                                                       <h4><b>Vibe:</b></h4>
                                                    </div>   
                                                    <div class="col-3 text_tre">
                                                      <p> <?php if(!empty($member->relUserDetail->vibe)): ?> <?php echo e($member->relUserDetail->vibe); ?> <?php else: ?> <?php echo e('N/A'); ?> <?php endif; ?></p>
                                                    </div>
                                                </div>
                                                       
                                                <div class="row emi_row">
                                                    <div class="col-3 trta">
                                                       <h4><b>About:</b></h4>
                                                    </div>   
                                                    <div class="col-3 text_tre">
                                                      <p> <?php if(!empty($member->relUserDetail->about)): ?> <?php echo e($member->relUserDetail->about); ?> <?php else: ?> <?php echo e('N/A'); ?> <?php endif; ?></p>
                                                    </div>
                                                </div>
                                                
                                                 
                                              
                                            </div>
                                                
                                                    <!--<h4><b>Address:</b></h4>-->
                                            <!--    </div>-->
                                            <!--</div> -->
                                            <?php if(!empty($member->relUserDetail->dob_couple)): ?>
                                            <div class="col-md-6">
                                                <h1>She</h1>
                                                
                                                    
                                                <div class="row emi_row">
                                                    <div class="col-3 trta">
                                                       <h4><b>Who I:</b></h4>
                                                    </div>   
                                                    <div class="col-3 text_tre">
                                                        <p> <?php if(!empty($member->relUserDetail->dob_couple)): ?> <?php echo e($member->relUserDetail->dob_couple); ?> <?php else: ?> <?php echo e('N/A'); ?> <?php endif; ?></p>
                                                    </div>
                                                </div>
                                                
                                                <div class="row emi_row">
                                                    <div class="col-3 trta">
                                                       <h4><b>Date Of Birth:</b></h4>
                                                    </div>   
                                                    <div class="col-3 text_tre">
                                                        <p> <?php if(!empty($member->relUserDetail->who_i_couple)): ?> <?php echo e($member->relUserDetail->who_i_couple); ?> <?php else: ?> <?php echo e('N/A'); ?> <?php endif; ?></p>
                                                    </div>
                                                </div>
                                                
                                                <div class="row emi_row">
                                                    <div class="col-3 trta">
                                                       <h4><b>Age:</b></h4>
                                                    </div>   
                                                    <div class="col-3 text_tre">
                                                        <p> <?php if(!empty($member->relUserDetail->age_couple)): ?> <?php echo e($member->relUserDetail->age_couple); ?> <?php else: ?> <?php echo e('N/A'); ?> <?php endif; ?></p>
                                                    </div>
                                                </div>
                                                
                                                <div class="row emi_row">
                                                    <div class="col-3 trta">
                                                       <h4><b>Size:</b></h4>
                                                    </div>   
                                                    <div class="col-3 text_tre">
                                                        <p> <?php if(!empty($member->relUserDetail->size_couple)): ?> <?php echo e($member->relUserDetail->size_couple); ?> <?php else: ?> <?php echo e('N/A'); ?> <?php endif; ?></p>
                                                    </div>
                                                </div>
                                                
                                                <div class="row emi_row">
                                                    <div class="col-3 trta">
                                                       <h4><b>Weight:</b></h4>
                                                    </div>   
                                                    <div class="col-3 text_tre">
                                                        <p> <?php if(!empty($member->relUserDetail->weight_couple)): ?> <?php echo e($member->relUserDetail->weight_couple); ?> <?php else: ?> <?php echo e('N/A'); ?> <?php endif; ?></p>
                                                    </div>
                                                </div>
                                                
                                                <div class="row emi_row">
                                                    <div class="col-3 trta">
                                                       <h4><b>Hair Size:</b></h4>
                                                    </div>   
                                                    <div class="col-3 text_tre">
                                                         <p> <?php if(!empty($member->relUserDetail->hair_size_couple)): ?> <?php echo e($member->relUserDetail->hair_size_couple); ?> <?php else: ?> <?php echo e('N/A'); ?> <?php endif; ?></p>
                                                    </div>
                                                </div>
                                                
                                                <div class="row emi_row">
                                                    <div class="col-3 trta">
                                                        <h4><b>Hair Color:</b></h4>
                                                    </div>   
                                                    <div class="col-3 text_tre">
                                                         <p> <?php if(!empty($member->relUserDetail->hair_color_couple)): ?> <?php echo e($member->relUserDetail->hair_color_couple); ?> <?php else: ?> <?php echo e('N/A'); ?> <?php endif; ?></p>
                                                    </div>
                                                </div>
                                                
                                                <div class="row emi_row">
                                                    <div class="col-3 trta">
                                                        <h4><b>Eye Color:</b></h4>
                                                    </div>   
                                                    <div class="col-3 text_tre">
                                                        <p> <?php if(!empty($member->relUserDetail->eye_color_couple)): ?> <?php echo e($member->relUserDetail->eye_color_couple); ?> <?php else: ?> <?php echo e('N/A'); ?> <?php endif; ?></p>
                                                    </div>
                                                </div>
                                                
                                                <div class="row emi_row">
                                                    <div class="col-3 trta">
                                                        <h4><b>Origin:</b></h4>
                                                    </div>   
                                                    <div class="col-3 text_tre">
                                                       <p> <?php if(!empty($member->relUserDetail->origin_couple)): ?> <?php echo e($member->relUserDetail->origin_couple); ?> <?php else: ?> <?php echo e('N/A'); ?> <?php endif; ?></p>
                                                    </div>
                                                </div>
                                                
                                                <div class="row emi_row">
                                                    <div class="col-3 trta">
                                                       <h4><b>Country:</b></h4>
                                                    </div>   
                                                    <div class="col-3 text_tre">
                                                      <p> <?php if(!empty($member->relUserDetail->country_couple)): ?> <?php echo e($member->relUserDetail->country_couple); ?> <?php else: ?> <?php echo e('N/A'); ?> <?php endif; ?></p>
                                                    </div>
                                                </div>
                                                
                                                <div class="row emi_row">
                                                    <div class="col-3 trta">
                                                       <h4><b>City:</b></h4>
                                                    </div>   
                                                    <div class="col-3 text_tre">
                                                        <p> <?php if(!empty($member->relUserDetail->city_couple)): ?> <?php echo e($member->relUserDetail->city_couple); ?> <?php else: ?> <?php echo e('N/A'); ?> <?php endif; ?></p>
                                                    </div>
                                                </div>
                                                
                                                <div class="row emi_row">
                                                    <div class="col-3 trta">
                                                       <h4><b>Sillhouette:</b></h4>
                                                    </div>   
                                                    <div class="col-3 text_tre">
                                                        <p> <?php if(!empty($member->relUserDetail->sillhouette_couple)): ?> <?php echo e($member->relUserDetail->sillhouette_couple); ?> <?php else: ?> <?php echo e('N/A'); ?> <?php endif; ?></p>
                                                    </div>
                                                </div>
                                                   
                                                
                                            </div>
                                            <?php endif; ?>
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
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/demogswebtech/public_html/freely/resources/views/admin/users/member_view.blade.php ENDPATH**/ ?>