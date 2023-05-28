<?php
namespace App\Http\Controllers;

use App\Models\Video;
use App\Models\User;
use Illuminate\Http\Request;
use \Validator;
use URL;
use Auth;

class VideoController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
	public function index()
	{
		$user_info = User::where('id',Auth::user()->id)->first();
		$private_videos = Video::where('user_id', Auth::user()->id)->where('video_type','0')->get();
		$public_videos = Video::where('user_id', Auth::user()->id)->where('video_type','1')->get();
        return view('videos.index',compact('user_info','private_videos','public_videos'));   
	}

	public function fetchAllVideos(Request $request) {
		$videos = Video::where('user_id',$request->id)->where('video_type','1')->orderBy('created_at','desc')->get();
	    $output = "";
		if ($videos->count() > 0) {
			$output = view("videos.show_all_videos", compact('videos'))->render();
		}else{
		    $output = view("videos.show_all_videos", compact('videos'))->render();
		}

		return json_encode($output);
	}
    

	public function fetchPubVideos(Request $request) {
		$videos = Video::where(['user_id'=>$request->id,'video_type'=>'1'])->orderBy('created_at','desc')->get();
	    $output = "";
		if ($videos->count() > 0) {
			$output = view("videos.show_pub_videos", compact('videos'))->render();
		}else{
		    $output = view("videos.show_pub_videos", compact('videos'))->render();
		}

		return json_encode($output);
	}


	public function fetchPriVideos(Request $request) {
		$videos = Video::where(['user_id'=>$request->id,'video_type'=>'0'])->orderBy('created_at','desc')->get();
	    $output = "";
		if ($videos->count() > 0) {
			$output = view("videos.show_pub_videos", compact('videos'))->render();
		}else{
		    $output = view("videos.show_pub_videos", compact('videos'))->render();
		}

		return json_encode($output);
	}

	public function videoStore(Request $request) 
	{
        $validator =  Validator::make($request->all(), [
            'video_url'  => 'required|mimes:mp4,ogx,oga,webm,ogv,mov,ogg,qt | max:2048'
        ],[
            'video_url.max' => 'The video must not be greater than 2MB.'    
        ]);
        
        if($validator->fails()) {
            return response()->json([
                'status' => 401,
                'message' => 'validation error',
                'errors' => $validator->errors()
            ]);
        }else{
            $new_name = "";
            $image = $request->file('video_url');
            if ($image != '') {
                $new_name = rand() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('videos/') , $new_name);
            }
    
    		$videoData = [
    		    'user_id' => $request->user_id,
    		    'video_url' => $new_name,
				'video_type' => $request->video_type,
    		    'created_at' => date("Y-m-d"),
    		    'updated_at' => date("Y-m-d")
    		];
    		
    		Video::create($videoData);
    		return response()->json([
    			'status' => 200,
    		]);
        }

	}


}