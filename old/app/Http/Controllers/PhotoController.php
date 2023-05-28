<?php
namespace App\Http\Controllers;

use App\Models\Photo;
use App\Models\User;
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
		$photos = Photo::where('user_id',$request->id)->where('photo_type','1')->orderBy('created_at','desc')->get();
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
            'image_url.max' => 'The image must not be greater than 2MB.'    
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
    		    'created_at' => date("Y-m-d"),
    		    'updated_at' => date("Y-m-d")
    		];
    		
    		Photo::create($photoData);
    		return response()->json([
    			'status' => 200,
    		]);
        }

	}


}