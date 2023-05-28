<!-- Modal Header -->
      
        <button type="button" class="close" data-dismiss="modal">&times;</button>

<div class="row h-100 justify-content-center "> 
    <div class="col-lg-12 col-md-12 col-sm-12">
      <div class="coment box_wold mt-3">
        <div class="row">
          <div class="col-3 px-0 ">
            <div class="text-center"> 
            
            @if(!empty($user->image_url)) 
            <img class="rounded-circle" src="{{URL::to('/')}}/public/images/users/{{$user->image_url}}" width="80" height="80"> 
            @else 
            <img class="rounded-circle" src="{{URL::to('/')}}/public/images/no-user.png" width="80" height="80"> 
            @endif 
            
            </div>
          </div>
          <div class="col-9 heading">
            <h6>{{$user->username}}</h6>
            <p>{{$user->you_are}}</p>
            <p><i class="fa fa-map-marker" aria-hidden="true"></i>
                @if(!empty($user->relUserDetail->city)) {{strtoupper($user->relUserDetail->city)}} @endif
            </p>
          </div>
          <div class="col-12 px-0 heading">
            <h5 class="mt-1">{{$user->username}}</h5>
            <p class="pragraf"> @if(!empty($user->relUserDetail->about))
              <?php
                                $string = $user->relUserDetail->about;
                                $string = strip_tags($string);
                                $character_count = strlen($string);
                                ?>
              @if($character_count > 300)
              {!!substr($user->relUserDetail->about, 0,300)!!}...
              @else
              {!! $user->relUserDetail->about !!}
              @endif
              @endif </p>
          </div>
          
            <div class="col-12">
                 <div class="row">
                    <div class="col-md-6"> 
                        <ul class="like">
                            <li class="pl-0">
                              <p>{{$user->total_likes}}</p>
                              <p>{{__('public.Like')}}</p>
                            </li>
                            <li>
                              <p>{{$user->total_followers}}</p>
                              <p>{{__('public.Followers')}}</p>
                            </li>
                          </ul>
                    </div>   
                    @if($participate->relEvent->user_id==Auth::user()->id)
                      <div class="col-md-6 col-sm-6 col-12 text-right">
                    	 <div class="new_button_accept">
                    	     @if($participate->status!='pending')
                    	        @if($participate->status=='rejected')
                                <button type="submit" class="mt-3 rounded bg-standard-violet text-white  px-2 py-2">
                                {{__('public.Rejected')}}
                                </button>
                                @else
                                <button type="submit" class="mt-3 rounded bg-standard-violet text-white  px-2 py-2">
                                {{__('public.Accepted')}}
                                </button>
                                @endif
                    		 @else
                    		    @if($participate->status=='pending' || $participate->status=='rejected')
                                <form action="#" method="POST" id="add_accept_form" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="event_id" value="{{$participate->event_id}}">
                                    <input type="hidden" name="participate_from" value="{{$participate->participate_from}}">
                                    <button type="submit" id="add_accept_btn" class="mt-3 rounded bg-standard-violet text-white  px-2 py-2">
                                    {{__('public.Accept')}}
                                    </button>
                                </form>
                                @else
                                <button type="submit" class="mt-3 rounded bg-standard-violet text-white  px-2 py-2">
                                {{__('public.Accepted')}}
                                </button>
                                @endif
                    		    
                    		    
                    		    
                    		    @if($participate->status=='pending' || $participate->status=='accepted')
                                <form action="#" method="POST" id="add_reject_form" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="event_id" value="{{$participate->event_id}}">
                                    <input type="hidden" name="participate_from" value="{{$participate->participate_from}}">
                                    <button type="submit" id="add_reject_btn" class="mt-3 rounded bg-standard-violet text-white  px-2 py-2">
                                    {{__('public.Reject')}}
                                    </button>
                                </form>
                                @else
                                <button type="submit" class="mt-3 rounded bg-standard-violet text-white  px-2 py-2">
                                {{__('public.Rejected')}}
                                </button>
                                @endif
                            @endif
                    		    
                    		    
                    		    
                    	 </div>   
                    </div>
                    @endif
                </div> 
            </div>
        
        </div>
      </div>
    </div>
    </div>
    
    
    <script>
        
    $(function() {
        $("#add_accept_form").submit(function(e) {
            e.preventDefault();
            const fd = new FormData(this);
            $.ajax({
                url: '{{ route('accept-store') }}',
                method: 'post',
                data: fd,
                cache: false,
                contentType: false,
                processData: false,
                dataType: 'json',
                success: function(response) {
                    if (response.status == 200) {
                        $("#add_accept_btn").text("{{ __('public.Accepted') }}");
                        document.getElementById("add_accept_btn").disabled=true;
                        document.getElementById("add_reject_btn").style.visibility = 'hidden';
                        $("#add_accept_form")[0].reset();
                    }
                    
                    if (response.status == 400) {
                        $("#add_accept_btn").text("{{ __('public.Limit_Exceeded') }}");
                        document.getElementById("add_accept_btn").disabled=true;
                        document.getElementById("add_reject_btn").style.visibility = 'hidden';
                        $("#add_accept_form")[0].reset();
                    }
                }
            });
        });
        
        $("#add_reject_form").submit(function(e) {
            e.preventDefault();
            const fd = new FormData(this);
            $.ajax({
                url: '{{ route('reject-store') }}',
                method: 'post',
                data: fd,
                cache: false,
                contentType: false,
                processData: false,
                dataType: 'json',
                success: function(response) {
                    if (response.status == 200) {
                        $("#add_reject_btn").text("{{ __('public.Rejected') }}");
                        document.getElementById("add_reject_btn").disabled=true;
                        document.getElementById("add_accept_btn").style.visibility = 'hidden';

                        $("#add_reject_form")[0].reset();
                    }
                }
            });
        });
        
    });
    </script>