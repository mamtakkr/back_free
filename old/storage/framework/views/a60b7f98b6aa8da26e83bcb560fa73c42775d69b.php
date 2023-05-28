<div class="modal" id="youModal">
	<div class="modal-dialog modal-xl modal-dialog modal-dialog-top" role="document">
		<div class="modal-content">
			<div class="modal-body  p-5 position-relative">
				<a type="button" data-dismiss="modal" class="close">Fermer</a>
				<div class="col-8">
					<h2><?php echo e(get_cms('equal_men_title')); ?></h2>
					<?php echo get_cms('equal_men_description'); ?>

				</div>	
			</div>
		</div>
	</div>
</div>

<div class="modal" id="grModal">
	<div class="modal-dialog modal-xl modal-dialog modal-dialog-top" role="document">
		<div class="modal-content">
			<div class="modal-body  p-5 position-relative">
			<a type="button" data-dismiss="modal" class="close">Fermer</a>
    			<div class="col-8">
    
    						<div class="twelve columns">
    						<h1 class="article-title entry-title"><?php echo e(get_cms('terms_title')); ?></h1>
    					</div><!--end twelve-->
    				
    				
    				<div class="twelve columns">
    					<div class="article-content">
    						<div dir="ltr">
    			            <?php echo get_cms('terms_description'); ?>

    			            </div>
    					</div><!--end article-content-->
    				</div><!--end twelve-->
    			</div>
		    </div>
	    </div>
    </div>
</div>	

<div class="modal" id="desModal">
	<div class="modal-dialog modal-xl modal-dialog modal-dialog-top" role="document">
		<div class="modal-content" >
		<div class="modal-body  p-5 position-relative">
		<a type="button" data-dismiss="modal" class="close">Fermer</a>
			<div class="col-8">
						
			<p><strong><?php echo e(get_cms('privacy_title')); ?></strong></p>

            <?php echo get_cms('privacy_description'); ?>

		</div>
	</div>
	</div>
</div>
</div>

<div class="modal" id="fdrModal">
	<div class="modal-dialog modal-xl modal-dialog modal-dialog-top" role="document">
		<div class="modal-content">
			<div class="modal-body  p-5 position-relative">
			<a type="button" data-dismiss="modal" class="close">Fermer</a>
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
				<div class="col-8">
					<form action="<?php echo e(route('contact-store')); ?>" method="post">
						<?php echo csrf_field(); ?>
						<label>Email</label>
						<input class="form-control mb-3" type="text" name="email"  value="">
						<label>Title</label>
						<input class="form-control mb-3" type="text" name="title"  value="">
						<label>Message</label>
						<textarea class="form-control mb-3 " rows="6" type="message" name="message" value=""></textarea>
						<button type="submit" class="bg-standard-violet text-white px-2 py-2 mt-2 mb-2">Envoyer</button>
					</form>
				</div>	
			</div>
		</div>
	</div>
</div>


<div class="modal" id="ghyModal">
	<div class="modal-dialog modal-xl modal-dialog modal-dialog-top" role="document">
		<div class="modal-content">
			<div class="modal-body position-relative">
			<a type="button" data-dismiss="modal" class="close">Fermer</a>
				<div class="col-12">
					<video width="100%" height="100%" autoplay muted>
					  <source src="https://www.freely-libertinage.com/wp-content/uploads/2022/01/animation-freely-2-1.mp4" type="video/mp4">
					</video>
				</div>	
			</div>
		</div>
	</div>
</div><?php /**PATH /home/demogswebtech/public_html/freely/resources/views/layouts/modals.blade.php ENDPATH**/ ?>