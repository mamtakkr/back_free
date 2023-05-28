<?php $__env->startSection('content'); ?>



    <div class="container ">
        <div class="row h-100 mt-5 pt-5">
            <div class="col-lg-2 col-md-6 col-sm-6"></div>

            
            <div class="col-lg-4 col-md-6 col-sm-6">
                <form method="POST" action="<?php echo e(route('subscribe',$plan->id)); ?>">
                <?php echo csrf_field(); ?>
                <div class="coment mt-3">
                    <div class="row">
                        <div class="col-9 heading">
                            <center>
                                <h5> <?php echo e(__('public.Stripe')); ?> </h5>
                            </center>
                            <center>
                                <p>$<?php echo e($plan->price); ?>/<?php echo e($plan->plan_type); ?> </p>
                            </center>
                        </div>
                        <div class="col-12 px-0 heading">
                            <center>
                                <input type="hidden" name="payment_type" value="stripe">
                                <input type="submit" value="<?php echo e(__('Choose Payment Method')); ?>" class="btn btn-empty btn-pink">
                            </center>
                        </div>
                    </div>
                </div>
            </form>
            </div>
            
            
            <div class="col-lg-4 col-md-6 col-sm-6">
                <form method="POST" action="<?php echo e(route('subscribe',$plan->id)); ?>">
                <?php echo csrf_field(); ?>
                <div class="coment mt-3">
                    <div class="row">
                        <div class="col-9 heading">
                            <center>
                                <h5> <?php echo e(__('public.Paypal')); ?> </h5>
                            </center>
                            <center>
                                <p> $<?php echo e($plan->price); ?>/<?php echo e($plan->plan_type); ?> </p>
                            </center>
                        </div>
                        <div class="col-12 px-0 heading">
                            <center>
                                <input type="hidden" name="payment_type" value="paypal">
                                <input type="submit" value="<?php echo e(__('public.Choose_Payment_Method')); ?>" class="btn btn-empty btn-pink">
                            </center>
                        </div>
                    </div>
                </div>
            </form>
            </div>
            <div class="col-lg-2 col-md-6 col-sm-6"></div>

        </div>
    </div>

</form>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/demogswebtech/public_html/freely/resources/views/subscriptions/payment_type.blade.php ENDPATH**/ ?>