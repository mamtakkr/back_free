<style>
.help-block
{
font-size:80%;
color:#222;
}
body
{
background-color: #000!important;
}
</style>
<?php $__env->startSection('content'); ?>
<div class="container " >
    <?php echo $__env->make('partials.user-bar',['user_info'=>$user_info], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="row h-100 justify-content-center">
      <div class="col-lg-6 col-md-6 col-sm-6">
        <div class="rounded" id="show_all_posts">
        <div class="coment mt-3 rounded">
          <h1 class="text-center text-secondary my-5">Loading...</h1>
        </div>
      </div>
      </div>
    </div>
  </div>
<?php $__env->stopSection(); ?>

<script>
$(function() {
fetchAllPosts();

      function fetchAllPosts() {
        $.ajax({
          url: '<?php echo e(route('fetchUserPosts')); ?>',
          method: 'get',
          success: function(response) {
            $("#show_all_posts").html(JSON.parse(response));
          },
		  error: function(err)
		  {
		  alert(JSON.stringify(err));
		  }
        });
      }
});	  
</script>
<?php echo $__env->make('layouts.front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/demogswebtech/public_html/freely/resources/views/posts.blade.php ENDPATH**/ ?>