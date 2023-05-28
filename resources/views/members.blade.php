@extends('layouts.front')

@section('content')
<div class="container">
    
  <form action="#" method="POST" id="search_form" enctype="multipart/form-data">
      @csrf
      
      <div class="col-12">
        <div class=" new_tab4 dropdown resse my-3 py-1 rounded" > <span class="white px-2 ">{{__('public.Search')}}</span>
          <div class="dropdown-content" id="new_down">
               
            <div class="row">
               
              <div class="col-md-3">
                <p class="name2">{{__('public.You_look_for')}}</p>
                <input member-count="2" type="checkbox" class="checkd" name="you_are[]" value="{{__('Straight Couples')}}">
                <label class="checkd">{{__('public.Straight_Couples')}}</label>
                <br>
                <input member-count="2" type="checkbox" class="checkd" name="you_are[]" value="{{__('Couples F Bi')}}">
                <label class="checkd">{{__('public.Couples_F_Bi')}}</label>
                <br>
                <input member-count="2" type="checkbox" class="checkd" name="you_are[]" value="{{__('Couples H Bi')}}">
                <label class="checkd">{{__('public.Couples_H_Bi')}}</label>
                <br>
                <input member-count="2" type="checkbox" class="checkd" name="you_are[]" value="{{__('Couples Bi')}}">
                <label class="checkd">{{__('public.Couples_Bi')}}</label>
                <br>
                <input member-count="2" type="checkbox" class="checkd" name="you_are[]" value="{{__('Straight Women')}}">
                <label class="checkd">{{__('public.Straight_Women')}}</label>
                <br>
                <input member-count="2" type="checkbox" class="checkd" name="you_are[]" value="{{__('Women Bi')}}">
                <label class="checkd">{{__('public.Women_Bi')}}</label>
                <br>
                <input member-count="1" type="checkbox" class="checkd" name="you_are[]" value="{{__('Lesbians')}}">
                <label class="checkd">{{__('public.Lesbians')}}</label>
                <br>
                <input member-count="1" type="checkbox" class="checkd" name="you_are[]" value="{{__('Straight Hammers')}}">
                <label class="checkd">{{__('public.Straight_Hammers')}}</label>
                <br>
                <input  member-count="1" type="checkbox" class="checkd" name="you_are[]" value="{{__('Mrs. Hammes')}}">
                <label class="checkd">{{__('public.Mrs_Hammes')}}</label>
                <br>
                <input member-count="1" type="checkbox" class="checkd" name="you_are[]" value="{{__('Gays')}}">
                <label class="checkd">{{__('public.Gays')}}</label>
                <br>
                <input member-count="1" class="checkd" type="checkbox" class="checkd" name="you_are[]" value="{{__('Transvestites')}}">
                <label class="checkd">{{__('public.Transvestites')}}</label>
                <br>
                <input member-count="1" type="checkbox" name="you_are[]" value="{{__('Transgender')}}">
                <label class="checkd">{{__('public.Transgender')}}</label>
                <br>
                <br>
                <p class="name2">{{__('public.City')}}</p>
                <div class="row">
                  <div class="col-12 pl-0">
                      
                    <select name="country" class="form-control mb-2" id="country" onChange="getCity(this.selectedIndex)">
                      <option value="">{{__('public.Select_Country')}}</option>
                      @if(!empty($countries))
					  @foreach($countries as $country)
					  <option value="{{ $country->id }}" @if(old('country')==$country->id) {{ 'selected' }} @endif>{{ $country->name }}</option>
					  @endforeach
					  @endif
                    </select>
                    <!--<input type="text" name="city" class="form-control mb-2" value="{{old('city')}}" placeholder="{{__('public.City')}}">-->
                    <select name="city" class="form-control mb-2" id="city">
                      <option value="">{{__('public.Select_City')}}</option>
                    </select>
                    <span class="help-block" id="cityError"></span> 
                  </div>
                </div>
                <p class="name2">{{__('public.Nickname')}}</p>
                <div class="row">
                  <div class="col-12 pl-0">
                    <input type="text" name="username" class="form-control mb-2" value="{{old('username')}}" placeholder="{{__('public.Nickname')}}">
                  </div>
                </div>
              </div>
              <div class="col-md-3">
                <p class="name2">{{__('public.Who_researches')}}</p>
                <input type="checkbox" class="checkd" name="research[]" value="{{__('Straight Couples')}}">
                <label class="checkd">{{__('public.Straight_Couples')}}</label>
                <br>
                <input type="checkbox" class="checkd" name="research[]" value="{{__('Couples F Bi')}}">
                <label class="checkd">{{__('public.Couples_F_Bi')}}</label>
                <br>
                <input type="checkbox" class="checkd" name="research[]" value="{{__('Couples H Bi')}}">
                <label class="checkd">{{__('public.Couples_H_Bi')}}</label>
                <br>
                <input type="checkbox" class="checkd" name="research[]" value="{{__('Couples Bi')}}">
                <label class="checkd">{{__('public.Couples_Bi')}}</label>
                <br>
                <input type="checkbox" class="checkd" name="research[]" value="{{__('Straight Women')}}">
                <label class="checkd">{{__('public.Straight_Women')}}</label>
                <br>
                <input type="checkbox" class="checkd" name="research[]" value="{{__('Women Bi')}}">
                <label class="checkd">{{__('public.Women_Bi')}}</label>
                <br>
                <input type="checkbox" class="checkd" name="research[]" value="{{__('Lesbians')}}">
                <label class="checkd">{{__('public.Lesbians')}}</label>
                <br>
                <input type="checkbox" class="checkd" name="research[]" value="{{__('Straight Hammers')}}">
                <label class="checkd">{{__('public.Straight_Hammers')}}</label>
                <br>
                <input type="checkbox" class="checkd" name="research[]" value="{{__('Mrs. Hammes')}}">
                <label class="checkd">{{__('public.Mrs_Hammes')}}</label>
                <br>
                <input type="checkbox" class="checkd" name="research[]" value="{{__('Gays')}}">
                <label class="checkd">{{__('public.Gays')}}</label>
                <br>
                <input type="checkbox" class="checkd" name="research[]" value="{{__('Transvestites')}}">
                <label class="checkd">{{__('public.Transvestites')}}</label>
                <br>
                <input type="checkbox" class="checkd" name="research[]" value="{{__('Transgender')}}">
                <label class="checkd">{{__('public.Transgender')}}</label>
                <br>
                <br>
              </div>
              <div class="col-md-3">
                <p class="name2">{{__('public.age_he')}}</p>
                <div class="row">
                  <div class="col-12 pl-0">
                    <input class="form-control mb-2" type="text" name="age" placeholder="{{__('public.age_he')}}" value="{{old('age')}}">
                  </div>
                </div>
                <p class="name2">{{__('public.Size_he')}}</p>
                <div class="row">
                  <div class="col-12 pl-0">
                    <input class="form-control mb-2" type="text" name="size" placeholder="{{__('public.Size_he')}}" value="{{old('size')}}">
                  </div>
                </div>
                <br>
                <p class="name2">{{__('public.Sillhouette_he')}}</p>
                <input type="checkbox" class="checkd" name="sillhouette[]" value="{{__('Thin')}}">
                <label class="checkd">{{__('public.Thin')}}</label>
                <br>
                <input type="checkbox" class="checkd" name="sillhouette[]" value="{{__('Athletic')}}">
                <label class="checkd">{{__('public.Athletic')}}</label>
                <br>
                <input type="checkbox" class="checkd" name="sillhouette[]" value="{{__('Normal')}}">
                <label class="checkd">{{__('public.Normal')}}</label>
                <br>
                <input type="checkbox" class="checkd" name="sillhouette[]" value="{{__('Some roundness')}}">
                <label class="checkd">{{__('public.Some_roundness')}}</label>
                <br>
                <input type="checkbox" class="checkd" name="sillhouette[]" value="{{__('Round')}}">
                <label class="checkd">{{__('public.Round')}}</label>
                <br>
                <input type="checkbox" class="checkd" name="sillhouette[]" value="{{__('I keep it for myself')}}">
                <label class="checkd">{{__('public.I_keep_it_for_myself')}}</label>
                <br>
                <br>
                <p class="name2">{{__('public.Origin_he')}}</p>
                <select class="form-control mb-2" name="origin">
                    <option value="">{{__('public.Select_Origin')}}</option>
                    @foreach($origins as $row)
                    <option value="{{$row->name}}">{{$row->name}}</option>
                    @endforeach
                </select>
                <br>
                <br>
              </div>
              <div class="col-md-3">
                <p class="name2">{{__('public.Age_she')}}</p>
                <div class="row">
                  <div class="col-12 pl-0">
                    <input class="form-control mb-2" type="text" name="age_couple" placeholder="{{__('public.Age_she')}}" value="{{old('age_couple')}}">
                  </div>
                </div>
                <p class="name2">{{__('public.Size_she')}}</p>
                <div class="row">
                  <div class="col-12 pl-0">
                    <input class="form-control mb-2" type="text" name="size_couple" placeholder="{{__('public.Size_she')}}" value="{{old('size')}}">
                  </div>
                </div>
                <br>
                <p class="name2">{{__('public.Sillhouette_she')}}</p>
                <input type="checkbox" class="checkd" name="sillhouette_couple[]" value="{{__('Thin')}}">
                <label class="checkd">{{__('public.Thin')}}</label>
                <br>
                <input type="checkbox" class="checkd" name="sillhouette_couple[]" value="{{__('Athletic')}}">
                <label class="checkd">{{__('public.Athletic')}}</label>
                <br>
                <input type="checkbox" class="checkd" name="sillhouette_couple[]" value="{{__('Normal')}}">
                <label class="checkd">{{__('public.Normal')}}</label>
                <br>
                <input type="checkbox" class="checkd" name="sillhouette_couple[]" value="{{__('Some roundness')}}">
                <label class="checkd">{{__('public.Some_roundness')}}</label>
                <br>
                <input type="checkbox" class="checkd" name="sillhouette_couple[]" value="{{__('Round')}}">
                <label class="checkd">{{__('public.Round')}}</label>
                <br>
                <input type="checkbox" class="checkd" name="sillhouette_couple[]" value="{{__('I keep it for myself')}}">
                <label class="checkd">{{__('public.I_keep_it_for_myself')}}</label>
                <br>
                <br>
                <p class="name2">{{__('public.Origin_she')}}</p>
                <select class="form-control mb-2" name="origin_couple">
                    <option value="">{{__('public.Select_Origin')}}</option>
                    @foreach($origins as $row_co)
                    <option value="{{$row_co->name}}">{{$row_co->name}}</option>
                    @endforeach
                </select>
                <br>
                <button type="submit" id="search_btn" class="border-white border bg-standard-white w-100  text-center text-dark  base-radius px-2 py-2 mr-2">{{__('public.Search')}}</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </form>
  <div class="row h-100 " id="show_members"> 
  @foreach($members as $member)
  <?php //$user = \App\Models\Blacklist::where(['to_id'=>$member->id, 'from_id'=>Auth::user()->id])->first(); ?>
  @if(empty(get_block($member->id)))
    <div class="col-lg-4 col-md-6 col-sm-6">
      <div class="coment box_wold mt-3">
        <div class="row">
          <div class="col-3 px-0 ">
            <div class="text-center"> 
                <div class="@if($member->online=='1') img_status_online @else img_status_offline @endif text-center">
                <a href="{{route('member-details',$member->id)}}"> 
                    @if(!empty($member->image_url)) 
                        <img class="rounded-circle" src="{{URL::to('/')}}/public/images/users/{{$member->image_url}}" width="80" height="80"> 
                    @else 
                        <img class="rounded-circle" src="{{URL::to('/')}}/public/images/no-user.png" width="80" height="80"> 
                    @endif 
                </a> 
                </div>
            </div>
          </div>
          <div class="col-9 heading">
            <h6>{{$member->username}}</h6>
            <p>{{$member->you_are}}</p>
            <p><i class="fa fa-map-marker" aria-hidden="true"></i>
                @if(!empty($member->relUserDetail->city) && !empty($member->relUserDetail->country)) 
                    {{strtoupper($member->relUserDetail->city)}} 
                @else
                    {{strtoupper($member->relUserDetail->country)}} 
                @endif
            </p>
          </div>
          <div class="col-12 px-0 heading">
            <h5 class="mt-1">{{$member->username}}</h5>
            <p class="pragraf"> @if(!empty($member->relUserDetail->about))
              <?php
                                $string = $member->relUserDetail->about;
                                $string = strip_tags($string);
                                $character_count = strlen($string);
                                ?>
              @if($character_count > 300)
              {!!substr($member->relUserDetail->about, 0,300)!!}...
              @else
              {!! $member->relUserDetail->about !!}
              @endif
              @endif </p>
          </div>
          <ul class="like">
            <li class="pl-0">
              <p>{{$member->total_likes}}</p>
              <p>{{__('public.Like')}}</p>
            </li>
            <li>
              <p>{{$member->total_followers}}</p>
              <p>{{__('public.Followers')}}</p>
            </li>
          </ul>
        </div>
      </div>
    </div>
    @endif
    @endforeach
    </div>
</div>

// <script>
// $(document).ready(function(){
//   $(".new_tab4").click(function(){
//   $("#new_down").slideToggle();
//   });
// });
// </script>


<script>
$(function() {
      
	  $("#search_form").submit(function(e) {
        e.preventDefault();
        const fd = new FormData(this);
        $("#search_btn").text('Searching...');
        $.ajax({
          url: '{{ route('member-search') }}',
          method: 'post',
          data: fd,
          cache: false,
          contentType: false,
          processData: false,
          dataType: 'json',
          success: function(response) {
            if (response.status == 401) {
				jQuery.each(response.errors, function(key, value){
							//alert(key);
                  			//jQuery('.alert-danger').show();
                  			//jQuery('.alert-danger').append('<li>'+value+'</li>');
							jQuery('#'+key+'Error').text(value);
                  		});
                $("#search_btn").text("{{__('public.Search')}}");
                // $("#event_form")[0].reset(); 
            }
		  	//alert(JSON.stringify(response));
			$("#show_members").html(response);
			$("#search_btn").text("{{__('public.Search')}}");
          },
		  error: function(err)
		  {
		  //alert(JSON.stringify(err));
		  }
        });
        
      });
	  
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
                var html = "<option value=''>{{__('public.Select_one')}}</option>";
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
@endsection