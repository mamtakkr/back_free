
<footer class="pt-3 pb-3">
	<div class="row">
		<div class="col-lg-3 col-md-3 col-sm-3 col-12 pb-3 text-center">
			<a data-toggle="modal" data-target="#youModal" type="button" href="JavaScript:void(0);"  class=" rounded button py-2 text-center white m-auto bg-hovr"><?php echo e(__('public.Legal_Notice')); ?></a>
		</div>
		<div class="col-lg-3 col-md-3 col-sm-3 col-12 pb-3 text-center">
			<a type="button" data-toggle="modal" data-target="#desModal" href="JavaScript:void(0);"  class=" rounded button py-2 text-center white m-auto bg-hovr"><?php echo e(__('public.Privacy_Policy')); ?></a>
		</div>
		<div class="col-lg-3 col-md-3 col-sm-3 col-12 pb-3 text-center">
			<a type="button" data-toggle="modal" data-target="#grModal" href="JavaScript:void(0);"  class=" rounded button py-2 text-center white m-auto bg-hovr"><?php echo e(__('public.Terms_conditions')); ?></a>
		</div>
		<div class="col-lg-3 col-md-3 col-sm-3 col-12 pb-3 text-center">
			<a type="button"  data-toggle="modal" data-target="#fdrModal" href="JavaScript:void(0);"  class=" rounded button py-2 text-center white m-auto bg-hovr"><?php echo e(__('public.Contact')); ?></a>
		</div>
		<div class="col-12">
    		<div class="text-center mt-3">
    			<p><span style="color: #ffffff;"><?php echo e(__('public.copyRight')); ?></span></p>						
    		</div>
		</div>
	</div>
</footer>	 

    
</body>

<?php echo $__env->make('layouts.modals', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>							
			
					
</html><?php /**PATH /home/demogswebtech/public_html/freely/resources/views/layouts/partials/without_auth_footer.blade.php ENDPATH**/ ?>