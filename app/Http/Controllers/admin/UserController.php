<?php
namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use App\Models\User;
use App\Models\UserDetail;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function members()
    {
        $members = User::where(['user_type'=>'member','approved_status'=>'approved'])->get();
        return view('admin.users.members', compact('members'));
    }
    
    public function member_view($id)
    {
        $member = User::findOrFail($id);
        return view('admin.users.member_view', compact('member'));
    }

    public function professionals()
    {
        $professionals = User::where(['user_type'=>'professional','approved_status'=>'approved'])->get();
        return view('admin.users.professionals', compact('professionals'));
    }
    
    public function pro_view($id)
    {
        $pro_view = User::findOrFail($id);
        return view('admin.users.professional_view', compact('pro_view'));
    }
    
    
    public function pending_members()
    {
        $members = User::where('user_type','member')->where('approved_status','!=','approved')->get();
        return view('admin.users.pending_members', compact('members'));   
    }
    
    
    public function pending_professionals()
    {
        $professionals = User::where('user_type','professional')->where('approved_status','!=','approved')->get();
        return view('admin.users.pending_professionals', compact('professionals'));   
    }
    
    
    public function updateUserStatus(Request $request)
    {
        // dd($request->all());
        User::where('id',$request->id)->update([
            'approved_status'=>($request->status)
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
    
    public function updateActiveStatus(Request $request)
    {
        // dd($request->all());
         User::where('id',$request->id)->update([
            'active_status'=>($request->status)
        ]);
        
        if($request->status=='pending'){
            $message= __("public.status_update_pending");
        }
        if($request->status=='active'){
            $message= __("public.status_update_active");
        }
        
        if($request->status=='inactive'){
            $message= __("public.status_update_inactive");
            }
        
        return ['message'=>$message];
    }


}
