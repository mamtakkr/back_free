<?php $__env->startSection('content'); ?>

    <div class="container ">
        <?php if($message=Session::get('success')): ?>
        <div class="alert bg-green alert-dismissible" role="alert" id="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
            <?php echo e($message); ?>

        </div>
        <?php endif; ?>
    
    <?php if($user->user_type == 'member'): ?>
    <form method="POST" action="<?php echo e(route('profile-update')); ?>" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <input type="hidden" name="_method" value="Patch" />
		<input type="hidden" name="id" value="<?php echo e(old('id',Auth::user()->id)); ?>">

        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 login-area pt-5 pb-3">
          <div class="dsew border border-light p-5 rounded">
            <div class="col-lg-2 col-md-2 col-5 fsde py-4 text-center m-auto">
			
              <div class="round_2 text-center"> 
			  <img src="<?php echo e(URL::to('/')); ?>/public/images/users/<?php echo e($user->image_url); ?>" id="output" onClick="$('#image').trigger('click');">
  
                <input type="hidden" name="old_image_url" value="<?php echo e($user->image_url); ?>" accept="image/*" style="display:none;">
				<input type="file" name="new_image_url" id="image" accept="image/*" style="display:none;">
                
                <?php $__errorArgs = ['image_url'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span style="color:red;"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> </div>
            </div>
            <div class="row">
              <div class="col-lg-5">
                <div class="row">
                  <div class="col-12">
                    <div class="row">
                      <div class="col-6">
                        <label class="white py-2 mb-2"><?php echo e(__('Nickname:')); ?></label>
                      </div>
                      <div class="col-6">
                        <input class="form-control mb-2" type="text" name="username" value="<?php echo e(old('username',$user->username)); ?>" placeholder="<?php echo e(__('Nickname')); ?>">
                        <?php $__errorArgs = ['username'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span style="color:red;"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> </div>
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="row">
                      <div class="col-6">
                        <label class="white py-2 mb-2"><?php echo e(__('You Are:')); ?> </label>
                      </div>
                      <div class="col-6">
					  
                        <select name="you_are" class="form-control mb-2" id="you_are">
                          <option value=""><?php echo e(__('You Are')); ?></option>
                          <option member-count="2" value="Straight Couples" <?php if($user->you_are=="Straight Couples" ): ?> <?php echo e('selected'); ?> <?php endif; ?>><?php echo e(__('Straight Couples')); ?></option>
                          <option member-count="2" value="Couples F Bi" <?php if($user->you_are=="Couples F Bi" ): ?> <?php echo e('selected'); ?> <?php endif; ?>><?php echo e(__('Couples F Bi')); ?></option>
                          <option member-count="2" value="Couples H Bi" <?php if($user->you_are=="Couples H Bi" ): ?> <?php echo e('selected'); ?> <?php endif; ?>><?php echo e(__('Couples H Bi')); ?></option>
						  <option member-count="2" value="Couples Bi" <?php if($user->you_are=="Couples Bi" ): ?> <?php echo e('selected'); ?> <?php endif; ?>><?php echo e(__('Couples Bi')); ?></option>
						  <option member-count="1" value="Straight Women" <?php if($user->you_are=="Straight Women" ): ?> <?php echo e('selected'); ?> <?php endif; ?>><?php echo e(__('Straight Women')); ?></option>
						  <option member-count="1" value="Women Bi" <?php if($user->you_are=="Women Bi" ): ?> <?php echo e('selected'); ?> <?php endif; ?>><?php echo e(__('Women Bi')); ?></option>
						  <option member-count="1" value="Lesbians" <?php if($user->you_are=="Lesbians" ): ?> <?php echo e('selected'); ?> <?php endif; ?>><?php echo e(__('Lesbians')); ?></option>
						  <option member-count="1" value="Straight Hammers" <?php if($user->you_are=="Straight Hammers" ): ?> <?php echo e('selected'); ?> <?php endif; ?>><?php echo e(__('Straight Hammers')); ?></option>
						  <option member-count="1" value="Mrs. Hammes" <?php if($user->you_are=="Mrs. Hammes" ): ?> <?php echo e('selected'); ?> <?php endif; ?>><?php echo e(__('Mrs. Hammes')); ?></option>
						  <option member-count="1" value="Gays" <?php if($user->you_are=="Gays" ): ?> <?php echo e('selected'); ?> <?php endif; ?>><?php echo e(__('Gays')); ?></option>
						  <option member-count="1" value="Transvestites" <?php if($user->you_are=="Transvestites" ): ?> <?php echo e('selected'); ?> <?php endif; ?>><?php echo e(__('Transvestites')); ?></option>
						  <option member-count="1" value="Transgender" <?php if($user->you_are=="Transgender" ): ?> <?php echo e('selected'); ?> <?php endif; ?>><?php echo e(__('Transgender')); ?></option>
                        </select>
						
                        <?php $__errorArgs = ['you_are'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span style="color:red;"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> </div>
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="row">
                      <div class="col-6">
                        <label class="white py-2 mb-2"><?php echo e(__('Experience:')); ?></label>
                      </div>
                      <div class="col-6">
                        <select name="experience" class="form-control mb-2" id="experience">
                          <option value=""><?php echo e(__('Experience')); ?></option>
                          <option member-count="2" value="To Discover" <?php if($user->experience=="To Discover" ): ?> <?php echo e('selected'); ?> <?php endif; ?>><?php echo e(__('To Discover')); ?></option>
                          <option member-count="2" value="Beginner" <?php if($user->experience=="Beginner" ): ?> <?php echo e('selected'); ?> <?php endif; ?>><?php echo e(__('Beginner')); ?></option>
                          <option member-count="2" value="Experienced" <?php if($user->experience=="Experienced" ): ?> <?php echo e('selected'); ?> <?php endif; ?>><?php echo e(__('Experienced')); ?></option>
                          <option member-count="2" value="Occasional" <?php if($user->experience=="Occasional" ): ?> <?php echo e('selected'); ?> <?php endif; ?>><?php echo e(__('Occasional')); ?></option>
                          <option member-count="2" value="I Keep To Myself" <?php if($user->experience=="I Keep To Myself" ): ?> <?php echo e('selected'); ?> <?php endif; ?>><?php echo e(__('I Keep To Myself')); ?></option>
						  
                        </select>
                        <?php $__errorArgs = ['experience'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span style="color:red;"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-2 line_boder"> <img src=""> </div>
              <div class="col-lg-5">
                
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-12 my-2">
                <h4 class="white"><?php echo e(__('Profile Information')); ?></h4>
              </div>
              <div class="col-lg-5">
                <div class="row">
                  <div class="col-12">
                    <div class="row">
                      <div class="col-6">
                        <label class="white py-2 mb-2"><?php echo e(__('I Am:')); ?></label>
                      </div>
                      <div class="col-6">
                        <select class="form-control mb-2" id="who_i" name="who_i">
                          <option><?php echo e(__('Select Type')); ?></option>
                              <option value="Man" <?php if(!empty($user->relUserDetail->who_i)): ?> <?php if($user->relUserDetail->who_i=="Man" ): ?> <?php echo e('selected'); ?> <?php endif; ?> <?php endif; ?>>Man</option>
                              <option value="Woman" <?php if(!empty($user->relUserDetail->who_i)): ?> <?php if($user->relUserDetail->who_i=="Woman" ): ?> <?php echo e('selected'); ?> <?php endif; ?> <?php endif; ?>>Woman</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="row">
                      <div class="col-6">
                        <label class="white py-2 mb-2"><?php echo e(__('Date Of Birth:')); ?></label>
                      </div>
                      <div class="col-6">
                        <?php if(!empty($user->relUserDetail->dob)): ?>
                            <input class="form-control mb-2" type="date" id="dob" name="dob" value="<?php echo e(old('dob',$user->relUserDetail->dob)); ?>">
                        <?php else: ?>
                            <input class="form-control mb-2" type="date" id="dob" name="dob" value="<?php echo e(old('dob')); ?>">
                        <?php endif; ?>
                        <?php $__errorArgs = ['dob'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span style="color:red;"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> </div>
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="row">
                      <div class="col-6">
                        <label class="white py-2 mb-2"><?php echo e(__('Size In CM:')); ?></label>
                      </div>
                      <div class="col-6">
                        <input class="form-control mb-2" type="text" name="size" value="<?php if(!empty($user->relUserDetail->size)): ?> <?php echo e(old('size',$user->relUserDetail->size)); ?> <?php endif; ?>" placeholder="<?php echo e(__('Size')); ?>">
                      </div>
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="row">
                      <div class="col-6">
                        <label class="white py-2 mb-2"><?php echo e(__('Weight In KG:')); ?></label>
                      </div>
                      <div class="col-6">
                        <input class="form-control mb-2" type="text" name="weight" value="<?php if(!empty($user->relUserDetail->weight)): ?> <?php echo e(old('weight',$user->relUserDetail->weight)); ?> <?php endif; ?>" placeholder="<?php echo e(__('Weight')); ?>">
                      </div>
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="row">
                      <div class="col-6">
                        <label class="white py-2 mb-2"><?php echo e(__('Origin:')); ?></label>
                        <br>
                      </div>
                      <div class="col-6">
                        <select name="origin" class="form-control mb-2" id="origin">
                          <option value=""><?php echo e(__('Select Origin')); ?></option>
                          <?php if(!empty($origins)): ?>
						  <?php $__currentLoopData = $origins; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $origin): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						  <option value="<?php echo e($origin->name); ?>" <?php if(!empty($user->relUserDetail->origin)): ?> <?php if($user->relUserDetail->origin==$origin->name): ?> <?php echo e('selected'); ?> <?php endif; ?> <?php endif; ?>><?php echo e($origin->name); ?></option>
						  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						  <?php endif; ?>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-2"> </div>
              <div class="col-lg-5">
                <div class="row">
                  <div class="col-6">
                    <label class="white py-2 mb-2"><?php echo e(__('Hair Size:')); ?></label>
                    <br>
                    <label class="white py-2 mb-2"><?php echo e(__('Hair Color:')); ?></label>
                    <br>
                    <label class="white py-2 mb-2"><?php echo e(__('Eye Colour:')); ?></label>
                    <br>
                    <label class="white py-2 mb-2"><?php echo e(__('Country:')); ?></label>
                    <br>
                    <label class="white py-2 mb-2"><?php echo e(__('City:')); ?></label>
                    <br>
                  </div>
                  <div class="col-6">
                    <select name="hair_size" class="form-control mb-2" id="hair_size">
                      <option value=""><?php echo e(__('Select Hair Size')); ?></option>
                          <option value="long" <?php if(!empty($user->relUserDetail->hair_size)): ?> <?php if($user->relUserDetail->hair_size=="long" ): ?> <?php echo e('selected'); ?> <?php endif; ?> <?php endif; ?>><?php echo e(__('Long')); ?></option>
                          <option value="short" <?php if(!empty($user->relUserDetail->hair_size)): ?> <?php if($user->relUserDetail->hair_size=="short" ): ?> <?php echo e('selected'); ?> <?php endif; ?> <?php endif; ?>><?php echo e(__('Short')); ?></option>
                          <option value="bob" <?php if(!empty($user->relUserDetail->hair_size)): ?> <?php if($user->relUserDetail->hair_size=="bob" ): ?> <?php echo e('selected'); ?> <?php endif; ?> <?php endif; ?>><?php echo e(__('Bob')); ?></option>
                          <option value="shoulder length" <?php if(!empty($user->relUserDetail->hair_size)): ?> <?php if($user->relUserDetail->hair_size=="shoulder length" ): ?> <?php echo e('selected'); ?> <?php endif; ?> <?php endif; ?>><?php echo e(__('Shoulder Length')); ?></option>
                    </select>
                    <select name="hair_color" class="form-control mb-2" id="hair_color">
                      <option value=""><?php echo e(__('Select Hair Color')); ?></option>
                          <option value="black" <?php if(!empty($user->relUserDetail->hair_color)): ?> <?php if($user->relUserDetail->hair_color=="black" ): ?> <?php echo e('selected'); ?> <?php endif; ?> <?php endif; ?>><?php echo e(__('Black')); ?></option>
                          <option value="grey" <?php if(!empty($user->relUserDetail->hair_color)): ?> <?php if($user->relUserDetail->hair_color=="grey" ): ?> <?php echo e('selected'); ?> <?php endif; ?> <?php endif; ?>><?php echo e(__('Grey')); ?></option>
                          <option value="burgandy" <?php if(!empty($user->relUserDetail->hair_color)): ?> <?php if($user->relUserDetail->hair_color=="burgandy" ): ?> <?php echo e('selected'); ?> <?php endif; ?> <?php endif; ?>><?php echo e(__('Burgandy')); ?></option>
                          <option value="blonde" <?php if(!empty($user->relUserDetail->hair_color)): ?> <?php if($user->relUserDetail->hair_color=="blonde" ): ?> <?php echo e('selected'); ?> <?php endif; ?> <?php endif; ?>><?php echo e(__('Blonde')); ?></option>
                          <option value="dark brown" <?php if(!empty($user->relUserDetail->hair_color)): ?> <?php if($user->relUserDetail->hair_color=="dark brown" ): ?> <?php echo e('selected'); ?> <?php endif; ?> <?php endif; ?>><?php echo e(__('Dark Brown')); ?></option>
                          <option value="light brown" <?php if(!empty($user->relUserDetail->hair_color)): ?> <?php if($user->relUserDetail->hair_color=="light brown" ): ?> <?php echo e('selected'); ?> <?php endif; ?> <?php endif; ?>><?php echo e(__('Light Brown')); ?></option>
                    </select>
                    <select name="eye_colour" class="form-control mb-2" id="eye_colour">
                      <option value=""><?php echo e(__('Select Eye Color')); ?></option>
                          <option value="black" <?php if(!empty($user->relUserDetail->eye_colour)): ?> <?php if($user->relUserDetail->eye_colour=="black" ): ?> <?php echo e('selected'); ?> <?php endif; ?> <?php endif; ?>><?php echo e(__('Black')); ?></option>
                          <option value="light brown" <?php if(!empty($user->relUserDetail->eye_colour)): ?> <?php if($user->relUserDetail->eye_colour=="light brown" ): ?> <?php echo e('selected'); ?> <?php endif; ?> <?php endif; ?>><?php echo e(__('Light Brown')); ?></option>
                          <option value="dark brown" <?php if(!empty($user->relUserDetail->eye_colour)): ?> <?php if($user->relUserDetail->eye_colour=="dark brown" ): ?> <?php echo e('selected'); ?> <?php endif; ?> <?php endif; ?>><?php echo e(__('Dark Brown')); ?></option>
                          <option value="green" <?php if(!empty($user->relUserDetail->eye_colour)): ?> <?php if($user->relUserDetail->eye_colour=="green" ): ?> <?php echo e('selected'); ?> <?php endif; ?> <?php endif; ?>><?php echo e(__('Green')); ?></option>
                          <option value="grey" <?php if(!empty($user->relUserDetail->eye_colour)): ?> <?php if($user->relUserDetail->eye_colour=="grey" ): ?> <?php echo e('selected'); ?> <?php endif; ?> <?php endif; ?>><?php echo e(__('Grey')); ?></option>
                          <option value="blue" <?php if(!empty($user->relUserDetail->eye_colour)): ?> <?php if($user->relUserDetail->eye_colour=="blue" ): ?> <?php echo e('selected'); ?> <?php endif; ?> <?php endif; ?>><?php echo e(__('Blue')); ?></option>
                    </select>
                    <select name="country" class="form-control mb-2" id="country" onChange="getCity(this.selectedIndex)">
                      <option value=""><?php echo e(__('Select Country')); ?></option>
                      <?php if(!empty($countries)): ?>
					  <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					  <option value="<?php echo e($country->id); ?>" <?php if(!empty($user->relUserDetail->country)): ?> <?php if($user->relUserDetail->country==$country->name): ?> <?php echo e('selected'); ?> <?php endif; ?> <?php endif; ?>><?php echo e($country->name); ?></option>
					  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					  <?php endif; ?>
                    </select>
                    <select name="city" class="form-control mb-2" id="city">
                      <option value=""><?php echo e(__('Select City')); ?></option>
                      <?php if(!empty($cities)): ?>
					  <?php $__currentLoopData = $cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					  <option value="<?php echo e($city->name); ?>" <?php if(!empty($user->relUserDetail->city)): ?> <?php if($user->relUserDetail->city==$city->name): ?> <?php echo e('selected'); ?> <?php endif; ?> <?php endif; ?>><?php echo e($city->name); ?></option>
					  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					  <?php endif; ?>
                    </select>
                  </div>
                </div>
              </div>
            </div>
			<div class="memberTwo" style="display:none;">
			<div class="row">
              <div class="col-12">
                <h4 class="white"><?php echo e(__('Profile Information')); ?></h4>
              </div>
              <div class="col-lg-5">
                <div class="row">
                  <div class="col-12">
                    <div class="row">
                      <div class="col-6">
                        <label class="white py-2 mb-2"><?php echo e(__('I Am:')); ?></label>
                      </div>
                      <div class="col-6">
                        <select class="form-control mb-2" id="who_i_couple" name="who_i_couple">
                          <option><?php echo e(__('Select Type')); ?></option>
                              <option value="Man" <?php if(!empty($user->relUserDetail->who_i_couple)): ?> <?php if($user->relUserDetail->who_i_couple=="Man" ): ?> <?php echo e('selected'); ?> <?php endif; ?> <?php endif; ?>>Man</option>
                              <option value="Woman" <?php if(!empty($user->relUserDetail->who_i_couple)): ?> <?php if($user->relUserDetail->who_i_couple=="Woman" ): ?> <?php echo e('selected'); ?> <?php endif; ?> <?php endif; ?>>Woman</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="row">
                      <div class="col-6">
                        <label class="white py-2 mb-2"><?php echo e(__('Date Of Birth:')); ?></label>
                      </div>
                      <div class="col-6">
                        <?php if(!empty($user->relUserDetail->dob_couple)): ?>
                            <input class="form-control mb-2" type="date" id="dob" name="dob_couple" value="<?php echo e(old('dob_couple',$user->relUserDetail->dob_couple)); ?>">
                        <?php else: ?>
                            <input class="form-control mb-2" type="date" id="dob" name="dob_couple" value="<?php echo e(old('dob_couple')); ?>">
                        <?php endif; ?>
                        <?php $__errorArgs = ['dob_couple'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span style="color:red;"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> </div>
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="row">
                      <div class="col-6">
                        <label class="white py-2 mb-2"><?php echo e(__('Size In CM:')); ?></label>
                      </div>
                      <div class="col-6">
                        <input class="form-control mb-2" type="text" name="size_couple" value="<?php if(!empty($user->relUserDetail->size_couple)): ?> <?php echo e(old('size_couple',$user->relUserDetail->size_couple)); ?> <?php endif; ?>" placeholder="<?php echo e(__('Size')); ?>">
                      </div>
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="row">
                      <div class="col-6">
                        <label class="white py-2 mb-2"><?php echo e(__('Weight In KG:')); ?></label>
                      </div>
                      <div class="col-6">
                        <input class="form-control mb-2" type="text" name="weight_couple" value="<?php if(!empty($user->relUserDetail->weight_couple)): ?> <?php echo e(old('weight_couple',$user->relUserDetail->weight_couple)); ?> <?php endif; ?>" placeholder="<?php echo e(__('Weight')); ?>">
                      </div>
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="row">
                      <div class="col-6">
                        <label class="white py-2 mb-2"><?php echo e(__('Origin:')); ?></label>
                        <br>
                      </div>
                      <div class="col-6">
                        <select name="origin_couple" class="form-control mb-2" id="origin_couple">
                          <option value=""><?php echo e(__('Select Origin')); ?></option>
						  <?php if(!empty($origins)): ?>
						  <?php $__currentLoopData = $origins; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $origin): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						  <option value="<?php echo e($origin->name); ?>" <?php if(!empty($user->relUserDetail->origin_couple)): ?> <?php if($user->relUserDetail->origin_couple==$origin->name): ?> <?php echo e('selected'); ?> <?php endif; ?> <?php endif; ?>><?php echo e($origin->name); ?></option>
						  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						  <?php endif; ?>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-2"> </div>
              <div class="col-lg-5">
                <div class="row">
                  <div class="col-6">
                    <label class="white py-2 mb-2"><?php echo e(__('Hair Size:')); ?></label>
                    <br>
                    <label class="white py-2 mb-2"><?php echo e(__('Hair Color:')); ?></label>
                    <br>
                    <label class="white py-2 mb-2"><?php echo e(__('Eye Colour:')); ?></label>
                    <br>
                    <label class="white py-2 mb-2"><?php echo e(__('Country:')); ?></label>
                    <br>
                    <label class="white py-2 mb-2"><?php echo e(__('City:')); ?></label>
                    <br>
                  </div>
                  <div class="col-6">
                    <select name="hair_size_couple" class="form-control mb-2" id="hair_size_couple">
                      <option value=""><?php echo e(__('Select Hair Size')); ?></option>
                          <option value="long" <?php if(!empty($user->relUserDetail->hair_size_couple)): ?> <?php if($user->relUserDetail->hair_size_couple=="long" ): ?> <?php echo e('selected'); ?> <?php endif; ?> <?php endif; ?>><?php echo e(__('Long')); ?></option>
                          <option value="short" <?php if(!empty($user->relUserDetail->hair_size_couple)): ?> <?php if($user->relUserDetail->hair_size_couple=="short" ): ?> <?php echo e('selected'); ?> <?php endif; ?> <?php endif; ?>><?php echo e(__('Short')); ?></option>
                          <option value="bob" <?php if(!empty($user->relUserDetail->hair_size_couple)): ?> <?php if($user->relUserDetail->hair_size_couple=="bob" ): ?> <?php echo e('selected'); ?> <?php endif; ?> <?php endif; ?>><?php echo e(__('Bob')); ?></option>
                          <option value="shoulder length" <?php if(!empty($user->relUserDetail->hair_size_couple)): ?> <?php if($user->relUserDetail->hair_size_couple=="shoulder length" ): ?> <?php echo e('selected'); ?> <?php endif; ?> <?php endif; ?>><?php echo e(__('Shoulder Length')); ?></option>
                    </select>
                    <select name="hair_color_couple" class="form-control mb-2" id="hair_color_couple">
                      <option value=""><?php echo e(__('Select Hair Color')); ?></option>
                          <option value="black" <?php if(!empty($user->relUserDetail->hair_color_couple)): ?> <?php if($user->relUserDetail->hair_color_couple=="black" ): ?> <?php echo e('selected'); ?> <?php endif; ?> <?php endif; ?>><?php echo e(__('Black')); ?></option>
                          <option value="grey" <?php if(!empty($user->relUserDetail->hair_color_couple)): ?> <?php if($user->relUserDetail->hair_color_couple=="grey" ): ?> <?php echo e('selected'); ?> <?php endif; ?> <?php endif; ?>><?php echo e(__('Grey')); ?></option>
                          <option value="burgandy" <?php if(!empty($user->relUserDetail->hair_color_couple)): ?> <?php if($user->relUserDetail->hair_color_couple=="burgandy" ): ?> <?php echo e('selected'); ?> <?php endif; ?> <?php endif; ?>><?php echo e(__('Burgandy')); ?></option>
                          <option value="blonde" <?php if(!empty($user->relUserDetail->hair_color_couple)): ?> <?php if($user->relUserDetail->hair_color_couple=="blonde" ): ?> <?php echo e('selected'); ?> <?php endif; ?> <?php endif; ?>><?php echo e(__('Blonde')); ?></option>
                          <option value="dark brown" <?php if(!empty($user->relUserDetail->hair_color_couple)): ?> <?php if($user->relUserDetail->hair_color_couple=="dark brown" ): ?> <?php echo e('selected'); ?> <?php endif; ?> <?php endif; ?>><?php echo e(__('Dark Brown')); ?></option>
                          <option value="light brown" <?php if(!empty($user->relUserDetail->hair_color_couple)): ?> <?php if($user->relUserDetail->hair_color_couple=="light brown" ): ?> <?php echo e('selected'); ?> <?php endif; ?> <?php endif; ?>><?php echo e(__('Light Brown')); ?></option>
                    </select>
                    <select name="eye_colour_couple" class="form-control mb-2" id="eye_colour_couple">
                      <option value=""><?php echo e(__('Select Eye Color')); ?></option>
                          <option value="black" <?php if(!empty($user->relUserDetail->eye_colour_couple)): ?> <?php if($user->relUserDetail->eye_colour_couple=="black" ): ?> <?php echo e('selected'); ?> <?php endif; ?> <?php endif; ?>><?php echo e(__('Black')); ?></option>
                          <option value="light brown" <?php if(!empty($user->relUserDetail->eye_colour_couple)): ?> <?php if($user->relUserDetail->eye_colour_couple=="light brown" ): ?> <?php echo e('selected'); ?> <?php endif; ?> <?php endif; ?>><?php echo e(__('Light Brown')); ?></option>
                          <option value="dark brown" <?php if(!empty($user->relUserDetail->eye_colour_couple)): ?> <?php if($user->relUserDetail->eye_colour_couple=="dark brown" ): ?> <?php echo e('selected'); ?> <?php endif; ?> <?php endif; ?>><?php echo e(__('Dark Brown')); ?></option>
                          <option value="green" <?php if(!empty($user->relUserDetail->eye_colour_couple)): ?> <?php if($user->relUserDetail->eye_colour_couple=="green" ): ?> <?php echo e('selected'); ?> <?php endif; ?> <?php endif; ?>><?php echo e(__('Green')); ?></option>
                          <option value="grey" <?php if(!empty($user->relUserDetail->eye_colour_couple)): ?> <?php if($user->relUserDetail->eye_colour_couple=="grey" ): ?> <?php echo e('selected'); ?> <?php endif; ?> <?php endif; ?>><?php echo e(__('Grey')); ?></option>
                          <option value="blue" <?php if(!empty($user->relUserDetail->eye_colour_couple)): ?> <?php if($user->relUserDetail->eye_colour_couple=="blue" ): ?> <?php echo e('selected'); ?> <?php endif; ?> <?php endif; ?>><?php echo e(__('Blue')); ?></option>
                    </select>
                    <select name="country_couple" class="form-control mb-2" id="country_couple" onChange="getCityCouple(this.selectedIndex)">
                      <option value=""><?php echo e(__('Select Country')); ?></option>
                      <?php if(!empty($countries)): ?>
					  <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					  <option value="<?php echo e($country->id); ?>" <?php if(!empty($user->relUserDetail->country_couple)): ?> <?php if($user->relUserDetail->country_couple==$country->name): ?> <?php echo e('selected'); ?> <?php endif; ?> <?php endif; ?>><?php echo e($country->name); ?></option>
					  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					  <?php endif; ?>
                    </select>
                    <select name="city_couple" class="form-control mb-2" id="city_couple">
                      <option value=""><?php echo e(__('Select City')); ?></option>
                      <?php if(!empty($cities)): ?>
					  <?php $__currentLoopData = $cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					  <option value="<?php echo e($city->name); ?>" <?php if(!empty($user->relUserDetail->city_couple)): ?> <?php if($user->relUserDetail->city_couple==$city->name): ?> <?php echo e('selected'); ?> <?php endif; ?> <?php endif; ?>><?php echo e($city->name); ?></option>
					  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					  <?php endif; ?>
                    </select>
                  </div>
                </div>
              </div>
            </div>
			</div>
            <hr>
            <div class="coment mt-5 p-0">
              <div class="row">
                <div class="col-lg-2 col-md-2 col-5 pl-0">
                  <div class="boxw bg-standard-violet rounded-left text-center text-white px-3 py-3">
                    <p class="pt-2"><?php echo e(__('I Research:')); ?></p>
                  </div>
                </div>
                <div class="col-lg-10 col-md-10 col-7">
                  <ul class="conpa py-3 like">
                    <li>
                      <label for="research1"><input id="research1" type="checkbox" name="research[]" value="Straight Couples" <?php if(!empty($user->relUserDetail->research) && in_array("Straight Couples",  explode(',', $user->relUserDetail->research))): ?> checked <?php endif; ?>> 
                      <?php echo e(__('Straight Couples')); ?></label>
                    </li>
                    <li>
                      <label for="research2"><input id="research2" type="checkbox" name="research[]" value="Couples F Bi" <?php if(!empty($user->relUserDetail->research) && in_array("Couples F Bi",  explode(',', $user->relUserDetail->research))): ?> checked <?php endif; ?>>
                      <?php echo e(__('Couples F Bi')); ?></label>
                    </li>
                    <li>
                      <label for="research3"><input id="research3" type="checkbox" name="research[]" value="Couples H Bi" <?php if(!empty($user->relUserDetail->research) && in_array("Couples H Bi",  explode(',', $user->relUserDetail->research))): ?> checked <?php endif; ?>>
                      <?php echo e(__('Couples H Bi')); ?></label>
                    </li>
                    <li>
                      <label for="research4"><input id="research4" type="checkbox" name="research[]" value="Couples Bi" <?php if(!empty($user->relUserDetail->research) && in_array("Couples Bi",  explode(',', $user->relUserDetail->research))): ?> checked <?php endif; ?>>
                      <?php echo e(__('Couples Bi')); ?></label>
                    </li>
                    <li>
                      <label for="research5"><input id="research5" type="checkbox" name="research[]" value="Straight Women" <?php if(!empty($user->relUserDetail->research) && in_array("Straight Women",  explode(',', $user->relUserDetail->research))): ?> checked <?php endif; ?>>
                      <?php echo e(__('Straight Women')); ?></label>
                    </li>
                    <li>
                      <label for="research6"><input id="research6" type="checkbox" name="research[]" value="Women Bi" <?php if(!empty($user->relUserDetail->research) && in_array("Women Bi",  explode(',', $user->relUserDetail->research))): ?> checked <?php endif; ?>>
                      <?php echo e(__('Women Bi')); ?></label>
                    </li>
                    <li>
                      <label for="research7"><input id="research7" type="checkbox" name="research[]" value="Lesbians" <?php if(!empty($user->relUserDetail->research) && in_array("Lesbians",  explode(',', $user->relUserDetail->research))): ?> checked <?php endif; ?>>
                      <?php echo e(__('Lesbians')); ?></label>
                    </li>
                    <li>
                      <label for="research8"><input id="research8" type="checkbox" name="research[]" value="Straight Hammers" <?php if(!empty($user->relUserDetail->research) && in_array("Straight Hammers",  explode(',', $user->relUserDetail->research))): ?> checked <?php endif; ?>>
                      <?php echo e(__('Straight Hammers')); ?></label>
                    </li>
                    <li>
                      <label for="research9"><input id="research9" type="checkbox" name="research[]" value="Mrs. Hammes" <?php if(!empty($user->relUserDetail->research) && in_array("Mrs. Hammes",  explode(',', $user->relUserDetail->research))): ?> checked <?php endif; ?>>
                      <?php echo e(__('Mrs. Hammes')); ?></label>
                    </li>
                    <li>
                      <label for="research10"><input id="research10" type="checkbox" name="research[]" value="Gays" <?php if(!empty($user->relUserDetail->research) && in_array("Gays",  explode(',', $user->relUserDetail->research))): ?> checked <?php endif; ?>>
                      <?php echo e(__('Gays')); ?></label>
                    </li>
                    <li>
                      <label for="research11"><input id="research11" type="checkbox" name="research[]" value="Transvestites" <?php if(!empty($user->relUserDetail->research) && in_array("Transvestites",  explode(',', $user->relUserDetail->research))): ?> checked <?php endif; ?>>
                      <?php echo e(__('Transvestites')); ?></label>
                    </li>
                    <li>
                      <label for="research12"><input id="research12" type="checkbox" name="research[]" value="Transgender" <?php if(!empty($user->relUserDetail->research) && in_array("Transgender",  explode(',', $user->relUserDetail->research))): ?> checked <?php endif; ?>>
                      <?php echo e(__('Transgender')); ?></label>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="coment mt-3 p-0">
              <div class="row">
                <div class="col-lg-2 col-md-2 col-5 pl-0">
                  <div class="boxw bg-standard-violet text-center rounded-left text-white px-3 py-3">
                    <p class="pt-2"><?php echo e(__('Type Of Meeting:')); ?></p>
                  </div>
                </div>
                <div class="col-lg-10 col-md-10 col-7">
                  <ul class="conpa py-3 like">  
                    <li>
                      <label for="type_of_meeting1"><input id="type_of_meeting1" type="checkbox" name="type_of_meeting[]" value="Trio" <?php if(!empty($user->relUserDetail->type_of_meeting) && in_array("Trio",  explode(',', $user->relUserDetail->type_of_meeting))): ?> checked <?php endif; ?>>
                      <?php echo e(__('Trio')); ?></label>
                    </li>
                    <li>
                      <label for="type_of_meeting2"><input id="type_of_meeting2" type="checkbox" name="type_of_meeting[]" value="Melanist" <?php if(!empty($user->relUserDetail->type_of_meeting) && in_array("Melanist",  explode(',', $user->relUserDetail->type_of_meeting))): ?> checked <?php endif; ?>>
                      <?php echo e(__('Melanist')); ?></label>
                    </li>
                    <li>
                      <label for="type_of_meeting3"><input id="type_of_meeting3" type="checkbox" name="type_of_meeting[]" value="Swinger" <?php if(!empty($user->relUserDetail->type_of_meeting) && in_array("Swinger",  explode(',', $user->relUserDetail->type_of_meeting))): ?> checked <?php endif; ?>>
                      <?php echo e(__('Swinger')); ?></label>
                    </li>
                    <li>
                      <label for="type_of_meeting4"><input id="type_of_meeting4" type="checkbox" name="type_of_meeting[]" value="Gang-Bang" <?php if(!empty($user->relUserDetail->type_of_meeting) && in_array("Gang-Bang",  explode(',', $user->relUserDetail->type_of_meeting))): ?> checked <?php endif; ?>>
                      <?php echo e(__('Gang-Bang')); ?></label>
                    </li>
                    <li>
                      <label for="type_of_meeting5"><input id="type_of_meeting5" type="checkbox" name="type_of_meeting[]" value="Plurality" <?php if(!empty($user->relUserDetail->type_of_meeting) && in_array("Plurality",  explode(',', $user->relUserDetail->type_of_meeting))): ?> checked <?php endif; ?>>
                      <?php echo e(__('Plurality')); ?></label>
                    </li>
                    <li>
                      <label for="type_of_meeting6"><input id="type_of_meeting6" type="checkbox" name="type_of_meeting[]" value="Multicouple" <?php if(!empty($user->relUserDetail->type_of_meeting) && in_array("Multicouple",  explode(',', $user->relUserDetail->type_of_meeting))): ?> checked <?php endif; ?>>
                      <?php echo e(__('Multicouple')); ?></label>
                    </li>
                    <li>
                      <label for="type_of_meeting7"><input id="type_of_meeting7" type="checkbox" name="type_of_meeting[]" value="Exhibition" <?php if(!empty($user->relUserDetail->type_of_meeting) && in_array("Exhibition",  explode(',', $user->relUserDetail->type_of_meeting))): ?> checked <?php endif; ?>>
                      <?php echo e(__('Exhibition')); ?></label>
                    </li>
                    <li>
                      <label for="type_of_meeting8"><input id="type_of_meeting8" type="checkbox" name="type_of_meeting[]" value="BDSM" <?php if(!empty($user->relUserDetail->type_of_meeting) && in_array("BDSM",  explode(',', $user->relUserDetail->type_of_meeting))): ?> checked <?php endif; ?>>
                      <?php echo e(__('BDSM')); ?></label>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="coment mt-3 p-0">
              <div class="row">
                <div class="col-lg-2 col-md-2 col-5 pl-0">
                  <div class="boxw bg-standard-violet text-center rounded-left text-white px-3 py-3">
                    <p class="pt-2"><?php echo e(__('First Meeting:')); ?><>
                  </div>
                </div>
                <div class="col-lg-10 col-md-10 col-7">
                  <ul class="conpa py-3 like">
                    <li>
                      <label for="first_meeting1"><input id="first_meeting1" type="checkbox" name="first_meeting[]" value="Club" <?php if(!empty($user->relUserDetail->first_meeting) && in_array("Club",  explode(',', $user->relUserDetail->first_meeting))): ?> checked <?php endif; ?>>
                      <?php echo e(__('Club')); ?></label>
                    </li>
                    <li>
                      <label for="first_meeting2"><input id="first_meeting2" type="checkbox" name="first_meeting[]" value="Private Evenings" <?php if(!empty($user->relUserDetail->first_meeting) && in_array("Private Evenings",  explode(',', $user->relUserDetail->first_meeting))): ?> checked <?php endif; ?>>
                      <?php echo e(__('Private Evenings')); ?></label>
                    </li>
                    <li>
                      <label for="first_meeting3"><input id="first_meeting3" type="checkbox" name="first_meeting[]" value="I Receive" <?php if(!empty($user->relUserDetail->first_meeting) && in_array("I Receive",  explode(',', $user->relUserDetail->first_meeting))): ?> checked <?php endif; ?>>
                      <?php echo e(__('I Receive')); ?></label>
                    </li>
                    <li>
                      <label for="first_meeting4"><input id="first_meeting4" type="checkbox" name="first_meeting[]" value="Move Me" <?php if(!empty($user->relUserDetail->first_meeting) && in_array("Move Me",  explode(',', $user->relUserDetail->first_meeting))): ?> checked <?php endif; ?>>
                      <?php echo e(__('Move Me')); ?></label>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="coment mt-3 p-0">
              <div class="row">
                <div class="col-lg-2 col-md-2 col-5 pl-0">
                  <div class="boxw bg-standard-violet text-center rounded-left text-white px-3 py-3">
                    <p class="pt-2" style=""><?php echo e(__('Vibe:')); ?></p>
                  </div>
                </div>
                <div class="col-lg-10 col-md-10 col-7">
                  <ul class="conpa py-3 like">
                    <li>
                      <label for="vibe1"><input id="vibe1" type="checkbox" name="vibe[]" value="Erotic" <?php if(!empty($user->relUserDetail->vibe) && in_array("Erotic",  explode(',', $user->relUserDetail->vibe))): ?> checked <?php endif; ?>>
                      <?php echo e(__('Erotic')); ?></label>
                    </li>
                    <li>
                      <label for="vibe2"><input id="vibe2" type="checkbox" name="vibe[]" value="Naughty" <?php if(!empty($user->relUserDetail->vibe) && in_array("Naughty",  explode(',', $user->relUserDetail->vibe))): ?> checked <?php endif; ?>>
                      <?php echo e(__('Naughty')); ?></label>
                    </li>
                    <li>
                      <label for="vibe3"><input id="vibe3" type="checkbox" name="vibe[]" value="Sex" <?php if(!empty($user->relUserDetail->vibe) && in_array("Sex",  explode(',', $user->relUserDetail->vibe))): ?> checked <?php endif; ?>>
                      <?php echo e(__('Sex')); ?></label>
                    </li>
                    <li>
                      <label for="vibe4"><input id="vibe4" type="checkbox" name="vibe[]" value="According To Mood" <?php if(!empty($user->relUserDetail->vibe) && in_array("According To Mood",  explode(',', $user->relUserDetail->vibe))): ?> checked <?php endif; ?>>
                      <?php echo e(__('According To Mood')); ?></label>
                    </li>
                    <li>
                      <label for="vibe5"><input id="vibe5" type="checkbox" name="vibe[]" value="Hard" <?php if(!empty($user->relUserDetail->vibe) && in_array("Hard",  explode(',', $user->relUserDetail->vibe))): ?> checked <?php endif; ?>>
                      <?php echo e(__('Hard')); ?></label>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <hr class="my-3">
            <label class="white "><?php echo e(__('About You:')); ?></label>
            <textarea class="form-control mb-3 " rows="6" type="text" name="about"><?php if(!empty($user->relUserDetail->about)): ?> <?php echo e(old('about',$user->relUserDetail->about)); ?> <?php endif; ?></textarea>
            <input type="submit" value="<?php echo e(__('Update Profile')); ?>" class="mt-3 rounded w-100 text-center bg-standard-violet text-white px-2 py-2 mt-2 mb-2">
          </div>
        </div>
      </form>
    <?php endif; ?>
    
    <?php if($user->user_type == 'professional'): ?>
    <form method="POST" action="<?php echo e(route('pro-profile-update')); ?>" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        
        <input type="hidden" name="_method" value="Patch" />
		<input type="hidden" name="id" value="<?php echo e(old('id',Auth::user()->id)); ?>">

        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 login-area pt-5 pb-3">
          <div class="dsew border border-light p-5 rounded">
            <div class="col-lg-2 col-md-2 col-5 fsde py-4 text-center m-auto">
			
              <div class="round_2 text-center"> 
			  <img src="<?php echo e(URL::to('/')); ?>/public/images/users/<?php echo e($user->image_url); ?>" id="output" onClick="$('#image').trigger('click');">
  
                <input type="hidden" name="old_image_url" value="<?php echo e($user->image_url); ?>" accept="image/*" style="display:none;">
				<input type="file" name="new_image_url" id="image" accept="image/*" style="display:none;">
                
                <?php $__errorArgs = ['image_url'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span style="color:red;"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> </div>
            </div>
            <div class="row">
              <div class="col-lg-5">
                <div class="row">
                  
                  <div class="col-12">
                    <div class="row">
                      <div class="col-6">
                        <label class="white py-2 mb-2"><?php echo e(__('Nickname:')); ?></label>
                      </div>
                      <div class="col-6">
                        <input class="form-control mb-2" type="text" name="username" value="<?php echo e(old('username',$user->username)); ?>" placeholder="<?php echo e(__('Nickname')); ?>">
                        <?php $__errorArgs = ['username'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span style="color:red;"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> </div>
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="row">
                      <div class="col-6">
                        <label class="white py-2 mb-2"><?php echo e(__('Club Name:')); ?></label>
                      </div>
                      <div class="col-6">
                        <input class="form-control mb-2" type="text" name="club_name" value="<?php echo e(old('club_name',$user->club_name)); ?>" placeholder="<?php echo e(__('Club Name')); ?>">
                        <?php $__errorArgs = ['club_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span style="color:red;"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> </div>
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="row">
                      <div class="col-6">
                        <label class="white py-2 mb-2"><?php echo e(__('Website Url:')); ?></label>
                      </div>
                      <div class="col-6">
                        <input class="form-control mb-2" type="text" name="website_url" value="<?php echo e(old('website_url',$user->relUserDetail->website_url)); ?>" placeholder="<?php echo e(__('Website Url')); ?>">
                        <?php $__errorArgs = ['website_url'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span style="color:red;"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> </div>
                    </div>
                  </div>
                  
              
                  <div class="col-12">
                    <div class="row">
                      <div class="col-6">
                        <label class="white py-2 mb-2"><?php echo e(__('Contact Number:')); ?></label>
                      </div>
                      <div class="col-6">
                        <input class="form-control mb-2" type="text" name="contact" value="<?php echo e(old('contact',$user->contact)); ?>" placeholder="<?php echo e(__('Contact Number')); ?>">
                        <?php $__errorArgs = ['contact'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span style="color:red;"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-2 line_boder"> <img src=""> </div>
              <div class="col-lg-5">
                <div class="row">
                  <div class="col-6">
                    <label class="white py-2 mb-2"><?php echo e(__('Status:')); ?></label>
                    <br>
                    <label class="white py-2 mb-2"><?php echo e(__('Address:')); ?></label>
                    <br>
                    <label class="white py-2 mb-2"><?php echo e(__('Zipcode:')); ?></label>
                    <br>
                    <label class="white py-2 mb-2"><?php echo e(__('Country:')); ?></label>
                    <br>
                    <label class="white py-2 mb-2"><?php echo e(__('City:')); ?></label>
                    <br>
                  </div>
                  <div class="col-6">
                    <select name="status" class="form-control mb-2" id="status">
                      <option value=""><?php echo e(__('Select Status')); ?></option>
                      <option value="libertine discotheque club" <?php if(!empty($user->relUserDetail->status)): ?> <?php if($user->relUserDetail->status=="libertine discotheque club" ): ?> <?php echo e('selected'); ?> <?php endif; ?> <?php endif; ?>><?php echo e(__('Libertine discotheque club')); ?></option>
                      <option value="sauna club" <?php if(!empty($user->relUserDetail->status)): ?> <?php if($user->relUserDetail->status=="sauna club" ): ?> <?php echo e('selected'); ?> <?php endif; ?> <?php endif; ?>><?php echo e(__('Sauna club')); ?></option>
                      <option value="organizer" <?php if(!empty($user->relUserDetail->status)): ?> <?php if($user->relUserDetail->status=="organizer" ): ?> <?php echo e('selected'); ?> <?php endif; ?> <?php endif; ?>><?php echo e(__('Organizer')); ?></option>
                      <option value="libertine camping" <?php if(!empty($user->relUserDetail->status)): ?> <?php if($user->relUserDetail->status=="libertine camping" ): ?> <?php echo e('selected'); ?> <?php endif; ?> <?php endif; ?>><?php echo e(__('Libertine camping')); ?></option>
                      <option value="erotic writer" <?php if(!empty($user->relUserDetail->status)): ?> <?php if($user->relUserDetail->status=="erotic writer" ): ?> <?php echo e('selected'); ?> <?php endif; ?> <?php endif; ?>><?php echo e(__('Erotic writer')); ?></option>
                      <option value="photographer" <?php if(!empty($user->relUserDetail->status)): ?> <?php if($user->relUserDetail->status=="photographer" ): ?> <?php echo e('selected'); ?> <?php endif; ?> <?php endif; ?>><?php echo e(__('Photographer')); ?></option>
                      <option value="tattoo artist" <?php if(!empty($user->relUserDetail->status)): ?> <?php if($user->relUserDetail->status=="tattoo artist" ): ?> <?php echo e('selected'); ?> <?php endif; ?> <?php endif; ?>><?php echo e(__('Tattoo artist')); ?></option>
                      <option value="erotic photographer" <?php if(!empty($user->relUserDetail->status)): ?> <?php if($user->relUserDetail->status=="erotic photographer" ): ?> <?php echo e('selected'); ?> <?php endif; ?> <?php endif; ?>><?php echo e(__('Erotic photographer')); ?></option>
                      <option value="sex shop" <?php if(!empty($user->relUserDetail->status)): ?> <?php if($user->relUserDetail->status=="sex shop" ): ?> <?php echo e('selected'); ?> <?php endif; ?> <?php endif; ?>><?php echo e(__('Sex shop')); ?></option>
                      <option value="online sex shop" <?php if(!empty($user->relUserDetail->status)): ?> <?php if($user->relUserDetail->status=="online sex shop" ): ?> <?php echo e('selected'); ?> <?php endif; ?> <?php endif; ?>><?php echo e(__('Online sex shop')); ?></option>
                    </select>
                    <?php $__errorArgs = ['status'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span style="color:red;"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    <input class="form-control mb-2" type="text" name="address" value="<?php if(!empty($user->relUserDetail->address)): ?> <?php echo e(old('address',$user->relUserDetail->address)); ?> <?php endif; ?>" placeholder="<?php echo e(__('Address')); ?>">
                    <?php $__errorArgs = ['address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span style="color:red;"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    <input class="form-control mb-2" type="text" name="zipcode" value="<?php if(!empty($user->relUserDetail->zipcode)): ?> <?php echo e(old('zipcode',$user->relUserDetail->zipcode)); ?> <?php endif; ?>" placeholder="<?php echo e(__('Zipcode')); ?>">
                    <?php $__errorArgs = ['zipcode'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span style="color:red;"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    
					<select name="country" class="form-control mb-2" id="country" onChange="getCity(this.selectedIndex)">
                      <option value=""><?php echo e(__('Select Country')); ?></option>
                      <?php if(!empty($countries)): ?>
					  <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					  <option value="<?php echo e($country->id); ?>" <?php if(!empty($user->relUserDetail->country)): ?> <?php if($user->relUserDetail->country==$country->name): ?> <?php echo e('selected'); ?> <?php endif; ?> <?php endif; ?>><?php echo e($country->name); ?></option>
					  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					  <?php endif; ?>
                    </select>
                    <?php $__errorArgs = ['country'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span style="color:red;"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> 
                    <select name="city" class="form-control mb-2" id="city">
                      <option value=""><?php echo e(__('Select City')); ?></option>
                      <?php if(!empty($cities)): ?>
					  <?php $__currentLoopData = $cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					  <option value="<?php echo e($city->name); ?>" <?php if(!empty($user->relUserDetail->city)): ?> <?php if($user->relUserDetail->city==$city->name): ?> <?php echo e('selected'); ?> <?php endif; ?> <?php endif; ?>><?php echo e($city->name); ?></option>
					  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					  <?php endif; ?>
                    </select>
                    <?php $__errorArgs = ['city'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span style="color:red;"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
                
              </div>
            </div>
            <div class="row mt-3">
                
            <div class="col-12">
                    <div class="row">
                      <div class="col-lg-2 col-md-2 col-12">
                        <label class="white" for="checkMonday">
                            <input type="checkbox" name="club_day[]" class="text-while" value="monday" <?php if(!empty($user->club_day) && in_array("monday",  explode('|', $user->club_day))): ?> checked <?php endif; ?>> Monday </label>
                            <?php $__errorArgs = ['club_day'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span style="color:red;"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                      </div>
                      <div class="col-lg-5 col-md-5 col-12">
                        <div class="row">
                            <div class="col-5">  
                                <label class="white py-2 mb-2">Stat Time</label> 
                            </div>    
                            <div class="col-7">    
                                <input class="form-control mb-2" type="time" name="club_start_time[]">
                                <?php $__errorArgs = ['club_start_time'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span style="color:red;"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>    
                        </div>
                    </div>
                     <div class="col-lg-5 col-md-5 col-12">
                        <div class="row">       
                           <div class="col-5">  
                                <label class="white py-2 mb-2">End Time</label> 
                            </div>    
                            <div class="col-7">    
                                <input class="form-control mb-2" type="time" name="club_end_time[]" value="">
                                <?php $__errorArgs = ['club_end_time'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span style="color:red;"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>  
                        </div> 
                    </div>    
                  </div>
            </div>
                   
                
                <div class="col-12">
                    <div class="row">
                      <div class="col-lg-2 col-md-2 col-12">
                        <label class="white" for="checkMonday"> 
                            <input type="checkbox" name="club_day[]" class="text-while" value="tuesday" <?php if(!empty($user->club_day) && in_array("tuesday",  explode('|', $user->club_day))): ?> checked <?php endif; ?>> Tuesday </label>
                      </div>
                      <div class="col-lg-5 col-md-5 col-12">
                        <div class="row">
                            <div class="col-5">  
                                <label class="white py-2 mb-2">Stat Time</label> 
                            </div>    
                            <div class="col-7">    
                                <input class="form-control mb-2" type="time" name="club_start_time[]">
                            </div>    
                        </div>
                    </div>
                     <div class="col-lg-5 col-md-5 col-12">
                        <div class="row">       
                           <div class="col-5">  
                                <label class="white py-2 mb-2">End Time</label> 
                            </div>    
                            <div class="col-7">    
                                <input class="form-control mb-2" type="time" name="club_end_time[]">
                            </div>  
                        </div> 
                    </div>    
                      </div>
                </div>
                  
                
                <div class="col-12">
                    <div class="row">
                      <div class="col-lg-2 col-md-2 col-12">
                        <label class="white" for="checkMonday"> 
                            <input type="checkbox" name="club_day[]" class="text-while" value="wednesday" <?php if(!empty($user->club_day) && in_array("wednesday",  explode('|', $user->club_day))): ?> checked <?php endif; ?>> Wednesday </label>
                      </div>
                      <div class="col-lg-5 col-md-5 col-12">
                        <div class="row">
                            <div class="col-5">  
                                <label class="white py-2 mb-2">Stat Time</label> 
                            </div>    
                            <div class="col-7">    
                                <input class="form-control mb-2" type="time" name="club_start_time[]">
                            </div>    
                        </div>
                    </div>
                     <div class="col-lg-5 col-md-5 col-12">
                        <div class="row">       
                           <div class="col-5">  
                                <label class="white py-2 mb-2">End Time</label> 
                            </div>    
                            <div class="col-7">    
                                <input class="form-control mb-2" type="time" name="club_end_time[]">
                            </div>  
                        </div> 
                    </div>    
                      </div>
                </div>
                  
                
                <div class="col-12">
                    <div class="row">
                      <div class="col-lg-2 col-md-2 col-12">
                        <label class="white" for="checkMonday"> 
                            <input type="checkbox" name="club_day[]" class="text-while" value="thursday" <?php if(!empty($user->club_day) && in_array("thursday",  explode('|', $user->club_day))): ?> checked <?php endif; ?>> Thursday </label>
                      </div>
                      <div class="col-lg-5 col-md-5 col-12">
                        <div class="row">
                            <div class="col-5">  
                                <label class="white py-2 mb-2">Stat Time</label> 
                            </div>    
                            <div class="col-7">    
                                <input class="form-control mb-2" type="time" name="club_start_time[]">
                            </div>    
                        </div>
                    </div>
                     <div class="col-lg-5 col-md-5 col-12">
                        <div class="row">       
                           <div class="col-5">  
                                <label class="white py-2 mb-2">End Time</label> 
                            </div>    
                            <div class="col-7">    
                                <input class="form-control mb-2" type="time" name="club_end_time[]">
                            </div>  
                        </div> 
                    </div>    
                      </div>
                </div>
                
                <div class="col-12">
                    <div class="row">
                      <div class="col-lg-2 col-md-2 col-12">
                        <label class="white" for="checkMonday"> 
                            <input type="checkbox" name="club_day[]" class="text-while" value="friday" <?php if(!empty($user->club_day) && in_array("friday",  explode('|', $user->club_day))): ?> checked <?php endif; ?>> Friday </label>
                      </div>
                      <div class="col-lg-5 col-md-5 col-12">
                        <div class="row">
                            <div class="col-5">  
                                <label class="white py-2 mb-2">Stat Time</label> 
                            </div>    
                            <div class="col-7">    
                                <input class="form-control mb-2" type="time" name="club_start_time[]">
                            </div>    
                        </div>
                    </div>
                     <div class="col-lg-5 col-md-5 col-12">
                        <div class="row">       
                           <div class="col-5">  
                                <label class="white py-2 mb-2">End Time</label> 
                            </div>    
                            <div class="col-7">    
                                <input class="form-control mb-2" type="time" name="club_end_time[]">
                            </div>  
                        </div> 
                    </div>    
                      </div>
                </div> 
                
                <div class="col-12">
                    <div class="row">
                      <div class="col-lg-2 col-md-2 col-12">
                        <label class="white" for="checkMonday"> 
                            <input type="checkbox" name="club_day[]" class="text-while" value="saturday" <?php if(!empty($user->club_day) && in_array("saturday",  explode('|', $user->club_day))): ?> checked <?php endif; ?>> Saturday </label>
                      </div>
                      <div class="col-lg-5 col-md-5 col-12">
                        <div class="row">
                            <div class="col-5">  
                                <label class="white py-2 mb-2">Stat Time</label> 
                            </div>    
                            <div class="col-7">    
                                <input class="form-control mb-2" type="time" name="club_start_time[]">
                            </div>    
                        </div>
                    </div>
                     <div class="col-lg-5 col-md-5 col-12">
                        <div class="row">       
                           <div class="col-5">  
                                <label class="white py-2 mb-2">End Time</label> 
                            </div>    
                            <div class="col-7">    
                                <input class="form-control mb-2" type="time" name="club_end_time[]">
                            </div>  
                        </div> 
                    </div>    
                    </div>
                </div> 
                
                <div class="col-12">
                    <div class="row">
                      <div class="col-lg-2 col-md-2 col-12">
                        <label class="white" for="checkMonday"> 
                            <input type="checkbox" name="club_day[]" class="text-while" value="sunday" <?php if(!empty($user->club_day) && in_array("sunday",  explode('|', $user->club_day))): ?> checked <?php endif; ?>> Sunday </label>
                      </div>
                      <div class="col-lg-5 col-md-5 col-12">
                        <div class="row">
                            <div class="col-5">  
                                <label class="white py-2 mb-2">Stat Time</label> 
                            </div>    
                            <div class="col-7">    
                                <input class="form-control mb-2" type="time" name="club_start_time[]">
                            </div>    
                        </div>
                    </div>
                     <div class="col-lg-5 col-md-5 col-12">
                        <div class="row">       
                           <div class="col-5">  
                                <label class="white py-2 mb-2">End Time</label> 
                            </div>    
                            <div class="col-7">    
                                <input class="form-control mb-2" type="time" name="club_end_time[]">
                            </div>  
                        </div> 
                    </div>    
                      </div>
                    </div> 
                <!--</div>-->
            <hr class="my-3">
            <label class="white "><?php echo e(__('About You:')); ?></label>
            <textarea class="form-control mb-3" rows="6" type="text" name="about"><?php if(!empty($user->relUserDetail->about)): ?> <?php echo e(old('about',$user->relUserDetail->about)); ?> <?php endif; ?></textarea>
            <input type="submit" value="<?php echo e(__('Update Profile')); ?>" class="mt-3 rounded w-100 text-center bg-standard-violet text-white px-2 py-2 mt-2 mb-2">
          </div>
        </div>
    </form>
    <?php endif; ?>
    </div>

<script>
function loadVal()
{
if($('#you_are').val()=='')
{
}
else
{
var you_are = $('#you_are').find(':selected').attr('member-count');
if(you_are=='2')
{
$('.memberTwo').css('display','block');
}
else
{
$('.memberTwo').css('display','none');
}
}
}

$(document).ready(function()
{
loadVal();

$(document).on('change','#you_are',function()
{
loadVal();
});
});
</script>

<script>
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#output').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}

$("#image").change(function(){
    readURL(this);
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
                var html = "<option value=''>Select one</option>";
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
    
    function getCityCouple(id) {
        // alert(id);
        var country_id = document.getElementById('country_couple').options[id].value;
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
                var html = "<option value=''>Select one</option>";
                $.each(data, function(i, item) {
                    html = html + "<option value='" + data[i].name + "'>" + data[i].name + "</option>";
                });
                $("#city_couple").html(html);
            },
            error: function(request, status, error) {
                document.getElementById("loader").style.display = "none";
                console.log("Error is: " + request.responseText);
            }
        });
    }
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/demogswebtech/public_html/freely/resources/views/profile_edit.blade.php ENDPATH**/ ?>