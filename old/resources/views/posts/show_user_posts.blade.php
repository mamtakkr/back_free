@if($posts->count() > 0)
@foreach($posts as $post)
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
@if($k<3)
<div class="row">
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
          <button type="submit" id="add_comment_btn" class="bg-standard-violet text-while">Publish</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endforeach
@else
<div class="coment mt-3 rounded">
  <h1 class="text-center text-secondary my-5">No record present in the database!</h1>
</div>
@endif


<div class="modal fade bd-example-modal-lg post-details" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

    </div>
  </div>
</div>



<script src="{{URL::to('/')}}/public/frontend/emoji/js/config.min.js"></script>
<script src="{{URL::to('/')}}/public/frontend/emoji/js/util.min.js"></script>
<script src="{{URL::to('/')}}/public/frontend/emoji/js/jquery.emojiarea.min.js"></script>
<script src="{{URL::to('/')}}/public/frontend/emoji/js/emoji-picker.min.js"></script>
<script>
  $(function() {
    // Initializes and creates emoji set from sprite sheet
    window.emojiPicker = new EmojiPicker({
      emojiable_selector: '[data-emojiable=true]',
      assetsPath: '{{URL::to('/')}}/public/frontend/emoji/img/',
      popupButtonClasses: 'fa fa-smile-o'
    });
    
    window.emojiPicker.discover();
  });
      
      
      
    $(document).on('submit',".add_comment_form",function(e) {
    e.preventDefault();
    const fd = new FormData(this);
	var thiss = $(this);
    thiss.closest('.post-comment').find("#add_comment_btn").text('Adding...');
    
    $.ajax({
          url: '{{ route('comment-store') }}',
          method: 'post',
          data: fd,
          cache: false,
          contentType: false,
          processData: false,
          dataType: 'json',
          success: function(response) {
		  //alert(JSON.stringify(response));
            if (response.status == 200) {
              fetchAllComments(response.post_id,response.comment_limit);
			  
			  	thiss.closest('.post-comment').find("#comments").val('');
                thiss.closest('.post-comment').find("#add_comment_btn").text('Publish');
				$('.emoji-wysiwyg-editor').text('');
                $('#myFrm'+response.post_id)[0].reset();
            }
          },
		  error: function(err)
		  {
		  	alert(JSON.stringify(err));
		  }
        });
    });
    
    // fetch all comments ajax request
    /*fetchAllComments();*/

    function fetchAllComments(post_id,comment_limit) {
        $.ajax({
          url: '{{ route('fetchAllComments') }}'+'?post_id='+post_id+'&comment_limit='+comment_limit,
          method: 'get',
          success: function(response) {
		  	if(comment_limit=='yes')
			{
            $("#show_all_comments"+post_id).html(JSON.parse(response));
			}
			else
			{
			$("#show_post_comment"+post_id).html(JSON.parse(response));
			
				}
          },
		  error: function(err)
		  {
		  	alert(JSON.stringify(err));
		  }
        });
    }


function openDetails(post_id)
{

		$.ajax({
          url: '{{ route('fetchPost') }}'+'?post_id='+post_id,
          method: 'get',
          success: function(response) {
            $(".modal-content").html(JSON.parse(response));
			//$('.show_comments').scrollTop($('.show_comments')[0].scrollHeight);

			$('.bd-example-modal-lg').modal('show');
          },
		  error: function(err)
		  {
		  	alert(JSON.stringify(err));
		  }
        });




}
</script>
