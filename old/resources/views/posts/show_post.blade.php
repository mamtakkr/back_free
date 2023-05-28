<!-- Modal Header -->
      
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      
<div class="row">
@if(!empty($post->image_url))
  <div class="col-md-6">
    <div class="col-12 text-center"> 
	
	
    <img class="fsdew rounded" src="{{URL::to('/')}}/public/images/posts/{{$post->image_url}}">
	
	
	</div>
  </div>
  @endif
  <div class="@if(!empty($post->image_url)) col-md-6 @else offset-md-3 col-md-6 @endif">
    <div class="">
	<div class="row">
	<div class="col-md-4">
	@if(!empty($post->relUser->image_url)) <img src="{{URL::to('/')}}/public/images/users/{{$post->relUser->image_url}}" class="user-profile"> @else <img src="{{URL::to('/')}}/public/images/no-user.png" class="user-profile"> @endif
	</div>
	<div class="col-md-8">
	<div class="post-info">
	<h6 class="text-white">{{$post->relUser->username}}</h6>
      <p>{{$post->description}}</p>
	  </div>
	  </div>
	</div>
	
	<div class="show_comments" id="show_post_comment{{$post->id}}">
	@if(!empty($post->all_comments))
	@foreach($post->all_comments as $k=>$comment)
      <div class="row">
        <div class="col-md-12">
		@php $userInfo = \App\Models\User::where('id',$comment->user_id)->first(); @endphp
          <p><strong>{{ $userInfo->username ?? '-' }}: </strong>{{$comment->comment}}</p> 
        </div>
      </div>
	  @endforeach
		@endif
		</div>
      
      
      <hr />
      <div class="col-sm-12 col-12 post-comment">
        <form action="#" method="POST" class="add_comment_form" id="myFrm{{ $post->id }}" enctype="multipart/form-data">
          @csrf
          <div class="gter text-center emoji-picker-container">
            <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
            <input type="hidden" name="post_id" value="{{$post->id}}">
			<input type="hidden" name="comment_limit" value="no">
            <input class="form-control" type="text" name="comment" data-emojiable="true" id="comments" value="{{old('comment')}}">
            <button type="submit" id="add_comment_btn" class="bg-standard-violet text-while">Publish</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>-->
<!--<script>
        (function() {
			alert("show_post_comment{{$post->id}}");
            var objDiv = document.getElementById("show_post_comment{{$post->id}}");
			alert(objDiv.scrollHeight);
            objDiv.scrollTop = objDiv.scrollHeight;
        });
    </script>-->
