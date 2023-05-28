@extends('layouts.front')

@section('content')
@include('partials.modals')

<div class="container">

  @include('partials.member-bar',['user_counter'=>$user_counter])

  <div class="row h-100 justify-content-center">
    <div class="col-lg-9 col-md-6 col-sm-6">
      <div class="row">
        <div class="col-md-6">
          <div class="photos mt-5">
            <p class="text-white">{{__('public.Video')}} <span class="public">{{__('public.Public')}}</span> </p>
            
            <div class="coment bg-standard-grey pt-0">
              <div class="row">
			  	@if($pub_videos->count() > 0)
                <!--<div class="row">-->
                @foreach($pub_videos as $video)
                    <div class="col-4 pt-4 pra_img">
                        <a href="javascript:;" onclick="openVideo('{{$video->id}}');">
                            <video class="rounded sidebarVideoGallery" controlsList="nodownload">
                              <source src="{{URL::to('/')}}/public/videos/{{$video->video_url}}" type="video/mp4">
                            </video>
                        </a>
                    </div>
                @endforeach
                <!--</div>-->
                @else
                <div class="row">
                    <h1 class="text-center text-secondary my-5">{{__('public.No_videos_available')}}</h1>
                </div>
                @endif
              </div>
            </div>
          </div>
        </div>
        
        <div class="col-md-6">
          <div class="photos mt-5">
            <p class="text-white">{{__('public.Video')}}<span class="public">{{__('public.Private')}}</span></p>
            
                @if(!empty($request_exists) && $request_exists->status == 'pending')
                <a href="javascript:void(0)" type="button" class="boder py-2 px-3 mt-3 rounded bg-standard-violet text-white float-right" style="margin-top:-54px !important;"> 
                    {{__('public.Request_sent')}}
                </a>
                @elseif(!empty($request_exists) && $request_exists->status == 'approved')
                <a href="javascript:void(0)" type="button" class="boder py-2 px-3 mt-3 rounded bg-standard-violet text-white float-right" style="margin-top:-54px !important;"> 
                    {{__('public.Request_approved')}}
                </a>
                @elseif(!empty($request_exists) && $request_exists->status == 'declined')
                <a href="javascript:void(0)" type="button" class="boder py-2 px-3 mt-3 rounded bg-standard-violet text-white float-right" style="margin-top:-54px !important;"> 
                    {{__('public.Request_declined')}}
                </a>
				@else
    	        <a href="javascript:void(0)" type="button" class="boder py-2 px-3 mt-3 rounded bg-standard-violet text-white float-right" style="margin-top:-54px !important;"
    	        onclick="addPriRequest({{$user_counter['member_details']->user_id}})" 
    	        id="add_request_btn{{$user_counter['member_details']->user_id}}">{{__('public.Request_private_videos')}}</a>
    	        @endif
    							
            <div class="coment @if(empty($request_exists)) private_photos @elseif(!empty($request_exists) && $request_exists->status != 'approved') private_photos @endif bg-standard-grey pt-0 ">
              <div class="row">
			  	@if($pri_videos->count() > 0)
                <!--<div class="row">-->
                @foreach($pri_videos as $video)
                    <div class="col-4 pt-4 pra_img ">
                        <a href="javascript:;" onclick="openVideo('{{$video->id}}');">
                            <video class="rounded sidebarVideoGallery" controlsList="nodownload">
                              <source src="{{URL::to('/')}}/public/videos/{{$video->video_url}}" type="video/mp4">
                            </video>
                        </a>
                    </div>
                @endforeach
                <!--</div>-->
                @else
                <div class="row">
                    <h1 class="text-center text-secondary my-5">{{__('public.No_videos_available')}}</h1>
                </div>
                @endif
              </div>
            </div>
          </div>
        </div>
        
      </div>
    </div>
  </div>

</div>

<div class="modal fade bd-example-modal-lg photo-details" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

    </div>
  </div>
</div>

<script>
  $(function() {
    $("#add_like_form").submit(function(e) {
      e.preventDefault();
      const fd = new FormData(this);
      $.ajax({
        url: '{{ route('like-store') }}',
        method: 'post',
        data: fd,
        cache: false,
        contentType: false,
        processData: false,
        dataType: 'json',
        success: function(response) {
          if (response.status == 200) {
            $("#add_like_btn").removeClass('fa-heart-o');
            $("#add_like_btn").addClass('fa-heart');
            $("#add_like_form")[0].reset();
          }
          if (response.status == 400) {
            $("#add_like_btn").removeClass('fa-heart');
            $("#add_like_btn").addClass('fa-heart-o');
            $("#add_like_form")[0].reset();
          }
        }
      });

    });


    $("#add_follow_form").submit(function(e) {
      e.preventDefault();
      const fd = new FormData(this);
      $.ajax({
        url: '{{ route('follow-store') }}',
        method: 'post',
        data: fd,
        cache: false,
        contentType: false,
        processData: false,
        dataType: 'json',
        success: function(response) {
          if (response.status == 200) {
            $("#add_follow_btn").text("{{ __('public.Following') }}");
            $("#add_follow_form")[0].reset();
          }
          if (response.status == 400) {
            $("#add_follow_btn").text("{{ __('public.Follow') }}");
            $("#add_follow_form")[0].reset();
          }
        }
      });

    });

  });



  function addBlacklist(id) {
    var thiss = $(this);
    var _token = "{{csrf_token()}}";
    var qs = {
      to_id: id,
      _token: _token
    };

    $.ajax({
      url: "{{ route('blacklist-store') }}",
      method: "Post",
      data: qs,
      success: function(response) {
        if (response.status == 200) {
          $("#blacklist_btn" + id).text("{{ __('public.Blacklisted') }}");
          document.getElementById("blacklist_btn" + id).disabled = true;
          window.location.reload();
        }
      },
      error: function(request, status, error) {
        console.log('Error is' + request.responseText);
      }
    });
  }
  
  
  function addPriRequest(id) {
    var thiss = $(this);
    var _token = "{{csrf_token()}}";
    var qs = {
      user_id: id,
      _token: _token
    };

    $.ajax({
      url: "{{ route('video-request-store') }}",
      method: "Post",
      data: qs,
      success: function(response) {
        if (response.status == 200) {
          $("#add_request_btn" + id).text("{{ __('public.Request_sent') }}");
          document.getElementById("add_request_btn" + id).disabled = true;
          window.location.reload();
        }
      },
      error: function(request, status, error) {
        console.log('Error is' + request.responseText);
      }
    });
  }
  
  

  function openVideo(video_id) {
    $.ajax({
      url: '{{ route('fetchVideo') }}' + '?video_id=' + video_id,
      method: 'get',
      success: function(response) {
        $(".modal-content").html(JSON.parse(response));
        // //$('.show_comments').scrollTop($('.show_comments')[0].scrollHeight);

        $('.bd-example-modal-lg').modal('show');
      },
      error: function(err) {
        alert(JSON.stringify(err));
      }
    });
}
        
</script>

@endsection