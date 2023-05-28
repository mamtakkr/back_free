<!DOCTYPE html>
<html lang="en">
<head>
<title>Freely</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo e(URL::to('/')); ?>/public/frontend/costum.js"></script>
<link rel="stylesheet" href="<?php echo e(URL::to('/')); ?>/public/frontend/style.css">
<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
<!--<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js'></script>-->
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


</head>
<body>
<div class="bg-_images bg_uy h-100">
  <header>
    <video autoplay muted loop id="myVideo" style="height: 112px; width: 100%;object-fit: cover;object-position: center center;opacity: 1;">
      <source src="https://video.wixstatic.com/video/eab394_e27438dbd7b64a9282dc088e3998336f/720p/mp4/file.mp4" type="video/mp4">
    </video>
    <div class="gtew">
      <div class="container">
        <div class="row">
          <nav>
            <div class="menu-icon"> <i class="fa fa-bars fa-2x"></i> </div>
            <div class="logo"> <a href="<?php echo e(route('index')); ?>"><img src="<?php echo e(URL::to('/')); ?>/public/frontend/imgs/logo-officiel-nouveau.png"></a> </div>
            <div class="menu">
              <ul>
                <li><a class="bg-standard-violet rounded-left text-white px-2 py-2 " href="<?php echo e(route('login')); ?>"><?php echo e(__('Login')); ?></a></li>
                <li> <a class="bg-standard-violet rounded-right  text-white px-2 py-2 active" href="<?php echo e(route('registerType')); ?>"><?php echo e(__('Register')); ?></a> </li>
              </ul>
            </div>
          </nav>
        </div>
      </div>
    </div>
  </header>
  <div class="container ">
    <div class="row h-100 justify-content-center"> <?php if($error=Session::get('error')): ?>
      <div class="alert alert-danger">
        <p><?php echo e($error); ?></p>
      </div>
      <?php endif; ?><br>
      <form method="POST" action="<?php echo e(route('member-register')); ?>" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 login-area pt-5 pb-3">
          <div class="dsew border border-light p-5 rounded">
            <div class="col-lg-2 col-md-2 col-5 fsde py-4 text-center m-auto">
			
              <div class="round_2 text-center"> 
			  <img src="<?php echo e(URL::to('/')); ?>/public/images/no-user.png" id="output" onClick="$('#image').trigger('click');">
			  
                <input type="file" name="image_url" id="image" accept="image/*" style="display:none;">
                
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
                        <label class="white py-2 mb-2"><?php echo e(__('Email:')); ?></label>
                      </div>
                      <div class="col-6">
                        <input class="form-control mb-2" type="email" name="email" value="<?php echo e(old('email')); ?>" placeholder="<?php echo e(__('Email')); ?>">
                        <?php $__errorArgs = ['email'];
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
                        <label class="white py-2 mb-2"><?php echo e(__('Password:')); ?></label>
                      </div>
                      <div class="col-6">
                        <input class="form-control mb-2" type="password" name="password" autocomplete="new-password" placeholder="<?php echo e(__('Password')); ?>">
                        <?php $__errorArgs = ['password'];
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
                        <label class="white  py-2 mb-2"><?php echo e(__('Confirm Password:')); ?></label>
                      </div>
                      <div class="col-6">
                        <input class="form-control mb-2" type="password" name="password_confirmation" placeholder="<?php echo e(__('Confirm Password')); ?>">
                        <?php $__errorArgs = ['password_confirmation'];
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
                  <div class="col-12">
                    <div class="row">
                      <div class="col-6">
                        <label class="white py-2 mb-2"><?php echo e(__('Nickname:')); ?></label>
                      </div>
                      <div class="col-6">
                        <input class="form-control mb-2" type="text" name="username" value="<?php echo e(old('username')); ?>" placeholder="<?php echo e(__('Nickname')); ?>">
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
                          <option member-count="2" value="Straight Couples" <?php if(old('you_are')=="Straight Couples" ): ?> <?php echo e('selected'); ?> <?php endif; ?>><?php echo e(__('Straight Couples')); ?></option>
                          <option member-count="2" value="Couples F Bi" <?php if(old('you_are')=="Couples F Bi" ): ?> <?php echo e('selected'); ?> <?php endif; ?>><?php echo e(__('Couples F Bi')); ?></option>
                          <option member-count="2" value="Couples H Bi" <?php if(old('you_are')=="Couples H Bi" ): ?> <?php echo e('selected'); ?> <?php endif; ?>><?php echo e(__('Couples H Bi')); ?></option>
						  <option member-count="2" value="Couples Bi" <?php if(old('you_are')=="Couples Bi" ): ?> <?php echo e('selected'); ?> <?php endif; ?>><?php echo e(__('Couples Bi')); ?></option>
						  <option member-count="1" value="Straight Women" <?php if(old('you_are')=="Straight Women" ): ?> <?php echo e('selected'); ?> <?php endif; ?>><?php echo e(__('Straight Women')); ?></option>
						  <option member-count="1" value="Women Bi" <?php if(old('you_are')=="Women Bi" ): ?> <?php echo e('selected'); ?> <?php endif; ?>><?php echo e(__('Women Bi')); ?></option>
						  <option member-count="1" value="Lesbians" <?php if(old('you_are')=="Lesbians" ): ?> <?php echo e('selected'); ?> <?php endif; ?>><?php echo e(__('Lesbians')); ?></option>
						  <option member-count="1" value="Straight Hammers" <?php if(old('you_are')=="Straight Hammers" ): ?> <?php echo e('selected'); ?> <?php endif; ?>><?php echo e(__('Straight Hammers')); ?></option>
						  <option member-count="1" value="Mrs. Hammes" <?php if(old('you_are')=="Mrs. Hammes" ): ?> <?php echo e('selected'); ?> <?php endif; ?>><?php echo e(__('Mrs. Hammes')); ?></option>
						  <option member-count="1" value="Gays" <?php if(old('you_are')=="Gays" ): ?> <?php echo e('selected'); ?> <?php endif; ?>><?php echo e(__('Gays')); ?></option>
						  <option member-count="1" value="Transvestites" <?php if(old('you_are')=="Transvestites" ): ?> <?php echo e('selected'); ?> <?php endif; ?>><?php echo e(__('Transvestites')); ?></option>
						  <option member-count="1" value="Transgender" <?php if(old('you_are')=="Transgender" ): ?> <?php echo e('selected'); ?> <?php endif; ?>><?php echo e(__('Transgender')); ?></option>
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
                          <option member-count="2" value="To Discover" <?php if(old('experience')=="To Discover" ): ?> <?php echo e('selected'); ?> <?php endif; ?>><?php echo e(__('To Discover')); ?></option>
                          <option member-count="2" value="Beginner" <?php if(old('experience')=="Beginner" ): ?> <?php echo e('selected'); ?> <?php endif; ?>><?php echo e(__('Beginner')); ?></option>
                          <option member-count="2" value="Experienced" <?php if(old('experience')=="Experienced" ): ?> <?php echo e('selected'); ?> <?php endif; ?>><?php echo e(__('Experienced')); ?></option>
                          <option member-count="2" value="Occasional" <?php if(old('experience')=="Occasional" ): ?> <?php echo e('selected'); ?> <?php endif; ?>><?php echo e(__('Occasional')); ?></option>
                          <option member-count="2" value="I Keep To Myself" <?php if(old('experience')=="I Keep To Myself" ): ?> <?php echo e('selected'); ?> <?php endif; ?>><?php echo e(__('I Keep To Myself')); ?></option>
						  
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
            </div>
            <hr>
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
                        <select class="form-control mb-2" id="who_i" name="who_i">
                          <option><?php echo e(__('Select Type')); ?></option>
                          <option value="Man" <?php if(old('who_i')=="Man" ): ?> <?php echo e('selected'); ?> <?php endif; ?>>Man</option>
                          <option value="Woman" <?php if(old('who_i')=="Woman" ): ?> <?php echo e('selected'); ?> <?php endif; ?>>Woman</option>
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
                        <input class="form-control mb-2" type="date" id="dob" name="dob" value="<?php echo e(old('dob')); ?>">
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
                        <input class="form-control mb-2" type="text" name="size" value="<?php echo e(old('size')); ?>" placeholder="<?php echo e(__('Size')); ?>">
                      </div>
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="row">
                      <div class="col-6">
                        <label class="white py-2 mb-2"><?php echo e(__('Weight In KG:')); ?></label>
                      </div>
                      <div class="col-6">
                        <input class="form-control mb-2" type="text" name="weight" value="<?php echo e(old('weight')); ?>" placeholder="<?php echo e(__('Weight')); ?>">
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
						  <option value="<?php echo e($origin->name); ?>" <?php if(old('origin')==$origin->name): ?> <?php echo e('selected'); ?> <?php endif; ?>><?php echo e($origin->name); ?></option>
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
                    <label class="white py-2 mb-2"><?php echo e(__('Sillhouette:')); ?></label>
                    <br>
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
                    <select name="sillhouette" class="form-control mb-2" id="sillhouette">
                      <option value=""><?php echo e(__('Select Sillhouette')); ?></option>
                      <option value="Thin" <?php if(old('sillhouette')=="Thin" ): ?> <?php echo e('selected'); ?> <?php endif; ?>><?php echo e(__('Thin')); ?></option>
                      <option value="Athletic" <?php if(old('sillhouette')=="Athletic" ): ?> <?php echo e('selected'); ?> <?php endif; ?>><?php echo e(__('Athletic')); ?></option>
                      <option value="Normal" <?php if(old('sillhouette')=="Normal" ): ?> <?php echo e('selected'); ?> <?php endif; ?>><?php echo e(__('Normal')); ?></option>
                      <option value="Some roundness" <?php if(old('sillhouette')=="Some roundness" ): ?> <?php echo e('selected'); ?> <?php endif; ?>><?php echo e(__('Some roundness')); ?></option>
                      <option value="Round" <?php if(old('sillhouette')=="Round" ): ?> <?php echo e('selected'); ?> <?php endif; ?>><?php echo e(__('Round')); ?></option>
                      <option value="I keep it for myself" <?php if(old('sillhouette')=="I keep it for myself" ): ?> <?php echo e('selected'); ?> <?php endif; ?>><?php echo e(__('I keep it for myself')); ?></option>
                    </select>
                    <select name="hair_size" class="form-control mb-2" id="hair_size">
                      <option value=""><?php echo e(__('Select Hair Size')); ?></option>
                      <option value="long" <?php if(old('hair_size')=="long" ): ?> <?php echo e('selected'); ?> <?php endif; ?>><?php echo e(__('Long')); ?></option>
                      <option value="short" <?php if(old('hair_size')=="short" ): ?> <?php echo e('selected'); ?> <?php endif; ?>><?php echo e(__('Short')); ?></option>
                      <option value="bob" <?php if(old('hair_size')=="bob" ): ?> <?php echo e('selected'); ?> <?php endif; ?>><?php echo e(__('Bob')); ?></option>
                      <option value="shoulder length" <?php if(old('hair_size')=="shoulder length" ): ?> <?php echo e('selected'); ?> <?php endif; ?>><?php echo e(__('Shoulder Length')); ?></option>
                    </select>
                    <select name="hair_color" class="form-control mb-2" id="hair_color">
                      <option value=""><?php echo e(__('Select Hair Color')); ?></option>
                      <option value="black" <?php if(old('hair_color')=="black" ): ?> <?php echo e('selected'); ?> <?php endif; ?>><?php echo e(__('Black')); ?></option>
                      <option value="grey" <?php if(old('hair_color')=="grey" ): ?> <?php echo e('selected'); ?> <?php endif; ?>><?php echo e(__('Grey')); ?></option>
                      <option value="burgandy" <?php if(old('hair_color')=="burgandy" ): ?> <?php echo e('selected'); ?> <?php endif; ?>><?php echo e(__('Burgandy')); ?></option>
                      <option value="blonde" <?php if(old('hair_color')=="blonde" ): ?> <?php echo e('selected'); ?> <?php endif; ?>><?php echo e(__('Blonde')); ?></option>
                      <option value="dark brown" <?php if(old('hair_color')=="dark brown" ): ?> <?php echo e('selected'); ?> <?php endif; ?>><?php echo e(__('Dark Brown')); ?></option>
                      <option value="light brown" <?php if(old('hair_color')=="light brown" ): ?> <?php echo e('selected'); ?> <?php endif; ?>><?php echo e(__('Light Brown')); ?></option>
                    </select>
                    <select name="eye_colour" class="form-control mb-2" id="eye_colour">
                      <option value=""><?php echo e(__('Select Eye Color')); ?></option>
                      <option value="black" <?php if(old('eye_colour')=="black" ): ?> <?php echo e('selected'); ?> <?php endif; ?>><?php echo e(__('Black')); ?></option>
                      <option value="light brown" <?php if(old('eye_colour')=="light brown" ): ?> <?php echo e('selected'); ?> <?php endif; ?>><?php echo e(__('Light Brown')); ?></option>
                      <option value="dark brown" <?php if(old('eye_colour')=="dark brown" ): ?> <?php echo e('selected'); ?> <?php endif; ?>><?php echo e(__('Dark Brown')); ?></option>
                      <option value="green" <?php if(old('eye_colour')=="green" ): ?> <?php echo e('selected'); ?> <?php endif; ?>><?php echo e(__('Green')); ?></option>
                      <option value="grey" <?php if(old('eye_colour')=="grey" ): ?> <?php echo e('selected'); ?> <?php endif; ?>><?php echo e(__('Grey')); ?></option>
                      <option value="blue" <?php if(old('eye_colour')=="blue" ): ?> <?php echo e('selected'); ?> <?php endif; ?>><?php echo e(__('Blue')); ?></option>
                    </select>
                    <select name="country" class="form-control mb-2" id="country" onChange="getCity(this.selectedIndex)">
                      <option value=""><?php echo e(__('Select Country')); ?></option>
                      <?php if(!empty($countries)): ?>
					  <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					  <option value="<?php echo e($country->id); ?>" <?php if(old('country')==$country->id): ?> <?php echo e('selected'); ?> <?php endif; ?>><?php echo e($country->name); ?></option>
					  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					  <?php endif; ?>
                    </select>
                    <select name="city" class="form-control mb-2" id="city">
                      <option value=""><?php echo e(__('Select City')); ?></option>
       <!--               -->
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
                          <option value="Man" <?php if(old('who_i_couple')=="Man" ): ?> <?php echo e('selected'); ?> <?php endif; ?>>Man</option>
                          <option value="Woman" <?php if(old('who_i_couple')=="Woman" ): ?> <?php echo e('selected'); ?> <?php endif; ?>>Woman</option>
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
                        <input class="form-control mb-2" type="date" id="dob" name="dob_couple" value="<?php echo e(old('dob_couple')); ?>">
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
                        <input class="form-control mb-2" type="text" name="size_couple" value="<?php echo e(old('size_couple')); ?>" placeholder="<?php echo e(__('Size')); ?>">
                      </div>
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="row">
                      <div class="col-6">
                        <label class="white py-2 mb-2"><?php echo e(__('Weight In KG:')); ?></label>
                      </div>
                      <div class="col-6">
                        <input class="form-control mb-2" type="text" name="weight_couple" value="<?php echo e(old('weight_couple')); ?>" placeholder="<?php echo e(__('Weight')); ?>">
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
						  <option value="<?php echo e($origin->name); ?>" <?php if(old('origin_couple')==$origin->name): ?> <?php echo e('selected'); ?> <?php endif; ?>><?php echo e($origin->name); ?></option>
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
                    <label class="white py-2 mb-2"><?php echo e(__('Sillhouette:')); ?></label>
                    <br>
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
                    <select name="sillhouette" class="form-control mb-2" id="sillhouette">
                      <option value=""><?php echo e(__('Select Sillhouette')); ?></option>
                      <option value="Thin" <?php if(old('sillhouette')=="Thin" ): ?> <?php echo e('selected'); ?> <?php endif; ?>><?php echo e(__('Thin')); ?></option>
                      <option value="Athletic" <?php if(old('sillhouette')=="Athletic" ): ?> <?php echo e('selected'); ?> <?php endif; ?>><?php echo e(__('Athletic')); ?></option>
                      <option value="Normal" <?php if(old('sillhouette')=="Normal" ): ?> <?php echo e('selected'); ?> <?php endif; ?>><?php echo e(__('Normal')); ?></option>
                      <option value="Some roundness" <?php if(old('sillhouette')=="Some roundness" ): ?> <?php echo e('selected'); ?> <?php endif; ?>><?php echo e(__('Some roundness')); ?></option>
                      <option value="Round" <?php if(old('sillhouette')=="Round" ): ?> <?php echo e('selected'); ?> <?php endif; ?>><?php echo e(__('Round')); ?></option>
                      <option value="I keep it for myself" <?php if(old('sillhouette')=="I keep it for myself" ): ?> <?php echo e('selected'); ?> <?php endif; ?>><?php echo e(__('I keep it for myself')); ?></option>
                    </select>
                    <select name="hair_size_couple" class="form-control mb-2" id="hair_size_couple">
                      <option value=""><?php echo e(__('Select Hair Size')); ?></option>
                      <option value="long" <?php if(old('hair_size_couple')=="long" ): ?> <?php echo e('selected'); ?> <?php endif; ?>><?php echo e(__('Long')); ?></option>
                      <option value="short" <?php if(old('hair_size_couple')=="short" ): ?> <?php echo e('selected'); ?> <?php endif; ?>><?php echo e(__('Short')); ?></option>
                      <option value="bob" <?php if(old('hair_size_couple')=="bob" ): ?> <?php echo e('selected'); ?> <?php endif; ?>><?php echo e(__('Bob')); ?></option>
                      <option value="shoulder length" <?php if(old('hair_size_couple')=="shoulder length" ): ?> <?php echo e('selected'); ?> <?php endif; ?>><?php echo e(__('Shoulder Length')); ?></option>
                    </select>
                    <select name="hair_color_couple" class="form-control mb-2" id="hair_color_couple">
                      <option value=""><?php echo e(__('Select Hair Color')); ?></option>
                      <option value="black" <?php if(old('hair_color_couple')=="black" ): ?> <?php echo e('selected'); ?> <?php endif; ?>><?php echo e(__('Black')); ?></option>
                      <option value="grey" <?php if(old('hair_color_couple')=="grey" ): ?> <?php echo e('selected'); ?> <?php endif; ?>><?php echo e(__('Grey')); ?></option>
                      <option value="burgandy" <?php if(old('hair_color_couple')=="burgandy" ): ?> <?php echo e('selected'); ?> <?php endif; ?>><?php echo e(__('Burgandy')); ?></option>
                      <option value="blonde" <?php if(old('hair_color_couple')=="blonde" ): ?> <?php echo e('selected'); ?> <?php endif; ?>><?php echo e(__('Blonde')); ?></option>
                      <option value="dark brown" <?php if(old('hair_color_couple')=="dark brown" ): ?> <?php echo e('selected'); ?> <?php endif; ?>><?php echo e(__('Dark Brown')); ?></option>
                      <option value="light brown" <?php if(old('hair_color_couple')=="light brown" ): ?> <?php echo e('selected'); ?> <?php endif; ?>><?php echo e(__('Light Brown')); ?></option>
                    </select>
                    <select name="eye_colour_couple" class="form-control mb-2" id="eye_colour_couple">
                      <option value=""><?php echo e(__('Select Eye Color')); ?></option>
                      <option value="black" <?php if(old('eye_colour_couple')=="black" ): ?> <?php echo e('selected'); ?> <?php endif; ?>><?php echo e(__('Black')); ?></option>
                      <option value="light brown" <?php if(old('eye_colour_couple')=="light brown" ): ?> <?php echo e('selected'); ?> <?php endif; ?>><?php echo e(__('Light Brown')); ?></option>
                      <option value="dark brown" <?php if(old('eye_colour_couple')=="dark brown" ): ?> <?php echo e('selected'); ?> <?php endif; ?>><?php echo e(__('Dark Brown')); ?></option>
                      <option value="green" <?php if(old('eye_colour_couple')=="green" ): ?> <?php echo e('selected'); ?> <?php endif; ?>><?php echo e(__('Green')); ?></option>
                      <option value="grey" <?php if(old('eye_colour_couple')=="grey" ): ?> <?php echo e('selected'); ?> <?php endif; ?>><?php echo e(__('Grey')); ?></option>
                      <option value="blue" <?php if(old('eye_colour_couple')=="blue" ): ?> <?php echo e('selected'); ?> <?php endif; ?>><?php echo e(__('Blue')); ?></option>
                    </select>
                    <select name="country_couple" class="form-control mb-2" id="country_couple" onChange="getCityCouple(this.selectedIndex)">
                      <option value=""><?php echo e(__('Select Country')); ?></option>
                      <?php if(!empty($countries)): ?>
					  <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					  <option value="<?php echo e($country->id); ?>" <?php if(old('country')==$country->id): ?> <?php echo e('selected'); ?> <?php endif; ?>><?php echo e($country->name); ?></option>
					  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					  <?php endif; ?>
                    </select>
                    <select name="city_couple" class="form-control mb-2" id="city_couple">
                      <option value=""><?php echo e(__('Select City')); ?></option>
                      -->
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
                      <label for="research1"><input id="research1" type="checkbox" name="research[]" value="Straight Couples" <?php if(old('research')!='' && in_array("Straight Couples", old('research'))): ?> checked="checked" <?php endif; ?>> <?php echo e(__('Straight Couples')); ?></label>
                    </li>
                    <li>
                      <label for="research2"><input id="research2" type="checkbox" name="research[]" value="Couples F Bi" <?php if(old('research')!='' && in_array("Couples F Bi", old('research'))): ?> checked="checked" <?php endif; ?>>
                      <?php echo e(__('Couples F Bi')); ?></label>
                    </li>
                    <li>
                      <label for="research3"><input id="research3" type="checkbox" name="research[]" value="Couples H Bi" <?php if(old('research')!='' && in_array("Couples H Bi", old('research'))): ?> checked="checked" <?php endif; ?>>
                      <?php echo e(__('Couples H Bi')); ?></label>
                    </li>
                    <li>
                      <label for="research4"><input id="research4" type="checkbox" name="research[]" value="Couples Bi" <?php if(old('research')!='' && in_array("Couples Bi", old('research'))): ?> checked="checked" <?php endif; ?>>
                      <?php echo e(__('Couples Bi')); ?></label>
                    </li>
                    <li>
                      <label for="research5"><input id="research5" type="checkbox" name="research[]" value="Straight Women" <?php if(old('research')!='' && in_array("Straight Women", old('research'))): ?> checked="checked" <?php endif; ?>>
                      <?php echo e(__('Straight Women')); ?></label>
                    </li>
                    <li>
                      <label for="research6"><input id="research6" type="checkbox" name="research[]" value="Women Bi" <?php if(old('research')!='' && in_array("Women Bi", old('research'))): ?> checked="checked" <?php endif; ?>>
                      <?php echo e(__('Women Bi')); ?></label>
                    </li>
                    <li>
                      <label for="research7"><input id="research7" type="checkbox" name="research[]" value="Lesbians" <?php if(old('research')!='' && in_array("Lesbians", old('research'))): ?> checked="checked" <?php endif; ?>>
                      <?php echo e(__('Lesbians')); ?></label>
                    </li>
                    <li>
                      <label for="research8"><input id="research8" type="checkbox" name="research[]" value="Straight Hammers" <?php if(old('research')!='' && in_array("Straight Hammers", old('research'))): ?> checked="checked" <?php endif; ?>>
                      <?php echo e(__('Straight Hammers')); ?></label>
                    </li>
                    <li>
                      <label for="research9"><input id="research9" type="checkbox" name="research[]" value="Mrs. Hammes" <?php if(old('research')!='' && in_array("Mrs. Hammes", old('research'))): ?> checked="checked" <?php endif; ?>>
                      <?php echo e(__('Mrs. Hammes')); ?></label>
                    </li>
                    <li>
                      <label for="research10"><input id="research10" type="checkbox" name="research[]" value="Gays" <?php if(old('research')!='' && in_array("Gays", old('research'))): ?> checked="checked" <?php endif; ?>>
                      <?php echo e(__('Gays')); ?></label>
                    </li>
                    <li>
                      <label for="research11"><input id="research11" type="checkbox" name="research[]" value="Transvestites" <?php if(old('research')!='' && in_array("Transvestites", old('research'))): ?> checked="checked" <?php endif; ?>>
                      <?php echo e(__('Transvestites')); ?></label>
                    </li>
                    <li>
                      <label for="research12"><input id="research12" type="checkbox" name="research[]" value="Transgender" <?php if(old('research')!='' && in_array("Transgender", old('research'))): ?> checked="checked" <?php endif; ?>>
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
                      <label for="type_of_meeting1"><input id="type_of_meeting1" type="checkbox" name="type_of_meeting[]" value="Trio" <?php if(old('type_of_meeting')!='' && in_array("Trio", old('type_of_meeting'))): ?> checked="checked" <?php endif; ?>>
                      <?php echo e(__('Trio')); ?></label>
                    </li>
                    <li>
                      <label for="type_of_meeting2"><input id="type_of_meeting2" type="checkbox" name="type_of_meeting[]" value="Melanist" <?php if(old('type_of_meeting')!='' && in_array("Melanist", old('type_of_meeting'))): ?> checked="checked" <?php endif; ?>>
                      <?php echo e(__('Melanist')); ?></label>
                    </li>
                    <li>
                      <label for="type_of_meeting3"><input id="type_of_meeting3" type="checkbox" name="type_of_meeting[]" value="Swinger" <?php if(old('type_of_meeting')!='' && in_array("Swinger", old('type_of_meeting'))): ?> checked="checked" <?php endif; ?>>
                      <?php echo e(__('Swinger')); ?></label>
                    </li>
                    <li>
                      <label for="type_of_meeting4"><input id="type_of_meeting4" type="checkbox" name="type_of_meeting[]" value="Gang-Bang" <?php if(old('type_of_meeting')!='' && in_array("Gang-Bang", old('type_of_meeting'))): ?> checked="checked" <?php endif; ?>>
                      <?php echo e(__('Gang-Bang')); ?></label>
                    </li>
                    <li>
                      <label for="type_of_meeting5"><input id="type_of_meeting5" type="checkbox" name="type_of_meeting[]" value="Plurality" <?php if(old('type_of_meeting')!='' && in_array("Plurality", old('type_of_meeting'))): ?> checked="checked" <?php endif; ?>>
                      <?php echo e(__('Plurality')); ?></label>
                    </li>
                    <li>
                      <label for="type_of_meeting6"><input id="type_of_meeting6" type="checkbox" name="type_of_meeting[]" value="Multicouple" <?php if(old('type_of_meeting')!='' && in_array("Multicouple", old('type_of_meeting'))): ?> checked="checked" <?php endif; ?>>
                      <?php echo e(__('Multicouple')); ?></label>
                    </li>
                    <li>
                      <label for="type_of_meeting7"><input id="type_of_meeting7" type="checkbox" name="type_of_meeting[]" value="Exhibition" <?php if(old('type_of_meeting')!='' && in_array("Exhibition", old('type_of_meeting'))): ?> checked="checked" <?php endif; ?>>
                      <?php echo e(__('Exhibition')); ?></label>
                    </li>
                    <li>
                      <label for="type_of_meeting8"><input id="type_of_meeting8" type="checkbox" name="type_of_meeting[]" value="BDSM" <?php if(old('type_of_meeting')!='' && in_array("BDSM", old('type_of_meeting'))): ?> checked="checked" <?php endif; ?>>
                      <?php echo e(__('BDSM')); ?></label>
                    </li>
                    <li>
                      <label for="type_of_meeting9"><input id="type_of_meeting9" type="checkbox" name="type_of_meeting[]" value="2+2" <?php if(old('type_of_meeting')!='' && in_array("2+2", old('type_of_meeting'))): ?> checked="checked" <?php endif; ?>>
                      <?php echo e(__('2+2')); ?></label>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="coment mt-3 p-0">
              <div class="row">
                <div class="col-lg-2 col-md-2 col-5 pl-0">
                  <div class="boxw bg-standard-violet text-center rounded-left text-white px-3 py-3">
                    <p class="pt-2"><?php echo e(__('First Meeting:')); ?></p>
                  </div>
                </div>
                <div class="col-lg-10 col-md-10 col-7">
                  <ul class="conpa py-3 like">
                    <li>
                      <label for="first_meeting1"><input id="first_meeting1" type="checkbox" name="first_meeting[]" value="Club" <?php if(old('first_meeting')!='' && in_array("Club", old('first_meeting'))): ?> checked="checked" <?php endif; ?>>
                      <?php echo e(__('Club')); ?></label>
                    </li>
                    <li>
                      <label for="first_meeting2"><input id="first_meeting2" type="checkbox" name="first_meeting[]" value="Private Evenings" <?php if(old('first_meeting')!='' && in_array("Private Evenings", old('first_meeting'))): ?> checked="checked" <?php endif; ?>>
                      <?php echo e(__('Private Evenings')); ?></label>
                    </li>
                    <li>
                      <label for="first_meeting3"><input id="first_meeting3" type="checkbox" name="first_meeting[]" value="I Receive" <?php if(old('first_meeting')!='' && in_array("I Receive", old('first_meeting'))): ?> checked="checked" <?php endif; ?>>
                      <?php echo e(__('I Receive')); ?></label>
                    </li>
                    <li>
                      <label for="first_meeting4"><input id="first_meeting4" type="checkbox" name="first_meeting[]" value="Move Me" <?php if(old('first_meeting')!='' && in_array("Move Me", old('first_meeting'))): ?> checked="checked" <?php endif; ?>>
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
                      <label for="vibe1"><input id="vibe1" type="checkbox" name="vibe[]" value="Erotic" <?php if(old('vibe')!='' && in_array("Erotic", old('vibe'))): ?> checked="checked" <?php endif; ?>>
                      <?php echo e(__('Erotic')); ?></label>
                    </li>
                    <li>
                      <label for="vibe2"><input id="vibe2" type="checkbox" name="vibe[]" value="Naughty" <?php if(old('vibe')!='' && in_array("Naughty", old('vibe'))): ?> checked="checked" <?php endif; ?>>
                      <?php echo e(__('Naughty')); ?></label>
                    </li>
                    <li>
                      <label for="vibe3"><input id="vibe3" type="checkbox" name="vibe[]" value="Sex" <?php if(old('vibe')!='' && in_array("Sex", old('vibe'))): ?> checked="checked" <?php endif; ?>>
                      <?php echo e(__('Sex')); ?></label>
                    </li>
                    <li>
                      <label for="vibe4"><input id="vibe4" type="checkbox" name="vibe[]" value="According To Mood" <?php if(old('vibe')!='' && in_array("According To Mood", old('vibe'))): ?> checked="checked" <?php endif; ?>>
                      <?php echo e(__('According To Mood')); ?></label>
                    </li>
                    <li>
                      <label for="vibe5"><input id="vibe5" type="checkbox" name="vibe[]" value="Hard" <?php if(old('vibe')!='' && in_array("Hard", old('vibe'))): ?> checked="checked" <?php endif; ?>>
                      <?php echo e(__('Hard')); ?></label>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <hr class="my-3">
            <label class="white "><?php echo e(__('About You:')); ?></label>
            <textarea class="form-control mb-3 " rows="6" type="text" name="about"><?php echo e(old('about')); ?></textarea>
            <input type="submit" value="<?php echo e(__('Register')); ?>" class="mt-3 rounded w-100 text-center bg-standard-violet text-white px-2 py-2 mt-2 mb-2">
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
</body>
</html>
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
                // alert(JSON.stringify(data));
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
</script><?php /**PATH /home/demogswebtech/public_html/freely/resources/views/auth/member-register.blade.php ENDPATH**/ ?>