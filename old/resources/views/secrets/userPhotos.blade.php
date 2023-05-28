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
		  
            <p class="text-white">Photo <span class="public">Public</span> </p>
            
            <div class="coment bg-standard-grey pt-0" id="show_pub_photos">
              <div class="row">
			  	@if($pub_photos->count() > 0)
                <div class="row">
                @foreach($pub_photos as $photo)
                    <div class="col-4 pt-4 pra_img ">
                        <img class="rounded" src="{{URL::to('/')}}/public/images/photos/{{$photo->image_url}}">
                    </div>
                @endforeach
                </div>
                @else
                <div class="row">
                    <h1 class="text-center text-secondary my-5">No photos available!</h1>
                </div>
                @endif
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="photos mt-5">
            <p class="text-white">Photo <span class="public">Private</span></p>
            <div class="coment bg-standard-grey pt-0 " id="show_pri_photos">
              <div class="row">
			  	@if($pri_photos->count() > 0)
                <div class="row">
                @foreach($pri_photos as $photo)
                    <div class="col-4 pt-4 pra_img ">
                        <img class="rounded" src="{{URL::to('/')}}/public/images/photos/{{$photo->image_url}}">
                    </div>
                @endforeach
                </div>
                @else
                <div class="row">
                    <h1 class="text-center text-secondary my-5">No photos available!</h1>
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
          $("#blacklist_btn" + id).text('Blacklisted');
          document.getElementById("blacklist_btn" + id).disabled = true;
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