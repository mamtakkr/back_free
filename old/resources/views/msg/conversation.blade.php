


<ul>
    @foreach($conversation as $msg)
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
</ul>


