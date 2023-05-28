<?php if($posts->count() > 0): ?>
<?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<?php //$user = \App\Models\Blacklist::where(['to_id' => $post->user_id, 'from_id' => Auth::user()->id])->first(); ?>
    <?php if(empty(get_block($post->user_id))): ?>
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
            <input class="form-control" type="text" name="comment" data-emojiable="true" id="comments" value="<?php echo e(old('comment')); ?>" autocomplete="off">
            <button type="submit" id="add_comment_btn" class="bg-standard-violet text-while">Publish</button>
          </div>
        </form>
      </div>
    </div>
    <?php endif; ?>
    </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php else: ?>
<div class="coment mt-3 rounded">
  <h1 class="text-center text-secondary my-5">No record present in the database!</h1>
</div>
<?php endif; ?>


<div class="modal fade bd-example-modal-lg post-details" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

    </div>
  </div>
</div>



<script src="<?php echo e(URL::to('/')); ?>/public/frontend/emoji/js/config.min.js"></script>
<script src="<?php echo e(URL::to('/')); ?>/public/frontend/emoji/js/util.min.js"></script>
<script src="<?php echo e(URL::to('/')); ?>/public/frontend/emoji/js/jquery.emojiarea.min.js"></script>
<script src="<?php echo e(URL::to('/')); ?>/public/frontend/emoji/js/emoji-picker.min.js"></script>
<script>
  $(function() {
    // Initializes and creates emoji set from sprite sheet
    window.emojiPicker = new EmojiPicker({
      emojiable_selector: '[data-emojiable=true]',
      assetsPath: '<?php echo e(URL::to('/')); ?>/public/frontend/emoji/img/',
      popupButtonClasses: 'fa fa-smile-o'
    });

    window.emojiPicker.discover();
  });


  // $("#comments").keypress(function(event) {
  //     if (event.keyCode === 13) {
  //         $("#add_comment_form").click();
  //     }
  // });

  $(document).on('submit', ".add_comment_form", function(e) {
    e.preventDefault();
    const fd = new FormData(this);
    var thiss = $(this);
    thiss.closest('.post-comment').find("#add_comment_btn").text('Adding...');

    $.ajax({
      url: '<?php echo e(route('comment-store')); ?>',
      method: 'post',
      data: fd,
      cache: false,
      contentType: false,
      processData: false,
      dataType: 'json',
      success: function(response) {
        //alert(JSON.stringify(response));
        if (response.status == 200) {
          fetchAllComments(response.post_id, response.comment_limit);

          thiss.closest('.post-comment').find("#comments").val('');
          thiss.closest('.post-comment').find("#add_comment_btn").text('Publish');
          $('.emoji-wysiwyg-editor').text('');
          $('#myFrm' + response.post_id)[0].reset();
        }
      },
      error: function(err) {
        alert(JSON.stringify(err));
      }
    });
  });

  // fetch all comments ajax request
  /*fetchAllComments();*/

  function fetchAllComments(post_id, comment_limit) {
    $.ajax({
      url: '<?php echo e(route('fetchAllComments')); ?>' + '?post_id=' + post_id + '&comment_limit=' + comment_limit,
      method: 'get',
      success: function(response) {
        if (comment_limit == 'yes') {
          $("#show_all_comments" + post_id).html(JSON.parse(response));
        } else {
          $("#show_post_comment" + post_id).html(JSON.parse(response));

        }
      },
      error: function(err) {
        alert(JSON.stringify(err));
      }
    });
  }


  function openDetails(post_id) {

    $.ajax({
      url: '<?php echo e(route('fetchPost')); ?>' + '?post_id=' + post_id,
      method: 'get',
      success: function(response) {
        $(".modal-content").html(JSON.parse(response));
        //$('.show_comments').scrollTop($('.show_comments')[0].scrollHeight);

        $('.bd-example-modal-lg').modal('show');
      },
      error: function(err) {
        alert(JSON.stringify(err));
      }
    });




  }
</script><?php /**PATH C:\xampp\htdocs\freely\resources\views/posts/show_all_posts.blade.php ENDPATH**/ ?>