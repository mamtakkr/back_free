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
		  
            <p class="text-white">Photo <span class="public">Public</span> </p>
            <button class="boder py-2 px-3 mt-3 rounded bg-standard-violet text-white float-right" style="margin-top:-54px !important;" data-toggle="modal" data-target="#addPhotoModal">Add Photo</button>
            
            <div class="coment bg-standard-grey pt-0" id="show_pub_photos">
              <div class="row">
			  	<h1 class="text-center text-secondary my-5">Loading...</h1>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="photos mt-5">
            <p class="text-white">Photo <span class="public">Private</span></p>
            <div class="coment bg-standard-grey pt-0 " id="show_pri_photos">
              <div class="row">
                <h1 class="text-center text-secondary my-5">Loading...</h1>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(function() {
        
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
              fetchPubPhotos({{Auth::user()->id}});
              fetchPriPhotos({{Auth::user()->id}});
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
      
      
      fetchPubPhotos({{Auth::user()->id}});
      fetchPriPhotos({{Auth::user()->id}});

      function fetchPubPhotos(id) {
        var _token = "{{csrf_token()}}";
        var qs = {
            id: id,
            _token: _token
        };  
        $.ajax({
          url: '{{ route('fetchPubPhotos') }}',
          method: 'get',
          data: qs,
          success: function(response) {
            $("#show_pub_photos").html(JSON.parse(response));
          }
        });
      }
      
      function fetchPriPhotos(id) {
        var _token = "{{csrf_token()}}";
        var qs = {
            id: id,
            _token: _token
        };  
        $.ajax({
          url: '{{ route('fetchPriPhotos') }}',
          method: 'get',
          data: qs,
          success: function(response) {
            $("#show_pri_photos").html(JSON.parse(response));
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
</script>
@endsection