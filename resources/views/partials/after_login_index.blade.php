<div class="container ">
  
  <div class="row h-100 justify-content-center">
      
    
    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 login-area pt-2 pb-3">
     <div class="heading text-center pt-2">
        <h4>{{__('public.New_Member')}}</h4>
     </div>     
      <div class="owl-carousel owl-theme"> 
        @foreach($members as $member)
        @if(empty(get_block($member->id)))
            <a href="{{route('member-details',$member->id)}}">
                <div class="item"> 
                  <div class="fsesd">
                    <div class="usdsd"> 
                        @if(!empty($member->image_url)) 
                            <img src="{{URL::to('/')}}/public/images/users/{{$member->image_url}}"> 
                        @else 
                            <img src="{{URL::to('/')}}/public/images/no-user.png"> 
                        @endif 
                    </div>
                    <div class="text_t">
                      <h5> {{$member->username}} </h5>
                    </div>
                  </div>
                </div>
            </a>
        @endif
        @endforeach 
      </div>
    </div>
    
     <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 login-area pt-2 pb-3">
     <div class="heading text-center pt-2">
        <h4>{{__('public.New_Event')}}</h4>
     </div>    
      <div class="owl-carousel owl-theme"> 
        @foreach($events as $event)
        <a href="{{route('event-details',$event->id)}}">
            <div class="item"> 
              <div class="fsesd">
                <div class="usdsd"> 
                    @if(!empty($event->banner)) 
                    <img src="{{URL::to('/')}}/public/images/events/{{$event->banner}}"> 
                    @else 
                    <img src="{{URL::to('/')}}/public/images/default.jpg"> 
                    @endif
                </div>
                <div class="text_t">
                  <h5> {{$event->title}} </h5>
                </div>
              </div>
            </div>
        </a>
        @endforeach 
      </div>
    </div>
  </div>
</div>
<div class="container">
  <div class="row h-100 justify-content-center">
    <div class="col-xl-2 col-lg-2 col-md-12 col-sm-12 @if(Auth::user()->user_type=='professional') pro-area @else login-area @endif pt-5 pb-3">
	<video autoplay="" muted="" loop="" id="myVideo" style="height: 704px; width: 110%;object-fit: cover;object-position: center center;opacity: 1;">
	  <source src="https://video.wixstatic.com/video/eab394_e27438dbd7b64a9282dc088e3998336f/720p/mp4/file.mp4" type="video/mp4">
	</video>
      <div class="bg-img text-center" style="position: absolute;top: 50px;">
        <div class="profie">
        @if(Auth::user()->user_type=='professional')
        <a href="{{route('professional-details',Auth::user()->id)}}">
        @else
        <a href="{{route('member-details',Auth::user()->id)}}">
        @endif
            <div class="round"> 
            @if(!empty(Auth::user()->image_url)) 
            <img src="{{URL::to('/')}}/public/images/users/{{Auth::user()->image_url}}"> 
            @else 
            <img src="{{URL::to('/')}}/public/images/no-user.png"> 
            @endif 
            </div>
            <h5>{{Auth::user()->username}}<span></span></h5>
        </a>
          <!--<p class="text-white">lorem ipsum</p>-->
          <div class="frd text-left">
            <p><i class="fa fa-user" aria-hidden="true"></i><a href="{{route('profile-edit',Auth::user()->id)}}"> {{__('public.Profile_Settings')}}</a></p>
            <p><i class="fa fa-ban" aria-hidden="true"></i><a href="{{route('blacklist-show',Auth::user()->id)}}">{{__('public.Blacklisted')}}</a></p>
            <!--<p><i class="fa fa-ban" aria-hidden="true"></i><a href="{{route('request-photos-show',Auth::user()->id)}}">Request For Private Photos</a></p>-->
            <p><i class="fa fa-thumbs-o-up" aria-hidden="true"></i><a href="{{route('subscriptions',Auth::user()->id)}}">{{__('public.Subscriptions')}}</a></p>
            
            <p><i class="fa fa-trash" aria-hidden="true"></i>
            <form name="myForm" method="POST" action="{{route('account-delete',Auth::user()->id)}}">
                                                        @csrf
                                                        <input type="hidden" name="_method" value="Delete" />
                                                        <a href="#" class="dltBtn" data-id="{{Auth::user()->id}}">
                                                           {{__('public.Delete_My_Account')}}
                                                        </a>
                                                    </form></p>
            <p><i class="fa fa-sign-out"></i> 
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> 
                    {{ __('public.Logout') }} 
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
                </form>
            </p>
          </div>
        </div>
        <div class="view"> 
		<ul>
		    <li>
		        <a href="{{ url('visits') }}" class="text-white w-100 border border-white rounded mt-2" type="button">
		            <i class="fa fa-user" aria-hidden="true"></i> {{__('public.Visits')}} <span>{{ $counters['visits'] }}</span>
		        </a>
		    </li> 
		@if(Auth::user()->user_type=='member')
    		<li>
    		    <a href="{{ url('messages') }}" class="text-white w-100 border border-white rounded mt-2" type="button">
    		        <i class="fa fa-envelope-o" aria-hidden="true"></i> {{__('public.Messages')}} <span>{{ $counters['total_msg'] }}</span>
    		    </a>
    		</li> 
    		<li>
    		    <a href="{{ url('secrets') }}" class="text-white w-100 border border-white rounded mt-2" type="button">
    		        <i class="fa fa-star" aria-hidden="true"></i> {{__('public.Secret_Book')}} <span>{{ $counters['secrets'] }}</span>
    		    </a>
    		</li>  
    		<li>
    		    <a href="{{ url('videos') }}" class="text-white w-100 border border-white rounded mt-2" type="button">
    		        <i class="fa fa-camera-retro" aria-hidden="true"></i> {{__('public.My_Videos')}} <span>{{ $counters['videos'] }}</span>
    		    </a>
    		</li> 
		@endif
		    <li>
		        <a href="{{ url('photos') }}" class="text-white w-100 border border-white rounded mt-2" type="button">
		            <i class="fa fa-camera" aria-hidden="true"></i> {{__('public.My_Pictures')}} <span>{{ $counters['pictures'] }}</span>
		        </a>
		    </li>  
		    <li>
		        <a href="{{route('request-photos-show',Auth::user()->id)}}" class="text-white w-100 border border-white rounded mt-2" type="button">
		            <i class="fa fa-camera" aria-hidden="true"></i> {{__('public.Request_For_Private_Photos')}} <span>{{ $counters['pri_photos'] }}</span>
		        </a>
		    </li>  
		    <li>
		        <a href="{{route('request-videos-show',Auth::user()->id)}}" class="text-white w-100 border border-white rounded mt-2" type="button">
		            <i class="fa fa-camera-retro" aria-hidden="true"></i> {{__('public.Request_For_Private_Videos')}} <span>{{ $counters['pri_videos'] }}</span>
		        </a>
		    </li>  
		</ul> 
		
		</div>
      </div>
    </div>
    <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 login-area pt-5 pb-3">
      <div class="coment rounded">
        <div class="row">
          <div class="col-sm-2 col-4">
            <div class="round text-center"> @if(!empty(Auth::user()->image_url)) <img src="{{URL::to('/')}}/public/images/users/{{Auth::user()->image_url}}"> @else <img src="{{URL::to('/')}}/public/images/no-user.png"> @endif </div>
          </div>
          <div class="col-sm-10 col-8">
            <form action="#" method="POST" id="add_post_form" enctype="multipart/form-data">
              @csrf
              <div class="foem">
                <textarea class="form-control" type="text" name="description" style="resize: none;">{{old('description')}}</textarea>
                <span id="des_errors" style="color:red;"></span> </div>
              <div class="row">
                <div class="col-lg-4 col-sm-3 col-12">
                  <div class="uplod text-center mt-2"> <a type="button" href="javascript:;" class="chooseFile"><i class="fa fa-upload" aria-hidden="true"></i> {{__('public.Photo')}} </a>
                    <input type="file" name="image_url" id="image_url" class="" style="display:none;">
                    <span id="img_errors" style="color:red;"></span> </div>
                </div>
                <div class="col-lg-4 col-sm-3 col-0"> </div>
                <div class="col-sm-4 col-12">
                  <div class="bujer text-center mt-2">
                    <button type="submit" id="add_post_btn" class="bg-standard-violet">{{__('public.Publish')}}</button>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
      <div class="rounded" id="show_all_posts">
        <div class="coment mt-3 rounded">
          <h1 class="text-center text-secondary my-5">{{__('public.Loading')}}</h1>
        </div>
      </div>
    </div>
    <div class="col-xl-2 col-lg-2 col-md-12 col-sm-12 login-area pt-5 pb-3">
      <div class="coment px-1 py-3 rounded"> 
        @foreach($members as $member)
        @if(empty(get_block($member->id)))
            <div class="row mt-2 align-items-center ">
              <div class="col-5 px-0">
                <div class="@if($member->online==1) img_status_online @else img_status_offline @endif round text-center"> 
                @if(!empty($member->image_url)) 
                    <img src="{{URL::to('/')}}/public/images/users/{{$member->image_url}}"> 
                @else 
                    <img src="{{URL::to('/')}}/public/images/no-user.png"> 
                @endif 
                </div>
              </div>
              <div class="col-7 px-1">
                <h6 class="text-white mb-0 name_online ">{{$member->username}}</h6>
              </div>
            </div>
        @endif
        @endforeach </div>
    </div>
  </div>
</div>
</div>

@if(!empty(auth()->user()->trial_ends_at) && Auth::user()->trial_ends_at > date("Y-m-d"))
<div class="modal fade" id="daysModal" tabindex="-1" aria-labelledby="exampleModalLabel" data-backdrop="static" aria-modal="true" role="dialog">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">×</button>
      </div>
      
        <div class="modal-body">
            

            @if(!empty(auth()->user()->trial_ends_at))
            <p>{{__('public.free_trials')}}</p>
                <p>{{__('public.days_left')}} - {{Carbon::now()->diffInDays(\Carbon\Carbon::parse(auth()->user()->trial_ends_at))}} {{__('public.days')}}</p>
            @endif
        </div>
        
    </div>
  </div>
</div>
@elseif(!empty(auth()->user()->trial_ends_at) && Auth::user()->trial_ends_at < date("Y-m-d"))
<div class="modal fade show" id="daysModal" tabindex="-1" aria-labelledby="exampleModalLabel" data-backdrop="static" aria-modal="true" role="dialog">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <!--<div class="modal-header">-->
      <!--  <button type="button" class="close" data-dismiss="modal">×</button>-->
      <!--</div>-->
      
        <div class="modal-body">
        <p>{{__('public.trial_expired')}}</p>
            <a class="btn btn-info" href="{{route('subscriptions',Auth::user()->id)}}">{{__('public.Subscribe')}}</a>
        </div>
        
    </div>
  </div>
</div>

@elseif(!empty(auth()->user()->ends_at) && Auth::user()->ends_at < date("Y-m-d"))
<div class="modal fade show" id="daysModal" tabindex="-1" aria-labelledby="exampleModalLabel" data-backdrop="static" aria-modal="true" role="dialog">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <!--<div class="modal-header">-->
      <!--  <button type="button" class="close" data-dismiss="modal">×</button>-->
      <!--</div>-->
      
        <div class="modal-body">
        <p>{{__('public.package_expired')}}</p>
            <a class="btn btn-info" href="{{route('subscriptions',Auth::user()->id)}}">{{__('public.Subscribe')}}</a>
        </div>
        
    </div>
  </div>
</div>

@endif

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.js"></script>

<script>
window.setTimeout(function(){ 
	// First check, if localStorage is supported.
	if (window.localStorage) {
		// Get the expiration date of the previous popup.
		var nextPopup = localStorage.getItem( 'nextNewsletter' );

		if (nextPopup > new Date()) {
			return;
		}

		// Store the expiration date of the current popup in localStorage.
		var expires = new Date();
		expires = expires.setHours(expires.getHours() + 24);

		localStorage.setItem( 'nextNewsletter', expires );
	}

	$('#daysModal').modal('show');
}, 3000);
</script>
<script>
$(document).ready(function() {
			
// 			if ($.cookie("new_popup") == null) {
				// $('#daysModal').modal('show');
// 				$.cookie("new_popup", "2");
// 			}


// 		var modal = document.getElementById("popup3");
// 	modal.style.display = "block";
//     var closeModal = document.getElementById("closeModal");
    
//     if ($.cookie("new_popup") != null) {
//         modal.style.display = "none";
//     }
//     closeModal.onclick = function() {
//         if ($.cookie("new_popup") == null) {
//             $.cookie("new_popup", "2");
//             modal.style.display = "none";
//         }
//     }
    
$(document).on("click",".chooseFile",function(){
   $("#image_url").trigger('click');
});

$(document).on("change","#image_url",function(){
   $("#img_errors").text(this.value.replace(/C:\\fakepath\\/i, ''));
   $("#img_errors").css('display','block');
});
});  
</script>
   
<script>
    
    $('.dltBtn').click(function(e) {
      var form = $(this).closest('form');
      var dataID = $(this).data('id');
      e.preventDefault();
      swal({
          title: "{{ __('public.Are_you_sure') }}",
          text: "{{ __('public.delete_yourself') }}",
          icon: "{{ __('public.warning') }}",
          buttons: true,
          dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {
            form.submit();
            swal("{{ __('public.member_deleted') }}", {
              icon: "success",
            });
          } else {
            swal("{{ __('public.Record_safe') }}");
          }
        });
    });
</script>