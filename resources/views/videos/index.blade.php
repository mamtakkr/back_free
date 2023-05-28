@extends('layouts.front')

@section('content')
@include('partials.modals')

<div class="container">
  @include('partials.user-bar',['user_info'=>$user_info])
  
  <div class="row h-100 justify-content-center">
    <div class="col-lg-9 col-md-6 col-sm-6">
      <div class="row">
        <div class="col-md-6">
          <div class="photos mt-5">
		  
            <p class="text-white">{{ __('public.Video') }} <span class="public">{{__('public.Public')}}</span> </p>
            <button class="boder py-2 px-3 mt-3 mt-3 rounded bg-standard-violet text-white float-right" style="margin-top:-54px !important;" data-toggle="modal" data-target="#addVideoModal">{{__('public.Add_Video')}}</button>
            
            <div class="coment bg-standard-grey pt-0" id="show_pub_videos">
              <div class="row">
			  	<h1 class="text-center text-secondary my-5">{{__('public.Loading')}}</h1>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="photos mt-5">
            <p class="text-white">{{__('public.Video')}} <span class="public">{{__('public.Private')}}</span></p>
            <div class="coment bg-standard-grey pt-0 " id="show_pri_videos">
              <div class="row">
                <h1 class="text-center text-secondary my-5">{{__('public.Loading')}}</h1>
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
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(function() {
        
      $("#add_video_form").submit(function(e) {
        e.preventDefault();
        const fd = new FormData(this);
        $("#add_video_btn").text("{{ __('public.Adding') }}");
        $.ajax({
          url: '{{ route('video-store') }}',
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
                "{{ __('public.Added') }}",
                "{{ __('public.Video_Added') }}",
                'success'
              )
              fetchPubVideos({{Auth::user()->id}});
              fetchPriVideos({{Auth::user()->id}});
                $("#add_video_btn").text("{{ __('public.Add_Video') }}");
                $("#add_video_form")[0].reset();
                $("#addVideoModal").modal('hide');
            }
            if (response.status == 401) {
                $("#vid_errors").text(response.errors.video_url);
                $("#add_video_btn").text("{{ __('public.Not_Added') }}");
                $("#add_video_form")[0].reset();
                $("#addVideoModal").modal('fade');
            }
          }
        });
      });
      
      
      fetchPubVideos({{Auth::user()->id}});
      fetchPriVideos({{Auth::user()->id}});

      function fetchPubVideos(id) {
        var _token = "{{csrf_token()}}";
        var qs = {
            id: id,
            _token: _token
        };  
        $.ajax({
          url: '{{ route('fetchPubVideos') }}',
          method: 'get',
          data: qs,
          success: function(response) {
            $("#show_pub_videos").html(JSON.parse(response));
          }
        });
      }
      
      function fetchPriVideos(id) {
        var _token = "{{csrf_token()}}";
        var qs = {
            id: id,
            _token: _token
        };  
        $.ajax({
          url: '{{ route('fetchPriVideos') }}',
          method: 'get',
          data: qs,
          success: function(response) {
            $("#show_pri_videos").html(JSON.parse(response));
          }
        });
      }
     
    });
</script>
<script>
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#output').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}

$("#image").change(function(){
    readURL(this);
});

function readVidURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        // reader.onload = function (e) {
        //     $('#output').attr('src', e.target.result);
        // }

        reader.readAsDataURL(input.files[0]);
    }
}

$("#video").change(function(){
    readVidURL(this);
});

</script>
@endsection