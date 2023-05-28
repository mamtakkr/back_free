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
      <form method="POST" action="<?php echo e(route('professional-register')); ?>" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 login-area pt-5 pb-3">
          <div class="dsew profesonl border border-light p-5 rounded">
            <div class="col-lg-2 col-md-2 col-5 fsde py-4 text-center m-auto">
              <div class="round_2 text-center round_img"> 
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
                        <label class="white py-2 mb-2"><?php echo e(__('Confirm Password:')); ?></label>
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
                        <label class="white py-2 mb-2"><?php echo e(__('Club Name:')); ?></label>
                      </div>
                      <div class="col-6">
                        <input class="form-control mb-2" type="text" name="club_name" value="<?php echo e(old('club_name')); ?>" placeholder="<?php echo e(__('Club Name')); ?>">
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
                  

                 
                  </div>
                </div>
              <!--</div>-->
              <div class="col-lg-2 line_boder"> <img src=""> </div>
              <div class="col-lg-5">
                <div class="row">
                  <div class="col-6">
                    <label class="white py-2 mb-2"><?php echo e(__('Website Url:')); ?></label>
                    <br>
                    <label class="white py-2 mb-2"><?php echo e(__('Contact Number:')); ?></label>
                    <br>
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
                    <input class="form-control mb-2" type="text" name="website_url" value="<?php echo e(old('website_url')); ?>" placeholder="<?php echo e(__('Website Url')); ?>">
                    <?php $__errorArgs = ['website_url'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span style="color:red;"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    <input class="form-control mb-2" type="text" name="contact" value="<?php echo e(old('contact')); ?>" placeholder="<?php echo e(__('Contact Number')); ?>">
                    <?php $__errorArgs = ['contact'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span style="color:red;"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    <select name="status" class="form-control mb-2" id="status">
                      <option value=""><?php echo e(__('Select Status')); ?></option>
                      <option value="libertine discotheque club" <?php if(old('status')=="libertine discotheque club" ): ?> <?php echo e('selected'); ?> <?php endif; ?>><?php echo e(__('Libertine discotheque club')); ?></option>
                      <option value="sauna club" <?php if(old('status')=="sauna club" ): ?> <?php echo e('selected'); ?> <?php endif; ?>><?php echo e(__('Sauna club')); ?></option>
                      <option value="organizer" <?php if(old('status')=="organizer" ): ?> <?php echo e('selected'); ?> <?php endif; ?>><?php echo e(__('Organizer')); ?></option>
                      <option value="libertine camping" <?php if(old('status')=="libertine camping" ): ?> <?php echo e('selected'); ?> <?php endif; ?>><?php echo e(__('Libertine camping')); ?></option>
                      <option value="erotic writer" <?php if(old('status')=="erotic writer" ): ?> <?php echo e('selected'); ?> <?php endif; ?>><?php echo e(__('Erotic writer')); ?></option>
                      <option value="photographer" <?php if(old('status')=="photographer" ): ?> <?php echo e('selected'); ?> <?php endif; ?>><?php echo e(__('Photographer')); ?></option>
                      <option value="tattoo artist" <?php if(old('status')=="tattoo artist" ): ?> <?php echo e('selected'); ?> <?php endif; ?>><?php echo e(__('Tattoo artist')); ?></option>
                      <option value="erotic photographer" <?php if(old('status')=="erotic photographer" ): ?> <?php echo e('selected'); ?> <?php endif; ?>><?php echo e(__('Erotic photographer')); ?></option>
                      <option value="sex shop" <?php if(old('status')=="sex shop" ): ?> <?php echo e('selected'); ?> <?php endif; ?>><?php echo e(__('Sex shop')); ?></option>
                      <option value="online sex shop" <?php if(old('status')=="online sex shop" ): ?> <?php echo e('selected'); ?> <?php endif; ?>><?php echo e(__('Online sex shop')); ?></option>
                    </select>
                    <?php $__errorArgs = ['status'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span style="color:red;"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    <input class="form-control mb-2" type="text" name="address" value="<?php echo e(old('address')); ?>" placeholder="<?php echo e(__('Address')); ?>">
                    <?php $__errorArgs = ['address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span style="color:red;"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    <input class="form-control mb-2" type="text" name="zipcode" value="<?php echo e(old('zipcode')); ?>" placeholder="<?php echo e(__('Zipcode')); ?>">
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
					  <option value="<?php echo e($country->id); ?>" <?php if(old('country')==$country->id): ?> <?php echo e('selected'); ?> <?php endif; ?>><?php echo e($country->name); ?></option>
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
					  <option value="<?php echo e($city->name); ?>" <?php if(old('city')==$city->name): ?> <?php echo e('selected'); ?> <?php endif; ?>><?php echo e($city->name); ?></option>
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
                            <input type="checkbox" name="club_day[]" class="text-while" value="monday" <?php if(old('club_day')!='' && in_array("monday", old('club_day'))): ?> checked="checked" <?php endif; ?>> Monday </label>
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
                                <input class="form-control mb-2" type="time" name="club_start_time[]" value="">
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
                            <input type="checkbox" name="club_day[]" class="text-while" value="tuesday" <?php if(old('club_day')!='' && in_array("tuesday", old('club_day'))): ?> checked="checked" <?php endif; ?>> Tuesday </label>
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
                            <input type="checkbox" name="club_day[]" class="text-while" value="wednesday" <?php if(old('club_day')!='' && in_array("wednesday", old('club_day'))): ?> checked="checked" <?php endif; ?>> Wednesday </label>
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
                            <input type="checkbox" name="club_day[]" class="text-while" value="thursday" <?php if(old('club_day')!='' && in_array("thursday", old('club_day'))): ?> checked="checked" <?php endif; ?>> Thursday </label>
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
                            <input type="checkbox" name="club_day[]" class="text-while" value="friday" <?php if(old('club_day')!='' && in_array("friday", old('club_day'))): ?> checked="checked" <?php endif; ?>> Friday </label>
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
                            <input type="checkbox" name="club_day[]" class="text-while" value="saturday" <?php if(old('club_day')!='' && in_array("saturday", old('club_day'))): ?> checked="checked" <?php endif; ?>> Saturday </label>
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
                            <input type="checkbox" name="club_day[]" class="text-while" value="sunday" <?php if(old('club_day')!='' && in_array("sunday", old('club_day'))): ?> checked="checked" <?php endif; ?>> Sunday </label>
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
                </div>
             </div> 
            <!--</div>-->
            <hr class="my-3">
            <label class="white "><?php echo e(__('About You:')); ?></label>
            <textarea class="form-control mb-3" rows="6" type="text" name="about"><?php echo e(old('about')); ?></textarea>
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

</script><?php /**PATH /home/demogswebtech/public_html/freely/resources/views/auth/professional-register.blade.php ENDPATH**/ ?>