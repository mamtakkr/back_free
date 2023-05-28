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
<div class="container">
  <div class="tab">
    <button class="tablinks bg-standard-violet base-radius text-white px-2 py-2" onClick="openCity(event, 'Research')">Search</button>
    <button class="tablinks bg-standard-violet base-radius text-white px-2 py-2" onClick="openCity(event, 'CreateEvent')">Create an Event</button>
    <button class="tablinks bg-standard-violet base-radius text-white px-2 py-2" onClick="openCity(event, 'MyEvents')">My Events</button>
  </div>
  <div id="Research" class="tabcontent">
  <form action="#" method="POST" id="search_form" enctype="multipart/form-data">
      <?php echo csrf_field(); ?>
    <div class="row">
      <div class="col-md-6">
	  <div class="form-group">
        <p class="name2">Choose a category</p>
        <?php if(!empty($event_categories)): ?>
        <?php $__currentLoopData = $event_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$event_category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <label class="checkd" for="category<?php echo e($k); ?>">
        <input type="checkbox" class="checkd" id="category<?php echo e($k); ?>" name="event_categories[]" value="<?php echo e($event_category->title); ?>">
        <?php echo e($event_category->title); ?> </label>
        <br>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?> 
		</div>
		<div class="form-group">
		<label class="name2">Start Date</label>
        <input class="form-control mb-2" type="date" id="birthday" name="start_date">
		</div>
		<div class="form-group">
		<label class="name2">Postal Code</label>
        <input class="form-control mb-2" type="text" name="postal_code" placeholder="Postal Code">
		</div>
		
      </div>
      <div class="col-md-6">
	  <div class="form-group"style=" text-align: justify;">
        <p class="name2">Choose an Event Type</p>
        <?php if(!empty($event_types)): ?>
        <?php $__currentLoopData = $event_types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$event_type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <label class="checkd" for="type<?php echo e($k); ?>" style="margin-left: 4px;">
        <input type="checkbox" class="checkd" id="type<?php echo e($k); ?>" name="event_types[]" value="<?php echo e($event_type->title); ?>">
        <?php echo e($event_type->title); ?> </label>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?> 
		</div>
		<div class="form-group">
		<label class="name2">Town</label>
        <input class="form-control mb-2" type="text" name="town" placeholder="Town" value="">
		</div>
		<button type="submit" id="search_btn" class="border-while border mt-lg-4 bg-standard-white w-100 text-center text-dark  base-radius px-2 py-2 mr-2">Search</button>
		</div>
    </div>
	</form>
  </div>
  <div id="CreateEvent" class="tabcontent">
    <form action="#" method="POST" id="event_form" enctype="multipart/form-data">
      <?php echo csrf_field(); ?>
      <div class="row">
        <div class="col-md-4">
          <div class="form-group">
            <label class="white py-2 mb-2">Event title</label>
            <input class="form-control mb-2" type="text" name="title" value="<?php echo e(old('title')); ?>">
            <span class="help-block" id="priceError"></span> </div>
          <div class="form-group">
            <label class="white py-2 mb-2">Event type</label>
            <select class="form-control mb-2" name="event_type">
              <option value="">--Select--</option>
            <?php if(!empty($event_types)): ?>
    		<?php $__currentLoopData = $event_types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$event_type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <option value="<?php echo e($event_type->title); ?>" <?php if(old('event_type')==$event_type->title ): ?> <?php echo e('selected'); ?> <?php endif; ?>><?php echo e($event_type->title); ?></option>
    		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    		<?php endif; ?>
            </select>
            <span class="help-block" id="event_typeError"></span> </div>
          <div class="form-group">
            <label class="white py-2 mb-2">Category of the event</label>
            <select class="form-control mb-2" name="event_category">
              <option value="">--Select--</option>
          <?php if(!empty($event_categories)): ?>
		<?php $__currentLoopData = $event_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$event_category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <option value="<?php echo e($event_category->title); ?>" <?php if(old('event_type')==$event_category->title ): ?> <?php echo e('selected'); ?> <?php endif; ?>><?php echo e($event_category->title); ?></option>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		<?php endif; ?>
            </select>
            <span class="help-block" id="event_categoryError"></span> </div>
          <div class="form-group">
            <label class="white py-2 mb-2">The address of the event</label>
            <input class="form-control mb-2" type="text" name="address" value="<?php echo e(old('address')); ?>">
            <span class="help-block" id="addressError"></span> </div>
          <div class="form-group">
            <label class="white py-2 mb-2">Postal code</label>
            <input class="form-control mb-2" type="text" name="postal_code" value="<?php echo e(old('postal_code')); ?>">
            <span class="help-block" id="postal_codeError"></span> </div>
          <div class="form-group">
            <label class="white py-2 mb-2">Town</label>
            <input class="form-control mb-2" type="text" name="town" value="<?php echo e(old('town')); ?>">
            <span class="help-block" id="townError"></span> </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label class="white py-2 mb-2">Registration Email/URL</label>
            <input class="form-control mb-2" type="text" name="email" value="<?php echo e(old('email')); ?>">
            <span class="help-block" id="emailError"></span> </div>
          <div class="form-group">
            <label class="white py-2 mb-2">Start date</label>
            <input class="form-control mb-2" type="date" name="start_date" value="<?php echo e(old('start_date')); ?>">
            <span class="help-block" id="start_dateError"></span> </div>
          <div class="form-group">
            <label class="white py-2 mb-2">End date</label>
            <input class="form-control mb-2" type="date" name="end_date" value="<?php echo e(old('end_date')); ?>">
            <span class="help-block" id="end_dateError"></span> </div>
          <div class="form-group">
            <label class="white py-2 mb-2">Registration deadline</label>
            <input class="form-control mb-2" type="date" name="registration_deadline" value="<?php echo e(old('registration_deadline')); ?>">
            <span class="help-block" id="registration_deadlineError"></span> </div>
          <div class="form-group">
            <label class="white py-2 mb-2">Registration limit</label>
            <input class="form-control mb-2" type="text" name="registration_limit" value="<?php echo e(old('registration_limit')); ?>">
            <span class="help-block" id="registration_limitError"></span> </div>
          <div class="form-group">
            <label class="white py-2 mb-2">Organizer</label>
            <input class="form-control mb-2" type="text" name="organizer" value="<?php echo e(old('organizer')); ?>">
            <span class="help-block" id="organizerError"></span> </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label class="white py-2 mb-2">Event banner</label>
            <input type="file" id="myFile" name="banner" value="<?php echo e(old('banner')); ?>">
            <span class="help-block" id="bannerError"></span> </div>
          <div class="row">
            <div class="col-6">
              <div class="form-group">
                <label class="white py-2 mb-2">Couples</label>
                <input class="form-control mb-2" type="text" name="couples" value="<?php echo e(old('couples')); ?>" placeholder="<?php echo e(__('Price')); ?>">
                <span class="help-block" id="couplesError"></span> </div>
            </div>
            <div class="col-6">
              <div class="form-group">
                <label class="white py-2 mb-2">The Women</label>
                <input class="form-control mb-2" type="text" name="women" value="<?php echo e(old('women')); ?>" placeholder="<?php echo e(__('Price')); ?>">
                <span class="help-block" id="womenError"></span> </div>
            </div>
            <div class="col-6">
              <div class="form-group">
                <label class="white py-2 mb-2">Men</label>
                <input class="form-control mb-2" type="text" name="men" value="<?php echo e(old('men')); ?>" placeholder="<?php echo e(__('Price')); ?>">
                <span class="help-block" id="menError"></span> </div>
            </div>
            <div class="col-6">
              <div class="form-group">
                <label class="white py-2 mb-2">Transgender</label>
                <input class="form-control mb-2" type="text" name="transgender" value="<?php echo e(old('transgender')); ?>" placeholder="<?php echo e(__('Price')); ?>">
                <span class="help-block" id="transgenderError"></span> </div>
            </div>
          </div>
          <div class="form-group">
            <label>Description of the event</label>
            <textarea class="form-control mb-3" rows="7" name="description"><?php echo e(old('description')); ?></textarea>
            <span class="help-block" id="descriptionError"></span> </div>
          <button type="submit" id="event_btn" class="border-white border bg-standard-white w-100 text-center text-dark  base-radius px-2 py-2 mr-2">Publish</button>
        </div>
      </div>
    </form>
  </div>
  <div class="row">
    <div class="col-12 mt-4">
      <div class="row h-100 " id="show_events">
        <div class="coment mt-3 rounded">
          <h1 class="text-center text-secondary my-5">Loading...</h1>
        </div>
      </div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
	function openCity(evt, cityName) {
	  var i, tabcontent, tablinks;
	  tabcontent = document.getElementsByClassName("tabcontent");
	  for (i = 0; i < tabcontent.length; i++) {
		tabcontent[i].style.display = "none";
	  }
	  tablinks = document.getElementsByClassName("tablinks");
	  for (i = 0; i < tablinks.length; i++) {
		tablinks[i].className = tablinks[i].className.replace(" active", "");
	  }
	  document.getElementById(cityName).style.display = "block";
	  evt.currentTarget.className += " active";
	}
	</script>
<script>
$(function() {
        $("#event_form").submit(function(e) {
        e.preventDefault();
        const fd = new FormData(this);
        $("#event_btn").text('Adding...');
        $.ajax({
          url: '<?php echo e(route('event-store')); ?>',
          method: 'post',
          data: fd,
          cache: false,
          contentType: false,
          processData: false,
          dataType: 'json',
          success: function(response) {
		  	//alert(JSON.stringify(response));
            if (response.status == 200) {
                fetchAllEvents();
                $("#event_btn").text('Published');
				$('#CreateEvent').css('display','none');
                $("#event_form")[0].reset();
            }
            if (response.status == 401) {
				
				jQuery.each(response.errors, function(key, value){
							//alert(key);
                  			//jQuery('.alert-danger').show();
                  			//jQuery('.alert-danger').append('<li>'+value+'</li>');
							jQuery('#'+key+'Error').text(value);
                  		});
				
				
				
				
                $("#event_btn").text('Not Published');
                // $("#event_form")[0].reset(); 
            }
          },
		  error: function(err)
		  {
		  //alert(JSON.stringify(err));
		  }
        });
        
      });
	  
	  
	  $("#search_form").submit(function(e) {
        e.preventDefault();
        const fd = new FormData(this);
        $("#search_btn").text('Searching...');
        $.ajax({
          url: '<?php echo e(route('event-search')); ?>',
          method: 'post',
          data: fd,
          cache: false,
          contentType: false,
          processData: false,
          dataType: 'json',
          success: function(response) {
		  	//alert(JSON.stringify(response));
			$("#show_events").html(response);
			$("#search_btn").text('Search');
          },
		  error: function(err)
		  {
		  //alert(JSON.stringify(err));
		  }
        });
        
      });
	  
	  
	  // fetch all posts ajax request
      fetchAllEvents();

      function fetchAllEvents() {
        $.ajax({
          url: '<?php echo e(route('fetchAllEvents')); ?>',
          method: 'get',
          success: function(response) {
            $("#show_events").html(JSON.parse(response));
          },
		  error: function(err)
		  {
		  //alert(JSON.stringify(err));
		  }
        });
      }
	  
	  
	 }); 
</script>

<?php echo $__env->make('layouts.front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/demogswebtech/public_html/freely/resources/views/events.blade.php ENDPATH**/ ?>