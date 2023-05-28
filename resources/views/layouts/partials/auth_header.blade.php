<!DOCTYPE html>
<html lang="fr">
<head>
<title>Freely</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
<link rel="stylesheet" href="{{URL::to('/')}}/public/frontend/style.css">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet">
<link href="{{URL::to('/')}}/public/frontend/emoji/css/emoji.css" rel="stylesheet">
<!--<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js'></script>-->
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>
<div class="bg-_images h-100" id="myChatStatus">
<header>
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
              <li class="first_menu_top"> <a class="bg-standard-violet rounded-left text-white px-2 py-2 {{ (request()->segment(1) == '') ? 'active' : '' }}" href="{{route('index')}}"> {{__('public.News')}} </a> </li>
              <li class="menu2_top"> <a href="{{route('members')}}" class="bg-standard-violet text-white px-2 py-2 {{ (request()->segment(1) == 'members') || (request()->segment(1) == 'member-details') ? 'active' : '' }}"> {{__('public.Members')}} </a> </li>
              <li class="menu3_top"> <a class="bg-standard-violet text-white px-2 py-2 {{ (request()->segment(1) == 'events') || (request()->segment(1) == 'event-details') ? 'active' : '' }}" href="{{ url('events') }}"> {{__('public.Events')}} </a> </li>
              <li class="menu4_top"> <a class="bg-standard-violet rounded-right text-white px-2 py-2 {{ (request()->segment(1) == 'professionals') || (request()->segment(1) == 'professional-details') ? 'active' : '' }}" href="{{ route('professionals') }}"> {{__('public.Professionals')}} </a> </li>
            </ul>
          </div>
        </nav>
      </div>
    </div>
  </div>
</header>
