<?php $__env->startSection('content'); ?>
<?php echo $__env->make('partials.modals', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<div class="container">

  <?php echo $__env->make('partials.member-bar',['user_counter'=>$user_counter], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <div class="row h-100 justify-content-center">
    <?php if($posts->count() > 0): ?>
    <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="coment mt-3 rounded">
      <div class="row">
        <div class="col-sm-2 col-4">
          <div class="round text-center"> <?php if(!empty($post->relUser->image_url)): ?> <img src="<?php echo e(URL::to('/')); ?>/public/images/users/<?php echo e($post->relUser->image_url); ?>"> <?php else: ?> <img src="<?php echo e(URL::to('/')); ?>/public/images/no-user.png"> <?php endif; ?> </div>
        </div>
        <div class="col-sm-10 col-8">
          <h6 class="text-white"><?php echo e($post->relUser->username); ?> <a href="javascript:;" onclick="openDetails('<?php echo e($post->id); ?>');"><i class="fa fa-eye"></i></a></h6>
          <p><?php echo e($post->description); ?> </p>
        </div>
        <?php if(!empty($post->image_url)): ?>
        <div class="col-12 text-center"> <img class="fsdew rounded" src="<?php echo e(URL::to('/')); ?>/public/images/posts/<?php echo e($post->image_url); ?>"> </div>
        <?php endif; ?>
        <div class="col-12" id="show_all_comments<?php echo e($post->id); ?>">
          <?php if(!empty($post->three_comments)): ?>
          <?php $__currentLoopData = $post->three_comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <?php if($k<3): ?> <div class="row">
            <div class="col-md-12">
              <?php $userInfo = \App\Models\User::where('id',$comment->user_id)->first(); ?>
              <p><strong><?php echo e($userInfo->username ?? '-'); ?>: </strong><?php echo e($comment->comment); ?></p>
            </div>


        </div>
        <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>

      </div>
      <div class="col-sm-12 col-12 post-comment">
        <form action="#" method="POST" class="add_comment_form" id="myFrm<?php echo e($post->id); ?>" enctype="multipart/form-data">
          <?php echo csrf_field(); ?>
          <div class="gter text-center emoji-picker-container">
            <input type="hidden" name="user_id" value="<?php echo e(Auth::user()->id); ?>">
            <input type="hidden" name="post_id" value="<?php echo e($post->id); ?>">
            <input type="hidden" name="comment_limit" value="yes">
            <input class="form-control" type="text" name="comment" data-emojiable="true" id="comments" value="<?php echo e(old('comment')); ?>">
            <button type="submit" id="add_comment_btn" class="bg-standard-violet text-while">Publish</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  <?php else: ?>
  <div class="coment mt-3 rounded">
    <h1 class="text-center text-secondary my-5">No record present in the database!</h1>
  </div>
  <?php endif; ?>

</div>

</div>
<script>
  $(function() {
    $("#add_like_form").submit(function(e) {
      e.preventDefault();
      const fd = new FormData(this);
      $.ajax({
        url: '<?php echo e(route('like-store')); ?>',
        method: 'post',
        data: fd,
        cache: false,
        contentType: false,
        processData: false,
        dataType: 'json',
        success: function(response) {
          if (response.status == 200) {
            $("#add_like_btn").removeClass('fa-heart-o');
            $("#add_like_btn").addClass('fa-heart');
            $("#add_like_form")[0].reset();
          }
          if (response.status == 400) {
            $("#add_like_btn").removeClass('fa-heart');
            $("#add_like_btn").addClass('fa-heart-o');
            $("#add_like_form")[0].reset();
          }
        }
      });

    });


    $("#add_follow_form").submit(function(e) {
      e.preventDefault();
      const fd = new FormData(this);
      $.ajax({
        url: '<?php echo e(route('follow-store')); ?>',
        method: 'post',
        data: fd,
        cache: false,
        contentType: false,
        processData: false,
        dataType: 'json',
        success: function(response) {
          if (response.status == 200) {
            $("#add_follow_btn").text('+ Following');
            $("#add_follow_form")[0].reset();
          }
          if (response.status == 400) {
            $("#add_follow_btn").text('+ Follow');
            $("#add_follow_form")[0].reset();
          }
        }
      });

    });

  });



  function addBlacklist(id) {
    var thiss = $(this);
    var _token = "<?php echo e(csrf_token()); ?>";
    var qs = {
      to_id: id,
      _token: _token
    };

    $.ajax({
      url: "<?php echo e(route('blacklist-store')); ?>",
      method: "Post",
      data: qs,
      success: function(response) {
        if (response.status == 200) {
          $("#blacklist_btn" + id).text('Blacklisted');
          document.getElementById("blacklist_btn" + id).disabled = true;
          window.location.reload();
        }
      },
      error: function(request, status, error) {
        console.log('Error is' + request.responseText);
      }
    });
  }
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/demogswebtech/public_html/freely/resources/views/secrets/userAct.blade.php ENDPATH**/ ?>