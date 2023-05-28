@extends('layouts.front')

@section('content')
@include('partials.modals')
<div class="container" id="blocklisted">
  
  @include('partials.member-bar',['user_counter'=>$user_counter])
	
  <div class="row h-100 justify-content-center">
    <div class="col-lg-5 col-md-5 col-sm-6">
      <div class="coment bg-standard-grey mt-5 p-0">
        <div class="row">
          <div class="col-12 text-center resse py-2" style="border-radius: 8px 8px 0px 0px;">
            <h5>{{__('public.'.$user_counter['member_details']->relUser->you_are)}}</h5>
          </div>
          <div class="col-7 px-0 py-1 text-center border-right">
            <div class="text-center">
              <p>{{__('public.Follows')}}</p>
              <p>{{count($follows)}}</p>
            </div>
          </div>
          <div class="col-5 py-1 text-center heading">
            <p>{{__('public.Like')}}</p>
            <p>{{count($likes)}}</p>
          </div>
          <div class="col-12 py-2 border-top heading"> 
            <span><i class="fa fa-map-marker" aria-hidden="true"></i>
                @if(!empty($user_counter['member_details']->city) && !empty($user_counter['member_details']->country))
                {{strtoupper($user_counter['member_details']->city)}}
                @else
                {{strtoupper($user_counter['member_details']->country)}}
                @endif
            </span> 
          </div>
        </div>
      </div>
      
       <div class="coment bg-standard-grey mt-5 p-0">
        <div class="row">
          <div class="col-12 text-center resse py-2" style="border-radius: 8px 8px 0px 0px;">
            <h5>{{__('public.Experience')}}</h5>
          </div>
          <div class="col-12 px-0 py-1 text-center ">
            <div class="text-center">
              <p class="mt-2">@if(!empty($user_counter['member_details']->relUser->experience)) {{ucfirst($user_counter['member_details']->relUser->experience)}} @endif</p>
            </div>
          </div>
        </div>
      </div>
      <div class="photos mt-5">
        <p class="text-white">{{__('public.Photos')}}
        <p>
        <div class="coment bg-standard-grey pt-0" id="show_all_photos">
          <div class="row">
            <h1 class="text-center text-secondary my-5">{{__('public.Loading')}}</h1>
          </div>
        </div>
        @if($user_counter['member_details']->user_id==Auth::user()->id)
        <button class="mt-3 rounded bg-standard-violet text-white  px-2 py-2" data-toggle="modal" data-target="#addPhotoModal">{{__('public.Add_Photo')}}</button>
        @else
        
        @endif </div>
      <div class="photos mt-5">
        <p class="text-white">{{__('public.Videos')}}
        <p>
        <div class="coment bg-standard-grey pt-0" id="show_all_videos">
          <div class="row">
            <h1 class="text-center text-secondary my-5">{{__('public.Loading')}}</h1>
          </div>
        </div>
        @if($user_counter['member_details']->user_id==Auth::user()->id)
        <button class="mt-3 rounded bg-standard-violet text-white  px-2 py-2" data-toggle="modal" data-target="#addVideoModal">{{__('public.Add_Video')}}</button>
        @else
        
        @endif </div>
    </div>
    <div class="col-lg-7 col-md-7 col-sm-6">
      <div class="coment bg-standard-grey mt-5">
        <div class="row">
          <div class="col-12 px-0 ">
            <p>{{__('public.I_look_for')}}</p>
            <div class="menu">
              <ul class="like vf">
                @if(!empty($user_counter['member_details']->research))
                <?php $research = explode(',', $user_counter['member_details']->research); ?>
                @foreach($research as $key=>$value)
                <li><a class="bg-standard-white  base-radius text-dark px-2 py-2" href="#">{{$value}}</a></li>
                @endforeach
                @endif
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="coment bg-standard-grey mt-5">
        <div class="row">
          <div class="col-12 px-0 heading">
            <h5>@if(!empty($user_counter['member_details']->relUser->username)) {{$user_counter['member_details']->relUser->username}} @endif</h5>
            <p>@if(!empty($user_counter['member_details']->about)) {{$user_counter['member_details']->about}} @endif</p>
          </div>
        </div>
      </div>
      <div class="coment bg-standard-grey mt-5">
        <div class="row">
          <div class="col-4  heading">
            <p>{{__('public.Profile')}}</p>
            <p class=" pl-1 py-1 bg-standard-grey_lite Age">{{__('public.Age')}}</p>
            <p class=" pl-1 py-1 bg-standard-grey_lite Age">{{__('public.Size')}}</p>
            <p class=" pl-1 py-1 bg-standard-grey_lite Age">{{__('public.Weight')}}</p>
            <p class=" pl-1 py-1 bg-standard-grey_lite Age">{{__('public.Origin')}}</p>
            <p class=" pl-1 py-1 bg-standard-grey_lite Age">{{__('public.Hair_Size')}}</p>
            <p class=" pl-1 py-1 bg-standard-grey_lite Age">{{__('public.Hair_Color')}}</p>
            <p class=" pl-1 py-1 bg-standard-grey_lite Age">{{__('public.Eye_Colour')}}</p>
          </div>
          <div class="col-4  heading">
            <p>Lui</p>
            <p class=" pl-1 py-1 bg-standard-blur Age"> {{\Carbon\Carbon::parse($user_counter['member_details']->dob)->diff(\Carbon\Carbon::now())->format('%y years')}} </p>
            <p class=" pl-1 py-1 bg-standard-blur Age">{{$user_counter['member_details']->size}}</p>
            <p class=" pl-1 py-1 bg-standard-blur Age">{{$user_counter['member_details']->weight}}</p>
            <p class=" pl-1 py-1 bg-standard-blur Age">{{$user_counter['member_details']->origin}}</p>
            <p class=" pl-1 py-1 bg-standard-blur Age">{{$user_counter['member_details']->hair_size}}</p>
            <p class=" pl-1 py-1 bg-standard-blur Age">{{$user_counter['member_details']->hair_color}}</p>
            <p class=" pl-1 py-1 bg-standard-blur Age">{{$user_counter['member_details']->eye_colour}}</p>
          </div>
          
          @if(!empty($user_counter['member_details']->dob_couple))
          <div class="col-4  heading">
            <p>Elle</p>
            <p class=" pl-1 py-1 bg-standard-violet Age"> {{\Carbon\Carbon::parse($user_counter['member_details']->dob_couple)->diff(\Carbon\Carbon::now())->format('%y years')}} </p>
            <p class=" pl-1 py-1 bg-standard-violet Age">{{$user_counter['member_details']->size_couple}}</p>
            <p class=" pl-1 py-1 bg-standard-violet Age">{{$user_counter['member_details']->weight_couple}}</p>
            <p class=" pl-1 py-1 bg-standard-violet Age">{{$user_counter['member_details']->origin_couple}}</p>
            <p class=" pl-1 py-1 bg-standard-violet Age">{{$user_counter['member_details']->hair_size_couple}}</p>
            <p class=" pl-1 py-1 bg-standard-violet Age">{{$user_counter['member_details']->hair_color_couple}}</p>
            <p class=" pl-1 py-1 bg-standard-violet Age">{{$user_counter['member_details']->eye_colour_couple}}</p>
          </div>
          @endif
          
          </div>
      </div>
      <div class="coment bg-standard-grey mt-5">
        <div class="row">
          <div class="col-12 px-0 ">
            <p>{{__('public.Type_of_meeting')}}</p>
            <div class="menu">
              <ul class="like vf">
                @if(!empty($user_counter['member_details']->type_of_meeting))
                <?php $type_of_meeting = explode(',', $user_counter['member_details']->type_of_meeting); ?>
                @foreach($type_of_meeting as $key=>$value)
                <li> <a class="bg-standard-white  base-radius text-dark px-2 py-2" href="#"> {{$value}} </a> </li>
                @endforeach
                @endif
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="coment bg-standard-grey mt-5">
        <div class="row">
          <div class="col-12 px-0 ">
            <p>{{__('public.First_meeting')}}</p>
            <div class="menu">
              <ul class="like vf">
                @if(!empty($user_counter['member_details']->first_meeting))
                <?php $first_meeting = explode(',', $user_counter['member_details']->first_meeting); ?>
                @foreach($first_meeting as $key=>$value)
                <li> <a class="bg-standard-white  base-radius text-dark px-2 py-2" href="#"> {{$value}} </a> </li>
                @endforeach
                @endif
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="coment bg-standard-grey mt-5">
        <div class="row">
          <div class="col-12 px-0 ">
            <p>{{__('public.Vibe')}}</p>
            <div class="menu">
              <ul class="like vf">
                @if(!empty($user_counter['member_details']->vibe))
                <?php $vibe = explode(',', $user_counter['member_details']->vibe); ?>
                @foreach($vibe as $key=>$value)
                <li> <a class="bg-standard-white  base-radius text-dark px-2 py-2" href="#"> {{$value}} </a> </li>
                @endforeach
                @endif
              </ul>
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
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
                        $("#add_follow_btn").text('+ Following');
                        $("#add_follow_form")[0].reset();
                    }
                    if (response.status == 400) {
                        $("#add_follow_btn").text('+ Follow');
                        $("#add_follow_form")[0].reset();
                    }
                }
            });

        });
        
        
      $("#add_photo_form").submit(function(e) {
        e.preventDefault();
        const fd = new FormData(this);
        $("#add_photo_btn").text('Adding...');
        $.ajax({
          url: '{{ route('photo-store') }}',
          method: 'post',
          data: fd,
          cache: false,
          contentType: false,
          processData: false,
          dataType: 'json',
          success: function(response) {
              console.log(response);
            if (response.status == 200) {
                Swal.fire(
                'Added!',
                'Photo Added Successfully!',
                'success'
              )
              fetchAllPhotos({{$user_counter['member_details']->user_id}});
                $("#add_photo_btn").text('Add Photo');
                $("#add_photo_form")[0].reset();
                $("#addPhotoModal").modal('hide');
            }
            if (response.status == 401) {
                $("#img_errors").text(response.errors.image_url);
                $("#add_photo_btn").text('Not Added');
                $("#add_photo_form")[0].reset(); 
                $("#addPhotoModal").modal('fade');
            }
          }
        });
      });
      
      
      fetchAllPhotos({{$user_counter['member_details']->user_id}});

      function fetchAllPhotos(id) {
        var _token = "{{csrf_token()}}";
        var qs = {
            id: id,
            _token: _token
        };  
        $.ajax({
          url: '{{ route('fetchAllPhotos') }}',
          method: 'get',
          data: qs,
          success: function(response) {
            $("#show_all_photos").html(JSON.parse(response));
          }
        });
      }
      
      
      
        
      $("#add_video_form").submit(function(e) {
        e.preventDefault();
        const fd = new FormData(this);
        $("#add_video_btn").text('Adding...');
        $.ajax({
          url: '{{ route('video-store') }}',
          method: 'post',
          data: fd,
          cache: false,
          contentType: false,
          processData: false,
          dataType: 'json',
          success: function(response) {
            if (response.status == 200) {
                Swal.fire(
                'Added!',
                'Video Added Successfully!',
                'success'
              )
              fetchAllVideos({{$user_counter['member_details']->user_id}});
                $("#add_video_btn").text('Add Video');
                $("#add_video_form")[0].reset();
                $("#addVideoModal").modal('hide');
            }
            if (response.status == 401) {
                $("#vid_errors").text(response.errors.video_url);
                $("#add_video_btn").text('Not Added');
                $("#add_video_form")[0].reset(); 
                // $("#addVideoModal").modal('fade');
            }
          }
        });
      });
      
      
      fetchAllVideos({{$user_counter['member_details']->user_id}});

      function fetchAllVideos(id) {
        var _token = "{{csrf_token()}}";
        var qs = {
            id: id,
            _token: _token
        };  
        $.ajax({
          url: '{{ route('fetchAllVideos') }}',
          method: 'get',
          data: qs,
          success: function(response) {
            $("#show_all_videos").html(JSON.parse(response));
          }
        });
      }
     
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
                $("#blacklist_btn"+id).text('Blacklisted');
                document.getElementById("blacklist_btn"+id).disabled=true;
                window.location.reload();
            }
        },
        error: function(request, status, error) {
            console.log('Error is' + request.responseText);
        }
    });
}
        
</script>

@endsection