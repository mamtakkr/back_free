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
			    
                  <!-- <form action="#" method="POST" id="search_form" enctype="multipart/form-data">
                      @csrf
    				<div id="search"> -->
                        <!--<label for=""><i class="fa fa-search" aria-hidden="true"></i></label>-->

    					<input type="text" class="form-control" name="sample_search" id="sample_search" placeholder="Search contacts...">
    					<!-- <input type="text" name="value" placeholder="Search contacts...">
    					<input type="submit" id="search_btn" class="fa fa-search"> -->
    				<!-- </div>
    			   </form> -->
				<div id="contacts">
					<ul id="new_contact">
					    <?php 
					        $currentSession = '';
					        $x=1; 
					    ?>
					    @if(!empty($users))
                        <?php $currentSession = $users[0]->user_id; ?>
					    @foreach($users as $user)
						<li id="{{$user->user_id}}" class="contact @if($x==1) active @endif" data-touserid="{{$user->user_id}}" data-tousername="{{$user->username}}">
							<div class="wrap"><span id="status_{{$user->user_id}}" class="contact-status @if($user->online==1) online @else offline @endif"></span>
								<img src="{{URL::to('/')}}/public/images/users/{{$user->image_url}}" alt="{{$user->username}}">
								<div class="meta">
								    @if($x % 2 == 0)
                                    <p style="color: #F50087;font-size:20px;" class="user_name">{{$user->username}}</p> 
                                    @else
                                    <p style="color: #50A8E2;font-size:20px;" class="user_name">{{$user->username}}</p> 
                                    @endif
									<span id="unread_{{$user->user_id}}" class="unread"></span>
									<?php //$total = DB::table('chat_statuss')->where(['sender_id'=>$user->user_id, 'receiver_id'=>Auth::user()->id])->first();?>
									{{--@if(!empty($total))
									{{$total->no_of_messages}}
									@endif--}}
									</p>
									<p class="second_name">@if($user->user_type=='member') {{$user->you_are}} @else {{$user->club_name}} @endif</p>
									<p class="preview"><span id="isTyping_{{$user->user_id}}" class="isTyping"></span></p>
								</div>
							</div>
						</li>
						<?php $x++;?>
						@endforeach
						@endif
					</ul>
				</div>

			</div>
			
			
			<div class="content" id="content">
			@if(!empty($currentSession))
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
					<ul>
                        <?php $messages = getUserChat($currentSession,Auth::user()->id);?>
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
                    </ul>
				</div>
				
				<div class="message-input" id="replySection">
						<div class="wrap emoji-picker-container">
						    <input class="chatMessage" type="text" name="message" data-emojiable="true" data-id="chatMessage{{$userDetails->id}}" id="chatMessage{{$userDetails->id}}" autocomplete="off"  placeholder="Write your message...">
						    <!--<input type="text" class="chatMessage" id="chatMessage6" placeholder="Write your message...">-->
							<button class="submit chatButton" id="chatButton{{$userDetails->id}}"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
						</div>
				</div>
			@else
			<!--<div class="messages" id="conversation">-->
			<!--		<ul>-->
			<!--		    <li class="incoming sent">No Conversation Start.</li>-->
   <!--                 </ul>-->
			<!--	</div>-->
			<div class="contact-profile" id="userSection">
					Start Conversation
				<!--	<div class="user_detalis">-->
					   
					    
					    
				<!--	</div>   -->
				<!--</div>-->
				
				
				<!--<div class="messages" id="conversation">-->
				<!--	<ul>-->
                       
    <!--                </ul>-->
				<!--</div>-->
				
			@endif
			</div>
			
		</div>
	</div>
	<br>
	<br>
</div>


<script>
//Bind keypress event to document
// $(document).keypress(function(event){
//         var keycode = (event.keyCode ? event.keyCode : event.which);
//         if(keycode == '13'){
//           //alert('You pressed a "enter" key in somewhere');  
//         }
//       });
        
$(document).ready(function(){
	// setInterval(function(){
	// 	updateUserList();	
	// 	updateUnreadMessageCount();	
	// }, 5000);	
	setInterval(function(){
// 		showTypingStatus();
		updateUserChat();			
	}, 2000);
	// var objDiv = document.getElementById("conversation");
    // objDiv.scrollTop = objDiv.scrollHeight;
	
	$(document).on('click', '.contact', function(){		
		$('.contact').removeClass('active');
		$(this).addClass('active');
		var to_user_id = $(this).data('touserid');
		showUserChat(to_user_id);
		$(".chatMessage").attr('id', 'chatMessage'+to_user_id);
		$(".chatButton").attr('id', 'chatButton'+to_user_id);
	});	
	
	$(document).on('keypress',function(e) {
		if(e.which == 13) {
			//$('.submit').click();
			var to_user_id = $('.submit').attr('id');
			to_user_id = to_user_id.replace(/chatButton/g, "");
			console.log(to_user_id);
			sendMessage(to_user_id);
			$('.chatMessage').empty();
        }
    });
	
	$(document).on("click", '.submit', function(event) { 
		
		var to_user_id = $(this).attr('id');
		to_user_id = to_user_id.replace(/chatButton/g, "");
		sendMessage(to_user_id);
		$('.chatMessage').empty();
	});
}); 

function showUserChat(to_user_id){
    var qs = {
        to_user_id: to_user_id,
        action: 'show_chat',
        _token: '{{csrf_token()}}'
    };
    
	$.ajax({
		url:"{{ route('show-chat') }}",
		method:"POST",
		data:qs,
		dataType: "json",
		success:function(response){
	        $("#content").html(response);
	       // $("#conversation").html(response);
		}
	});
}




function sendMessage(to_user_id) {
    
    // const element = document.getElementById('conversation');
    // element.scrollTop = element.scrollHeight;
	message = $("input[name=message]").val();
	console.log('clieckeddd'+message);
	$('.message-input input').val('');
	$('#chatMessage'+to_user_id).val('');
	if($.trim(message) == '') {
		return false;
	}
			
    var qs = {
        receiver_id: to_user_id,
        message: message,
        action: 'insert_chat',
        _token: '{{csrf_token()}}'
    };
	$.ajax({
		url:"{{ route('chat-action') }}",
		method:"POST",
		data:qs,
		dataType: "json",
		success:function(response) {
	        $("#conversation").html(response);
// 			$('#conversation').html(resp.conversation);				
            $('#chatMessage'+to_user_id).val('');
			// var objDiv = document.getElementById("conversation");
            // objDiv.scrollTop = objDiv.scrollHeight;
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
			url:"{{ route('update-user-chat') }}",
			method:"POST",
			data:qs,
			dataType: "json",
			success:function(response){		
			 //   console.log(JSON.stringify(response));
	            $("#conversation").html(response);
	           // var objDiv = document.getElementById("conversation");
            //     objDiv.scrollTop = objDiv.scrollHeight;
	           
			}
		});
	});
}



function updateUserList() {
    var qs = {
        action: 'update_user_list',
        _token: '{{csrf_token()}}'
    };
    
	$.ajax({
		url:"{{ route('users-list') }}",
		method:"POST",
		dataType: "json",
		data:qs,
		success:function(response){		
		  	$("#contacts").html(response);		
		}
	});
}
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


<script>
$(function() {
      
	//   $("#search_form").submit(function(e) {
    //     e.preventDefault();
    //     const fd = new FormData(this);
    //     // $("#search_btn").text('Searching...');
    //     $.ajax({
    //       url: '{{ route('search-contact-msg') }}',
    //       method: 'post',
    //       data: fd,
    //       cache: false,
    //       contentType: false,
    //       processData: false,
    //       dataType: 'json',
    //       success: function(response) {
	// 	  	$("#contacts").html(response);	
    //         //   updateUserList();	
    //       },
	// 	  error: function(err)
	// 	  {
	// 	  //alert(JSON.stringify(err));
	// 	  }
    //     });
        
    //   });
	  
	}); 
</script>

<script>
$("#sample_search").keyup(function()
  {
        var that = this,
        value = $(this).val();
        // console.log(value);
        var qs = {
            value: value,
            _token: '{{csrf_token()}}'
        };
        
      $.ajax({
          type: "GET",
          url: "{{ route('search-contact-msg') }}",
          data: qs,
          dataType: 'json',
          success: function(msg)
          {	
			console.log(msg.table_data);
			
			// $('tbody').html(data.table_data);
	            $("#contacts").html(msg.table_data);	
          }
      });

  });




  
//  fetch_customer_data();

// function fetch_customer_data(query = '')
// {
//  $.ajax({
//   url:"{{ route('search-contact-msg') }}",
//   method:'GET',
//   data:query,
//   dataType:'json',
//   success:function(data)
//   {
//    $('tbody').html(data.table_data);
//    $('#total_records').text(data.total_data);
//   }
//  })
// }

// $(document).on('keyup', '#sample_search', function(){
// 	var that = this,
//         value = $(this).val();
//         // console.log(value);
//         var query = {
//             value: value,
//             _token: '{{csrf_token()}}'
//         };
//  fetch_customer_data(query);
// });
// });



</script>
@endsection