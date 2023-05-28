<ul id="new_contact">
    <?php 
        $currentSession = '';
        $x=1; 
    ?>
    @if(!empty($members))
    @if(!empty($members[0]->id))
    <?php $currentSession = $members[0]->id; ?>
    @foreach($members as $user)
    
	<li id="{{$user->id}}" class="contact @if($x==1) active @endif" data-touserid="{{$user->id}}" data-tousername="{{$user->username}}">
		<div class="wrap"><span id="status_{{$user->id}}" class="contact-status @if($user->online==1) online @else offline @endif"></span>
			<img src="{{URL::to('/')}}/public/images/users/{{$user->image_url}}" alt="{{$user->username}}">
			<div class="meta">
			    @if($x % 2 == 0)
                <p style="color: #F50087;font-size:20px;" class="user_name">{{$user->username}}</p> 
                @else
                <p style="color: #50A8E2;font-size:20px;" class="user_name">{{$user->username}}</p> 
                @endif
				<span id="unread_{{$user->id}}" class="unread"></span></p>
				<p class="second_name">@if($user->user_type=='member') {{$user->you_are}} @else {{$user->club_name}} @endif</p>
				<p class="preview"><span id="isTyping_{{$user->id}}" class="isTyping"></span></p>
			</div>
		</div>
	</li>
	<?php $x++;?>
	@endforeach
	@else
	<?php //$auth_user=\App\Models\User::where('id',Auth::user()->id)->pluck('current_session')->first();?>
	<?php //$user=\App\Models\User::where('id',$auth_user)->first();?>
    {{--<li id="{{$user->id}}" class="contact @if($x==1) active @endif" data-touserid="{{$user->id}}" data-tousername="{{$user->username}}">
		<div class="wrap"><span id="status_{{$user->id}}" class="contact-status @if($user->online==1) online @else offline @endif"></span>
			<img src="{{URL::to('/')}}/public/images/users/{{$user->image_url}}" alt="{{$user->username}}">
			<div class="meta">
			    @if($x % 2 == 0)
                <p style="color: #F50087;font-size:20px;" class="user_name">{{$user->username}}</p> 
                @else
                <p style="color: #50A8E2;font-size:20px;" class="user_name">{{$user->username}}</p> 
                @endif
				<span id="unread_{{$user->id}}" class="unread"></span></p>
				<p class="second_name">@if($user->user_type=='member') {{$user->you_are}} @else {{$user->club_name}} @endif</p>
				<p class="preview"><span id="isTyping_{{$user->id}}" class="isTyping"></span></p>
			</div>
		</div>
	</li>--}}
	@endif
	@endif
	
	
</ul>