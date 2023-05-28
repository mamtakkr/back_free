@extends('layouts.front')

@section('content')

<link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.2/css/font-awesome.min.css'>
<link href="{{URL::to('/')}}/public/chat/css/style.css" rel="stylesheet" id="bootstrap-css">
<!--<script src="{{URL::to('/')}}/public/chat/js/chat.js"></script>-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<style>
	.modal-dialog {
		width: 400px;
		margin: 30px auto;
	}
</style>

<div class="container">
	<div class="chat">
		<div id="frame">
			<div id="sidepanel">

				<div id="search">
					<label for=""><i class="fa fa-search" aria-hidden="true"></i></label>
					<input type="text" placeholder="Search contacts...">
				</div>
				<div id="contacts">
					<ul>
					    <?php 
					        $currentSession = '';
					        $x=1; 
					    ?>
					    @foreach($users as $user)
                        <?php $currentSession = $user->id; ?>
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
					</ul>
				</div>

			</div>
			
			
			<div class="content" id="content">
			    <?php $userDetails = chat_user_details($currentSession);?>
				
				<div class="contact-profile" id="userSection">
					<img src="{{URL::to('/')}}/public/images/users/{{$userDetails->image_url}}" alt="{{$userDetails->username}}">
					<div class="user_detalis">
					    @if($x % 2 == 0)
                        <p style="color: #F50087;font-size:20px;">
                            {{$userDetails->username}}
                        </p> 
                        <span class="new_name">
					        @if($userDetails->user_type=='member') {{$userDetails->you_are}} @else {{$userDetails->club_name}} @endif
					    </span>
                        @else
                        <p style="color: #50A8E2;font-size:20px;">
                            {{$userDetails->username}}
                        </p> 
                        <span class="new_name">
					        @if($userDetails->user_type=='member') {{$userDetails->you_are}} @else {{$userDetails->club_name}} @endif
					    </span>
                        @endif
					    
					    
					</div>   
				</div>
				
				
				<div class="messages" id="conversation">
					{{--<ul>
                        <?php $messages = getUserChat($currentSession,Auth::user()->id);?>
                        @foreach($messages as $msg)
                        @if($msg->sender_id==auth()->user()->id && $msg->receiver_id==$user->id)
                            @if($msg->sender_id==auth()->user()->id)
                        	<li class="incoming sent">
                        	    <img width="22px" height="22px" src="{{URL::to('/')}}/public/images/users/{{$msg->relSender->image_url}}" alt="{{$msg->relSender->username}}">
                        		<p>{{$msg->message}}</p>
                        	</li>
                        	@else
                        	<li class="outgoing sent">
                        	    <img width="22px" height="22px" src="{{URL::to('/')}}/public/images/users/{{$msg->relSender->image_url}}" alt="{{$msg->relSender->username}}">
                        		<p>{{$msg->message}}</p>
                        	</li>
                        	@endif
                        @endif
                    	@endforeach
                    </ul>--}}
				</div>
				
				<div class="message-input " id="replySection">
					<div class="message-input" id="replyContainer">
						<div class="wrap emoji-picker-container">
						    <input class="chatMessage" type="text" name="message" data-emojiable="true" id="chatMessage{{$userDetails->id}}" autocomplete="off"  placeholder="Write your message...">
						    <!--<input type="text" class="chatMessage" id="chatMessage6" placeholder="Write your message...">-->
							<button class="submit chatButton" id="chatButton{{$userDetails->id}}"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
						</div>
					</div>
				</div>
			</div>
			
		</div>
	</div>
	<br>
	<br>
</div>


<script>

$(document).ready(function(){
	setInterval(function(){
		updateUserList();	
		updateUnreadMessageCount();	
	}, 60000);
	
	setInterval(function(){
		showTypingStatus();
		updateUserChat();			
	}, 5000);
	
	$(".messages").animate({ 
		scrollTop: $(document).height() 
	}, "fast");
	
	$(document).on("click", '#profile-img', function(event) { 	
		$("#status-options").toggleClass("active");
	});
	
	$(document).on("click", '.expand-button', function(event) { 	
		$("#profile").toggleClass("expanded");
		$("#contacts").toggleClass("expanded");
	});	
	
	$(document).on("click", '#status-options ul li', function(event) { 	
		$("#profile-img").removeClass();
		$("#status-online").removeClass("active");
		$("#status-away").removeClass("active");
		$("#status-busy").removeClass("active");
		$("#status-offline").removeClass("active");
		$(this).addClass("active");
		if($("#status-online").hasClass("active")) {
			$("#profile-img").addClass("online");
		} else if ($("#status-away").hasClass("active")) {
			$("#profile-img").addClass("away");
		} else if ($("#status-busy").hasClass("active")) {
			$("#profile-img").addClass("busy");
		} else if ($("#status-offline").hasClass("active")) {
			$("#profile-img").addClass("offline");
		} else {
			$("#profile-img").removeClass();
		};
		$("#status-options").removeClass("active");
	});	
	
	$(document).on('click', '.contact', function(){		
		$('.contact').removeClass('active');
		$(this).addClass('active');
		var to_user_id = $(this).data('touserid');
		showUserChat(to_user_id);
		$(".chatMessage").attr('id', 'chatMessage'+to_user_id);
		$(".chatButton").attr('id', 'chatButton'+to_user_id);
	});	
	
	$(document).on("click", '.submit', function(event) { 
		var to_user_id = $(this).attr('id');
		to_user_id = to_user_id.replace(/chatButton/g, "");
		sendMessage(to_user_id);
	});
	
	$(document).on('focus', '.message-input', function(){
		var is_type = 'yes';
		var qs = {
            is_type: is_type,
            action: 'update_typing_status',
            _token: '{{csrf_token()}}'
        };
		$.ajax({
			url:"{{ route('chat-action') }}",
			method:"POST",
			data:qs,
			success:function(){
			}
		});
	}); 
	
	$(document).on('blur', '.message-input', function(){
		var is_type = 'no';
		var qs = {
            is_type: is_type,
            action: 'update_typing_status',
            _token: '{{csrf_token()}}'
        };
		$.ajax({
			url:"{{ route('chat-action') }}",
			method:"POST",
			data:qs,
			success:function() {
			}
		});
	}); 		
}); 

function updateUserList() {
    var qs = {
            action: 'update_user_list',
            _token: '{{csrf_token()}}'
        };
	$.ajax({
		url:"{{ route('chat-action') }}",
		method:"POST",
		dataType: "json",
		data:qs,
		success:function(response){		
			var obj = response.profileHTML;
			Object.keys(obj).forEach(function(key) {
				// update user online/offline status
				if($("#"+obj[key].userid).length) {
					if(obj[key].online == 1 && !$("#status_"+obj[key].userid).hasClass('online')) {
						$("#status_"+obj[key].userid).addClass('online');
					} else if(obj[key].online == 0){
						$("#status_"+obj[key].userid).removeClass('online');
					}
				}				
			});			
		}
	});
}

function sendMessage(to_user_id) {
	message = $(".message-input input").val();
	$('.message-input input').val('');
	if($.trim(message) == '') {
		return false;
	}
	var qs = {
        to_user_id: to_user_id,
        chat_message: message,
        action: 'insert_chat',
        _token: '{{csrf_token()}}'
    };
    alert(JSON.stringify(qs))
	$.ajax({
		url:"{{ route('chat-action') }}",
		method:"POST",
		data:qs,
		dataType: "json",
		success:function(response) {
            alert(JSON.stringify($.parseJSON(response)))
			var resp = $.parseJSON(response);			
			$('#conversation').html(resp.conversation);				
			$(".messages").animate({ scrollTop: $('.messages').height() }, "fast");
		}
	});	
}

// function showUserChat(to_user_id){
// 	$.ajax({
// 		url:"chat_action.php",
// 		method:"POST",
// 		data:{to_user_id:to_user_id, action:'show_chat'},
// 		dataType: "json",
// 		success:function(response){
// 			$('#userSection').html(response.userSection);
// 			$('#conversation').html(response.conversation);	
// 			$('#unread_'+to_user_id).html('');
// 		}
// 	});
// }

function showUserChat(to_user_id){
    var qs = {
        to_user_id: to_user_id,
        action: 'show_chat',
        _token: '{{csrf_token()}}'
    };
    
	$.ajax({
		url:"{{ route('chat-action') }}",
		method:"POST",
		data:qs,
		dataType: "json",
		success:function(response){
	       // $("#content").html(response);
	       
			$('#userSection').html(response.userSection);
			$('#conversation').html(response.conversation);	
			$('#unread_'+to_user_id).html('');
		}
	});
}

function updateUserChat() {
	$('li.contact.active').each(function(){
		var to_user_id = $(this).attr('data-touserid');
		var qs = {
            to_user_id: to_user_id,
            action: 'update_user_chat',
            _token: '{{csrf_token()}}'
        };
		$.ajax({
			url:"{{ route('chat-action') }}",
			method:"POST",
			data:qs,
			dataType: "json",
			success:function(response){				
				$('#conversation').html(response.conversation);			
			}
		});
	});
}

function updateUnreadMessageCount() {
	$('li.contact').each(function(){
		if(!$(this).hasClass('active')) {
			var to_user_id = $(this).attr('data-touserid');
			var qs = {
                to_user_id: to_user_id,
                action: 'update_unread_message',
                _token: '{{csrf_token()}}'
            };
			$.ajax({
				url:"{{ route('chat-action') }}",
				method:"POST",
				data:qs,
				dataType: "json",
				success:function(response){		
					if(response.count) {
						$('#unread_'+to_user_id).html(response.count);	
					}					
				}
			});
		}
	});
}

function showTypingStatus() {
	$('li.contact.active').each(function(){
		var to_user_id = $(this).attr('data-touserid');
		var qs = {
            to_user_id: to_user_id,
            action: 'show_typing_status',
            _token: '{{csrf_token()}}'
        };
		$.ajax({
			url:"{{ route('chat-action') }}",
			method:"POST",
			data:qs,
			dataType: "json",
			success:function(response){				
				$('#isTyping_'+to_user_id).html(response.message);			
			}
		});
	});
}
















// $(document).ready(function(){
// 	setInterval(function(){
// 		updateUserList();	
// // 		updateUnreadMessageCount();	
// 	}, 60000);	
// 	setInterval(function(){
// // 		showTypingStatus();
// 		updateUserChat();			
// 	}, 5000);
// 	$(".messages").animate({ 
// 		scrollTop: $(document).height() 
// 	}, "fast");
	
	
// 	$(document).on('click', '.contact', function(){		
// 		$('.contact').removeClass('active');
// 		$(this).addClass('active');
// 		var to_user_id = $(this).data('touserid');
// 		showUserChat(to_user_id);
// 		$(".chatMessage").attr('id', 'chatMessage'+to_user_id);
// 		$(".chatButton").attr('id', 'chatButton'+to_user_id);
// 	});	
	
	
// 	$(document).on("click", '.submit', function(event) { 
// 		var to_user_id = $(this).attr('id');
// 		to_user_id = to_user_id.replace(/chatButton/g, "");
// 		sendMessage(to_user_id);
// 	});
// }); 
	

// function showUserChat(to_user_id){
//     var qs = {
//         to_user_id: to_user_id,
//         action: 'show_chat',
//         _token: '{{csrf_token()}}'
//     };
    
// 	$.ajax({
// 		url:"{{ route('chat-action') }}",
// 		method:"POST",
// 		data:qs,
// 		dataType: "json",
// 		success:function(response){
// 	        $("#content").html(response);
// 	       // $("#conversation").html(response);
// 		}
// 	});
// }


// function sendMessage(to_user_id) {
// 	message = $(".message-input input").val();
// 	$('.message-input input').val('');
// 	$('#chatMessage'+to_user_id).val('');
// 	if($.trim(message) == '') {
// 		return false;
// 	}
// 	var qs = {
//         receiver_id: to_user_id,
//         message: message,
//         action: 'insert_chat',
//         _token: '{{csrf_token()}}'
//     };
// 	$.ajax({
// 		url:"{{ route('chat-action') }}",
// 		method:"POST",
// 		data:qs,
// 		dataType: "json",
// 		success:function(response) {
// 	        $("#conversation").html(response);
// // 			$('#conversation').html(resp.conversation);				
//             $('#chatMessage'+to_user_id).val('');
// 			$(".messages").animate({ scrollTop: $('.messages').height() }, "fast");
			
// 		}
// 	});	
// }
	
	

// function updateUserChat() {
// 	$('li.contact.active').each(function(){
// 		var to_user_id = $(this).attr('data-touserid');
// 		var qs = {
//             to_user_id: to_user_id,
//             action: 'update_user_chat',
//             _token: '{{csrf_token()}}'
//         };
        
// 		$.ajax({
// 			url:"{{ route('chat-action') }}",
// 			method:"POST",
// 			data:qs,
// 			dataType: "json",
// 			success:function(response){				
// 	            $("#conversation").html(response);		
// 			}
// 		});
// 	});
// }
</script>



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

@endsection