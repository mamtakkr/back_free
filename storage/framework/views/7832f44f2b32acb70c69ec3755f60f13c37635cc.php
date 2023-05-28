<section class="bg_ikg">
    <div class="container ">
        <div class="row justify-content-md-center">
            <div class="col-lg-6">
                <div class="logo_r">
                    <a href="<?php echo e(route('index')); ?>"><img src="<?php echo e(URL::to('/')); ?>/public/frontend/imgs/logo-officiel-nouveau.png"></a>
                    
                </div>
                <div class="language_new">
                        <select class="form-control changeLang language_open">
                          <option value=""><?php echo e(__('Select Language')); ?></option>
                            <option value="en" <?php echo e(session()->get('locale') == 'en' ? 'selected' : ''); ?>>English</option>
                            <option value="fr" <?php echo e(session()->get('locale') == 'fr' ? 'selected' : ''); ?>>French</option>
                        </select>
                </div>    
                <h3 style="text-align: center;"><span style="color: #ffffff;"><strong><?php echo e(__('public.Freely_Libertinage')); ?>&nbsp;</strong></span></h3>
                <div class="box">
                    <p style="line-height: 1.84615; margin-top: 1.71429rem; margin-bottom: 1.71429rem; font-size: 14px; text-align: center;">
                        <strong><span style="color: #ff128e;"><?php echo e(__('public.Premier_site')); ?></span></strong>
                    </p>
                    <p><span style="color: #ffffff;"><strong><?php echo e(__('public.Organization_private_parties')); ?></strong></span></p>
                    <p><span style="color: #ffffff;">
                            <strong><?php echo e(__('public.open_community')); ?></strong></span></p>
                    <p><span style="color: #ffffff;"><strong><?php echo e(__('public.licentiousness')); ?></strong></span></p>
                    <p><span style="color: #ffffff;"><strong><?php echo e(__('public.manually_checks')); ?></strong></span></p>
                    <p><span style="color: #ffffff;"><strong><?php echo e(__('public.Libertinage_site')); ?></strong></span></p>
                    <div><span style="color: #ffffff;"><strong>&nbsp;</strong></span></div>
                    <div><span style="color: #ffffff;"><strong>&nbsp;</strong></span></div>
                </div>
                <div class="row mt-4 mb-4">
                    <div class="col-6 text-center">
                        <a href="<?php echo e(route('login')); ?>" type="button" class="rounded bg-standard-violet text-white  px-2 py-2"><?php echo e(__('public.over_18_age')); ?></a>
                    </div>
                    <div class="col-6 text-center">
                        <a href="#" type="button" data-toggle="modal" data-target="#ghyModal" class="rounded bg-standard-violet text-white px-2 py-2"><?php echo e(__('public.18_age')); ?></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
            </div>
        </div>
    </div>
</section>

<script type="text/javascript">
  
    var url = "<?php echo e(route('changeLang')); ?>";
  
    $(".changeLang").change(function(){
        window.location.href = url + "?lang="+ $(this).val();
    });
  
</script>					
			<?php /**PATH /home/demogswebtech/public_html/freely/resources/views/partials/before_login_index.blade.php ENDPATH**/ ?>