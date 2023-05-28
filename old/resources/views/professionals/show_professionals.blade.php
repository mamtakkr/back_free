@if($professionals->count()>0)
@foreach($professionals as $pro)
<div class="col-lg-3 col-md-6 col-sm-6">	
    <a href="{{route('professional-details',$pro->user_id)}}">
	<div class="coment mt-3 new_profie">
		<div class="row">
			<div class="col-12 px-0 ">
					<div class="text-center">
						<a href="{{route('professional-details',$pro->user_id)}}"> 
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
				    @if(!empty($pro->city)) {{strtoupper($pro->city)}} @endif
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
      <h1 class="text-center text-secondary my-5">No Professional Found In The Record!</h1>
    </div>
  </div>
</div>
@endif

