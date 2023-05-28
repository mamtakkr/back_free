@extends('layouts.front')

@section('content')
<div class="container ">
  <div class="row h-100 "> 
  @foreach($visits as $visit)
  @if(empty(get_block($visit->who_visit)))
    @php $userInfo = \App\Models\UserDetail::where('user_id',$visit->who_visit)->first(); @endphp
    
    <div class="col-lg-4 col-md-6 col-sm-6">
      <div class="coment box_wold mt-3">
        <div class="row">
          <div class="col-3 px-0 ">
            <div class="text-center"> 
            @if(!empty($visit->userDetails->id))
            <a href="{{route('member-details',$visit->userDetails->id)}}"> 
                @if(!empty($visit->userDetails->image_url)) 
                <img class="rounded-circle" src="{{URL::to('/')}}/public/images/users/{{$visit->userDetails->image_url}}" width="80" height="80"> 
                @else 
                <img class="rounded-circle" src="{{URL::to('/')}}/public/images/no-user.png" width="80" height="80"> 
                @endif 
            </a> 
            @endif
            </div>
          </div>
          <div class="col-9 heading">
            <h6>@if(!empty($visit->userDetails->username)) {{$visit->userDetails->username}} @endif</h6>
            <!--<p> complues heterous</p>-->
            <p><i class="fa fa-map-marker" aria-hidden="true"></i>
                @if(!empty($userInfo->city)) {{strtoupper($userInfo->city)}} @endif
            </p>
          </div>
          <div class="col-12 px-0 heading">
            <h5 class="mt-1">@if(!empty($visit->userDetails->username)) {{$visit->userDetails->username}} @endif</h5>
            <p class="pragraf"> @if(!empty($userInfo->about))
              <?php
                                $string = $userInfo->about;
                                $string = strip_tags($string);
                                $character_count = strlen($string);
                                ?>
              @if($character_count > 300)
              {!!substr($userInfo->about, 0,300)!!}...
              @else
              {!! $userInfo->about !!}
              @endif
              @endif </p>
			  
			  
			 <center><a href="javascript:;" class="btn btn-empty btn-pink">{{ date('d M Y h:i A',strtotime($visit->created_at)) }}</a></center>
			  
			  
          </div>
        </div>
      </div>
    </div>
    @endif
    @endforeach </div>
</div>
@endsection