
<div class="contact-profile" id="userSection">
	<img src="{{URL::to('/')}}/public/images/users/{{$user->image_url}}" alt="{{$user->username}}">
	<div class="user_detalis">
	    <p>{{$user->username}} <br>
    	    <span class="new_name">
    	        @if($user->user_type=='member') {{$user->you_are}} @else {{$user->club_name}} @endif
    	    </span>
	    </p>
	    
	</div>   
</div>


<div class="messages" id="conversation">
	<ul>
        <?php $messages = getUserChat($user->id,Auth::user()->id);?>
        @if($messages->count()>0)
            @foreach($messages as $msg)
            @if($msg->sender_id==auth()->user()->id && $msg->receiver_id==$user->id || $msg->sender_id==$user->id && $msg->receiver_id==auth()->user()->id)
            @if($msg->sender_id==auth()->user()->id)
        	<li class="incoming sent">
        	    <img width="22px" height="22px" src="{{URL::to('/')}}/public/images/users/{{$msg->relSender->image_url}}" alt="{{$msg->relSender->username}}">
        		<p>{{$msg->message}} <br> {{$msg->created_at->diffForHumans(null,false,true)}}</p>
        	</li>
        	@else
        	<li class="outgoing sent">
        	    <img width="22px" height="22px" src="{{URL::to('/')}}/public/images/users/{{$msg->relSender->image_url}}" alt="{{$msg->relSender->username}}">
        		<p>{{$msg->message}} <br> {{$msg->created_at->diffForHumans(null,false,true)}}</p>
        	</li>
        	@endif
        	@endif
        	@endforeach
        @endif
    </ul>
</div>

<div class="message-input" id="replySection">
	<div class="message-input" id="replyContainer">
		<div class="wrap emoji-picker-container">
		    <input class="chatMessage" type="text" name="message" data-emojiable="true" id="chatMessage{{$user->id}}" autocomplete="off"  placeholder="Write your message...">
			<button class="submit chatButton" id="chatButton{{$user->id}}"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
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

</script>
