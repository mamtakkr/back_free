@if($members->count() > 0)
<!--<div class="row h-100 "> -->
    @foreach($members as $member)
    <?php //$user = \App\Models\Blacklist::where(['to_id'=>$member->user_id, 'from_id'=>Auth::user()->id])->first(); ?>
    @if(empty(get_block($member->user_id)))
    <div class="col-lg-4 col-md-6 col-sm-6">
      <div class="coment box_wold mt-3">
        <div class="row">
          <div class="col-3 px-0 ">
            <div class="text-center"> 
            <a href="{{route('member-details',$member->user_id)}}"> 
            @if(!empty($member->image_url)) 
            <img class="rounded-circle" src="{{URL::to('/')}}/public/images/users/{{$member->image_url}}" width="80" height="80"> 
            @else 
            <img class="rounded-circle" src="{{URL::to('/')}}/public/images/no-user.png" width="80" height="80"> 
            @endif 
            </a> 
            </div>
          </div>
          <div class="col-9 heading">
            <h6>{{$member->username}}</h6>
            <p>{{$member->you_are}}</p>
            <p><i class="fa fa-map-marker" aria-hidden="true"></i>
                @if(!empty($member->city)) {{strtoupper($member->city)}} @endif
            </p>
          </div>
          <div class="col-12 px-0 heading">
            <h5 class="mt-1">{{$member->username}}</h5>
            <p class="pragraf"> @if(!empty($member->about))
              <?php
                                $string = $member->about;
                                $string = strip_tags($string);
                                $character_count = strlen($string);
                                ?>
              @if($character_count > 300)
              {!!substr($member->about, 0,300)!!}...
              @else
              {!! $member->about !!}
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
<!--</div>-->
@else
<div class="col-12 mt-4">
  <div class="row h-100 justify-content-center" id="show_members">
    <div class="coment mt-3 rounded">
      <h1 class="text-center text-secondary my-5">{{__('public.No_Member_Found')}}</h1>
    </div>
  </div>
</div>
@endif