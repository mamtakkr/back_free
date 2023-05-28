@extends('layouts.front')

@section('content')
<div class="container">
    	
    <form action="#" method="POST" id="search_form" enctype="multipart/form-data">
      @csrf	
	<div class="col-12">
        <div class="new_tab5 dropdown resse my-3 py-1 rounded"> <span class="white px-2 ">{{__('public.Search')}}</span>
          <div class="dropdown-content" id="new_pofessionals_down">
            <div class="row">
              <div class="col-md-4">
                <p class="name2">{{__('public.Status')}}</p>
                <input member-count="2" type="checkbox" class="checkd" name="status[]" value="{{__('libertine discotheque club')}}">
                <label class="checkd">{{__('public.Libertine_discotheque_club')}}</label>
                <br>                            
                <input member-count="2" type="checkbox" class="checkd" name="status[]" value="{{__('sauna club')}}">
                <label class="checkd">{{__('public.Sauna_club')}}</label>
                <br>
                <input member-count="2" type="checkbox" class="checkd" name="status[]" value="{{__('organizer')}}">
                <label class="checkd">{{__('public.Organizer')}}</label>
                <br>
                <input member-count="2" type="checkbox" class="checkd" name="status[]" value="{{__('libertine camping')}}">
                <label class="checkd">{{__('public.Libertine_camping')}}</label>
                <br>
                <input member-count="2" type="checkbox" class="checkd" name="status[]" value="{{__('erotic writer')}}">
                <label class="checkd">{{__('public.Erotic_writer')}}</label>
            </div>    
            <div class="col-md-4"> 
                <p class="status_2" style="visibility: hidden;">{{__('public.Status')}}</p>
                <input member-count="2" type="checkbox" class="checkd" name="status[]" value="{{__('photographer')}}">
                <label class="checkd">{{__('public.Photographer')}}</label>
                <br>
                <input member-count="1" type="checkbox" class="checkd" name="status[]" value="{{__('tattoo artist')}}">
                <label class="checkd">{{__('public.Tattoo_artist')}}</label>
                <br>
                <input member-count="1" type="checkbox" class="checkd" name="status[]" value="{{__('erotic photographer')}}">
                <label class="checkd">{{__('public.Erotic_photographer')}}</label>
                <br>
                <input  member-count="1" type="checkbox" class="checkd" name="status[]" value="{{__('sex shop')}}">
                <label class="checkd">{{__('public.Sex_shop')}}</label>
                <br>
                <input member-count="1" type="checkbox" class="checkd" name="status[]" value="{{__('public.Online_sex_shop')}}">
                <label class="checkd">{{__('public.Online_sex_shop')}}</label>
                <br>
              </div>
              <div class="col-md-4">
                  
                <div class="row">
                    <div class="col-6 pl-0">
                        <p class="name2">{{__('public.Club_Name')}}</p>
                        <input type="text" class="form-control" name="club_name" placeholder="{{__('public.Club_Name')}}" value="{{old('club_name')}}">
                    </div>
                    <div class="col-6 pr-0">
                        <p class="name2">{{__('public.Zipcode')}}</p>
                         <input type="text" class="form-control" name="zipcode" placeholder="{{__('public.Zipcode')}}" value="{{old('zipcode')}}">
                    </div>     
                </div>  
                <br>  
                <p class="name2">{{__('public.City')}}</p>
                <!--{{--<select class="form-control mb-2" name="city">-->
                <!--    <option value="">Select City</option>-->
                <!--    @foreach($cities as $city)-->
                <!--    <option value="{{$city->name}}">{{$city->name}}</option>-->
                <!--    @endforeach-->
                <!--</select>--}}-->
                <input type="text" name="city" class="form-control mb-2" value="{{old('city')}}" placeholder="{{__('public.City')}}">
                
                <br>
                <button type="submit" id="search_btn" class="border-white border bg-standard-white w-100 text-center text-dark  base-radius px-2 py-2 mr-2">{{__('public.Search')}}</button>
              </div>
            </div>
          </div>
        </div>
      </div>
      </form>
				
			<div class="row h-100 text-center" id="show_professionals">
			    @if($professionals->count()>0)
			    @foreach($professionals as $pro)
				<div class="col-lg-3 col-md-6 col-sm-6">	
				    <a href="Professional_edit.html">
					<div class="coment mt-3 new_profie">
						<div class="row">
							<div class="col-12 px-0 ">
									<div class="text-center">
										<!--<img class="rounded-circle" src="imgs/profilwe.png" width="80" height="80">-->
										<a href="{{route('professional-details',$pro->id)}}"> 
                                        @if(!empty($pro->image_url)) 
                                        <img class="rounded-circle" src="{{URL::to('/')}}/public/images/users/{{$pro->image_url}}" width="80" height="80"> 
                                        @else 
                                        <img class="rounded-circle" src="{{URL::to('/')}}/public/images/no-user.png" width="80" height="80"> 
                                        @endif 
                                        </a>
									</div>
									<h5>{{$pro->username}}</h5>
							</div>
							
							<div class="col-12 px-0 heading" >
								
								<p>{{$pro->club_name}}</p>
								<p><i class="fa fa-map-marker" aria-hidden="true"></i>
								    @if(!empty($pro->relUserDetail->city) && !empty($pro->relUserDetail->country)) 
								        {{strtoupper($pro->relUserDetail->city)}} 
								    @else
								        {{strtoupper($pro->relUserDetail->country)}} 
								    @endif
								</p>
							</div>
						</div>
					</div>
					</a>
				</div>
				@endforeach
				@else
                <div class="col-12 mt-4">
                  <div class="row h-100 justify-content-center" id="show_professionals">
                    <div class="coment mt-3 rounded">
                      <h1 class="text-center text-secondary my-5">{{__('public.No_Professional_Found')}}</h1>
                    </div>
                  </div>
                </div>
				@endif
				

			</div>
		</div>

<script>
$(document).ready(function(){
  $(".new_tab5").click(function(){
  $("#new_pofessionals_down").slideToggle();
  });
});
</script>

		
<script>
$(function() {
      
	  $("#search_form").submit(function(e) {
        e.preventDefault();
        const fd = new FormData(this);
        $("#search_btn").text('Searching...');
        $.ajax({
          url: '{{ route('professional-search') }}',
          method: 'post',
          data: fd,
          cache: false,
          contentType: false,
          processData: false,
          dataType: 'json',
          success: function(response) {
		  	//alert(JSON.stringify(response));
			$("#show_professionals").html(response);
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