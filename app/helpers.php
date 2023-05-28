<?php

use App\Models\User;
use App\Models\Message;
use App\Models\UserDetail;
use App\Models\Secret;
use App\Models\Like;
use App\Models\Follow;
use App\Models\Blacklist;

if (!function_exists('get_setting')) {
    function get_setting($key)
    {
        return \App\Models\Setting::value($key);
    }
}


if (!function_exists('get_cms')) {
    function get_cms($key)
    {
        return \App\Models\FooterContentSetting::value($key);
    }
}



if (!function_exists('get_admin')) {
    function get_admin()
    {
        return User::where('user_type','admin')->first();
        
    }
}


if (!function_exists('get_block')) {
    function get_block($user_id)
    {
        return \App\Models\Blacklist::where(['to_id' => $user_id, 'from_id' => Auth::user()->id])->first();
    }
}

if (!function_exists('chat_user_details')) {
    function chat_user_details($user_id)
    {
        return \App\Models\User::where(['id' => $user_id])->first();
    }
}

if (!function_exists('getUserChat')) {
    function getUserChat($from_user_id, $to_user_id)
    {
        $fromUserAvatar = User::where('id',$from_user_id)->pluck('image_url')->first();
		$toUserAvatar = User::where('id',$to_user_id)->pluck('image_url')->first();
		$userChat = Message::where(['sender_id'=>$from_user_id, 'receiver_id'=>$to_user_id])
		                    ->orWhere(['sender_id'=>$to_user_id, 'receiver_id'=>$from_user_id])
		                    ->orderBy('created_at','asc')->get();
		                    
		return $userChat;
    }
}

if (!function_exists('getDetails')) {
    function getDetails($id)
    {
        
        $member_details = UserDetail::where('user_id',$id)->first();
        $secrets = Secret::where(['sec_to_id'=>$id, 'status'=>'accepted'])->orderBy('created_at','desc')->get();
        $like_exists = Like::where(['like_to' => $id, 'like_from' => Auth::user()->id])->first();
        $follow_exists = Follow::where(['follow_to' => $id, 'follow_from' => Auth::user()->id])->first();
        $block_exists = Blacklist::where(['to_id' => $id, 'from_id' => Auth::user()->id])->first();
        
	    $user_counters = array('member_details'=>$member_details,'secrets'=>$secrets,'like_exists'=>$like_exists,'follow_exists'=>$follow_exists,'block_exists'=>$block_exists);
		                    
		return $user_counters;
    }
}





