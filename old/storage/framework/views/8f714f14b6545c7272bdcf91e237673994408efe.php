<?php $__env->startSection('content'); ?>

<link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.2/css/font-awesome.min.css'>
<link href="<?php echo e(URL::to('/')); ?>/public/chat/css/style.css" rel="stylesheet" id="bootstrap-css">
<!--<script src="<?php echo e(URL::to('/')); ?>/public/chat/js/chat.js"></script>-->
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
                      <?php echo csrf_field(); ?>
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
					    <?php if(!empty($users)): ?>
                        <?php $currentSession = $users[0]->user_id; ?>
					    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<li id="<?php echo e($user->user_id); ?>" class="contact <?php if($x==1): ?> active <?php endif; ?>" data-touserid="<?php echo e($user->user_id); ?>" data-tousername="<?php echo e($user->username); ?>">
							<div class="wrap"><span id="status_<?php echo e($user->user_id); ?>" class="contact-status <?php if($user->online==1): ?> online <?php else: ?> offline <?php endif; ?>"></span>
								<img src="<?php echo e(URL::to('/')); ?>/public/images/users/<?php echo e($user->image_url); ?>" alt="<?php echo e($user->username); ?>">
								<div class="meta">
								    <?php if($x % 2 == 0): ?>
                                    <p style="color: #F50087;font-size:20px;" class="user_name"><?php echo e($user->username); ?></p> 
                                    <?php else: ?>
                                    <p style="color: #50A8E2;font-size:20px;" class="user_name"><?php echo e($user->username); ?></p> 
                                    <?php endif; ?>
									<span id="unread_<?php echo e($user->user_id); ?>" class="unread"></span></p>
									<p class="second_name"><?php if($user->user_type=='member'): ?> <?php echo e($user->you_are); ?> <?php else: ?> <?php echo e($user->club_name); ?> <?php endif; ?></p>
									<p class="preview"><span id="isTyping_<?php echo e($user->user_id); ?>" class="isTyping"></span></p>
								</div>
							</div>
						</li>
						<?php $x++;?>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						<?php endif; ?>
					</ul>
				</div>

			</div>
			
			
			<div class="content" id="content">
			<?php if(!empty($currentSession)): ?>
			    <?php $userDetails = chat_user_details($currentSession);?>
				<div class="contact-profile" id="userSection">
					<img src="<?php echo e(URL::to('/')); ?>/public/images/users/<?php echo e($userDetails->image_url); ?>" alt="<?php echo e($userDetails->username); ?>">
					<div class="user_detalis">
					    <?php if($x % 2 == 0): ?>
                        <p style="color: #F50087;font-size:20px;">
                            <?php echo e($userDetails->username); ?>

                        </p> 
                        <span class="new_name">
					        <?php if($userDetails->user_type=='member'): ?> <?php echo e($userDetails->you_are); ?> <?php else: ?> <?php echo e($userDetails->club_name); ?> <?php endif; ?>
					    </span>
                        <?php else: ?>
                        <p style="color: #50A8E2;font-size:20px;">
                            <?php echo e($userDetails->username); ?>

                        </p> 
                        <span class="new_name">
					        <?php if($userDetails->user_type=='member'): ?> <?php echo e($userDetails->you_are); ?> <?php else: ?> <?php echo e($userDetails->club_name); ?> <?php endif; ?>
					    </span>
                        <?php endif; ?>
					    
					    
					</div>   
				</div>
				
				
				<div class="messages" id="conversation">
					<ul>
                        <?php $messages = getUserChat($currentSession,Auth::user()->id);?>
                        <?php $__currentLoopData = $messages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $msg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($msg->sender_id==auth()->user()->id && $msg->receiver_id==$user->id || $msg->sender_id==$user->id && $msg->receiver_id==auth()->user()->id): ?>
                            <?php if($msg->sender_id==auth()->user()->id): ?>
                        	<li class="incoming sent">
                        	    <img width="22px" height="22px" src="<?php echo e(URL::to('/')); ?>/public/images/users/<?php echo e($msg->relSender->image_url); ?>" alt="<?php echo e($msg->relSender->username); ?>">
                        		<p><?php echo e($msg->message); ?> <br> <?php echo e($msg->created_at->diffForHumans(null,false,true)); ?></p>
                        	</li>
                        	<?php else: ?>
                        	<li class="outgoing sent">
                        	    <img width="22px" height="22px" src="<?php echo e(URL::to('/')); ?>/public/images/users/<?php echo e($msg->relSender->image_url); ?>" alt="<?php echo e($msg->relSender->username); ?>">
                        		<p><?php echo e($msg->message); ?> <br> <?php echo e($msg->created_at->diffForHumans(null,false,true)); ?></p>
                        	</li>
                        	<?php endif; ?>
                        <?php endif; ?>
                    	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
				</div>
				
				<div class="message-input" id="replySection">
						<div class="wrap emoji-picker-container">
						    <input class="chatMessage" type="text" name="message" data-emojiable="true" data-id="chatMessage<?php echo e($userDetails->id); ?>" id="chatMessage<?php echo e($userDetails->id); ?>" autocomplete="off"  placeholder="Write your message...">
						    <!--<input type="text" class="chatMessage" id="chatMessage6" placeholder="Write your message...">-->
							<button class="submit chatButton" id="chatButton<?php echo e($userDetails->id); ?>"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
						</div>
				</div>
			<?php else: ?>
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
				
			<?php endif; ?>
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
	}, 5000);	
	setInterval(function(){
// 		showTypingStatus();
		updateUserChat();			
	}, 1000);

	
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
			$('.submit').click();
			// var to_user_id = $('.submit').attr('id');
			// to_user_id = to_user_id.replace(/chatButton/g, "");
			// console.log(to_user_id);
			// sendMessage(to_user_id);
			// $('.chatMessage').empty();
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
        _token: '<?php echo e(csrf_token()); ?>'
    };
    
	$.ajax({
		url:"<?php echo e(route('show-chat')); ?>",
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
        _token: '<?php echo e(csrf_token()); ?>'
    };
	$.ajax({
		url:"<?php echo e(route('chat-action')); ?>",
		method:"POST",
		data:qs,
		dataType: "json",
		success:function(response) {
	        $("#conversation").html(response);
// 			$('#conversation').html(resp.conversation);				
            $('#chatMessage'+to_user_id).val('');
			
		}
	});	
}
	
	

function updateUserChat() {
	$('li.contact.active').each(function(){
		var to_user_id = $(this).attr('data-touserid');
		var qs = {
            to_user_id: to_user_id,
            action: 'update_user_chat',
            _token: '<?php echo e(csrf_token()); ?>'
        };
        
		$.ajax({
			url:"<?php echo e(route('update-user-chat')); ?>",
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
        _token: '<?php echo e(csrf_token()); ?>'
    };
    
	$.ajax({
		url:"<?php echo e(route('users-list')); ?>",
		method:"POST",
		dataType: "json",
		data:qs,
		success:function(response){		
		  	$("#contacts").html(response);		
		}
	});
}
</script>



<script src="<?php echo e(URL::to('/')); ?>/public/frontend/emoji/js/config.min.js"></script>
<script src="<?php echo e(URL::to('/')); ?>/public/frontend/emoji/js/util.min.js"></script>
<script src="<?php echo e(URL::to('/')); ?>/public/frontend/emoji/js/jquery.emojiarea.min.js"></script>
<script src="<?php echo e(URL::to('/')); ?>/public/frontend/emoji/js/emoji-picker.min.js"></script>
<script>
  $(function() {
    // Initializes and creates emoji set from sprite sheet
    window.emojiPicker = new EmojiPicker({
      emojiable_selector: '[data-emojiable=true]',
      assetsPath: '<?php echo e(URL::to('/')); ?>/public/frontend/emoji/img/',
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
    //       url: '<?php echo e(route('search-contact-msg')); ?>',
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
            _token: '<?php echo e(csrf_token()); ?>'
        };
        
      $.ajax({
          type: "GET",
          url: "<?php echo e(route('search-contact-msg')); ?>",
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
//   url:"<?php echo e(route('search-contact-msg')); ?>",
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
//             _token: '<?php echo e(csrf_token()); ?>'
//         };
//  fetch_customer_data(query);
// });
// });



</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/demogswebtech/public_html/freely/resources/views/messages1.blade.php ENDPATH**/ ?>