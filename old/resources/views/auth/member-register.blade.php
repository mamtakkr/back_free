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
<meta name="csrf-token" content="{{ csrf_token() }}">
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
            <div class="logo"> <a href="{{route('index')}}"><img src="{{URL::to('/')}}/public/frontend/imgs/logo-officiel-nouveau.png"></a> </div>
            <div class="menu">
              <ul>
                <li><a class="bg-standard-violet rounded-left text-white px-2 py-2 " href="{{route('login')}}">{{__('Login')}}</a></li>
                <li> <a class="bg-standard-violet rounded-right  text-white px-2 py-2 active" href="{{route('registerType')}}">{{__('Register')}}</a> </li>
              </ul>
            </div>
          </nav>
        </div>
      </div>
    </div>
  </header>
  <div class="container ">
    <div class="row h-100 justify-content-center"> @if($error=Session::get('error'))
      <div class="alert alert-danger">
        <p>{{ $error }}</p>
      </div>
      @endif<br>
      <form method="POST" action="{{ route('member-register') }}" enctype="multipart/form-data">
        @csrf
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 login-area pt-5 pb-3">
          <div class="dsew border border-light p-5 rounded">
            <div class="col-lg-2 col-md-2 col-5 fsde py-4 text-center m-auto">
			
              <div class="round_2 text-center"> 
			  <img src="{{URL::to('/')}}/public/images/no-user.png" id="output" onClick="$('#image').trigger('click');">
			  
                <input type="file" name="image_url" id="image" accept="image/*" style="display:none;">
                
                @error('image_url') <span style="color:red;">{{ $message }}</span> @enderror </div>
            </div>
            <div class="row">
              <div class="col-lg-5">
                <div class="row">
                  <div class="col-12">
                    <div class="row">
                      <div class="col-6">
                        <label class="white py-2 mb-2">{{__('Email:')}}</label>
                      </div>
                      <div class="col-6">
                        <input class="form-control mb-2" type="email" name="email" value="{{old('email')}}" placeholder="{{__('Email')}}">
                        @error('email') <span style="color:red;">{{ $message }}</span> @enderror </div>
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="row">
                      <div class="col-6">
                        <label class="white py-2 mb-2">{{__('Password:')}}</label>
                      </div>
                      <div class="col-6">
                        <input class="form-control mb-2" type="password" name="password" autocomplete="new-password" placeholder="{{__('Password')}}">
                        @error('password') <span style="color:red;">{{ $message }}</span> @enderror </div>
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="row">
                      <div class="col-6">
                        <label class="white  py-2 mb-2">{{__('Confirm Password:')}}</label>
                      </div>
                      <div class="col-6">
                        <input class="form-control mb-2" type="password" name="password_confirmation" placeholder="{{__('Confirm Password')}}">
                        @error('password_confirmation') <span style="color:red;">{{ $message }}</span> @enderror </div>
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
                        <label class="white py-2 mb-2">{{__('Nickname:')}}</label>
                      </div>
                      <div class="col-6">
                        <input class="form-control mb-2" type="text" name="username" value="{{old('username')}}" placeholder="{{__('Nickname')}}">
                        @error('username') <span style="color:red;">{{ $message }}</span> @enderror </div>
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="row">
                      <div class="col-6">
                        <label class="white py-2 mb-2">{{__('You Are:')}} </label>
                      </div>
                      <div class="col-6">
					  
                        <select name="you_are" class="form-control mb-2" id="you_are">
                          <option value="">{{__('You Are')}}</option>
                          <option member-count="2" value="Straight Couples" @if(old('you_are')=="Straight Couples" ) {{ 'selected' }} @endif>{{__('Straight Couples')}}</option>
                          <option member-count="2" value="Couples F Bi" @if(old('you_are')=="Couples F Bi" ) {{ 'selected' }} @endif>{{__('Couples F Bi')}}</option>
                          <option member-count="2" value="Couples H Bi" @if(old('you_are')=="Couples H Bi" ) {{ 'selected' }} @endif>{{__('Couples H Bi')}}</option>
						  <option member-count="2" value="Couples Bi" @if(old('you_are')=="Couples Bi" ) {{ 'selected' }} @endif>{{__('Couples Bi')}}</option>
						  <option member-count="1" value="Straight Women" @if(old('you_are')=="Straight Women" ) {{ 'selected' }} @endif>{{__('Straight Women')}}</option>
						  <option member-count="1" value="Women Bi" @if(old('you_are')=="Women Bi" ) {{ 'selected' }} @endif>{{__('Women Bi')}}</option>
						  <option member-count="1" value="Lesbians" @if(old('you_are')=="Lesbians" ) {{ 'selected' }} @endif>{{__('Lesbians')}}</option>
						  <option member-count="1" value="Straight Hammers" @if(old('you_are')=="Straight Hammers" ) {{ 'selected' }} @endif>{{__('Straight Hammers')}}</option>
						  <option member-count="1" value="Mrs. Hammes" @if(old('you_are')=="Mrs. Hammes" ) {{ 'selected' }} @endif>{{__('Mrs. Hammes')}}</option>
						  <option member-count="1" value="Gays" @if(old('you_are')=="Gays" ) {{ 'selected' }} @endif>{{__('Gays')}}</option>
						  <option member-count="1" value="Transvestites" @if(old('you_are')=="Transvestites" ) {{ 'selected' }} @endif>{{__('Transvestites')}}</option>
						  <option member-count="1" value="Transgender" @if(old('you_are')=="Transgender" ) {{ 'selected' }} @endif>{{__('Transgender')}}</option>
                        </select>
						
                        @error('you_are') <span style="color:red;">{{ $message }}</span> @enderror </div>
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="row">
                      <div class="col-6">
                        <label class="white py-2 mb-2">{{__('Experience:')}}</label>
                      </div>
                      <div class="col-6">
                        <select name="experience" class="form-control mb-2" id="experience">
                          <option value="">{{__('Experience')}}</option>
                          <option member-count="2" value="To Discover" @if(old('experience')=="To Discover" ) {{ 'selected' }} @endif>{{__('To Discover')}}</option>
                          <option member-count="2" value="Beginner" @if(old('experience')=="Beginner" ) {{ 'selected' }} @endif>{{__('Beginner')}}</option>
                          <option member-count="2" value="Experienced" @if(old('experience')=="Experienced" ) {{ 'selected' }} @endif>{{__('Experienced')}}</option>
                          <option member-count="2" value="Occasional" @if(old('experience')=="Occasional" ) {{ 'selected' }} @endif>{{__('Occasional')}}</option>
                          <option member-count="2" value="I Keep To Myself" @if(old('experience')=="I Keep To Myself" ) {{ 'selected' }} @endif>{{__('I Keep To Myself')}}</option>
						  
                        </select>
                        @error('experience') <span style="color:red;">{{ $message }}</span> @enderror </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-12">
                <h4 class="white">{{__('Profile Information')}}</h4>
              </div>
              <div class="col-lg-5">
                <div class="row">
                  <div class="col-12">
                    <div class="row">
                      <div class="col-6">
                        <label class="white py-2 mb-2">{{__('I Am:')}}</label>
                      </div>
                      <div class="col-6">
                        <select class="form-control mb-2" id="who_i" name="who_i">
                          <option>{{__('Select Type')}}</option>
                          <option value="Man" @if(old('who_i')=="Man" ) {{ 'selected' }} @endif>Man</option>
                          <option value="Woman" @if(old('who_i')=="Woman" ) {{ 'selected' }} @endif>Woman</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="row">
                      <div class="col-6">
                        <label class="white py-2 mb-2">{{__('Date Of Birth:')}}</label>
                      </div>
                      <div class="col-6">
                        <input class="form-control mb-2" type="date" id="dob" name="dob" value="{{old('dob')}}">
                        @error('dob') <span style="color:red;">{{ $message }}</span> @enderror </div>
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="row">
                      <div class="col-6">
                        <label class="white py-2 mb-2">{{__('Size In CM:')}}</label>
                      </div>
                      <div class="col-6">
                        <input class="form-control mb-2" type="text" name="size" value="{{old('size')}}" placeholder="{{__('Size')}}">
                      </div>
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="row">
                      <div class="col-6">
                        <label class="white py-2 mb-2">{{__('Weight In KG:')}}</label>
                      </div>
                      <div class="col-6">
                        <input class="form-control mb-2" type="text" name="weight" value="{{old('weight')}}" placeholder="{{__('Weight')}}">
                      </div>
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="row">
                      <div class="col-6">
                        <label class="white py-2 mb-2">{{__('Origin:')}}</label>
                        <br>
                      </div>
                      <div class="col-6">
                        <select name="origin" class="form-control mb-2" id="origin">
                          <option value="">{{__('Select Origin')}}</option>
                          @if(!empty($origins))
						  @foreach($origins as $origin)
						  <option value="{{ $origin->name }}" @if(old('origin')==$origin->name) {{ 'selected' }} @endif>{{ $origin->name }}</option>
						  @endforeach
						  @endif
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
                    <label class="white py-2 mb-2">{{__('Sillhouette:')}}</label>
                    <br>
                    <label class="white py-2 mb-2">{{__('Hair Size:')}}</label>
                    <br>
                    <label class="white py-2 mb-2">{{__('Hair Color:')}}</label>
                    <br>
                    <label class="white py-2 mb-2">{{__('Eye Colour:')}}</label>
                    <br>
                    <label class="white py-2 mb-2">{{__('Country:')}}</label>
                    <br>
                    <label class="white py-2 mb-2">{{__('City:')}}</label>
                    <br>
                  </div>
                  <div class="col-6">
                    <select name="sillhouette" class="form-control mb-2" id="sillhouette">
                      <option value="">{{__('Select Sillhouette')}}</option>
                      <option value="Thin" @if(old('sillhouette')=="Thin" ) {{ 'selected' }} @endif>{{__('Thin')}}</option>
                      <option value="Athletic" @if(old('sillhouette')=="Athletic" ) {{ 'selected' }} @endif>{{__('Athletic')}}</option>
                      <option value="Normal" @if(old('sillhouette')=="Normal" ) {{ 'selected' }} @endif>{{__('Normal')}}</option>
                      <option value="Some roundness" @if(old('sillhouette')=="Some roundness" ) {{ 'selected' }} @endif>{{__('Some roundness')}}</option>
                      <option value="Round" @if(old('sillhouette')=="Round" ) {{ 'selected' }} @endif>{{__('Round')}}</option>
                      <option value="I keep it for myself" @if(old('sillhouette')=="I keep it for myself" ) {{ 'selected' }} @endif>{{__('I keep it for myself')}}</option>
                    </select>
                    <select name="hair_size" class="form-control mb-2" id="hair_size">
                      <option value="">{{__('Select Hair Size')}}</option>
                      <option value="long" @if(old('hair_size')=="long" ) {{ 'selected' }} @endif>{{__('Long')}}</option>
                      <option value="short" @if(old('hair_size')=="short" ) {{ 'selected' }} @endif>{{__('Short')}}</option>
                      <option value="bob" @if(old('hair_size')=="bob" ) {{ 'selected' }} @endif>{{__('Bob')}}</option>
                      <option value="shoulder length" @if(old('hair_size')=="shoulder length" ) {{ 'selected' }} @endif>{{__('Shoulder Length')}}</option>
                    </select>
                    <select name="hair_color" class="form-control mb-2" id="hair_color">
                      <option value="">{{__('Select Hair Color')}}</option>
                      <option value="black" @if(old('hair_color')=="black" ) {{ 'selected' }} @endif>{{__('Black')}}</option>
                      <option value="grey" @if(old('hair_color')=="grey" ) {{ 'selected' }} @endif>{{__('Grey')}}</option>
                      <option value="burgandy" @if(old('hair_color')=="burgandy" ) {{ 'selected' }} @endif>{{__('Burgandy')}}</option>
                      <option value="blonde" @if(old('hair_color')=="blonde" ) {{ 'selected' }} @endif>{{__('Blonde')}}</option>
                      <option value="dark brown" @if(old('hair_color')=="dark brown" ) {{ 'selected' }} @endif>{{__('Dark Brown')}}</option>
                      <option value="light brown" @if(old('hair_color')=="light brown" ) {{ 'selected' }} @endif>{{__('Light Brown')}}</option>
                    </select>
                    <select name="eye_colour" class="form-control mb-2" id="eye_colour">
                      <option value="">{{__('Select Eye Color')}}</option>
                      <option value="black" @if(old('eye_colour')=="black" ) {{ 'selected' }} @endif>{{__('Black')}}</option>
                      <option value="light brown" @if(old('eye_colour')=="light brown" ) {{ 'selected' }} @endif>{{__('Light Brown')}}</option>
                      <option value="dark brown" @if(old('eye_colour')=="dark brown" ) {{ 'selected' }} @endif>{{__('Dark Brown')}}</option>
                      <option value="green" @if(old('eye_colour')=="green" ) {{ 'selected' }} @endif>{{__('Green')}}</option>
                      <option value="grey" @if(old('eye_colour')=="grey" ) {{ 'selected' }} @endif>{{__('Grey')}}</option>
                      <option value="blue" @if(old('eye_colour')=="blue" ) {{ 'selected' }} @endif>{{__('Blue')}}</option>
                    </select>
                    <select name="country" class="form-control mb-2" id="country" onChange="getCity(this.selectedIndex)">
                      <option value="">{{__('Select Country')}}</option>
                      @if(!empty($countries))
					  @foreach($countries as $country)
					  <option value="{{ $country->id }}" @if(old('country')==$country->id) {{ 'selected' }} @endif>{{ $country->name }}</option>
					  @endforeach
					  @endif
                    </select>
                    <select name="city" class="form-control mb-2" id="city">
                      <option value="">{{__('Select City')}}</option>
       <!--               {{--@if(!empty($cities))-->
					  <!--@foreach($cities as $city)-->
					  <!--<option value="{{ $city->name }}"  @if(old('city')==$city->name) {{ 'selected' }} @endif>{{ $city->name }}</option>-->
					  <!--@endforeach-->
					  <!--@endif--}}-->
                    </select>
                  </div>
                </div>
              </div>
            </div>
			<div class="memberTwo" style="display:none;">
			<div class="row">
              <div class="col-12">
                <h4 class="white">{{__('Profile Information')}}</h4>
              </div>
              <div class="col-lg-5">
                <div class="row">
                  <div class="col-12">
                    <div class="row">
                      <div class="col-6">
                        <label class="white py-2 mb-2">{{__('I Am:')}}</label>
                      </div>
                      <div class="col-6">
                        <select class="form-control mb-2" id="who_i_couple" name="who_i_couple">
                          <option>{{__('Select Type')}}</option>
                          <option value="Man" @if(old('who_i_couple')=="Man" ) {{ 'selected' }} @endif>Man</option>
                          <option value="Woman" @if(old('who_i_couple')=="Woman" ) {{ 'selected' }} @endif>Woman</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="row">
                      <div class="col-6">
                        <label class="white py-2 mb-2">{{__('Date Of Birth:')}}</label>
                      </div>
                      <div class="col-6">
                        <input class="form-control mb-2" type="date" id="dob" name="dob_couple" value="{{old('dob_couple')}}">
                        @error('dob_couple') <span style="color:red;">{{ $message }}</span> @enderror </div>
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="row">
                      <div class="col-6">
                        <label class="white py-2 mb-2">{{__('Size In CM:')}}</label>
                      </div>
                      <div class="col-6">
                        <input class="form-control mb-2" type="text" name="size_couple" value="{{old('size_couple')}}" placeholder="{{__('Size')}}">
                      </div>
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="row">
                      <div class="col-6">
                        <label class="white py-2 mb-2">{{__('Weight In KG:')}}</label>
                      </div>
                      <div class="col-6">
                        <input class="form-control mb-2" type="text" name="weight_couple" value="{{old('weight_couple')}}" placeholder="{{__('Weight')}}">
                      </div>
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="row">
                      <div class="col-6">
                        <label class="white py-2 mb-2">{{__('Origin:')}}</label>
                        <br>
                      </div>
                      <div class="col-6">
                        <select name="origin_couple" class="form-control mb-2" id="origin_couple">
                          <option value="">{{__('Select Origin')}}</option>
						  @if(!empty($origins))
						  @foreach($origins as $origin)
						  <option value="{{ $origin->name }}" @if(old('origin_couple')==$origin->name) {{ 'selected' }} @endif>{{ $origin->name }}</option>
						  @endforeach
						  @endif
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
                    <label class="white py-2 mb-2">{{__('Sillhouette:')}}</label>
                    <br>
                    <label class="white py-2 mb-2">{{__('Hair Size:')}}</label>
                    <br>
                    <label class="white py-2 mb-2">{{__('Hair Color:')}}</label>
                    <br>
                    <label class="white py-2 mb-2">{{__('Eye Colour:')}}</label>
                    <br>
                    <label class="white py-2 mb-2">{{__('Country:')}}</label>
                    <br>
                    <label class="white py-2 mb-2">{{__('City:')}}</label>
                    <br>
                  </div>
                  <div class="col-6">
                    <select name="sillhouette" class="form-control mb-2" id="sillhouette">
                      <option value="">{{__('Select Sillhouette')}}</option>
                      <option value="Thin" @if(old('sillhouette')=="Thin" ) {{ 'selected' }} @endif>{{__('Thin')}}</option>
                      <option value="Athletic" @if(old('sillhouette')=="Athletic" ) {{ 'selected' }} @endif>{{__('Athletic')}}</option>
                      <option value="Normal" @if(old('sillhouette')=="Normal" ) {{ 'selected' }} @endif>{{__('Normal')}}</option>
                      <option value="Some roundness" @if(old('sillhouette')=="Some roundness" ) {{ 'selected' }} @endif>{{__('Some roundness')}}</option>
                      <option value="Round" @if(old('sillhouette')=="Round" ) {{ 'selected' }} @endif>{{__('Round')}}</option>
                      <option value="I keep it for myself" @if(old('sillhouette')=="I keep it for myself" ) {{ 'selected' }} @endif>{{__('I keep it for myself')}}</option>
                    </select>
                    <select name="hair_size_couple" class="form-control mb-2" id="hair_size_couple">
                      <option value="">{{__('Select Hair Size')}}</option>
                      <option value="long" @if(old('hair_size_couple')=="long" ) {{ 'selected' }} @endif>{{__('Long')}}</option>
                      <option value="short" @if(old('hair_size_couple')=="short" ) {{ 'selected' }} @endif>{{__('Short')}}</option>
                      <option value="bob" @if(old('hair_size_couple')=="bob" ) {{ 'selected' }} @endif>{{__('Bob')}}</option>
                      <option value="shoulder length" @if(old('hair_size_couple')=="shoulder length" ) {{ 'selected' }} @endif>{{__('Shoulder Length')}}</option>
                    </select>
                    <select name="hair_color_couple" class="form-control mb-2" id="hair_color_couple">
                      <option value="">{{__('Select Hair Color')}}</option>
                      <option value="black" @if(old('hair_color_couple')=="black" ) {{ 'selected' }} @endif>{{__('Black')}}</option>
                      <option value="grey" @if(old('hair_color_couple')=="grey" ) {{ 'selected' }} @endif>{{__('Grey')}}</option>
                      <option value="burgandy" @if(old('hair_color_couple')=="burgandy" ) {{ 'selected' }} @endif>{{__('Burgandy')}}</option>
                      <option value="blonde" @if(old('hair_color_couple')=="blonde" ) {{ 'selected' }} @endif>{{__('Blonde')}}</option>
                      <option value="dark brown" @if(old('hair_color_couple')=="dark brown" ) {{ 'selected' }} @endif>{{__('Dark Brown')}}</option>
                      <option value="light brown" @if(old('hair_color_couple')=="light brown" ) {{ 'selected' }} @endif>{{__('Light Brown')}}</option>
                    </select>
                    <select name="eye_colour_couple" class="form-control mb-2" id="eye_colour_couple">
                      <option value="">{{__('Select Eye Color')}}</option>
                      <option value="black" @if(old('eye_colour_couple')=="black" ) {{ 'selected' }} @endif>{{__('Black')}}</option>
                      <option value="light brown" @if(old('eye_colour_couple')=="light brown" ) {{ 'selected' }} @endif>{{__('Light Brown')}}</option>
                      <option value="dark brown" @if(old('eye_colour_couple')=="dark brown" ) {{ 'selected' }} @endif>{{__('Dark Brown')}}</option>
                      <option value="green" @if(old('eye_colour_couple')=="green" ) {{ 'selected' }} @endif>{{__('Green')}}</option>
                      <option value="grey" @if(old('eye_colour_couple')=="grey" ) {{ 'selected' }} @endif>{{__('Grey')}}</option>
                      <option value="blue" @if(old('eye_colour_couple')=="blue" ) {{ 'selected' }} @endif>{{__('Blue')}}</option>
                    </select>
                    <select name="country_couple" class="form-control mb-2" id="country_couple" onChange="getCityCouple(this.selectedIndex)">
                      <option value="">{{__('Select Country')}}</option>
                      @if(!empty($countries))
					  @foreach($countries as $country)
					  <option value="{{ $country->id }}" @if(old('country')==$country->id) {{ 'selected' }} @endif>{{ $country->name }}</option>
					  @endforeach
					  @endif
                    </select>
                    <select name="city_couple" class="form-control mb-2" id="city_couple">
                      <option value="">{{__('Select City')}}</option>
                      {{--@if(!empty($cities))
					  <!--@foreach($cities as $city)-->
					  <!--<option value="{{ $city->name }}"  @if(old('city_couple')==$city->name) {{ 'selected' }} @endif>{{ $city->name }}</option>-->
					  <!--@endforeach-->
					  <!--@endif--}}-->
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
                    <p class="pt-2">{{__('I Research:')}}</p>
                  </div>
                </div>
                <div class="col-lg-10 col-md-10 col-7">
                  <ul class="conpa py-3 like">
                    <li>
                      <label for="research1"><input id="research1" type="checkbox" name="research[]" value="Straight Couples" @if(old('research')!='' && in_array("Straight Couples", old('research'))) checked="checked" @endif> {{__('Straight Couples')}}</label>
                    </li>
                    <li>
                      <label for="research2"><input id="research2" type="checkbox" name="research[]" value="Couples F Bi" @if(old('research')!='' && in_array("Couples F Bi", old('research'))) checked="checked" @endif>
                      {{__('Couples F Bi')}}</label>
                    </li>
                    <li>
                      <label for="research3"><input id="research3" type="checkbox" name="research[]" value="Couples H Bi" @if(old('research')!='' && in_array("Couples H Bi", old('research'))) checked="checked" @endif>
                      {{__('Couples H Bi')}}</label>
                    </li>
                    <li>
                      <label for="research4"><input id="research4" type="checkbox" name="research[]" value="Couples Bi" @if(old('research')!='' && in_array("Couples Bi", old('research'))) checked="checked" @endif>
                      {{__('Couples Bi')}}</label>
                    </li>
                    <li>
                      <label for="research5"><input id="research5" type="checkbox" name="research[]" value="Straight Women" @if(old('research')!='' && in_array("Straight Women", old('research'))) checked="checked" @endif>
                      {{__('Straight Women')}}</label>
                    </li>
                    <li>
                      <label for="research6"><input id="research6" type="checkbox" name="research[]" value="Women Bi" @if(old('research')!='' && in_array("Women Bi", old('research'))) checked="checked" @endif>
                      {{__('Women Bi')}}</label>
                    </li>
                    <li>
                      <label for="research7"><input id="research7" type="checkbox" name="research[]" value="Lesbians" @if(old('research')!='' && in_array("Lesbians", old('research'))) checked="checked" @endif>
                      {{__('Lesbians')}}</label>
                    </li>
                    <li>
                      <label for="research8"><input id="research8" type="checkbox" name="research[]" value="Straight Hammers" @if(old('research')!='' && in_array("Straight Hammers", old('research'))) checked="checked" @endif>
                      {{__('Straight Hammers')}}</label>
                    </li>
                    <li>
                      <label for="research9"><input id="research9" type="checkbox" name="research[]" value="Mrs. Hammes" @if(old('research')!='' && in_array("Mrs. Hammes", old('research'))) checked="checked" @endif>
                      {{__('Mrs. Hammes')}}</label>
                    </li>
                    <li>
                      <label for="research10"><input id="research10" type="checkbox" name="research[]" value="Gays" @if(old('research')!='' && in_array("Gays", old('research'))) checked="checked" @endif>
                      {{__('Gays')}}</label>
                    </li>
                    <li>
                      <label for="research11"><input id="research11" type="checkbox" name="research[]" value="Transvestites" @if(old('research')!='' && in_array("Transvestites", old('research'))) checked="checked" @endif>
                      {{__('Transvestites')}}</label>
                    </li>
                    <li>
                      <label for="research12"><input id="research12" type="checkbox" name="research[]" value="Transgender" @if(old('research')!='' && in_array("Transgender", old('research'))) checked="checked" @endif>
                      {{__('Transgender')}}</label>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="coment mt-3 p-0">
              <div class="row">
                <div class="col-lg-2 col-md-2 col-5 pl-0">
                  <div class="boxw bg-standard-violet text-center rounded-left text-white px-3 py-3">
                    <p class="pt-2">{{__('Type Of Meeting:')}}</p>
                  </div>
                </div>
                <div class="col-lg-10 col-md-10 col-7">
                  <ul class="conpa py-3 like">
                    <li>
                      <label for="type_of_meeting1"><input id="type_of_meeting1" type="checkbox" name="type_of_meeting[]" value="Trio" @if(old('type_of_meeting')!='' && in_array("Trio", old('type_of_meeting'))) checked="checked" @endif>
                      {{__('Trio')}}</label>
                    </li>
                    <li>
                      <label for="type_of_meeting2"><input id="type_of_meeting2" type="checkbox" name="type_of_meeting[]" value="Melanist" @if(old('type_of_meeting')!='' && in_array("Melanist", old('type_of_meeting'))) checked="checked" @endif>
                      {{__('Melanist')}}</label>
                    </li>
                    <li>
                      <label for="type_of_meeting3"><input id="type_of_meeting3" type="checkbox" name="type_of_meeting[]" value="Swinger" @if(old('type_of_meeting')!='' && in_array("Swinger", old('type_of_meeting'))) checked="checked" @endif>
                      {{__('Swinger')}}</label>
                    </li>
                    <li>
                      <label for="type_of_meeting4"><input id="type_of_meeting4" type="checkbox" name="type_of_meeting[]" value="Gang-Bang" @if(old('type_of_meeting')!='' && in_array("Gang-Bang", old('type_of_meeting'))) checked="checked" @endif>
                      {{__('Gang-Bang')}}</label>
                    </li>
                    <li>
                      <label for="type_of_meeting5"><input id="type_of_meeting5" type="checkbox" name="type_of_meeting[]" value="Plurality" @if(old('type_of_meeting')!='' && in_array("Plurality", old('type_of_meeting'))) checked="checked" @endif>
                      {{__('Plurality')}}</label>
                    </li>
                    <li>
                      <label for="type_of_meeting6"><input id="type_of_meeting6" type="checkbox" name="type_of_meeting[]" value="Multicouple" @if(old('type_of_meeting')!='' && in_array("Multicouple", old('type_of_meeting'))) checked="checked" @endif>
                      {{__('Multicouple')}}</label>
                    </li>
                    <li>
                      <label for="type_of_meeting7"><input id="type_of_meeting7" type="checkbox" name="type_of_meeting[]" value="Exhibition" @if(old('type_of_meeting')!='' && in_array("Exhibition", old('type_of_meeting'))) checked="checked" @endif>
                      {{__('Exhibition')}}</label>
                    </li>
                    <li>
                      <label for="type_of_meeting8"><input id="type_of_meeting8" type="checkbox" name="type_of_meeting[]" value="BDSM" @if(old('type_of_meeting')!='' && in_array("BDSM", old('type_of_meeting'))) checked="checked" @endif>
                      {{__('BDSM')}}</label>
                    </li>
                    <li>
                      <label for="type_of_meeting9"><input id="type_of_meeting9" type="checkbox" name="type_of_meeting[]" value="2+2" @if(old('type_of_meeting')!='' && in_array("2+2", old('type_of_meeting'))) checked="checked" @endif>
                      {{__('2+2')}}</label>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="coment mt-3 p-0">
              <div class="row">
                <div class="col-lg-2 col-md-2 col-5 pl-0">
                  <div class="boxw bg-standard-violet text-center rounded-left text-white px-3 py-3">
                    <p class="pt-2">{{__('First Meeting:')}}</p>
                  </div>
                </div>
                <div class="col-lg-10 col-md-10 col-7">
                  <ul class="conpa py-3 like">
                    <li>
                      <label for="first_meeting1"><input id="first_meeting1" type="checkbox" name="first_meeting[]" value="Club" @if(old('first_meeting')!='' && in_array("Club", old('first_meeting'))) checked="checked" @endif>
                      {{__('Club')}}</label>
                    </li>
                    <li>
                      <label for="first_meeting2"><input id="first_meeting2" type="checkbox" name="first_meeting[]" value="Private Evenings" @if(old('first_meeting')!='' && in_array("Private Evenings", old('first_meeting'))) checked="checked" @endif>
                      {{__('Private Evenings')}}</label>
                    </li>
                    <li>
                      <label for="first_meeting3"><input id="first_meeting3" type="checkbox" name="first_meeting[]" value="I Receive" @if(old('first_meeting')!='' && in_array("I Receive", old('first_meeting'))) checked="checked" @endif>
                      {{__('I Receive')}}</label>
                    </li>
                    <li>
                      <label for="first_meeting4"><input id="first_meeting4" type="checkbox" name="first_meeting[]" value="Move Me" @if(old('first_meeting')!='' && in_array("Move Me", old('first_meeting'))) checked="checked" @endif>
                      {{__('Move Me')}}</label>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="coment mt-3 p-0">
              <div class="row">
                <div class="col-lg-2 col-md-2 col-5 pl-0">
                  <div class="boxw bg-standard-violet text-center rounded-left text-white px-3 py-3">
                    <p class="pt-2" style="">{{__('Vibe:')}}</p>
                  </div>
                </div>
                <div class="col-lg-10 col-md-10 col-7">
                  <ul class="conpa py-3 like">
                    <li>
                      <label for="vibe1"><input id="vibe1" type="checkbox" name="vibe[]" value="Erotic" @if(old('vibe')!='' && in_array("Erotic", old('vibe'))) checked="checked" @endif>
                      {{__('Erotic')}}</label>
                    </li>
                    <li>
                      <label for="vibe2"><input id="vibe2" type="checkbox" name="vibe[]" value="Naughty" @if(old('vibe')!='' && in_array("Naughty", old('vibe'))) checked="checked" @endif>
                      {{__('Naughty')}}</label>
                    </li>
                    <li>
                      <label for="vibe3"><input id="vibe3" type="checkbox" name="vibe[]" value="Sex" @if(old('vibe')!='' && in_array("Sex", old('vibe'))) checked="checked" @endif>
                      {{__('Sex')}}</label>
                    </li>
                    <li>
                      <label for="vibe4"><input id="vibe4" type="checkbox" name="vibe[]" value="According To Mood" @if(old('vibe')!='' && in_array("According To Mood", old('vibe'))) checked="checked" @endif>
                      {{__('According To Mood')}}</label>
                    </li>
                    <li>
                      <label for="vibe5"><input id="vibe5" type="checkbox" name="vibe[]" value="Hard" @if(old('vibe')!='' && in_array("Hard", old('vibe'))) checked="checked" @endif>
                      {{__('Hard')}}</label>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <hr class="my-3">
            <label class="white ">{{__('About You:')}}</label>
            <textarea class="form-control mb-3 " rows="6" type="text" name="about">{{old('about')}}</textarea>
            <input type="submit" value="{{__('Register')}}" class="mt-3 rounded w-100 text-center bg-standard-violet text-white px-2 py-2 mt-2 mb-2">
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
            '_token': "{{csrf_token()}}",
            'country_id': country_id
        };
        // alert(JSON.stringify(queryString));
        $.ajax({
            url: "{{ route('ajax-get-city') }}",
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
            '_token': "{{csrf_token()}}",
            'country_id': country_id
        };
        // alert(JSON.stringify(queryString));
        $.ajax({
            url: "{{ route('ajax-get-city') }}",
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