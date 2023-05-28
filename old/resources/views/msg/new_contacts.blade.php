<ul id="new_contact">
    <?php 
        $currentSession = '';
        $x=1; 
    ?>
    @if(!empty($members))
    <?php $currentSession = $members[0]->user_id; ?>
    @foreach($members as $user)
	<li id="{{$user->user_id}}" class="contact @if($x==1) active @endif" data-touserid="{{$user->user_id}}" data-tousername="{{$user->username}}">
		<div class="wrap"><span id="status_{{$user->user_id}}" class="contact-status @if($user->online==1) online @else offline @endif"></span>
			<img src="{{URL::to('/')}}/public/images/users/{{$user->image_url}}" alt="{{$user->username}}">
			<div class="meta">
			    @if($x % 2 == 0)
                <p style="color: #F50087;font-size:20px;" class="user_name">{{$user->username}}</p> 
                @else
                <p style="color: #50A8E2;font-size:20px;" class="user_name">{{$user->username}}</p> 
                @endif
				<span id="unread_{{$user->user_id}}" class="unread"></span></p>
				<p class="second_name">@if($user->user_type=='member') {{$user->you_are}} @else {{$user->club_name}} @endif</p>
				<p class="preview"><span id="isTyping_{{$user->user_id}}" class="isTyping"></span></p>
			</div>
		</div>
	</li>
	<?php $x++;?>
	@endforeach
	@endif
</ul>