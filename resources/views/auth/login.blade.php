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
<script src="{{URL::to('/')}}/public/frontend/costum.js"></script>
<link rel="stylesheet" href="{{URL::to('/')}}/public/frontend/style.css">
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
            <div class="logo"> <a href="{{route('index')}}"><img src="{{URL::to('/')}}/public/frontend/imgs/logo-officiel-nouveau.png"></a> </div>
            <div class="menu">
              <ul>
                <li><a class="bg-standard-violet rounded-left text-white px-2 py-2 active" href="{{route('login')}}">{{__('public.Login')}}</a></li>
                <li><a class="bg-standard-violet rounded-right  text-white px-2 py-2" href="{{route('registerType')}}">{{__('public.Register')}}</a></li>
                <!--{{--<li>-->
                <!--    <select class="form-control changeLang">-->
                <!--      <option value="">{{__('Select Language')}}</option>-->
                <!--        <option value="en" {{ session()->get('locale') == 'en' ? 'selected' : '' }}>English</option>-->
                <!--        <option value="fr" {{ session()->get('locale') == 'fr' ? 'selected' : '' }}>France</option>-->
                <!--    </select>-->
                <!--</li>--}}-->
              </ul>
            </div>
          </nav>
        </div>
      </div>
    </div>
  </header>
  <div class="container " >
    <div class="row h-100 justify-content-center">
      <div class="col-xl-5 col-lg-5 col-md-12 col-sm-12 login-area pt-5 pb-3">
        <div class="login-form false">
          <div class="user-credentials ">
              
            <div class="imgs"> <img src="{{URL::to('/')}}/public/frontend/imgs/freely-scaled-1-1.jpg"> </div>

            <form action="{{ route('login') }}" method="post" class="louy login-form ">
              @csrf
              <div class="form-group form-label-group ">
                  			
                @if($error=Session::get('error'))
                <div class="alert bg-danger alert-dismissible" role="alert" id="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    {{ $error }}
                </div>
    
                @endif
                <label class="white">{{__('public.Email')}}</label>
                <input class="form-control " type="email" name="email"  value="{{old('email')}}" required autofocus>
				@error('email') <span style="color:red;">{{ $message }}</span> @enderror
              </div>
              <div class="form-group form-label-group">
                <label class="white">{{__('public.Password')}}</label>
                <input class="form-control " type="password" name="password" required autocomplete="current-password">
				@error('password') <span style="color:red;">{{ $message }}</span> @enderror
              </div>
              <div class="row">
                <div class="col-8">
                  <p class="white" >{{__('public.iam_professional')}}</p>
                </div>
                <div class="col-4">
                  <label class="switch float-right">
                  <input type="checkbox" name="front_user_type" value="member">
                  <span class="slider round"></span> </label>
                </div>
              </div>
              <div class="form-group text-center mt-3">
                <input type="submit" value="{{__('public.Login')}}" class="button mb-3 loci button d-block pt-1 pb-1 w-100 h-auto bg-standard-violet base-radius text-white text-uppercase font-weight-normal mx-auto">
              </div>
            </form>
          </div>
          <div class="row">
            <div class="col-6 mt-3"> @if (Route::has('password.request')) <a href="{{ route('password.request') }}" class="text-muted">{{__('public.Forgot_Password')}}</a> @endif </div>
            <div class="col-6 mt-3"> <a href="{{route('registerType')}}" class="text-muted">{{__('public.Signup')}}</a> </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<script type="text/javascript">
  
    var url = "{{ route('changeLang') }}";
  
    $(".changeLang").change(function(){
        window.location.href = url + "?lang="+ $(this).val();
    });
  
</script>
</body>
</html>
