<?php
namespace App\Http\Controllers;

use App\Models\Photo;
use App\Models\Post;
use App\Models\User;
use App\Models\UserDetail;
use App\Models\Secret;
use App\Models\Like;
use App\Models\Follow;
use App\Models\Blacklist;
use Illuminate\Http\Request;
use \Validator;
use URL;
use Auth;
use DB;

class SecretController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
		$user_info = User::where('id',Auth::user()->id)->first();
        $user = User::where('user_type','admin')->first();
		$secrets = Secret::where(['sec_to_id'=>Auth::user()->id])->where('sec_from_id','!=',$user->id)->orderBy('created_at','desc')->get();
		foreach($secrets as $row)
		{
		    Secret::where(['sec_to_id'=>Auth::user()->id])->update(['seen'=>1]);
		}
        return view('secrets.index',compact('user_info','secrets'));   
    }
    
    public function secretAdd($id)
    {
        $secrets = Secret::where(['sec_to_id'=>$id, 'status'=>'accepted'])->orderBy('created_at','desc')->get();
        $user_counter = getDetails($id);
        
        return view('secrets.secretAdd',compact('user_counter','secrets'));
    }
    
    public function secretStore(Request $request)
    {
        
        $secret = new Secret([
            'sec_to_id' => $request->get('sec_to_id'),
            'sec_from_id' => $request->get('sec_from_id'),
            'message' => $request->get('message'),
            'status' => 'pending',
            'created_at' => date('Y-m-d'),
            'updated_at' => date('Y-m-d'),
        ]);
        $secret->save();
        return redirect()->back()->with('success', 'Secret Added Successfully');
    }
    
    
    	
	public function acceptStore(Request $request) 
	{
	    Secret::where('id',$request->secret_id)->update(['status'=>'accepted']);
		return response()->json([
			'status' => 200,
			
		]);
		
	}
		
	
	public function rejectStore(Request $request) 
	{
	    Secret::where('id',$request->secret_id)->update(['status'=>'rejected']);
		return response()->json([
			'status' => 200,
			
		]);
	}
	
    
    public function userAct($id)
    {
        $user_counter = getDetails($id);
		$posts = Post::where(['user_id'=>$id])->orderBy('created_at','desc')->get();
		
		
        return view('secrets.userAct',compact('user_counter','posts'));
    }
	
    public function userPhotos($id)
    {
        $user_counter = getDetails($id);
		$pub_photos = Photo::where(['user_id'=>$id,'photo_type'=>1])->orderBy('created_at','desc')->get();
		$pri_photos = Photo::where(['user_id'=>$id,'photo_type'=>0])->orderBy('created_at','desc')->get();
		
		
        return view('secrets.userPhotos',compact('user_counter','pub_photos','pri_photos'));
    }


}