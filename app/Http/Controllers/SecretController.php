<?php
namespace App\Http\Controllers;

use App\Models\Photo;
use App\Models\Video;
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
        return redirect()->back()->with('success', __("public.Secret_Added"));
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
		$pub_photos = Photo::where(['user_id'=>$id, 'photo_type'=>'1'])->where('status','approved')->orderBy('created_at','desc')->get();
		$pri_photos = Photo::where(['user_id'=>$id, 'photo_type'=>'0'])->where('status','approved')->orderBy('created_at','desc')->get();
        $request_exists = DB::table('private_photos_req')->where(['to_id' => $id, 'from_id' => Auth::user()->id])->first();
		
        return view('secrets.userPhotos',compact('user_counter','pub_photos','pri_photos','request_exists'));
    }
	
    public function userVideos($id)
    {
        $user_counter = getDetails($id);
		$pub_videos = Video::where(['user_id'=>$id, 'video_type'=>'1'])->where('status','approved')->orderBy('created_at','desc')->get();
		$pri_videos = Video::where(['user_id'=>$id, 'video_type'=>'0'])->where('status','approved')->orderBy('created_at','desc')->get();
        $request_exists = DB::table('private_videos_req')->where(['to_id' => $id, 'from_id' => Auth::user()->id])->first();
		
        return view('secrets.userVideos',compact('user_counter','pub_videos','pri_videos','request_exists'));
    }


}