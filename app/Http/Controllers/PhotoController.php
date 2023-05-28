<?php
namespace App\Http\Controllers;

use App\Models\Photo;
use App\Models\User;
use App\Models\PrivatePhotosReq;
use Illuminate\Http\Request;
use \Validator;
use URL;
use Auth;
use DB;

class PhotoController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    
	public function index()
	{
		$user_info = User::where('id',Auth::user()->id)->first();
		$private_photos = Photo::where('user_id', Auth::user()->id)->where('photo_type','0')->get();
		$public_photos = Photo::where('user_id', Auth::user()->id)->where('photo_type','1')->get();
        return view('photos.index',compact('user_info','private_photos','public_photos'));   
	}
    

	public function fetchAllPhotos(Request $request) {
		$photos = Photo::where('user_id',$request->id)->where('photo_type','1')->where('status','approved')->orderBy('created_at','desc')->get();
	    $output = "";
		if ($photos->count() > 0) {
			$output = view("photos.show_all_photos", compact('photos'))->render();
		}else{
		    $output = view("photos.show_all_photos", compact('photos'))->render();
		}

		return json_encode($output);
	}
    

	public function fetchPubPhotos(Request $request) {
		$photos = Photo::where(['user_id'=>$request->id,'photo_type'=>'1'])->orderBy('created_at','desc')->get();
	    $output = "";
		if ($photos->count() > 0) {
			$output = view("photos.show_pub_photos", compact('photos'))->render();
		}else{
		    $output = view("photos.show_pub_photos", compact('photos'))->render();
		}

		return json_encode($output);
	}


	public function fetchPriPhotos(Request $request) {
		$photos = Photo::where(['user_id'=>$request->id,'photo_type'=>'0'])->orderBy('created_at','desc')->get();
	    $output = "";
		if ($photos->count() > 0) {
			$output = view("photos.show_pri_photos", compact('photos'))->render();
		}else{
		    $output = view("photos.show_pri_photos", compact('photos'))->render();
		}

		return json_encode($output);
	}


	public function photoStore(Request $request) 
	{
        $validator =  Validator::make($request->all(), [
            'image_url' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ],[
            'image_url.max' => __("public.image_url_max")
        ]);
        
        if($validator->fails()) {
            return response()->json([
                'status' => 401,
                'message' => 'validation error',
                'errors' => $validator->errors()
            ]);
        }else{
            $new_name = "";
            $image = $request->file('image_url');
            if ($image != '') {
                $new_name = rand() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('images/photos/') , $new_name);
            }
    
    		$photoData = [
    		    'user_id' => $request->user_id,
    		    'image_url' => $new_name,
				'photo_type' => $request->photo_type,
				'status' => 'pending',
    		    'created_at' => date("Y-m-d"),
    		    'updated_at' => date("Y-m-d")
    		];
    		
    		Photo::create($photoData);
    		return response()->json([
    			'status' => 200,
    		]);
        }

	}
	
	
	
	public function requestStore(Request $request) 
	{
		DB::table('private_photos_req')->insert([
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
	    $req_photos = PrivatePhotosReq::where('to_id',Auth::user()->id)->orderBy('id','desc')->get();
	    return view('secrets.req_photos',compact('req_photos'));
	}


    public function updateReqStatus(Request $request)
    {
        PrivatePhotosReq::where('id',$request->id)->update([
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
    
    
	public function fetchPhoto(Request $request) {
		$photo_id = $request->get('photo_id');
		$photo = Photo::where('id',$photo_id)->first();
		
	    $output = view("photos.show_photo", compact('photo'))->render();

		return json_encode($output);
	}
	
    
	public function deletePhoto(Request $request, $id) {
		$photo = Photo::where('id',$id)->first();
		if ($photo->image_url != null) {
            $file = public_path('/images/photos' . "/" . $photo->image_url);
            if (file_exists($file)) {
                unlink($file);
            }
        } else {
            $photo->delete();
        }
		$photo->delete();
        return redirect()->back()->with('error', __("public.data_deleted"));
	}

}