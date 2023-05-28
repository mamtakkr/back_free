<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use App\Models\Contact;
use App\Models\User;
use App\Models\UserDetail;
use App\Models\Like;
use App\Models\Follow;
use App\Models\Post;
use App\Models\Photo;
use App\Models\Video;
use App\Models\Visit;
use App\Models\City;
use App\Models\Event;
use App\Models\Participate;
use App\Models\Blacklist;
use Auth;
use DB;

class IndexController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    
    public function members()
    {
        $members = User::where('user_type','member')
                        ->where(['approved_status'=>'approved','active_status'=>'active'])
                        ->where('id', '!=', Auth::user()->id)->get();
		$origins = DB::table('origins')->orderBy('name','asc')->get();
		$cities = DB::table('cities')->orderBy('name','asc')->get();
        return view('members', compact('members','origins','cities'));
    }
    
    public function member_details($id)
    {
		if(Auth::check())
		{
		    if(Auth::user()->id!=$id)
		    {
    		    $visit = Visit::with('userDetails')->where('user_id',$id)->where('who_visit',Auth::user()->id);
    		    if($visit->count()==0)
    		    {
            		$visit_insert = Visit::create([
            			'user_id' => $id,
            			'who_visit' => Auth::user()->id,
            		]);
    		    }
		    }
		}	
	
        // $member_details = UserDetail::where('user_id',$id)->first();
        $likes = Like::where('like_to', $id)->get();
        // $like_exists = Like::where(['like_to' => $id, 'like_from' => Auth::user()->id])->first();
        $follows = Follow::where('follow_to', $id)->get();
        // $follow_exists = Follow::where(['follow_to' => $id, 'follow_from' => Auth::user()->id])->first();
        // $block_exists = Blacklist::where(['to_id' => $id, 'from_id' => Auth::user()->id])->first();
        
        $user_counter = getDetails($id);
        return view('member_details', compact('user_counter','follows','likes'));
    }
	
	
	public function visits(Request $request)
    {
        $user = User::where('user_type','admin')->first();
		$visits = Visit::where(['user_id' => Auth::user()->id])->where('who_visit','!=',$user->id)->get();
		foreach($visits as $row)
		{
		    Visit::where(['user_id' => Auth::user()->id])->update(['seen'=>1]);
		}
        return view('visits', compact('visits'));
	}
	
    
    public function memberSearch(Request $request)
    {
		$query = User::select('users.*', 'user_details.*')
		                ->join('user_details', 'user_details.user_id', '=', 'users.id')
		                ->where(['approved_status'=>'approved','active_status'=>'active']);

        $you_are = $request->you_are;
        $sillhouette = $request->sillhouette;
        $sillhouette_couple = $request->sillhouette_couple;
		
		if(!empty($you_are))
		{
		    $query1 = $query->where('users.id','!=',auth()->user()->id)->where('users.user_type','member')->whereIn('users.you_are', $you_are);
		}

		if(!empty($sillhouette))
		{
		    $query1 = $query->where('users.id','!=',auth()->user()->id)->where('users.user_type','member')->whereIn('user_details.sillhouette', $sillhouette);
		}

		if(!empty($sillhouette_couple))
		{
		    $query1 = $query->where('users.id','!=',auth()->user()->id)->where('users.user_type','member')->whereIn('user_details.sillhouette_couple', $sillhouette_couple);
		}
		
		if(!empty($request->research))
		{
            $research = implode(',', $request->research);
		    $query1 = $query->where('users.id','!=',auth()->user()->id)->where('users.user_type','member')->where('user_details.research', 'LIKE', "%$research%");
		}
		
		if(!empty($request->dob))
		{
		    $query1 = $query->where('users.id','!=',auth()->user()->id)->where('users.user_type','member')->where('user_details.dob',$request->dob);
		}
		
		if(!empty($request->dob_couple))
		{
		    $query1 = $query->where('users.id','!=',auth()->user()->id)->where('users.user_type','member')->where('user_details.dob_couple',$request->dob_couple);
		}
		
		if(!empty($request->size))
		{
		    $query1 = $query->where('users.id','!=',auth()->user()->id)->where('users.user_type','member')->where('user_details.size',$request->size);
		}
		
		if(!empty($request->size_couple))
		{
		    $query1 = $query->where('users.id','!=',auth()->user()->id)->where('users.user_type','member')->where('user_details.size_couple',$request->size_couple);
		}
		
		if(!empty($request->origin))
		{
		    $query1 = $query->where('users.id','!=',auth()->user()->id)->where('users.user_type','member')->where('user_details.origin',$request->origin);
		}
		
		if(!empty($request->origin_couple))
		{
		    $query1 = $query->where('users.id','!=',auth()->user()->id)->where('users.user_type','member')->where('user_details.origin_couple',$request->origin_couple);
		}
		
		if(!empty($request->age))
		{
		    $query1 = $query->where('users.id','!=',auth()->user()->id)->where('users.user_type','member')->where('user_details.age',$request->age);
		}
		
		if(!empty($request->age_couple))
		{
		    $query1 = $query->where('users.id','!=',auth()->user()->id)->where('users.user_type','member')->where('user_details.age_couple',$request->age_couple);
		}
		
		if(!empty($request->username))
		{
		    $query1 = $query->where('users.id','!=',auth()->user()->id)->where('users.user_type','member')->where('users.username', 'LIKE', "%$request->username%");
		}
		
		if(!empty($request->city))
		{
            $city = $request->city;
		    $query1 = $query->where('users.id','!=',auth()->user()->id)->where('users.user_type','member')->where('user_details.city', 'LIKE', "%$city%");
		}

		
		$members = $query1->where('users.id','!=',auth()->user()->id)->where('users.user_type','member')->orderBy('users.created_at','desc')->get();
		
	    $output = "";
		if ($members->count() > 0) {
			$output = view("members.show_members", compact('members'))->render();
		}else{
		    $output = view("members.show_members", compact('members'))->render();
		}

		return json_encode($output);
    }
    
    
    // public function test(Request $request)
    // {
    //     $user = Auth::user();
    //     if($user->relSubscription->ends_at < date('Y-m-d'))
      
    // }

}




