@extends('layouts.front')
<style>
.help-block
{
font-size:80%;
color:#222;
}
body
{
background-color: #000!important;
}
</style>
@section('content')
<div class="container " >
    @include('partials.user-bar',['user_info'=>$user_info])
    <div class="row h-100 justify-content-center">
      <div class="col-lg-6 col-md-6 col-sm-6">
        <div class="rounded" id="show_all_posts">
        <div class="coment mt-3 rounded">
          <h1 class="text-center text-secondary my-5">{{__('public.Loading')}}</h1>
        </div>
      </div>
      </div>
    </div>
  </div>
@endsection

<script>
$(function() {
fetchAllPosts();

      function fetchAllPosts() {
        $.ajax({
          url: '{{ route('fetchUserPosts') }}',
          method: 'get',
          success: function(response) {
            $("#show_all_posts").html(JSON.parse(response));
          },
		  error: function(err)
		  {
		  alert(JSON.stringify(err));
		  }
        });
      }
});	  
</script>