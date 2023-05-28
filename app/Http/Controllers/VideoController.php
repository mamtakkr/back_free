<?php
namespace App\Http\Controllers;

use App\Models\Video;
use App\Models\User;
use App\Models\PrivateVideosReq;
use Illuminate\Http\Request;
use \Validator;
use URL;
use Auth;
use DB;

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
		$videos = Video::where('user_id',$request->id)->where('video_type','1')->where('status','approved')->orderBy('created_at','desc')->get();
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
            'video_url.max' => __("public.video_url_max")    
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


    
	
	
	public function requestStore(Request $request) 
	{
		DB::table('private_videos_req')->insert([
		    'to_id' => $request->user_id,
		    'from_id' => Auth::user()->id,
		    'status' => 'pending',
		]);

		return response()->json([
			'status' => 200,
		]);
	}
	
	
	public function requestShow(Request $request) 
	{
	    $req_videos = PrivateVideosReq::where('to_id',Auth::user()->id)->orderBy('id','desc')->get();
	    return view('secrets.req_videos',compact('req_videos'));
	}


    public function updateReqStatus(Request $request)
    {
        PrivateVideosReq::where('id',$request->id)->update([
            'status'=>($request->status)
        ]);
        
        if($request->status=='pending'){
            $message= __("public.status_update_pending");
        }
        if($request->status=='approved'){
            $message= __("public.status_update_approved");
        }
        
        if($request->status=='declined'){
            $message= __("public.status_update_declined");
        }
        
        return ['message'=>$message];
    }


	public function fetchVideo(Request $request) {
		$video_id = $request->get('video_id');
		$video = Video::where('id',$video_id)->first();
		
	    $output = view("videos.show_video", compact('video'))->render();

		return json_encode($output);
	}
	
    
	public function deleteVideo(Request $request, $id) {
		$video = Video::where('id',$id)->first();
		if ($video->video_url != null) {
            $file = public_path('/videos' . "/" . $video->video_url);
            if (file_exists($file)) {
                unlink($file);
            }
        } else {
            $video->delete();
        }
		$video->delete();
        return redirect()->back()->with('error', __("public.data_deleted"));
	}
	


}