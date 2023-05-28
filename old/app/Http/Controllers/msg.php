<?php
namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Message;
use Illuminate\Http\Request;
use \Validator;
use URL;
use Auth;

class MessageController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

	public function messages(Request $request)
    {
        $users = User::where('user_type','!=','admin')
                        ->where('id','!=',Auth::user()->id)
                        ->where(['approved_status'=>'approved','active_status'=>'active'])->get();
                        
        return view('messages',compact('users'));
	}



	public function messages1(Request $request)
    {
        $all_users = User::where('user_type','!=','admin')
                        ->where('id','!=',Auth::user()->id)
                        ->where('online',1)
                        ->where(['approved_status'=>'approved','active_status'=>'active'])->get();
        
        $users = array();
        foreach($all_users as $user)
        {
            if(empty(get_block($user->id)))
            {
                $users[] = $user;
            }
        }
        
        return view('messages1',compact('users'));
	}
    
    public function chat_action(Request $request)
    {
        if($request->action == 'update_user_list') {
        	$chatUsers = User::where('online',1)->where('active_status','active')->get();
        	$data = array(
        		"profileHTML" => $chatUsers,	
        	);
        	return json_encode($data);	
        }
        if($request->action == 'insert_chat') {
        	return $this->insertChat($request->to_user_id, Auth::user()->id, $request->chat_message);
        }
        if($request->action == 'show_chat') {
        	$this->showUserChat(Auth::user()->id, $request->to_user_id);
        }
        if($request->action == 'update_user_chat') {
        	$conversation = $this->getUserChat(Auth::user()->id, $request->to_user_id);
        	$data = array(
        		"conversation" => $conversation			
        	);
        	return json_encode($data);
        }
        
        if($request->action == 'update_unread_message') {
        	$count = $this->getUnreadMessageCount($request->to_user_id, Auth::user()->id);
        	$data = array(
        		"count" => $count			
        	);
        	return json_encode($data);
        }
        
        // if($request->action == 'update_typing_status') {
        // 	$this->updateTypingStatus($request->is_type, Auth::user()->id);
        // }
        // if($request->action == 'show_typing_status') {
        // 	$message = $chat->fetchIsTypeStatus($_POST['to_user_id']);
        // 	$data = array(
        // 		"message" => $message			
        // 	);
        // 	echo json_encode($data);
        // }
    }
    
    
// 	public function updateTypingStatus($is_type, $loginDetailsId) {		
// 		$sqlUpdate = "
// 			UPDATE ".$this->chatLoginDetailsTable." 
// 			SET is_typing = '".$is_type."' 
// 			WHERE id = '".$loginDetailsId."'";
// 		mysqli_query($this->dbConnect, $sqlUpdate);
// 	}
    
    public function insertChat($reciever_userid, $user_id, $chat_message)
    {
		$result = new Message([
                'sender_id' => $user_id,
                'receiver_id' => $reciever_userid,
                'message' => $chat_message,
                'status' => 1,
    //             'document' => $new_name,
    // 			'document_name' => $document_name,
    // 			'document_size' => $document_size,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
            $result->save();
		
		
		if(!$result){
			return "Error";
		} else {
			$conversation = $this->getUserChat($user_id, $reciever_userid);
			$data = array(
				"conversation" => $conversation			
			);
			return json_encode($data);	
		}
    }
    
    
    
    
    
    
    public function getUserChat($from_user_id, $to_user_id) {
		$fromUserAvatar = $this->getUserAvatar($from_user_id);	
		$toUserAvatar = $this->getUserAvatar($to_user_id);			
			
		$userChat = Message::where(['sender_id'=>$from_user_id, 'receiver_id'=>$to_user_id])
		                    ->orWhere(['sender_id'=>$to_user_id, 'receiver_id'=>$from_user_id])
		                    ->orderBy('created_at','asc')->get();
			
        $fromUserAvatarurl = url('/').'/public/images/users/'.$fromUserAvatar;
        $toUserAvatarurl = url('/').'/public/images/users/'.$toUserAvatar;
        
		$conversation = '<ul>';
		foreach($userChat as $chat){
			$user_name = '';
			if($chat["sender_id"] == $from_user_id) {
				$conversation .= '<li class="sent">';
				$conversation .= '<img width="22px" height="22px" src="'.$fromUserAvatarurl.'" alt="" />';
			} else {
				$conversation .= '<li class="replies">';
				$conversation .= '<img width="22px" height="22px" src="'.$toUserAvatarurl.'" alt="" />';
			}			
			$conversation .= '<p>'.$chat["message"].'</p>';			
			$conversation .= '</li>';
		}		
		$conversation .= '</ul>';
		return $conversation;
	}
    
    
	public function getUserAvatar($userid){
		$userAvatar = User::where('id',$userid)->pluck('image_url')->first();
		
		return $userAvatar;
	}	
    
    
    
	public function showUserChat($from_user_id, $to_user_id) {		
// 		$userDetails = $this->getUserDetails($to_user_id);
		$userDetails = User::where('id'.$to_user_id)->get();
		
		$toUserAvatar = '';
		foreach ($userDetails as $user) {
            $user_img = url('/').'/public/images/users/'.$user['image_url'];
			$toUserAvatar = $user['image_url'];
			$userSection = '<img src="'.$user_img.'" alt="" />
				<p>'.$user['username'].'</p>
				<div class="social-media">
					<i class="fa fa-facebook" aria-hidden="true"></i>
					<i class="fa fa-twitter" aria-hidden="true"></i>
					 <i class="fa fa-instagram" aria-hidden="true"></i>
				</div>';
		}		
		// get user conversation
		$conversation = $this->getUserChat($from_user_id, $to_user_id);	
		// update chat user read status		
		
		$esult = Message::where(['sender_id'=> $to_user_id,'receiver_id'=>$from_user_id])->update(['status'=>1]);
		
		// update users current chat session
		
		$esult = User::where(['id'=> $from_user_id])->update(['current_session'=>$to_user_id]);
		
		$data = array(
			"userSection" => $userSection,
			"conversation" => $conversation			
		 );
		 
		   $output = "";
    		if ($data->count() > 0) {
    			$output = view("msg.conversation", compact('data'))->render();
    		}else{
    		    $output = view("msg.conversation", compact('data'))->render();
    		}
    		return json_encode($output);
        
		 
// 		 return json_encode($data);		
	}	
    
    
    
    
	public function getUnreadMessageCount($senderUserid, $recieverUserid) {
		$numRows = Message::where(['sender_id'=>$senderUserid, 'receiver_id'=>$recieverUserid])->where('status',1)->get();
		$output = '';
		if($numRows->count() > 0){
			$output = $numRows;
		}
		return $output;
	}
	
	
    
    // public function chat_action(Request $request)
    // {
    //     if($request->action == 'show_chat'){
    //         $user = User::where('id',$request->to_user_id)->first();
            
    //         $conversation = "";
    // 	    $output = "";
    	    
    //         $user_id = $user->id;
    //         $reciever_userid = Auth::user()->id;
    //         // $conversation = $this->getUserChat($user_id, $reciever_userid);
    //         $conversation = getUserChat($user_id,$reciever_userid);
    // 		if ($user->count() > 0) {
    // 			$output = view("msg.userSection", compact('user','conversation'))->render();
    // 		}else{
    // 		    $output = view("msg.userSection", compact('user','conversation'))->render();
    // 		}
    // 		return json_encode($output);
    //     }
        
    //     if($request->action == 'insert_chat')
    //     {
    //         $message = new Message([
    //             'sender_id' => Auth::user()->id,
    //             'receiver_id' => $request->get('receiver_id'),
    //             'message' => $request->get('message'),
    // //             'document' => $new_name,
    // // 			'document_name' => $document_name,
    // // 			'document_size' => $document_size,
    //             'created_at' => date('Y-m-d H:i:s'),
    //             'updated_at' => date('Y-m-d H:i:s'),
    //         ]);
    //         $message->save();
            
            
    //         $user_id = $message->sender_id;
    //         $reciever_userid = $message->receiver_id;
    //         $conversation = getUserChat($user_id,$reciever_userid);
            
    //         $user = User::where('id',$user_id)->first();

    //         $output = "";
    // 		if ($conversation->count() > 0) {
    // 			$output = view("msg.conversation", compact('user','conversation'))->render();
    // 		}else{
    // 		    $output = view("msg.conversation", compact('user','conversation'))->render();
    // 		}
    // 		return json_encode($output);
    //     }
        
    //     if($request->action == 'update_user_chat')
    //     {
            
            
    //         $user_id = $request->to_user_id;
    //         $reciever_userid = Auth::user()->id;
    //         $conversation = getUserChat($user_id,$reciever_userid);

    //         $user = User::where('id',$request->to_user_id)->first();
    //         $output = "";
    // 		if ($conversation->count() > 0) {
    // 			$output = view("msg.conversation", compact('user','conversation'))->render();
    // 		}else{
    // 		    $output = view("msg.conversation", compact('user','conversation'))->render();
    // 		}
    // 		return json_encode($output);
    //     }
    // }
    
    

}