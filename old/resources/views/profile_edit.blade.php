@extends('layouts.front')

@section('content')

    <div class="container ">
        @if($message=Session::get('success'))
        <div class="alert bg-green alert-dismissible" role="alert" id="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
            {{ $message }}
        </div>
        @endif
    
    @if($user->user_type == 'member')
    <form method="POST" action="{{route('profile-update')}}" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="_method" value="Patch" />
		<input type="hidden" name="id" value="{{old('id',Auth::user()->id)}}">

        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 login-area pt-5 pb-3">
          <div class="dsew border border-light p-5 rounded">
            <div class="col-lg-2 col-md-2 col-5 fsde py-4 text-center m-auto">
			
              <div class="round_2 text-center"> 
			  <img src="{{URL::to('/')}}/public/images/users/{{$user->image_url}}" id="output" onClick="$('#image').trigger('click');">
  
                <input type="hidden" name="old_image_url" value="{{$user->image_url}}" accept="image/*" style="display:none;">
				<input type="file" name="new_image_url" id="image" accept="image/*" style="display:none;">
                
                @error('image_url') <span style="color:red;">{{ $message }}</span> @enderror </div>
            </div>
            <div class="row">
              <div class="col-lg-5">
                <div class="row">
                  <div class="col-12">
                    <div class="row">
                      <div class="col-6">
                        <label class="white py-2 mb-2">{{__('Nickname:')}}</label>
                      </div>
                      <div class="col-6">
                        <input class="form-control mb-2" type="text" name="username" value="{{old('username',$user->username)}}" placeholder="{{__('Nickname')}}">
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
                          <option member-count="2" value="Straight Couples" @if($user->you_are=="Straight Couples" ) {{ 'selected' }} @endif>{{__('Straight Couples')}}</option>
                          <option member-count="2" value="Couples F Bi" @if($user->you_are=="Couples F Bi" ) {{ 'selected' }} @endif>{{__('Couples F Bi')}}</option>
                          <option member-count="2" value="Couples H Bi" @if($user->you_are=="Couples H Bi" ) {{ 'selected' }} @endif>{{__('Couples H Bi')}}</option>
						  <option member-count="2" value="Couples Bi" @if($user->you_are=="Couples Bi" ) {{ 'selected' }} @endif>{{__('Couples Bi')}}</option>
						  <option member-count="1" value="Straight Women" @if($user->you_are=="Straight Women" ) {{ 'selected' }} @endif>{{__('Straight Women')}}</option>
						  <option member-count="1" value="Women Bi" @if($user->you_are=="Women Bi" ) {{ 'selected' }} @endif>{{__('Women Bi')}}</option>
						  <option member-count="1" value="Lesbians" @if($user->you_are=="Lesbians" ) {{ 'selected' }} @endif>{{__('Lesbians')}}</option>
						  <option member-count="1" value="Straight Hammers" @if($user->you_are=="Straight Hammers" ) {{ 'selected' }} @endif>{{__('Straight Hammers')}}</option>
						  <option member-count="1" value="Mrs. Hammes" @if($user->you_are=="Mrs. Hammes" ) {{ 'selected' }} @endif>{{__('Mrs. Hammes')}}</option>
						  <option member-count="1" value="Gays" @if($user->you_are=="Gays" ) {{ 'selected' }} @endif>{{__('Gays')}}</option>
						  <option member-count="1" value="Transvestites" @if($user->you_are=="Transvestites" ) {{ 'selected' }} @endif>{{__('Transvestites')}}</option>
						  <option member-count="1" value="Transgender" @if($user->you_are=="Transgender" ) {{ 'selected' }} @endif>{{__('Transgender')}}</option>
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
                          <option member-count="2" value="To Discover" @if($user->experience=="To Discover" ) {{ 'selected' }} @endif>{{__('To Discover')}}</option>
                          <option member-count="2" value="Beginner" @if($user->experience=="Beginner" ) {{ 'selected' }} @endif>{{__('Beginner')}}</option>
                          <option member-count="2" value="Experienced" @if($user->experience=="Experienced" ) {{ 'selected' }} @endif>{{__('Experienced')}}</option>
                          <option member-count="2" value="Occasional" @if($user->experience=="Occasional" ) {{ 'selected' }} @endif>{{__('Occasional')}}</option>
                          <option member-count="2" value="I Keep To Myself" @if($user->experience=="I Keep To Myself" ) {{ 'selected' }} @endif>{{__('I Keep To Myself')}}</option>
						  
                        </select>
                        @error('experience') <span style="color:red;">{{ $message }}</span> @enderror </div>
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
                              <option value="Man" @if(!empty($user->relUserDetail->who_i)) @if($user->relUserDetail->who_i=="Man" ) {{ 'selected' }} @endif @endif>Man</option>
                              <option value="Woman" @if(!empty($user->relUserDetail->who_i)) @if($user->relUserDetail->who_i=="Woman" ) {{ 'selected' }} @endif @endif>Woman</option>
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
                        @if(!empty($user->relUserDetail->dob))
                            <input class="form-control mb-2" type="date" id="dob" name="dob" value="{{old('dob',$user->relUserDetail->dob)}}">
                        @else
                            <input class="form-control mb-2" type="date" id="dob" name="dob" value="{{old('dob')}}">
                        @endif
                        @error('dob') <span style="color:red;">{{ $message }}</span> @enderror </div>
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="row">
                      <div class="col-6">
                        <label class="white py-2 mb-2">{{__('Size In CM:')}}</label>
                      </div>
                      <div class="col-6">
                        <input class="form-control mb-2" type="text" name="size" value="@if(!empty($user->relUserDetail->size)) {{old('size',$user->relUserDetail->size)}} @endif" placeholder="{{__('Size')}}">
                      </div>
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="row">
                      <div class="col-6">
                        <label class="white py-2 mb-2">{{__('Weight In KG:')}}</label>
                      </div>
                      <div class="col-6">
                        <input class="form-control mb-2" type="text" name="weight" value="@if(!empty($user->relUserDetail->weight)) {{old('weight',$user->relUserDetail->weight)}} @endif" placeholder="{{__('Weight')}}">
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
						  <option value="{{ $origin->name }}" @if(!empty($user->relUserDetail->origin)) @if($user->relUserDetail->origin==$origin->name) {{ 'selected' }} @endif @endif>{{ $origin->name }}</option>
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
                    <select name="hair_size" class="form-control mb-2" id="hair_size">
                      <option value="">{{__('Select Hair Size')}}</option>
                          <option value="long" @if(!empty($user->relUserDetail->hair_size)) @if($user->relUserDetail->hair_size=="long" ) {{ 'selected' }} @endif @endif>{{__('Long')}}</option>
                          <option value="short" @if(!empty($user->relUserDetail->hair_size)) @if($user->relUserDetail->hair_size=="short" ) {{ 'selected' }} @endif @endif>{{__('Short')}}</option>
                          <option value="bob" @if(!empty($user->relUserDetail->hair_size)) @if($user->relUserDetail->hair_size=="bob" ) {{ 'selected' }} @endif @endif>{{__('Bob')}}</option>
                          <option value="shoulder length" @if(!empty($user->relUserDetail->hair_size)) @if($user->relUserDetail->hair_size=="shoulder length" ) {{ 'selected' }} @endif @endif>{{__('Shoulder Length')}}</option>
                    </select>
                    <select name="hair_color" class="form-control mb-2" id="hair_color">
                      <option value="">{{__('Select Hair Color')}}</option>
                          <option value="black" @if(!empty($user->relUserDetail->hair_color)) @if($user->relUserDetail->hair_color=="black" ) {{ 'selected' }} @endif @endif>{{__('Black')}}</option>
                          <option value="grey" @if(!empty($user->relUserDetail->hair_color)) @if($user->relUserDetail->hair_color=="grey" ) {{ 'selected' }} @endif @endif>{{__('Grey')}}</option>
                          <option value="burgandy" @if(!empty($user->relUserDetail->hair_color)) @if($user->relUserDetail->hair_color=="burgandy" ) {{ 'selected' }} @endif @endif>{{__('Burgandy')}}</option>
                          <option value="blonde" @if(!empty($user->relUserDetail->hair_color)) @if($user->relUserDetail->hair_color=="blonde" ) {{ 'selected' }} @endif @endif>{{__('Blonde')}}</option>
                          <option value="dark brown" @if(!empty($user->relUserDetail->hair_color)) @if($user->relUserDetail->hair_color=="dark brown" ) {{ 'selected' }} @endif @endif>{{__('Dark Brown')}}</option>
                          <option value="light brown" @if(!empty($user->relUserDetail->hair_color)) @if($user->relUserDetail->hair_color=="light brown" ) {{ 'selected' }} @endif @endif>{{__('Light Brown')}}</option>
                    </select>
                    <select name="eye_colour" class="form-control mb-2" id="eye_colour">
                      <option value="">{{__('Select Eye Color')}}</option>
                          <option value="black" @if(!empty($user->relUserDetail->eye_colour)) @if($user->relUserDetail->eye_colour=="black" ) {{ 'selected' }} @endif @endif>{{__('Black')}}</option>
                          <option value="light brown" @if(!empty($user->relUserDetail->eye_colour)) @if($user->relUserDetail->eye_colour=="light brown" ) {{ 'selected' }} @endif @endif>{{__('Light Brown')}}</option>
                          <option value="dark brown" @if(!empty($user->relUserDetail->eye_colour)) @if($user->relUserDetail->eye_colour=="dark brown" ) {{ 'selected' }} @endif @endif>{{__('Dark Brown')}}</option>
                          <option value="green" @if(!empty($user->relUserDetail->eye_colour)) @if($user->relUserDetail->eye_colour=="green" ) {{ 'selected' }} @endif @endif>{{__('Green')}}</option>
                          <option value="grey" @if(!empty($user->relUserDetail->eye_colour)) @if($user->relUserDetail->eye_colour=="grey" ) {{ 'selected' }} @endif @endif>{{__('Grey')}}</option>
                          <option value="blue" @if(!empty($user->relUserDetail->eye_colour)) @if($user->relUserDetail->eye_colour=="blue" ) {{ 'selected' }} @endif @endif>{{__('Blue')}}</option>
                    </select>
                    <select name="country" class="form-control mb-2" id="country" onChange="getCity(this.selectedIndex)">
                      <option value="">{{__('Select Country')}}</option>
                      @if(!empty($countries))
					  @foreach($countries as $country)
					  <option value="{{ $country->id }}" @if(!empty($user->relUserDetail->country)) @if($user->relUserDetail->country==$country->name) {{ 'selected' }} @endif @endif>{{ $country->name }}</option>
					  @endforeach
					  @endif
                    </select>
                    <select name="city" class="form-control mb-2" id="city">
                      <option value="">{{__('Select City')}}</option>
                      @if(!empty($cities))
					  @foreach($cities as $city)
					  <option value="{{ $city->name }}" @if(!empty($user->relUserDetail->city)) @if($user->relUserDetail->city==$city->name) {{ 'selected' }} @endif @endif>{{ $city->name }}</option>
					  @endforeach
					  @endif
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
                              <option value="Man" @if(!empty($user->relUserDetail->who_i_couple)) @if($user->relUserDetail->who_i_couple=="Man" ) {{ 'selected' }} @endif @endif>Man</option>
                              <option value="Woman" @if(!empty($user->relUserDetail->who_i_couple)) @if($user->relUserDetail->who_i_couple=="Woman" ) {{ 'selected' }} @endif @endif>Woman</option>
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
                        @if(!empty($user->relUserDetail->dob_couple))
                            <input class="form-control mb-2" type="date" id="dob" name="dob_couple" value="{{old('dob_couple',$user->relUserDetail->dob_couple)}}">
                        @else
                            <input class="form-control mb-2" type="date" id="dob" name="dob_couple" value="{{old('dob_couple')}}">
                        @endif
                        @error('dob_couple') <span style="color:red;">{{ $message }}</span> @enderror </div>
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="row">
                      <div class="col-6">
                        <label class="white py-2 mb-2">{{__('Size In CM:')}}</label>
                      </div>
                      <div class="col-6">
                        <input class="form-control mb-2" type="text" name="size_couple" value="@if(!empty($user->relUserDetail->size_couple)) {{old('size_couple',$user->relUserDetail->size_couple)}} @endif" placeholder="{{__('Size')}}">
                      </div>
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="row">
                      <div class="col-6">
                        <label class="white py-2 mb-2">{{__('Weight In KG:')}}</label>
                      </div>
                      <div class="col-6">
                        <input class="form-control mb-2" type="text" name="weight_couple" value="@if(!empty($user->relUserDetail->weight_couple)) {{old('weight_couple',$user->relUserDetail->weight_couple)}} @endif" placeholder="{{__('Weight')}}">
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
						  <option value="{{ $origin->name }}" @if(!empty($user->relUserDetail->origin_couple)) @if($user->relUserDetail->origin_couple==$origin->name) {{ 'selected' }} @endif @endif>{{ $origin->name }}</option>
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
                    <select name="hair_size_couple" class="form-control mb-2" id="hair_size_couple">
                      <option value="">{{__('Select Hair Size')}}</option>
                          <option value="long" @if(!empty($user->relUserDetail->hair_size_couple)) @if($user->relUserDetail->hair_size_couple=="long" ) {{ 'selected' }} @endif @endif>{{__('Long')}}</option>
                          <option value="short" @if(!empty($user->relUserDetail->hair_size_couple)) @if($user->relUserDetail->hair_size_couple=="short" ) {{ 'selected' }} @endif @endif>{{__('Short')}}</option>
                          <option value="bob" @if(!empty($user->relUserDetail->hair_size_couple)) @if($user->relUserDetail->hair_size_couple=="bob" ) {{ 'selected' }} @endif @endif>{{__('Bob')}}</option>
                          <option value="shoulder length" @if(!empty($user->relUserDetail->hair_size_couple)) @if($user->relUserDetail->hair_size_couple=="shoulder length" ) {{ 'selected' }} @endif @endif>{{__('Shoulder Length')}}</option>
                    </select>
                    <select name="hair_color_couple" class="form-control mb-2" id="hair_color_couple">
                      <option value="">{{__('Select Hair Color')}}</option>
                          <option value="black" @if(!empty($user->relUserDetail->hair_color_couple)) @if($user->relUserDetail->hair_color_couple=="black" ) {{ 'selected' }} @endif @endif>{{__('Black')}}</option>
                          <option value="grey" @if(!empty($user->relUserDetail->hair_color_couple)) @if($user->relUserDetail->hair_color_couple=="grey" ) {{ 'selected' }} @endif @endif>{{__('Grey')}}</option>
                          <option value="burgandy" @if(!empty($user->relUserDetail->hair_color_couple)) @if($user->relUserDetail->hair_color_couple=="burgandy" ) {{ 'selected' }} @endif @endif>{{__('Burgandy')}}</option>
                          <option value="blonde" @if(!empty($user->relUserDetail->hair_color_couple)) @if($user->relUserDetail->hair_color_couple=="blonde" ) {{ 'selected' }} @endif @endif>{{__('Blonde')}}</option>
                          <option value="dark brown" @if(!empty($user->relUserDetail->hair_color_couple)) @if($user->relUserDetail->hair_color_couple=="dark brown" ) {{ 'selected' }} @endif @endif>{{__('Dark Brown')}}</option>
                          <option value="light brown" @if(!empty($user->relUserDetail->hair_color_couple)) @if($user->relUserDetail->hair_color_couple=="light brown" ) {{ 'selected' }} @endif @endif>{{__('Light Brown')}}</option>
                    </select>
                    <select name="eye_colour_couple" class="form-control mb-2" id="eye_colour_couple">
                      <option value="">{{__('Select Eye Color')}}</option>
                          <option value="black" @if(!empty($user->relUserDetail->eye_colour_couple)) @if($user->relUserDetail->eye_colour_couple=="black" ) {{ 'selected' }} @endif @endif>{{__('Black')}}</option>
                          <option value="light brown" @if(!empty($user->relUserDetail->eye_colour_couple)) @if($user->relUserDetail->eye_colour_couple=="light brown" ) {{ 'selected' }} @endif @endif>{{__('Light Brown')}}</option>
                          <option value="dark brown" @if(!empty($user->relUserDetail->eye_colour_couple)) @if($user->relUserDetail->eye_colour_couple=="dark brown" ) {{ 'selected' }} @endif @endif>{{__('Dark Brown')}}</option>
                          <option value="green" @if(!empty($user->relUserDetail->eye_colour_couple)) @if($user->relUserDetail->eye_colour_couple=="green" ) {{ 'selected' }} @endif @endif>{{__('Green')}}</option>
                          <option value="grey" @if(!empty($user->relUserDetail->eye_colour_couple)) @if($user->relUserDetail->eye_colour_couple=="grey" ) {{ 'selected' }} @endif @endif>{{__('Grey')}}</option>
                          <option value="blue" @if(!empty($user->relUserDetail->eye_colour_couple)) @if($user->relUserDetail->eye_colour_couple=="blue" ) {{ 'selected' }} @endif @endif>{{__('Blue')}}</option>
                    </select>
                    <select name="country_couple" class="form-control mb-2" id="country_couple" onChange="getCityCouple(this.selectedIndex)">
                      <option value="">{{__('Select Country')}}</option>
                      @if(!empty($countries))
					  @foreach($countries as $country)
					  <option value="{{ $country->id }}" @if(!empty($user->relUserDetail->country_couple)) @if($user->relUserDetail->country_couple==$country->name) {{ 'selected' }} @endif @endif>{{ $country->name }}</option>
					  @endforeach
					  @endif
                    </select>
                    <select name="city_couple" class="form-control mb-2" id="city_couple">
                      <option value="">{{__('Select City')}}</option>
                      @if(!empty($cities))
					  @foreach($cities as $city)
					  <option value="{{ $city->name }}" @if(!empty($user->relUserDetail->city_couple)) @if($user->relUserDetail->city_couple==$city->name) {{ 'selected' }} @endif @endif>{{ $city->name }}</option>
					  @endforeach
					  @endif
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
                      <label for="research1"><input id="research1" type="checkbox" name="research[]" value="Straight Couples" @if(!empty($user->relUserDetail->research) && in_array("Straight Couples",  explode(',', $user->relUserDetail->research))) checked @endif> 
                      {{__('Straight Couples')}}</label>
                    </li>
                    <li>
                      <label for="research2"><input id="research2" type="checkbox" name="research[]" value="Couples F Bi" @if(!empty($user->relUserDetail->research) && in_array("Couples F Bi",  explode(',', $user->relUserDetail->research))) checked @endif>
                      {{__('Couples F Bi')}}</label>
                    </li>
                    <li>
                      <label for="research3"><input id="research3" type="checkbox" name="research[]" value="Couples H Bi" @if(!empty($user->relUserDetail->research) && in_array("Couples H Bi",  explode(',', $user->relUserDetail->research))) checked @endif>
                      {{__('Couples H Bi')}}</label>
                    </li>
                    <li>
                      <label for="research4"><input id="research4" type="checkbox" name="research[]" value="Couples Bi" @if(!empty($user->relUserDetail->research) && in_array("Couples Bi",  explode(',', $user->relUserDetail->research))) checked @endif>
                      {{__('Couples Bi')}}</label>
                    </li>
                    <li>
                      <label for="research5"><input id="research5" type="checkbox" name="research[]" value="Straight Women" @if(!empty($user->relUserDetail->research) && in_array("Straight Women",  explode(',', $user->relUserDetail->research))) checked @endif>
                      {{__('Straight Women')}}</label>
                    </li>
                    <li>
                      <label for="research6"><input id="research6" type="checkbox" name="research[]" value="Women Bi" @if(!empty($user->relUserDetail->research) && in_array("Women Bi",  explode(',', $user->relUserDetail->research))) checked @endif>
                      {{__('Women Bi')}}</label>
                    </li>
                    <li>
                      <label for="research7"><input id="research7" type="checkbox" name="research[]" value="Lesbians" @if(!empty($user->relUserDetail->research) && in_array("Lesbians",  explode(',', $user->relUserDetail->research))) checked @endif>
                      {{__('Lesbians')}}</label>
                    </li>
                    <li>
                      <label for="research8"><input id="research8" type="checkbox" name="research[]" value="Straight Hammers" @if(!empty($user->relUserDetail->research) && in_array("Straight Hammers",  explode(',', $user->relUserDetail->research))) checked @endif>
                      {{__('Straight Hammers')}}</label>
                    </li>
                    <li>
                      <label for="research9"><input id="research9" type="checkbox" name="research[]" value="Mrs. Hammes" @if(!empty($user->relUserDetail->research) && in_array("Mrs. Hammes",  explode(',', $user->relUserDetail->research))) checked @endif>
                      {{__('Mrs. Hammes')}}</label>
                    </li>
                    <li>
                      <label for="research10"><input id="research10" type="checkbox" name="research[]" value="Gays" @if(!empty($user->relUserDetail->research) && in_array("Gays",  explode(',', $user->relUserDetail->research))) checked @endif>
                      {{__('Gays')}}</label>
                    </li>
                    <li>
                      <label for="research11"><input id="research11" type="checkbox" name="research[]" value="Transvestites" @if(!empty($user->relUserDetail->research) && in_array("Transvestites",  explode(',', $user->relUserDetail->research))) checked @endif>
                      {{__('Transvestites')}}</label>
                    </li>
                    <li>
                      <label for="research12"><input id="research12" type="checkbox" name="research[]" value="Transgender" @if(!empty($user->relUserDetail->research) && in_array("Transgender",  explode(',', $user->relUserDetail->research))) checked @endif>
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
                      <label for="type_of_meeting1"><input id="type_of_meeting1" type="checkbox" name="type_of_meeting[]" value="Trio" @if(!empty($user->relUserDetail->type_of_meeting) && in_array("Trio",  explode(',', $user->relUserDetail->type_of_meeting))) checked @endif>
                      {{__('Trio')}}</label>
                    </li>
                    <li>
                      <label for="type_of_meeting2"><input id="type_of_meeting2" type="checkbox" name="type_of_meeting[]" value="Melanist" @if(!empty($user->relUserDetail->type_of_meeting) && in_array("Melanist",  explode(',', $user->relUserDetail->type_of_meeting))) checked @endif>
                      {{__('Melanist')}}</label>
                    </li>
                    <li>
                      <label for="type_of_meeting3"><input id="type_of_meeting3" type="checkbox" name="type_of_meeting[]" value="Swinger" @if(!empty($user->relUserDetail->type_of_meeting) && in_array("Swinger",  explode(',', $user->relUserDetail->type_of_meeting))) checked @endif>
                      {{__('Swinger')}}</label>
                    </li>
                    <li>
                      <label for="type_of_meeting4"><input id="type_of_meeting4" type="checkbox" name="type_of_meeting[]" value="Gang-Bang" @if(!empty($user->relUserDetail->type_of_meeting) && in_array("Gang-Bang",  explode(',', $user->relUserDetail->type_of_meeting))) checked @endif>
                      {{__('Gang-Bang')}}</label>
                    </li>
                    <li>
                      <label for="type_of_meeting5"><input id="type_of_meeting5" type="checkbox" name="type_of_meeting[]" value="Plurality" @if(!empty($user->relUserDetail->type_of_meeting) && in_array("Plurality",  explode(',', $user->relUserDetail->type_of_meeting))) checked @endif>
                      {{__('Plurality')}}</label>
                    </li>
                    <li>
                      <label for="type_of_meeting6"><input id="type_of_meeting6" type="checkbox" name="type_of_meeting[]" value="Multicouple" @if(!empty($user->relUserDetail->type_of_meeting) && in_array("Multicouple",  explode(',', $user->relUserDetail->type_of_meeting))) checked @endif>
                      {{__('Multicouple')}}</label>
                    </li>
                    <li>
                      <label for="type_of_meeting7"><input id="type_of_meeting7" type="checkbox" name="type_of_meeting[]" value="Exhibition" @if(!empty($user->relUserDetail->type_of_meeting) && in_array("Exhibition",  explode(',', $user->relUserDetail->type_of_meeting))) checked @endif>
                      {{__('Exhibition')}}</label>
                    </li>
                    <li>
                      <label for="type_of_meeting8"><input id="type_of_meeting8" type="checkbox" name="type_of_meeting[]" value="BDSM" @if(!empty($user->relUserDetail->type_of_meeting) && in_array("BDSM",  explode(',', $user->relUserDetail->type_of_meeting))) checked @endif>
                      {{__('BDSM')}}</label>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="coment mt-3 p-0">
              <div class="row">
                <div class="col-lg-2 col-md-2 col-5 pl-0">
                  <div class="boxw bg-standard-violet text-center rounded-left text-white px-3 py-3">
                    <p class="pt-2">{{__('First Meeting:')}}<>
                  </div>
                </div>
                <div class="col-lg-10 col-md-10 col-7">
                  <ul class="conpa py-3 like">
                    <li>
                      <label for="first_meeting1"><input id="first_meeting1" type="checkbox" name="first_meeting[]" value="Club" @if(!empty($user->relUserDetail->first_meeting) && in_array("Club",  explode(',', $user->relUserDetail->first_meeting))) checked @endif>
                      {{__('Club')}}</label>
                    </li>
                    <li>
                      <label for="first_meeting2"><input id="first_meeting2" type="checkbox" name="first_meeting[]" value="Private Evenings" @if(!empty($user->relUserDetail->first_meeting) && in_array("Private Evenings",  explode(',', $user->relUserDetail->first_meeting))) checked @endif>
                      {{__('Private Evenings')}}</label>
                    </li>
                    <li>
                      <label for="first_meeting3"><input id="first_meeting3" type="checkbox" name="first_meeting[]" value="I Receive" @if(!empty($user->relUserDetail->first_meeting) && in_array("I Receive",  explode(',', $user->relUserDetail->first_meeting))) checked @endif>
                      {{__('I Receive')}}</label>
                    </li>
                    <li>
                      <label for="first_meeting4"><input id="first_meeting4" type="checkbox" name="first_meeting[]" value="Move Me" @if(!empty($user->relUserDetail->first_meeting) && in_array("Move Me",  explode(',', $user->relUserDetail->first_meeting))) checked @endif>
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
                      <label for="vibe1"><input id="vibe1" type="checkbox" name="vibe[]" value="Erotic" @if(!empty($user->relUserDetail->vibe) && in_array("Erotic",  explode(',', $user->relUserDetail->vibe))) checked @endif>
                      {{__('Erotic')}}</label>
                    </li>
                    <li>
                      <label for="vibe2"><input id="vibe2" type="checkbox" name="vibe[]" value="Naughty" @if(!empty($user->relUserDetail->vibe) && in_array("Naughty",  explode(',', $user->relUserDetail->vibe))) checked @endif>
                      {{__('Naughty')}}</label>
                    </li>
                    <li>
                      <label for="vibe3"><input id="vibe3" type="checkbox" name="vibe[]" value="Sex" @if(!empty($user->relUserDetail->vibe) && in_array("Sex",  explode(',', $user->relUserDetail->vibe))) checked @endif>
                      {{__('Sex')}}</label>
                    </li>
                    <li>
                      <label for="vibe4"><input id="vibe4" type="checkbox" name="vibe[]" value="According To Mood" @if(!empty($user->relUserDetail->vibe) && in_array("According To Mood",  explode(',', $user->relUserDetail->vibe))) checked @endif>
                      {{__('According To Mood')}}</label>
                    </li>
                    <li>
                      <label for="vibe5"><input id="vibe5" type="checkbox" name="vibe[]" value="Hard" @if(!empty($user->relUserDetail->vibe) && in_array("Hard",  explode(',', $user->relUserDetail->vibe))) checked @endif>
                      {{__('Hard')}}</label>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <hr class="my-3">
            <label class="white ">{{__('About You:')}}</label>
            <textarea class="form-control mb-3 " rows="6" type="text" name="about">@if(!empty($user->relUserDetail->about)) {{old('about',$user->relUserDetail->about)}} @endif</textarea>
            <input type="submit" value="{{__('Update Profile')}}" class="mt-3 rounded w-100 text-center bg-standard-violet text-white px-2 py-2 mt-2 mb-2">
          </div>
        </div>
      </form>
    @endif
    
    @if($user->user_type == 'professional')
    <form method="POST" action="{{route('pro-profile-update')}}" enctype="multipart/form-data">
        @csrf
        
        <input type="hidden" name="_method" value="Patch" />
		<input type="hidden" name="id" value="{{old('id',Auth::user()->id)}}">

        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 login-area pt-5 pb-3">
          <div class="dsew border border-light p-5 rounded">
            <div class="col-lg-2 col-md-2 col-5 fsde py-4 text-center m-auto">
			
              <div class="round_2 text-center"> 
			  <img src="{{URL::to('/')}}/public/images/users/{{$user->image_url}}" id="output" onClick="$('#image').trigger('click');">
  
                <input type="hidden" name="old_image_url" value="{{$user->image_url}}" accept="image/*" style="display:none;">
				<input type="file" name="new_image_url" id="image" accept="image/*" style="display:none;">
                
                @error('image_url') <span style="color:red;">{{ $message }}</span> @enderror </div>
            </div>
            <div class="row">
              <div class="col-lg-5">
                <div class="row">
                  
                  <div class="col-12">
                    <div class="row">
                      <div class="col-6">
                        <label class="white py-2 mb-2">{{__('Nickname:')}}</label>
                      </div>
                      <div class="col-6">
                        <input class="form-control mb-2" type="text" name="username" value="{{old('username',$user->username)}}" placeholder="{{__('Nickname')}}">
                        @error('username') <span style="color:red;">{{ $message }}</span> @enderror </div>
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="row">
                      <div class="col-6">
                        <label class="white py-2 mb-2">{{__('Club Name:')}}</label>
                      </div>
                      <div class="col-6">
                        <input class="form-control mb-2" type="text" name="club_name" value="{{old('club_name',$user->club_name)}}" placeholder="{{__('Club Name')}}">
                        @error('club_name') <span style="color:red;">{{ $message }}</span> @enderror </div>
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="row">
                      <div class="col-6">
                        <label class="white py-2 mb-2">{{__('Website Url:')}}</label>
                      </div>
                      <div class="col-6">
                        <input class="form-control mb-2" type="text" name="website_url" value="{{old('website_url',$user->relUserDetail->website_url)}}" placeholder="{{__('Website Url')}}">
                        @error('website_url') <span style="color:red;">{{ $message }}</span> @enderror </div>
                    </div>
                  </div>
                  
              
                  <div class="col-12">
                    <div class="row">
                      <div class="col-6">
                        <label class="white py-2 mb-2">{{__('Contact Number:')}}</label>
                      </div>
                      <div class="col-6">
                        <input class="form-control mb-2" type="text" name="contact" value="{{old('contact',$user->contact)}}" placeholder="{{__('Contact Number')}}">
                        @error('contact') <span style="color:red;">{{ $message }}</span> @enderror </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-2 line_boder"> <img src=""> </div>
              <div class="col-lg-5">
                <div class="row">
                  <div class="col-6">
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
                    <select name="status" class="form-control mb-2" id="status">
                      <option value="">{{__('Select Status')}}</option>
                      <option value="libertine discotheque club" @if(!empty($user->relUserDetail->status)) @if($user->relUserDetail->status=="libertine discotheque club" ) {{ 'selected' }} @endif @endif>{{__('Libertine discotheque club')}}</option>
                      <option value="sauna club" @if(!empty($user->relUserDetail->status)) @if($user->relUserDetail->status=="sauna club" ) {{ 'selected' }} @endif @endif>{{__('Sauna club')}}</option>
                      <option value="organizer" @if(!empty($user->relUserDetail->status)) @if($user->relUserDetail->status=="organizer" ) {{ 'selected' }} @endif @endif>{{__('Organizer')}}</option>
                      <option value="libertine camping" @if(!empty($user->relUserDetail->status)) @if($user->relUserDetail->status=="libertine camping" ) {{ 'selected' }} @endif @endif>{{__('Libertine camping')}}</option>
                      <option value="erotic writer" @if(!empty($user->relUserDetail->status)) @if($user->relUserDetail->status=="erotic writer" ) {{ 'selected' }} @endif @endif>{{__('Erotic writer')}}</option>
                      <option value="photographer" @if(!empty($user->relUserDetail->status)) @if($user->relUserDetail->status=="photographer" ) {{ 'selected' }} @endif @endif>{{__('Photographer')}}</option>
                      <option value="tattoo artist" @if(!empty($user->relUserDetail->status)) @if($user->relUserDetail->status=="tattoo artist" ) {{ 'selected' }} @endif @endif>{{__('Tattoo artist')}}</option>
                      <option value="erotic photographer" @if(!empty($user->relUserDetail->status)) @if($user->relUserDetail->status=="erotic photographer" ) {{ 'selected' }} @endif @endif>{{__('Erotic photographer')}}</option>
                      <option value="sex shop" @if(!empty($user->relUserDetail->status)) @if($user->relUserDetail->status=="sex shop" ) {{ 'selected' }} @endif @endif>{{__('Sex shop')}}</option>
                      <option value="online sex shop" @if(!empty($user->relUserDetail->status)) @if($user->relUserDetail->status=="online sex shop" ) {{ 'selected' }} @endif @endif>{{__('Online sex shop')}}</option>
                    </select>
                    @error('status') <span style="color:red;">{{ $message }}</span> @enderror
                    <input class="form-control mb-2" type="text" name="address" value="@if(!empty($user->relUserDetail->address)) {{old('address',$user->relUserDetail->address)}} @endif" placeholder="{{__('Address')}}">
                    @error('address') <span style="color:red;">{{ $message }}</span> @enderror
                    <input class="form-control mb-2" type="text" name="zipcode" value="@if(!empty($user->relUserDetail->zipcode)) {{old('zipcode',$user->relUserDetail->zipcode)}} @endif" placeholder="{{__('Zipcode')}}">
                    @error('zipcode') <span style="color:red;">{{ $message }}</span> @enderror
                    
					<select name="country" class="form-control mb-2" id="country" onChange="getCity(this.selectedIndex)">
                      <option value="">{{__('Select Country')}}</option>
                      @if(!empty($countries))
					  @foreach($countries as $country)
					  <option value="{{ $country->id }}" @if(!empty($user->relUserDetail->country)) @if($user->relUserDetail->country==$country->name) {{ 'selected' }} @endif @endif>{{ $country->name }}</option>
					  @endforeach
					  @endif
                    </select>
                    @error('country') <span style="color:red;">{{ $message }}</span> @enderror 
                    <select name="city" class="form-control mb-2" id="city">
                      <option value="">{{__('Select City')}}</option>
                      @if(!empty($cities))
					  @foreach($cities as $city)
					  <option value="{{ $city->name }}" @if(!empty($user->relUserDetail->city)) @if($user->relUserDetail->city==$city->name) {{ 'selected' }} @endif @endif>{{ $city->name }}</option>
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
                            <input type="checkbox" name="club_day[]" class="text-while" value="monday" @if(!empty($user->club_day) && in_array("monday",  explode('|', $user->club_day))) checked @endif> Monday </label>
                            @error('club_day') <span style="color:red;">{{ $message }}</span> @enderror
                      </div>
                      <div class="col-lg-5 col-md-5 col-12">
                        <div class="row">
                            <div class="col-5">  
                                <label class="white py-2 mb-2">Stat Time</label> 
                            </div>    
                            <div class="col-7">    
                                <input class="form-control mb-2" type="time" name="club_start_time[]">
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
                            <input type="checkbox" name="club_day[]" class="text-while" value="tuesday" @if(!empty($user->club_day) && in_array("tuesday",  explode('|', $user->club_day))) checked @endif> Tuesday </label>
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
                            <input type="checkbox" name="club_day[]" class="text-while" value="wednesday" @if(!empty($user->club_day) && in_array("wednesday",  explode('|', $user->club_day))) checked @endif> Wednesday </label>
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
                            <input type="checkbox" name="club_day[]" class="text-while" value="thursday" @if(!empty($user->club_day) && in_array("thursday",  explode('|', $user->club_day))) checked @endif> Thursday </label>
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
                            <input type="checkbox" name="club_day[]" class="text-while" value="friday" @if(!empty($user->club_day) && in_array("friday",  explode('|', $user->club_day))) checked @endif> Friday </label>
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
                            <input type="checkbox" name="club_day[]" class="text-while" value="saturday" @if(!empty($user->club_day) && in_array("saturday",  explode('|', $user->club_day))) checked @endif> Saturday </label>
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
                            <input type="checkbox" name="club_day[]" class="text-while" value="sunday" @if(!empty($user->club_day) && in_array("sunday",  explode('|', $user->club_day))) checked @endif> Sunday </label>
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
            <label class="white ">{{__('About You:')}}</label>
            <textarea class="form-control mb-3" rows="6" type="text" name="about">@if(!empty($user->relUserDetail->about)) {{old('about',$user->relUserDetail->about)}} @endif</textarea>
            <input type="submit" value="{{__('Update Profile')}}" class="mt-3 rounded w-100 text-center bg-standard-violet text-white px-2 py-2 mt-2 mb-2">
          </div>
        </div>
    </form>
    @endif
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
            '_token': "{{csrf_token()}}",
            'country_id': country_id
        };
        // alert(JSON.stringify(queryString));
        $.ajax({
            url: "{{ route('ajax-get-city') }}",
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
@endsection