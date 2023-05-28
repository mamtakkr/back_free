@extends('layouts.front')

@section('content')
@include('partials.modals')

<div class="container">

  @include('partials.member-bar',['user_counter'=>$user_counter])
  <div class="row h-100 justify-content-center">
    @if($posts->count() > 0)
    @foreach($posts as $post)
    <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 pt-3 pb-3">
    <div class="coment mt-3 rounded">
      <div class="row">
        <div class="col-sm-2 col-4">
          <div class="round text-center"> @if(!empty($post->relUser->image_url)) <img src="{{URL::to('/')}}/public/images/users/{{$post->relUser->image_url}}"> @else <img src="{{URL::to('/')}}/public/images/no-user.png"> @endif </div>
        </div>
        <div class="col-sm-10 col-8">
          <h6 class="text-white">{{$post->relUser->username}} <a href="javascript:;" onclick="openDetails('{{$post->id}}');"><i class="fa fa-eye"></i></a></h6>
          <p>{{$post->description}} </p>
        </div>
        @if(!empty($post->image_url))
        <div class="col-12 text-center"> <img class="fsdew rounded" src="{{URL::to('/')}}/public/images/posts/{{$post->image_url}}"> </div>
        @endif
        <div class="col-12" id="show_all_comments{{ $post->id }}">
          @if(!empty($post->three_comments))
          @foreach($post->three_comments as $k=>$comment)
          @if($k<3) <div class="row">
            <div class="col-md-12">
              @php $userInfo = \App\Models\User::where('id',$comment->user_id)->first(); @endphp
              <p><strong>{{ $userInfo->username ?? '-' }}: </strong>{{$comment->comment}}</p>
            </div>


        </div>
        @endif
        @endforeach
        @endif

      </div>
      <div class="col-sm-12 col-12 post-comment">
        <form action="#" method="POST" class="add_comment_form" id="myFrm{{ $post->id }}" enctype="multipart/form-data">
          @csrf
          <div class="gter text-center emoji-picker-container">
            <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
            <input type="hidden" name="post_id" value="{{$post->id}}">
            <input type="hidden" name="comment_limit" value="yes">
            <input class="form-control" type="text" name="comment" data-emojiable="true" id="comments" value="{{old('comment')}}">
            <button type="submit" id="add_comment_btn" class="bg-standard-violet text-while">{{__('public.Publish')}}</button>
          </div>
        </form>
      </div>
    </div>
    </div>
  </div>
  @endforeach
  @else
  <div class="coment mt-3 rounded">
    <h1 class="text-center text-secondary my-5">{{__('public.No_record_found')}}</h1>
  </div>
  @endif

</div>

</div>

<div class="modal fade bd-example-modal-lg post-details" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
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
            $("#add_follow_btn").text('+'+ "{{ __('public.Following') }}");
            $("#add_follow_form")[0].reset();
          }
          if (response.status == 400) {
            $("#add_follow_btn").text('+'+ "{{ __('public.Follow') }}");
            $("#add_follow_form")[0].reset();
          }
        }
      });

    });

  });



  function openDetails(post_id) {

    $.ajax({
      url: '{{ route('fetchPost') }}' + '?post_id=' + post_id,
      method: 'get',
      success: function(response) {
        $(".modal-content").html(JSON.parse(response));
        //$('.show_comments').scrollTop($('.show_comments')[0].scrollHeight);

        $('.bd-example-modal-lg').modal('show');
      },
      error: function(err) {
        alert(JSON.stringify(err));
      }
    });

}


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
</script>

@endsection