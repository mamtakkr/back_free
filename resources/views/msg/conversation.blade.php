


<ul>
    @foreach($conversation as $msg)
    @if($msg->sender_id==auth()->user()->id && $msg->receiver_id==$user->id || $msg->sender_id==$user->id && $msg->receiver_id==auth()->user()->id)
        @if($msg->sender_id==auth()->user()->id)
    	<li class="incoming sent">
    	    <img width="22px" height="22px" src="{{URL::to('/')}}/public/images/users/{{$msg->relSender->image_url}}" alt="{{$msg->relSender->username}}">
    		<p class="message_chat">{{$msg->message}} <br> <span class="time_chat">{{$msg->created_at->diffForHumans(null,false,true)}}</span></p>
    	</li>
    	@else
    	<li class="outgoing sent">
    	    <img width="22px" height="22px" src="{{URL::to('/')}}/public/images/users/{{$msg->relSender->image_url}}" alt="{{$msg->relSender->username}}">
    		<p>{{$msg->message}} <br> <span class="time_chat">{{$msg->created_at->diffForHumans(null,false,true)}}</span></p>
    	</li>
    	@endif
    @endif
	@endforeach
</ul>


