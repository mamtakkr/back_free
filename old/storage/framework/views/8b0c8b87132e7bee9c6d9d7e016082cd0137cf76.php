<?php $__env->startSection('content'); ?>

<style>
    .new_coment{
        height: 500px;
    }
</style>

<div class="container mt-5">
    <div class="row">
        <div class="col-lg-12 col-md-6 col-sm-6">
            <p style="text-align:center; font-weight:bold; color:#ff128e;">Welcome to the subscriptions page. <br> You can choose either monthly or yearly subscription as mentioned below:</p>
        </div>
    </div>
</div>


<div class="container my-5">
    <div class="row h-100 ">
        <div class="col-lg-2 col-md-6 col-sm-6"></div>
        
        <?php $__currentLoopData = $plans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $plan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-lg-4 col-md-6 col-sm-6">
            <div class="coment new_coment mt-3">
                <div class="row">
                    <div class="col-12 heading">
                        <center><h5> <?php echo e(ucfirst($plan->name)); ?> </h5></center>
                        <center><p><?php echo e(env('currency_symbol')); ?><?php echo e($plan->price); ?>/<?php echo e($plan->plan_type); ?> </p></center>
                        <?php if(!empty(auth()->user()->plan_id) && auth()->user()->plan_id == $plan->id): ?>
                            <center><p>Start Date: <?php echo e(date('d M Y',strtotime(auth()->user()->subscribe_date))); ?> <br> End Date: <?php echo e(date('d M Y',strtotime(auth()->user()->ends_at))); ?></p></center>
                            <?php if(auth()->user()->ends_at > date('Y-m-d')): ?>
                            <center><p>Days Remaining : <?php echo e(Carbon::now()->diffInDays(\Carbon\Carbon::parse(auth()->user()->ends_at))); ?> days</p></center>
                            <?php else: ?>
                            <center><p>Expired</center></p>
                            <?php endif; ?>
                        <?php endif; ?>
                    </div>
                    <div class="col-12 px-0 heading">
                        <!--<h5 class="mt-1"> Shivic24 </h5>-->
                        <p><?php if(!empty($plan->description)): ?> <?php echo $plan->description; ?> <?php endif; ?></p>
                        <center>
                            <?php if(!empty(auth()->user()->plan_id) && auth()->user()->ends_at > date('Y-m-d')): ?>
                                <?php if(auth()->user()->plan_id == $plan->id && auth()->user()->ends_at > date('Y-m-d')): ?>
                                <p class="btn btn-empty btn-pink">Activated</p>
                                <?php endif; ?>
                            <?php else: ?>
                                <a href="<?php echo e(route('payment-method',Crypt::encrypt($plan->id))); ?>" class="btn btn-empty btn-pink">Choose Plan</a>
                            <?php endif; ?>
                            
                        </center>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        
        <div class="col-lg-2 col-md-6 col-sm-6"></div>

    </div>
</div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/demogswebtech/public_html/freely/resources/views/subscriptions/index.blade.php ENDPATH**/ ?>