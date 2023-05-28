@extends('layouts.front')

@section('content')

<div class="container ">
  <div class="row h-100 justify-content-center">
    <div class="col-lg-5 col-md-6 col-sm-6  Professionals_edit">
      <div class="coment mt-5 rounded-4">
        <div class="row">
          <div class="col-8">
            <div class="hgt">
              <!--<img class="rounded-circle" src="imgs/profilwe.png" width="100" height="100">-->
              @if(!empty($pro_detail->relUser->image_url))
              <img class="rounded-circle" src="{{URL::to('/')}}/public/images/users/{{$pro_detail->relUser->image_url}}" width="80" height="80">
              @else
              <img class="rounded-circle" src="{{URL::to('/')}}/public/images/no-user.png" width="80" height="80">
              @endif
            </div>
            <h3 class="name_color">{{$pro_detail->relUser->username}}</h3>
            <p class="text-center">{{$pro_detail->relUser->club_name}}</p>
          </div>
          <div class="col-4">
            <div class="float-right">
              <a href="" type="button" class="border border-white base-radius text-white px-1 mr-2" style=" border-color: #ff128e !important;box-shadow: 2px 2px 5px 0px #797373;">
                <div class="row " style="align-items: center;">
                  <div class="col-6" style=" padding: 0px;">
                    <!--<i class="fa fa-heart-o" aria-hidden="true"></i>-->
                    <form action="#" method="POST" id="add_like_form" enctype="multipart/form-data">
                      @csrf
                      <input type="hidden" name="like_to" value="{{$pro_detail->user_id}}">
                      <input type="hidden" name="like_from" value="{{Auth::user()->id}}">
                      <button type="submit" id="add_like_btn" class="fa @if(!empty($like_exists)) fa-heart @else fa-heart-o @endif"></button>
                    </form>
                  </div>
                  <div class="col-6" style=" padding-left: 2px;padding-right: 0;text-align: center;"> Fan  <span class="fans">{{$pro_detail->relUser->total_likes}}</span> </div>
                </div>
              </a><br>

              <!--<a type="button" class="border border-white  base-radius text-white px-2 py-2 mr-2 mt-3"> + suiver</a>-->

              <form action="#" method="POST" id="add_follow_form" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="follow_to" value="{{$pro_detail->user_id}}">
                <input type="hidden" name="follow_from" value="{{Auth::user()->id}}">
                <button type="submit" id="add_follow_btn" class="bg-standard-violet  base-radius text-white px-2 py-2 mr-2 mt-3"> @if(!empty($follow_exists))
                  + Following
                  @else
                  + Follow
                  @endif </button>
              </form>

            </div>
          </div>
        </div>
      </div>

      <div class="coment mt-5 rounded-4">
        <form>
          <div class="col-12 px-0" >
            <div class="row">
              <div class="col-4">
                <label class="white">{{__('Description')}} :</label>
              </div>
              <div class="col-8">
                <div class="border" style="border-radius: 0.25rem;">
                    <p class="pl-3 mt-1 mb-1">@if(!empty($pro_detail->about)) {{$pro_detail->about}} @else N/A @endif</p>
                </div>
              </div>
            </div>
          </div>
          <div class="col-12 px-0 mt-2">
            <div class="row">
              <div class="col-4">
                <label class="white">{{__('Username')}} : </label>
              </div>
              <div class="col-8">
                <div class="border" style="border-radius: 0.25rem;">
                    <p class="pl-3 mt-1 mb-1">@if(!empty($pro_detail->relUser->username)) {{$pro_detail->relUser->username}} @else N/A @endif</p>
                </div>
              </div>
            </div>
          </div>
          <div class="col-12 px-0 mt-2">
            <div class="row">
              <div class="col-4">
                <label class="white">{{__('Address')}} : </label>
              </div>
              <div class="col-8">
                <div class="border" style="border-radius: 0.25rem;">
                    <p class="pl-3 mt-1 mb-1">@if(!empty($pro_detail->address)) {{$pro_detail->address}} @else N/A @endif</p>
                </div>
              </div>
            </div>
          </div>
          <div class="col-12 px-0 mt-2">
            <div class="row">
              <div class="col-4">
                <label class="white">{{__('Telephone')}} :</label>
              </div>
              <div class="col-8">
                <div class="border" style="border-radius: 0.25rem;">
                    <p class="pl-3 mt-1 mb-1">@if(!empty($pro_detail->relUser->contact)) {{$pro_detail->relUser->contact}} @else N/A @endif</p>
                </div>
              </div>
            </div>
          </div>
          <div class="col-12 px-0  mt-2">
            <div class="row">
              <div class="col-4">
                <label class="white">E-mail</label>
              </div>
              <div class="col-8">
                <div class="border" style="border-radius: 0.25rem;">
                    <p class="pl-3 mt-1 mb-1">@if(!empty($pro_detail->relUser->email)) {{$pro_detail->relUser->email}} @else N/A @endif</p>
                </div>
              </div>
              
            </div>
          </div>
          <div class="col-12 px-0  mt-2">
            <div class="row">
              <div class="col-4">
                <label class="white">{{__('Hourly')}}</label>
              </div>
              <div class="col-8">
                <div class="border" style="border-radius: 0.25rem;">
                    <p class="pl-3 mt-1 mb-1">
                        @if(!empty($pro_detail->relUser->club_day)) 
                        @foreach(explode('|', $pro_detail->relUser->club_day) as $row)
                            {{$row}} 
                        @endforeach
                        @else N/A @endif
                    </p>
                    <p class="pl-3 mt-1 mb-1">
                        {{--@if(!empty($pro_detail->relUser->club_start_time)) 
                        @foreach(explode('|', $pro_detail->relUser->club_start_time) as $row1)
                            {{date('g:i A',strtotime($row1))}} 
                        @endforeach
                        @foreach(explode('|', $pro_detail->relUser->club_end_time) as $row2)
                            {{date('g:i A',strtotime($row2))}} 
                        @endforeach
                            
                        @else 
                        N/A
                        @endif--}}
                    </p>
                </div>    
              </div>
            </div>
          </div>
          <div class="col-12 px-0 mt-2">
            <div class="row">
              <div class="col-4">
                <label class="white">{{__("URL's")}}</label>
              </div>
              <div class="col-8 ">
                <input class="form-control" type="text" name="website_url" readonly value="{{$pro_detail->website_url}}">
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>


    <div class="col-lg-7 col-md-6 col-sm-6  Professionals_edit_event">

      <div class="coment mt-5 rounded-4">
        <a type="button" class="bg-standard-violet  base-radius text-white px-2 py-2 ml-3 mr-2">{{__('Events')}}</a>
        <div class="row">
        @if($events->count()>0)
        @foreach($events as $event)
          <div class="col-4">
            <a class="w-100 text-white" href="{{route('event-details',$event->id)}}">
              <div class="coment immg bg-standard-violet p-0 mt-3">
                <div class="row">
                    <div class="col-12 gfr px-0 ">
                      <div class="date_photo">
                        @if(!empty($event->banner)) 
                        <img src="{{URL::to('/')}}/public/images/events/{{$event->banner}}"> 
                        @else 
                        <img src="{{URL::to('/')}}/public/images/default.jpg"> 
                        @endif
                      </div>
                    </div>

                    <div class=" octr ">
                      <ul class="like">
                        <li class="bg-standard-white base-radius px-2 py-2 text-dark mr-2 text-center ">
                            <p>{{ date('d',strtotime($event->start_date))}}</p>
                            <p>{{ date('F',strtotime($event->start_date))}}</p>
                        </li>
                        <li class="bg-standard-white base-radius px-2 py-2 text-dark mr-2 text-center">
                            <p>{{$event->total_participates}}</p>
                            <p><i class="fa fa-user" aria-hidden="true"></i></p>
                        </li>
                      </ul>
                    </div>

                  </a>

                  <div class=" m-2">
                    <div class="text_tr">
                        <p class="m-0"><span>{{ date('d M Y',strtotime($event->start_date))}}</span> - <span>{{ date('d M Y',strtotime($event->end_date))}}</span></p>
                        <p class="text_events">
                          <?php
                            $string = strip_tags($event->description);
                            $character_count = strlen($string);
                            ?>
                            @if($character_count > 50)
                            {{ substr($event->description,0,50) }}...
                            @else
                            {{$event->description}}
                            @endif
                          
                      </p>
                      <ul class="like">
                        <li class="pl-0"><a class="bg-standard-white base-radius px-2 py-2 text-dark text-center" href="javascript:;">{{ $event->event_category }}</a></li>
                        <li> <a class="bg-standard-white base-radius px-2 py-2 text-dark text-center" href="javascript:;">{{ $event->event_type }}</a></li>
                      </ul>
                    </div>
                  </div>

                </div>
              </div>
            </a>
          </div>
        @endforeach
        @else
            <div class="col-12 mt-2">
                {{__('No events found!')}}
            </div>
        @endif

        </div>
      </div>


      <div class="photos mt-5">
        <p class="text-white">{{__('Photo')}}<p>
        <div class="coment bg-standard-grey pt-0 ">
          <div class="row">
            @if($public_photos->count()>0)
            @foreach($public_photos as $pub_photo)
            <div class="col-4 pt-4 pra_img">
              <img class="rounded" src="{{URL::to('/')}}/public/images/photos/{{$pub_photo->image_url}}">
            </div>
            @endforeach
            @else
                <div class="col-12">{{__('No photo found!')}}</div>
            @endif
          </div>
        </div>
      </div>

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

    //   $("#add_photo_form").submit(function(e) {
    //     e.preventDefault();
    //     const fd = new FormData(this);
    //     $("#add_photo_btn").text('Adding...');
    //     $.ajax({
    //       url: '{{-- route('photo-store') --}}',
    //       method: 'post',
    //       data: fd,
    //       cache: false,
    //       contentType: false,
    //       processData: false,
    //       dataType: 'json',
    //       success: function(response) {
    //           console.log(response);
    //         if (response.status == 200) {
    //             Swal.fire(
    //             'Added!',
    //             'Photo Added Successfully!',
    //             'success'
    //           )
    //           fetchAllPhotos({{--$member_details->user_id--}});
    //             $("#add_photo_btn").text('Add Photo');
    //             $("#add_photo_form")[0].reset();
    //             $("#addPhotoModal").modal('hide');
    //         }
    //         if (response.status == 401) {
    //             $("#img_errors").text(response.errors.image_url);
    //             $("#add_photo_btn").text('Not Added');
    //             $("#add_photo_form")[0].reset(); 
    //             $("#addPhotoModal").modal('fade');
    //         }
    //       }
    //     });
    //   });


    //   fetchAllPhotos({{--$member_details->user_id--}});

    //   function fetchAllPhotos(id) {
    //     var _token = "{{csrf_token()}}";
    //     var qs = {
    //         id: id,
    //         _token: _token
    //     };  
    //     $.ajax({
    //       url: '{{-- route('fetchAllPhotos') --}}',
    //       method: 'get',
    //       data: qs,
    //       success: function(response) {
    //         $("#show_all_photos").html(JSON.parse(response));
    //       }
    //     });
    //   }




    //   $("#add_video_form").submit(function(e) {
    //     e.preventDefault();
    //     const fd = new FormData(this);
    //     $("#add_video_btn").text('Adding...');
    //     $.ajax({
    //       url: '{{-- route('video-store') --}}',
    //       method: 'post',
    //       data: fd,
    //       cache: false,
    //       contentType: false,
    //       processData: false,
    //       dataType: 'json',
    //       success: function(response) {
    //         if (response.status == 200) {
    //             Swal.fire(
    //             'Added!',
    //             'Video Added Successfully!',
    //             'success'
    //           )
    //           fetchAllVideos({{--$member_details->user_id--}});
    //             $("#add_video_btn").text('Add Video');
    //             $("#add_video_form")[0].reset();
    //             $("#addVideoModal").modal('hide');
    //         }
    //         if (response.status == 401) {
    //             $("#vid_errors").text(response.errors.video_url);
    //             $("#add_video_btn").text('Not Added');
    //             $("#add_video_form")[0].reset(); 
    //             // $("#addVideoModal").modal('fade');
    //         }
    //       }
    //     });
    //   });


    //   fetchAllVideos({{--$member_details->user_id--}});

    //   function fetchAllVideos(id) {
    //     var _token = "{{csrf_token()}}";
    //     var qs = {
    //         id: id,
    //         _token: _token
    //     };  
    //     $.ajax({
    //       url: '{{-- route('fetchAllVideos') --}}',
    //       method: 'get',
    //       data: qs,
    //       success: function(response) {
    //         $("#show_all_videos").html(JSON.parse(response));
    //       }
    //     });
    //   }



  });
</script>

@endsection