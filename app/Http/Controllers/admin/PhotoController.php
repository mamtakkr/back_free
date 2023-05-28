<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;
use App\Models\Photo;

class PhotoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function photosShow()
    {
        $photos = Photo::orderBy('id','desc')->get();
        return view('admin.photos.photos_show',compact('photos'));
    }
    

    public function updateStatus(Request $request)
    {
        Photo::where('id',$request->id)->update([
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
}