<?php $__env->startSection('content'); ?>
<div class="container">
    
  <form action="#" method="POST" id="search_form" enctype="multipart/form-data">
      <?php echo csrf_field(); ?>
      
      <div class="col-12">
        <div class=" new_tab4 dropdown resse my-3 py-1 rounded" > <span class="white px-2 "><?php echo e(__('public.Search')); ?></span>
          <div class="dropdown-content" id="new_down">
               
            <div class="row">
               
              <div class="col-md-3">
                <p class="name2"><?php echo e(__('public.You_look_for')); ?></p>
                <input member-count="2" type="checkbox" class="checkd" name="you_are[]" value="<?php echo e(__('Straight Couples')); ?>">
                <label class="checkd"><?php echo e(__('public.Straight_Couples')); ?></label>
                <br>
                <input member-count="2" type="checkbox" class="checkd" name="you_are[]" value="<?php echo e(__('Couples F Bi')); ?>">
                <label class="checkd"><?php echo e(__('public.Couples_F_Bi')); ?></label>
                <br>
                <input member-count="2" type="checkbox" class="checkd" name="you_are[]" value="<?php echo e(__('Couples H Bi')); ?>">
                <label class="checkd"><?php echo e(__('public.Couples_H_Bi')); ?></label>
                <br>
                <input member-count="2" type="checkbox" class="checkd" name="you_are[]" value="<?php echo e(__('Couples Bi')); ?>">
                <label class="checkd"><?php echo e(__('public.Couples_Bi')); ?></label>
                <br>
                <input member-count="2" type="checkbox" class="checkd" name="you_are[]" value="<?php echo e(__('Straight Women')); ?>">
                <label class="checkd"><?php echo e(__('public.Straight_Women')); ?></label>
                <br>
                <input member-count="2" type="checkbox" class="checkd" name="you_are[]" value="<?php echo e(__('Women Bi')); ?>">
                <label class="checkd"><?php echo e(__('public.Women_Bi')); ?></label>
                <br>
                <input member-count="1" type="checkbox" class="checkd" name="you_are[]" value="<?php echo e(__('Lesbians')); ?>">
                <label class="checkd"><?php echo e(__('public.Lesbians')); ?></label>
                <br>
                <input member-count="1" type="checkbox" class="checkd" name="you_are[]" value="<?php echo e(__('Straight Hammers')); ?>">
                <label class="checkd"><?php echo e(__('public.Straight_Hammers')); ?></label>
                <br>
                <input  member-count="1" type="checkbox" class="checkd" name="you_are[]" value="<?php echo e(__('Mrs. Hammes')); ?>">
                <label class="checkd"><?php echo e(__('public.Mrs_Hammes')); ?></label>
                <br>
                <input member-count="1" type="checkbox" class="checkd" name="you_are[]" value="<?php echo e(__('Gays')); ?>">
                <label class="checkd"><?php echo e(__('public.Gays')); ?></label>
                <br>
                <input member-count="1" class="checkd" type="checkbox" class="checkd" name="you_are[]" value="<?php echo e(__('Transvestites')); ?>">
                <label class="checkd"><?php echo e(__('public.Transvestites')); ?></label>
                <br>
                <input member-count="1" type="checkbox" name="you_are[]" value="<?php echo e(__('Transgender')); ?>">
                <label class="checkd"><?php echo e(__('public.Transgender')); ?></label>
                <br>
                <br>
                <p class="name2"><?php echo e(__('public.City')); ?></p>
                <div class="row">
                  <div class="col-12 pl-0">
                      
                    <select name="country" class="form-control mb-2" id="country" onChange="getCity(this.selectedIndex)">
                      <option value=""><?php echo e(__('public.Select_Country')); ?></option>
                      <?php if(!empty($countries)): ?>
					  <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					  <option value="<?php echo e($country->id); ?>" <?php if(old('country')==$country->id): ?> <?php echo e('selected'); ?> <?php endif; ?>><?php echo e($country->name); ?></option>
					  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					  <?php endif; ?>
                    </select>
                    <!--<input type="text" name="city" class="form-control mb-2" value="<?php echo e(old('city')); ?>" placeholder="<?php echo e(__('public.City')); ?>">-->
                    <select name="city" class="form-control mb-2" id="city">
                      <option value=""><?php echo e(__('public.Select_City')); ?></option>
                    </select>
                    <span class="help-block" id="cityError"></span> 
                  </div>
                </div>
                <p class="name2"><?php echo e(__('public.Nickname')); ?></p>
                <div class="row">
                  <div class="col-12 pl-0">
                    <input type="text" name="username" class="form-control mb-2" value="<?php echo e(old('username')); ?>" placeholder="<?php echo e(__('public.Nickname')); ?>">
                  </div>
                </div>
              </div>
              <div class="col-md-3">
                <p class="name2"><?php echo e(__('public.Who_researches')); ?></p>
                <input type="checkbox" class="checkd" name="research[]" value="<?php echo e(__('Straight Couples')); ?>">
                <label class="checkd"><?php echo e(__('public.Straight_Couples')); ?></label>
                <br>
                <input type="checkbox" class="checkd" name="research[]" value="<?php echo e(__('Couples F Bi')); ?>">
                <label class="checkd"><?php echo e(__('public.Couples_F_Bi')); ?></label>
                <br>
                <input type="checkbox" class="checkd" name="research[]" value="<?php echo e(__('Couples H Bi')); ?>">
                <label class="checkd"><?php echo e(__('public.Couples_H_Bi')); ?></label>
                <br>
                <input type="checkbox" class="checkd" name="research[]" value="<?php echo e(__('Couples Bi')); ?>">
                <label class="checkd"><?php echo e(__('public.Couples_Bi')); ?></label>
                <br>
                <input type="checkbox" class="checkd" name="research[]" value="<?php echo e(__('Straight Women')); ?>">
                <label class="checkd"><?php echo e(__('public.Straight_Women')); ?></label>
                <br>
                <input type="checkbox" class="checkd" name="research[]" value="<?php echo e(__('Women Bi')); ?>">
                <label class="checkd"><?php echo e(__('public.Women_Bi')); ?></label>
                <br>
                <input type="checkbox" class="checkd" name="research[]" value="<?php echo e(__('Lesbians')); ?>">
                <label class="checkd"><?php echo e(__('public.Lesbians')); ?></label>
                <br>
                <input type="checkbox" class="checkd" name="research[]" value="<?php echo e(__('Straight Hammers')); ?>">
                <label class="checkd"><?php echo e(__('public.Straight_Hammers')); ?></label>
                <br>
                <input type="checkbox" class="checkd" name="research[]" value="<?php echo e(__('Mrs. Hammes')); ?>">
                <label class="checkd"><?php echo e(__('public.Mrs_Hammes')); ?></label>
                <br>
                <input type="checkbox" class="checkd" name="research[]" value="<?php echo e(__('Gays')); ?>">
                <label class="checkd"><?php echo e(__('public.Gays')); ?></label>
                <br>
                <input type="checkbox" class="checkd" name="research[]" value="<?php echo e(__('Transvestites')); ?>">
                <label class="checkd"><?php echo e(__('public.Transvestites')); ?></label>
                <br>
                <input type="checkbox" class="checkd" name="research[]" value="<?php echo e(__('Transgender')); ?>">
                <label class="checkd"><?php echo e(__('public.Transgender')); ?></label>
                <br>
                <br>
              </div>
              <div class="col-md-3">
                <p class="name2"><?php echo e(__('public.age_he')); ?></p>
                <div class="row">
                  <div class="col-12 pl-0">
                    <input class="form-control mb-2" type="text" name="age" placeholder="<?php echo e(__('public.age_he')); ?>" value="<?php echo e(old('age')); ?>">
                  </div>
                </div>
                <p class="name2"><?php echo e(__('public.Size_he')); ?></p>
                <div class="row">
                  <div class="col-12 pl-0">
                    <input class="form-control mb-2" type="text" name="size" placeholder="<?php echo e(__('public.Size_he')); ?>" value="<?php echo e(old('size')); ?>">
                  </div>
                </div>
                <br>
                <p class="name2"><?php echo e(__('public.Sillhouette_he')); ?></p>
                <input type="checkbox" class="checkd" name="sillhouette[]" value="<?php echo e(__('Thin')); ?>">
                <label class="checkd"><?php echo e(__('public.Thin')); ?></label>
                <br>
                <input type="checkbox" class="checkd" name="sillhouette[]" value="<?php echo e(__('Athletic')); ?>">
                <label class="checkd"><?php echo e(__('public.Athletic')); ?></label>
                <br>
                <input type="checkbox" class="checkd" name="sillhouette[]" value="<?php echo e(__('Normal')); ?>">
                <label class="checkd"><?php echo e(__('public.Normal')); ?></label>
                <br>
                <input type="checkbox" class="checkd" name="sillhouette[]" value="<?php echo e(__('Some roundness')); ?>">
                <label class="checkd"><?php echo e(__('public.Some_roundness')); ?></label>
                <br>
                <input type="checkbox" class="checkd" name="sillhouette[]" value="<?php echo e(__('Round')); ?>">
                <label class="checkd"><?php echo e(__('public.Round')); ?></label>
                <br>
                <input type="checkbox" class="checkd" name="sillhouette[]" value="<?php echo e(__('I keep it for myself')); ?>">
                <label class="checkd"><?php echo e(__('public.I_keep_it_for_myself')); ?></label>
                <br>
                <br>
                <p class="name2"><?php echo e(__('public.Origin_he')); ?></p>
                <select class="form-control mb-2" name="origin">
                    <option value=""><?php echo e(__('public.Select_Origin')); ?></option>
                    <?php $__currentLoopData = $origins; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($row->name); ?>"><?php echo e($row->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <br>
                <br>
              </div>
              <div class="col-md-3">
                <p class="name2"><?php echo e(__('public.Age_she')); ?></p>
                <div class="row">
                  <div class="col-12 pl-0">
                    <input class="form-control mb-2" type="text" name="age_couple" placeholder="<?php echo e(__('public.Age_she')); ?>" value="<?php echo e(old('age_couple')); ?>">
                  </div>
                </div>
                <p class="name2"><?php echo e(__('public.Size_she')); ?></p>
                <div class="row">
                  <div class="col-12 pl-0">
                    <input class="form-control mb-2" type="text" name="size_couple" placeholder="<?php echo e(__('public.Size_she')); ?>" value="<?php echo e(old('size')); ?>">
                  </div>
                </div>
                <br>
                <p class="name2"><?php echo e(__('public.Sillhouette_she')); ?></p>
                <input type="checkbox" class="checkd" name="sillhouette_couple[]" value="<?php echo e(__('Thin')); ?>">
                <label class="checkd"><?php echo e(__('public.Thin')); ?></label>
                <br>
                <input type="checkbox" class="checkd" name="sillhouette_couple[]" value="<?php echo e(__('Athletic')); ?>">
                <label class="checkd"><?php echo e(__('public.Athletic')); ?></label>
                <br>
                <input type="checkbox" class="checkd" name="sillhouette_couple[]" value="<?php echo e(__('Normal')); ?>">
                <label class="checkd"><?php echo e(__('public.Normal')); ?></label>
                <br>
                <input type="checkbox" class="checkd" name="sillhouette_couple[]" value="<?php echo e(__('Some roundness')); ?>">
                <label class="checkd"><?php echo e(__('public.Some_roundness')); ?></label>
                <br>
                <input type="checkbox" class="checkd" name="sillhouette_couple[]" value="<?php echo e(__('Round')); ?>">
                <label class="checkd"><?php echo e(__('public.Round')); ?></label>
                <br>
                <input type="checkbox" class="checkd" name="sillhouette_couple[]" value="<?php echo e(__('I keep it for myself')); ?>">
                <label class="checkd"><?php echo e(__('public.I_keep_it_for_myself')); ?></label>
                <br>
                <br>
                <p class="name2"><?php echo e(__('public.Origin_she')); ?></p>
                <select class="form-control mb-2" name="origin_couple">
                    <option value=""><?php echo e(__('public.Select_Origin')); ?></option>
                    <?php $__currentLoopData = $origins; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row_co): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($row_co->name); ?>"><?php echo e($row_co->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <br>
                <button type="submit" id="search_btn" class="border-white border bg-standard-white w-100  text-center text-dark  base-radius px-2 py-2 mr-2"><?php echo e(__('public.Search')); ?></button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </form>
  <div class="row h-100 " id="show_members"> 
  <?php $__currentLoopData = $members; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $member): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  <?php //$user = \App\Models\Blacklist::where(['to_id'=>$member->id, 'from_id'=>Auth::user()->id])->first(); ?>
  <?php if(empty(get_block($member->id))): ?>
    <div class="col-lg-4 col-md-6 col-sm-6">
      <div class="coment box_wold mt-3">
        <div class="row">
          <div class="col-3 px-0 ">
            <div class="text-center"> 
                <div class="<?php if($member->online=='1'): ?> img_status_online <?php else: ?> img_status_offline <?php endif; ?> text-center">
                <a href="<?php echo e(route('member-details',$member->id)); ?>"> 
                    <?php if(!empty($member->image_url)): ?> 
                        <img class="rounded-circle" src="<?php echo e(URL::to('/')); ?>/public/images/users/<?php echo e($member->image_url); ?>" width="80" height="80"> 
                    <?php else: ?> 
                        <img class="rounded-circle" src="<?php echo e(URL::to('/')); ?>/public/images/no-user.png" width="80" height="80"> 
                    <?php endif; ?> 
                </a> 
                </div>
            </div>
          </div>
          <div class="col-9 heading">
            <h6><?php echo e($member->username); ?></h6>
            <p><?php echo e($member->you_are); ?></p>
            <p><i class="fa fa-map-marker" aria-hidden="true"></i>
                <?php if(!empty($member->relUserDetail->city) && !empty($member->relUserDetail->country)): ?> 
                    <?php echo e(strtoupper($member->relUserDetail->city)); ?> 
                <?php else: ?>
                    <?php echo e(strtoupper($member->relUserDetail->country)); ?> 
                <?php endif; ?>
            </p>
          </div>
          <div class="col-12 px-0 heading">
            <h5 class="mt-1"><?php echo e($member->username); ?></h5>
            <p class="pragraf"> <?php if(!empty($member->relUserDetail->about)): ?>
              <?php
                                $string = $member->relUserDetail->about;
                                $string = strip_tags($string);
                                $character_count = strlen($string);
                                ?>
              <?php if($character_count > 300): ?>
              <?php echo substr($member->relUserDetail->about, 0,300); ?>...
              <?php else: ?>
              <?php echo $member->relUserDetail->about; ?>

              <?php endif; ?>
              <?php endif; ?> </p>
          </div>
          <ul class="like">
            <li class="pl-0">
              <p><?php echo e($member->total_likes); ?></p>
              <p><?php echo e(__('public.Like')); ?></p>
            </li>
            <li>
              <p><?php echo e($member->total_followers); ?></p>
              <p><?php echo e(__('public.Followers')); ?></p>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>

// <script>
// $(document).ready(function(){
//   $(".new_tab4").click(function(){
//   $("#new_down").slideToggle();
//   });
// });
// </script>


<script>
$(function() {
      
	  $("#search_form").submit(function(e) {
        e.preventDefault();
        const fd = new FormData(this);
        $("#search_btn").text('Searching...');
        $.ajax({
          url: '<?php echo e(route('member-search')); ?>',
          method: 'post',
          data: fd,
          cache: false,
          contentType: false,
          processData: false,
          dataType: 'json',
          success: function(response) {
            if (response.status == 401) {
				jQuery.each(response.errors, function(key, value){
							//alert(key);
                  			//jQuery('.alert-danger').show();
                  			//jQuery('.alert-danger').append('<li>'+value+'</li>');
							jQuery('#'+key+'Error').text(value);
                  		});
                $("#search_btn").text("<?php echo e(__('public.Search')); ?>");
                // $("#event_form")[0].reset(); 
            }
		  	//alert(JSON.stringify(response));
			$("#show_members").html(response);
			$("#search_btn").text("<?php echo e(__('public.Search')); ?>");
          },
		  error: function(err)
		  {
		  //alert(JSON.stringify(err));
		  }
        });
        
      });
	  
	}); 
</script>

<script>
    function getCity(id) {
        // alert(id);
        var country_id = document.getElementById('country').options[id].value;
        var queryString = {
            '_token': "<?php echo e(csrf_token()); ?>",
            'country_id': country_id
        };
        // alert(JSON.stringify(queryString));
        $.ajax({
            url: "<?php echo e(route('ajax-get-city')); ?>",
            data: queryString,
            type: "POST",
            success: function(data) {
                // alert(JSON.stringify(data));
                var html = "<option value=''><?php echo e(__('public.Select_one')); ?></option>";
                $.each(data, function(i, item) {
                    html = html + "<option value='" + data[i].name + "'>" + data[i].name + "</option>";
                });
                $("#city").html(html);
            },
            error: function(request, status, error) {
                document.getElementById("loader").style.display = "none";
                console.log("Error is: " + request.responseText);
            }
        });
    }
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/demogswebtech/public_html/freely/resources/views/members.blade.php ENDPATH**/ ?>