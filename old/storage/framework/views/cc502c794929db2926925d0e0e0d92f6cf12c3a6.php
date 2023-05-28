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
</head>
<body>
<div class="bg-_images bg_uy h-100" >
  <header class="vire">
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
                <li><a class="bg-standard-violet rounded-left text-white px-2 py-2 active" href="<?php echo e(route('login')); ?>"><?php echo app('translator')->get('public.member'); ?></a></li>
                <li><a class="bg-standard-violet rounded-right  text-white px-2 py-2" href="<?php echo e(route('registerType')); ?>"><?php echo e(__('Register')); ?></a></li>
                <li>
                  
                <a class="bg-standard-violet" href="locale/fr"> franch </a> </li>
                </li>
              </ul>
            </div>
          </nav>
        </div>
        <div class="row">
            <div class="col-md-2 col-md-offset-6 text-right">
                <strong>Select Language: </strong>
            </div>
            <div class="col-md-4">
                <select class="form-control changeLang">
                    <option value="en" <?php echo e(session()->get('locale') == 'en' ? 'selected' : ''); ?>>English</option>
                    <option value="fr" <?php echo e(session()->get('locale') == 'fr' ? 'selected' : ''); ?>>France</option>
                </select>
            </div>
        </div>
      </div>
    </div>
  </header>
  <div class="container " >
    <div class="row h-100 justify-content-center">
      <div class="col-xl-5 col-lg-5 col-md-12 col-sm-12 login-area pt-5 pb-3">
        <div class="login-form false">
          <div class="user-credentials ">
              
            <div class="imgs"> <img src="<?php echo e(URL::to('/')); ?>/public/frontend/imgs/freely-scaled-1-1.jpg"> </div>

            <form action="<?php echo e(route('login')); ?>" method="post" class="louy login-form ">
              <?php echo csrf_field(); ?>
              <div class="form-group form-label-group ">
                  			
                <?php if($error=Session::get('error')): ?>
                <div class="alert bg-danger alert-dismissible" role="alert" id="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <?php echo e($error); ?>

                </div>
    
                <?php endif; ?>
                <label class="white">Email</label>
                <input class="form-control " type="email" name="email"  value="<?php echo e(old('email')); ?>" required autofocus>
				<?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span style="color:red;"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
              </div>
              <div class="form-group form-label-group">
                <label class="white">Password</label>
                <input class="form-control " type="password" name="password" required autocomplete="current-password">
				<?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span style="color:red;"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
              </div>
              <div class="row">
                <div class="col-8">
                  <p class="white" ><?php echo e(__('I am a professional')); ?></p>
                </div>
                <div class="col-4">
                  <label class="switch float-right">
                  <input type="checkbox" name="front_user_type" value="member">
                  <span class="slider round"></span> </label>
                </div>
              </div>
              <div class="form-group text-center mt-3">
                <input type="submit" value="<?php echo e(__('Login')); ?>" class="button mb-3 loci button d-block pt-1 pb-1 w-100 h-auto bg-standard-violet base-radius text-white text-uppercase font-weight-normal mx-auto">
              </div>
            </form>
          </div>
          <div class="row">
            <div class="col-6 mt-3"> <?php if(Route::has('password.request')): ?> <a href="<?php echo e(route('password.request')); ?>" class="text-muted"><?php echo e(__('Forgot Password')); ?></a> <?php endif; ?> </div>
            <div class="col-6 mt-3"> <a href="<?php echo e(route('registerType')); ?>" class="text-muted"><?php echo e(__('Create a new account')); ?></a> </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  
    var url = "<?php echo e(route('changeLang')); ?>";
  
    $(".changeLang").change(function(){
        window.location.href = url + "?lang="+ $(this).val();
    });
  
</script>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\freely\resources\views/auth/login.blade.php ENDPATH**/ ?>