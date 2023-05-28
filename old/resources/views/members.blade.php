@extends('layouts.front')

@section('content')
<div class="container">
    
  <form action="#" method="POST" id="search_form" enctype="multipart/form-data">
      @csrf
      <div class="col-12">
        <div class="dropdown resse my-3 py-1 rounded"> <span class="white px-2 ">{{__('Search')}}</span>
          <div class="dropdown-content">
            <div class="row">
              <div class="col-md-3">
                <p class="name2">{{__('You look for')}}</p>
                <input member-count="2" type="checkbox" class="checkd" name="you_are[]" value="{{__('Straight Couples')}}">
                <label class="checkd">{{__('Straight Couples')}}</label>
                <br>
                <input member-count="2" type="checkbox" class="checkd" name="you_are[]" value="{{__('Couples F Bi')}}">
                <label class="checkd">{{__('Couples F Bi')}}</label>
                <br>
                <input member-count="2" type="checkbox" class="checkd" name="you_are[]" value="{{__('Couples H Bi')}}">
                <label class="checkd">{{__('Couples H Bi')}}</label>
                <br>
                <input member-count="2" type="checkbox" class="checkd" name="you_are[]" value="{{__('Couples Bi')}}">
                <label class="checkd">{{__('Couples Bi')}}</label>
                <br>
                <input member-count="2" type="checkbox" class="checkd" name="you_are[]" value="{{__('Straight Women')}}">
                <label class="checkd">{{__('Straight Women')}}</label>
                <br>
                <input member-count="2" type="checkbox" class="checkd" name="you_are[]" value="{{__('Women Bi')}}">
                <label class="checkd">{{__('Women Bi')}}</label>
                <br>
                <input member-count="1" type="checkbox" class="checkd" name="you_are[]" value="{{__('Lesbians')}}">
                <label class="checkd">{{__('Lesbians')}}</label>
                <br>
                <input member-count="1" type="checkbox" class="checkd" name="you_are[]" value="{{__('Straight Hammers')}}">
                <label class="checkd">{{__('Straight Hammers')}}</label>
                <br>
                <input  member-count="1" type="checkbox" class="checkd" name="you_are[]" value="{{__('Mrs. Hammes')}}">
                <label class="checkd">{{__('Mrs. Hammes')}}</label>
                <br>
                <input member-count="1" type="checkbox" class="checkd" name="you_are[]" value="{{__('Gays')}}">
                <label class="checkd">{{__('Gays')}}</label>
                <br>
                <input member-count="1" class="checkd" type="checkbox" class="checkd" name="you_are[]" value="{{__('Transvestites')}}">
                <label class="checkd">{{__('Transvestites')}}</label>
                <br>
                <input member-count="1" type="checkbox" name="you_are[]" value="{{__('Transgender')}}">
                <label class="checkd">{{__('Transgender')}}</label>
                <br>
                <br>
                <p class="name2">{{__('City')}}</p>
                <div class="row">
                  <div class="col-12 pl-0">
                    <!--{{--<select class="form-control mb-2" name="city">-->
                    <!--    <option value="">Select City</option>-->
                    <!--    @foreach($cities as $city)-->
                    <!--    <option value="{{$city->name}}">{{$city->name}}</option>-->
                    <!--    @endforeach-->
                    <!--</select>--}}-->
                    <input type="text" name="city" class="form-control mb-2" value="{{old('city')}}" placeholder="City">
                  </div>
                </div>
                <p class="name2">{{__('Nickname')}}</p>
                <div class="row">
                  <div class="col-12 pl-0">
                    <input type="text" name="username" class="form-control mb-2" value="{{old('username')}}" placeholder="Nickname">
                  </div>
                </div>
              </div>
              <div class="col-md-3">
                <p class="name2">{{__('Who researches')}}</p>
                <input type="checkbox" class="checkd" name="research[]" value="{{__('Straight Couples')}}">
                <label class="checkd">{{__('Straight Couples')}}</label>
                <br>
                <input type="checkbox" class="checkd" name="research[]" value="{{__('Couples F Bi')}}">
                <label class="checkd">{{__('Couples F Bi')}}</label>
                <br>
                <input type="checkbox" class="checkd" name="research[]" value="{{__('Couples H Bi')}}">
                <label class="checkd">{{__('Couples H Bi')}}</label>
                <br>
                <input type="checkbox" class="checkd" name="research[]" value="{{__('Couples Bi')}}">
                <label class="checkd">{{__('Couples Bi')}}</label>
                <br>
                <input type="checkbox" class="checkd" name="research[]" value="{{__('Straight Women')}}">
                <label class="checkd">{{__('Straight Women')}}</label>
                <br>
                <input type="checkbox" class="checkd" name="research[]" value="{{__('Women Bi')}}">
                <label class="checkd">{{__('Women Bi')}}</label>
                <br>
                <input type="checkbox" class="checkd" name="research[]" value="{{__('Lesbians')}}">
                <label class="checkd">{{__('Lesbians')}}</label>
                <br>
                <input type="checkbox" class="checkd" name="research[]" value="{{__('Straight Hammers')}}">
                <label class="checkd">{{__('Straight Hammers')}}</label>
                <br>
                <input type="checkbox" class="checkd" name="research[]" value="{{__('Mrs. Hammes')}}">
                <label class="checkd">{{__('Mrs. Hammes')}}</label>
                <br>
                <input type="checkbox" class="checkd" name="research[]" value="{{__('Gays')}}">
                <label class="checkd">{{__('Gays')}}</label>
                <br>
                <input type="checkbox" class="checkd" name="research[]" value="{{__('Transvestites')}}">
                <label class="checkd">{{__('Transvestites')}}</label>
                <br>
                <input type="checkbox" class="checkd" name="research[]" value="{{__('Transgender')}}">
                <label class="checkd">{{__('Transgender')}}</label>
                <br>
                <br>
              </div>
              <div class="col-md-3">
                <p class="name2">{{__('Age (He)')}}</p>
                <div class="row">
                  <div class="col-12 pl-0">
                    <input class="form-control mb-2" type="text" name="age" placeholder="Age" value="{{old('age')}}">
                  </div>
                </div>
                <p class="name2">{{__('Size (He)')}}</p>
                <div class="row">
                  <div class="col-12 pl-0">
                    <input class="form-control mb-2" type="text" name="size" placeholder="Size" value="{{old('size')}}">
                  </div>
                </div>
                <br>
                <p class="name2">{{__('Sillhouette (He)')}}</p>
                <input type="checkbox" class="checkd" name="sillhouette[]" value="{{__('Thin')}}">
                <label class="checkd">{{__('Thin')}}</label>
                <br>
                <input type="checkbox" class="checkd" name="sillhouette[]" value="{{__('Athletic')}}">
                <label class="checkd">{{__('Athletic')}}</label>
                <br>
                <input type="checkbox" class="checkd" name="sillhouette[]" value="{{__('Normal')}}">
                <label class="checkd">{{__('Normal')}}</label>
                <br>
                <input type="checkbox" class="checkd" name="sillhouette[]" value="{{__('Some roundness')}}">
                <label class="checkd">{{__('Some roundness')}}</label>
                <br>
                <input type="checkbox" class="checkd" name="sillhouette[]" value="{{__('Round')}}">
                <label class="checkd">{{__('Round')}}</label>
                <br>
                <input type="checkbox" class="checkd" name="sillhouette[]" value="{{__('I keep it for myself')}}">
                <label class="checkd">{{__('I keep it for myself')}}</label>
                <br>
                <br>
                <p class="name2">{{__('Origin (He)')}}</p>
                <select class="form-control mb-2" name="origin">
                    <option value="">Select Origin</option>
                    @foreach($origins as $row)
                    <option value="{{$row->name}}">{{$row->name}}</option>
                    @endforeach
                </select>
                <br>
                <br>
              </div>
              <div class="col-md-3">
                <p class="name2">{{__('Age (She)')}}</p>
                <div class="row">
                  <div class="col-12 pl-0">
                    <input class="form-control mb-2" type="text" name="age_couple" placeholder="Age" value="{{old('age_couple')}}">
                  </div>
                </div>
                <p class="name2">{{__('Size (She)')}}</p>
                <div class="row">
                  <div class="col-12 pl-0">
                    <input class="form-control mb-2" type="text" name="size_couple" placeholder="Size" value="{{old('size')}}">
                  </div>
                </div>
                <br>
                <p class="name2">{{__('Sillhouette (She)')}}</p>
                <input type="checkbox" class="checkd" name="sillhouette_couple[]" value="{{__('Thin')}}">
                <label class="checkd">{{__('Thin')}}</label>
                <br>
                <input type="checkbox" class="checkd" name="sillhouette_couple[]" value="{{__('Athletic')}}">
                <label class="checkd">{{__('Athletic')}}</label>
                <br>
                <input type="checkbox" class="checkd" name="sillhouette_couple[]" value="{{__('Normal')}}">
                <label class="checkd">{{__('Normal')}}</label>
                <br>
                <input type="checkbox" class="checkd" name="sillhouette_couple[]" value="{{__('Some roundness')}}">
                <label class="checkd">{{__('Some roundness')}}</label>
                <br>
                <input type="checkbox" class="checkd" name="sillhouette_couple[]" value="{{__('Round')}}">
                <label class="checkd">{{__('Round')}}</label>
                <br>
                <input type="checkbox" class="checkd" name="sillhouette_couple[]" value="{{__('I keep it for myself')}}">
                <label class="checkd">{{__('I keep it for myself')}}</label>
                <br>
                <br>
                <p class="name2">{{__('Origin (She)')}}</p>
                <select class="form-control mb-2" name="origin_couple">
                    <option value="">Select Origin</option>
                    @foreach($origins as $row_co)
                    <option value="{{$row_co->name}}">{{$row_co->name}}</option>
                    @endforeach
                </select>
                <br>
                <button type="submit" id="search_btn" class="border-white border bg-standard-white w-100  text-center text-dark  base-radius px-2 py-2 mr-2">Search</button>
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
                @if(!empty($member->relUserDetail->city)) {{strtoupper($member->relUserDetail->city)}} @endif
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
              <p>like</p>
            </li>
            <li>
              <p>{{$member->total_followers}}</p>
              <p>followers</p>
            </li>
          </ul>
        </div>
      </div>
    </div>
    @endif
    @endforeach
    </div>
</div>

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
		  	//alert(JSON.stringify(response));
			$("#show_members").html(response);
			$("#search_btn").text('Search');
          },
		  error: function(err)
		  {
		  //alert(JSON.stringify(err));
		  }
        });
        
      });
	  
	}); 
</script>
@endsection