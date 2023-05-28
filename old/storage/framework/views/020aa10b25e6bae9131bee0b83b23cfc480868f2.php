

<div class="modal fade" id="addPhotoModal" tabindex="-1" aria-labelledby="exampleModalLabel"
  data-backdrop="static" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New Photo</h5>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <form action="#" method="POST" id="add_photo_form" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <div class="modal-body p-4 bg-light">
          
          <input type="hidden" name="user_id" value="<?php echo e(Auth::user()->id); ?>">
          
			<div class="my-2">
            <label for="avatar">Select Mode</label>
            <select name="photo_type" class="form-control" required>
			<option value="1">Public</option>
			<option value="0">Private</option>
			</select>
          </div><br>
          
          <div class="my-2">
            <label for="avatar">Select Photo</label>
            <img src="<?php echo e(URL::to('/')); ?>/public/images/no-user.png" id="output" onClick="$('#image').trigger('click');" height="auto" width="auto">
            <input type="file" name="image_url" id="image" accept="image/*" style="display:none;" class="form-control" required>
          </div>
          <span style="color:red;" id="img_errors"></span>
        </div>
        <div class="modal-footer">
          <button type="submit" id="add_photo_btn" class="border-0 py-2 px-3 rounded bg-standard-violet text-white">Add Photo</button>
        </div>
      </form>
    </div>
  </div>
</div>





<div class="modal fade" id="addVideoModal" tabindex="-1" aria-labelledby="exampleModalLabel"
  data-backdrop="static" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New Video</h5>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <form action="#" method="POST" id="add_video_form" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <div class="modal-body p-4 bg-light">
          
          <input type="hidden" name="user_id" value="<?php echo e(Auth::user()->id); ?>">

			<div class="my-2">
            <label for="avatar">Select Mode</label>
            <select name="video_type" class="form-control" required>
			<option value="1">Public</option>
			<option value="0">Private</option>
			</select>
          </div><br>
          
          <div class="my-2">
            <!--<label for="avatar">Select Video</label>-->
            <!--<input type="file" name="video_url" class="form-control" required>-->
            <label class="py-2 px-3 border-0 rounded bg-standard-violet text-white" onClick="$('#video').trigger('click');">Select Video</label>
            <input type="file" name="video_url" id="video" accept="video/*" style="display:none;" class="form-control" required>
          </div>
          <span style="color:red;" id="vid_errors"></span>
        </div>
        <div class="modal-footer">
          <button type="submit" id="add_video_btn" class="py-2 px-3 border-0 rounded bg-standard-violet text-white">Add Video</button>
        </div>
      </form>
    </div>
  </div>
</div>



<?php /**PATH /home/demogswebtech/public_html/freely/resources/views/partials/modals.blade.php ENDPATH**/ ?>