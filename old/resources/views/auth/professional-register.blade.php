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
      <form method="POST" action="{{ route('professional-register') }}" enctype="multipart/form-data">
        @csrf
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 login-area pt-5 pb-3">
          <div class="dsew profesonl border border-light p-5 rounded">
            <div class="col-lg-2 col-md-2 col-5 fsde py-4 text-center m-auto">
              <div class="round_2 text-center round_img"> 
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
                        <label class="white py-2 mb-2">{{__('Confirm Password:')}}</label>
                      </div>
                      <div class="col-6">
                        <input class="form-control mb-2" type="password" name="password_confirmation" placeholder="{{__('Confirm Password')}}">
                        @error('password_confirmation') <span style="color:red;">{{ $message }}</span> @enderror </div>
                    </div>
                  </div>
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
                        <label class="white py-2 mb-2">{{__('Club Name:')}}</label>
                      </div>
                      <div class="col-6">
                        <input class="form-control mb-2" type="text" name="club_name" value="{{old('club_name')}}" placeholder="{{__('Club Name')}}">
                        @error('club_name') <span style="color:red;">{{ $message }}</span> @enderror </div>
                    </div>
                  </div>
                  

                 
                  </div>
                </div>
              <!--</div>-->
              <div class="col-lg-2 line_boder"> <img src=""> </div>
              <div class="col-lg-5">
                <div class="row">
                  <div class="col-6">
                    <label class="white py-2 mb-2">{{__('Website Url:')}}</label>
                    <br>
                    <label class="white py-2 mb-2">{{__('Contact Number:')}}</label>
                    <br>
                    <label class="white py-2 mb-2">{{__('Status:')}}</label>
                    <br>
                    <label class="white py-2 mb-2">{{__('Address:')}}</label>
                    <br>
                    <label class="white py-2 mb-2">{{__('Zipcode:')}}</label>
                    <br>
                    <label class="white py-2 mb-2">{{__('Country:')}}</label>
                    <br>
                    <label class="white py-2 mb-2">{{__('City:')}}</label>
                    <br>
                  </div>
                  <div class="col-6">
                    <input class="form-control mb-2" type="text" name="website_url" value="{{old('website_url')}}" placeholder="{{__('Website Url')}}">
                    @error('website_url') <span style="color:red;">{{ $message }}</span> @enderror
                    <input class="form-control mb-2" type="text" name="contact" value="{{old('contact')}}" placeholder="{{__('Contact Number')}}">
                    @error('contact') <span style="color:red;">{{ $message }}</span> @enderror
                    <select name="status" class="form-control mb-2" id="status">
                      <option value="">{{__('Select Status')}}</option>
                      <option value="libertine discotheque club" @if(old('status')=="libertine discotheque club" ) {{ 'selected' }} @endif>{{__('Libertine discotheque club')}}</option>
                      <option value="sauna club" @if(old('status')=="sauna club" ) {{ 'selected' }} @endif>{{__('Sauna club')}}</option>
                      <option value="organizer" @if(old('status')=="organizer" ) {{ 'selected' }} @endif>{{__('Organizer')}}</option>
                      <option value="libertine camping" @if(old('status')=="libertine camping" ) {{ 'selected' }} @endif>{{__('Libertine camping')}}</option>
                      <option value="erotic writer" @if(old('status')=="erotic writer" ) {{ 'selected' }} @endif>{{__('Erotic writer')}}</option>
                      <option value="photographer" @if(old('status')=="photographer" ) {{ 'selected' }} @endif>{{__('Photographer')}}</option>
                      <option value="tattoo artist" @if(old('status')=="tattoo artist" ) {{ 'selected' }} @endif>{{__('Tattoo artist')}}</option>
                      <option value="erotic photographer" @if(old('status')=="erotic photographer" ) {{ 'selected' }} @endif>{{__('Erotic photographer')}}</option>
                      <option value="sex shop" @if(old('status')=="sex shop" ) {{ 'selected' }} @endif>{{__('Sex shop')}}</option>
                      <option value="online sex shop" @if(old('status')=="online sex shop" ) {{ 'selected' }} @endif>{{__('Online sex shop')}}</option>
                    </select>
                    @error('status') <span style="color:red;">{{ $message }}</span> @enderror
                    <input class="form-control mb-2" type="text" name="address" value="{{old('address')}}" placeholder="{{__('Address')}}">
                    @error('address') <span style="color:red;">{{ $message }}</span> @enderror
                    <input class="form-control mb-2" type="text" name="zipcode" value="{{old('zipcode')}}" placeholder="{{__('Zipcode')}}">
                    @error('zipcode') <span style="color:red;">{{ $message }}</span> @enderror
                    
					<select name="country" class="form-control mb-2" id="country" onChange="getCity(this.selectedIndex)">
                      <option value="">{{__('Select Country')}}</option>
                      @if(!empty($countries))
					  @foreach($countries as $country)
					  <option value="{{ $country->id }}" @if(old('country')==$country->id) {{ 'selected' }} @endif>{{ $country->name }}</option>
					  @endforeach
					  @endif
                    </select>
                    @error('country') <span style="color:red;">{{ $message }}</span> @enderror 
                    <select name="city" class="form-control mb-2" id="city">
                      <option value="">{{__('Select City')}}</option>
                      @if(!empty($cities))
					  @foreach($cities as $city)
					  <option value="{{ $city->name }}" @if(old('city')==$city->name) {{ 'selected' }} @endif>{{ $city->name }}</option>
					  @endforeach
					  @endif
                    </select>
                    @error('city') <span style="color:red;">{{ $message }}</span> @enderror
                </div>
              </div>
            </div>
            
            <div class="row mt-3">
                
            <div class="col-12">
                    <div class="row">
                      <div class="col-lg-2 col-md-2 col-12">
                        <label class="white" for="checkMonday"> 
                            <input type="checkbox" name="club_day[]" class="text-while" value="monday" @if(old('club_day')!='' && in_array("monday", old('club_day'))) checked="checked" @endif> Monday </label>
                            @error('club_day') <span style="color:red;">{{ $message }}</span> @enderror
                      </div>
                      <div class="col-lg-5 col-md-5 col-12">
                        <div class="row">
                            <div class="col-5">  
                                <label class="white py-2 mb-2">Stat Time</label> 
                            </div>    
                            <div class="col-7">    
                                <input class="form-control mb-2" type="time" name="club_start_time[]" value="">
                                @error('club_start_time') <span style="color:red;">{{ $message }}</span> @enderror
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
                                @error('club_end_time') <span style="color:red;">{{ $message }}</span> @enderror
                            </div>  
                        </div> 
                    </div>    
                  </div>
            </div>
                   
                
                <div class="col-12">
                    <div class="row">
                      <div class="col-lg-2 col-md-2 col-12">
                        <label class="white" for="checkMonday"> 
                            <input type="checkbox" name="club_day[]" class="text-while" value="tuesday" @if(old('club_day')!='' && in_array("tuesday", old('club_day'))) checked="checked" @endif> Tuesday </label>
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
                            <input type="checkbox" name="club_day[]" class="text-while" value="wednesday" @if(old('club_day')!='' && in_array("wednesday", old('club_day'))) checked="checked" @endif> Wednesday </label>
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
                            <input type="checkbox" name="club_day[]" class="text-while" value="thursday" @if(old('club_day')!='' && in_array("thursday", old('club_day'))) checked="checked" @endif> Thursday </label>
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
                            <input type="checkbox" name="club_day[]" class="text-while" value="friday" @if(old('club_day')!='' && in_array("friday", old('club_day'))) checked="checked" @endif> Friday </label>
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
                            <input type="checkbox" name="club_day[]" class="text-while" value="saturday" @if(old('club_day')!='' && in_array("saturday", old('club_day'))) checked="checked" @endif> Saturday </label>
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
                            <input type="checkbox" name="club_day[]" class="text-while" value="sunday" @if(old('club_day')!='' && in_array("sunday", old('club_day'))) checked="checked" @endif> Sunday </label>
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
            <label class="white ">{{__('About You:')}}</label>
            <textarea class="form-control mb-3" rows="6" type="text" name="about">{{old('about')}}</textarea>
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

</script>