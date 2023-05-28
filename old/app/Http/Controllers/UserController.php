<?php
namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Like;
use App\Models\Follow;
use App\Models\Participate;
use App\Models\Event;
use App\Models\Plan;
use App\Models\Blacklist;
use Illuminate\Http\Request;
use \Validator;
use URL;
use Auth;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

	public function likeStore(Request $request) 
	{
		$likes = Like::where(['like_to' => $request->like_to, 'like_from' => $request->like_from])->first();
		
		if(!empty($likes)){
            Like::where(['like_to'=> $request->like_to, 'like_from'=> $request->like_from])->delete();
    		$likes = Like::where('like_to', $request->like_to)->get();
    		User::where('id', $request->like_to)->update(['total_likes' => count($likes)]);
    		return response()->json([
    			'status' => 400,
    		]);
		}else{
		    $likeData = [
    		    'like_to' => $request->like_to,
    		    'like_from' => $request->like_from,
    		    'created_at' => date("Y-m-d"),
    		    'updated_at' => date("Y-m-d"),
    		];
    		Like::create($likeData);
    		$likes = Like::where('like_to', $request->like_to)->get();
    		User::where('id', $request->like_to)->update(['total_likes' => count($likes)]);
    		return response()->json([
    			'status' => 200,
    		]);
		}
	}
	
	
	public function followStore(Request $request) 
	{
		$follows = Follow::where(['follow_to' => $request->follow_to, 'follow_from' => $request->follow_from])->first();
		
		if(!empty($follows)){
            Follow::where(['follow_to'=> $request->follow_to, 'follow_from'=> $request->follow_from])->delete();
    		$follows = Follow::where('follow_to', $request->follow_to)->get();
    		User::where('id', $request->follow_to)->update(['total_followers' => count($follows)]);
    		return response()->json([
    			'status' => 400,
    		]);
		}else{
		    $followData = [
    		    'follow_to' => $request->follow_to,
    		    'follow_from' => $request->follow_from,
    		    'created_at' => date("Y-m-d"),
    		    'updated_at' => date("Y-m-d"),
    		];
    		Follow::create($followData);
    		$follows = Follow::where('follow_to', $request->follow_to)->get();
    		User::where('id', $request->follow_to)->update(['total_followers' => count($follows)]);
    		return response()->json([
    			'status' => 200,
    		]);
		}
	}

    
	
	public function blacklistStore(Request $request) 
	{
	    $blacklistData = [
		    'to_id' => $request->to_id,
		    'from_id' => Auth::user()->id,
		    'created_at' => date("Y-m-d"),
		    'updated_at' => date("Y-m-d"),
		];
		Blacklist::create($blacklistData);
		return response()->json([
			'status' => 200,
		]);
	}
	
	
	public function blacklistShow(Request $request) 
	{
	    $members = Blacklist::where('from_id',Auth::user()->id)->get();
	    return view('members.blacklists',compact('members'));
	}

    public function blacklistDelete($id)
    {
        $blacklist = Blacklist::where('id', $id)->first();
        $blacklist->delete();
        return redirect()->back()->with('error', 'Unblocked');
    }
	
	
	public function subscriptions(Request $request) 
	{
	    $plans = Plan::get();
	    return view('subscriptions.index',compact('plans'));
	}
	

}