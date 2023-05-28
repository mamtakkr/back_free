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
    <div class="bg-_images bg_uy h-100 new_2_btn">
        <header>
            <video autoplay muted loop id="myVideo" style="height: 112px; width: 100%;object-fit: cover;object-position: center center;opacity: 1;">
                <source src="https://video.wixstatic.com/video/eab394_e27438dbd7b64a9282dc088e3998336f/720p/mp4/file.mp4" type="video/mp4">
            </video>
            <div class="gtew">
                <div class="container">
                    <div class="row">
                        <nav>
                            <div class="menu-icon">
                                <i class="fa fa-bars fa-2x"></i>
                            </div>
                            <div class="logo">
                                <a href="{{route('index')}}"><img src="{{URL::to('/')}}/public/frontend/imgs/logo-officiel-nouveau.png"></a>
                            </div>
                            <div class="menu">
                                <ul>
                                    <li><a class="bg-standard-violet rounded-left text-white px-2 py-2 " href="{{route('login')}}">{{__('public.Login')}}</a></li>
                                    <li>
                                        <a data-toggle="modal" data-target="#youModal" class="bg-standard-violet rounded-right  text-white px-2 py-2 active" href="{{route('registerType')}}">{{__('public.Register')}}</a>
                                    </li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </header>
        <div class="container " >
			<div class="row h-100 justify-content-center">
    			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 login-area pt-5 pb-3">
    				<div class="dsew border text-center border-light p-5 rounded">
    				    <div class="row">
    						<div class="col-md-6">	
    						<a href="{{route('member-register')}}" type="button" class=" mt-3 rounded bg-standard-violet text-white  px-2 py-2">{{__('public.iam_individual')}}</a>
    						</div>
    						<div class="col-md-6">
    						<a href="{{route('professional-register')}}" type="button" class=" mt-3 rounded bg-standard-violet text-white  px-2 py-2">{{__('public.iam_professional')}}</a>
    						</div>
    					</div>	
    				</div>
    	        </div>
		    </div>
	    </div>
    </div>
</body>


</html>