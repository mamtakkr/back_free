<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use URL;
use App\Models\User;
use App\Models\UserDetail;
use App\Models\Contact;

class IndexController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $reg_members = User::where(['user_type'=>'member','approved_status'=>'approved'])->count();
        $pen_members = User::where('user_type','member')->where('approved_status','!=','approved')->count();
        $reg_professionals = User::where(['user_type'=>'professional','approved_status'=>'approved'])->count();
        $pen_professionals = User::where('user_type','professional')->where('approved_status','!=','approved')->count();
        $contacts = Contact::count();
        
        $counters = array('reg_members'=>$reg_members,'pen_members'=>$pen_members,'reg_professionals'=>$reg_professionals,
                    'pen_professionals'=>$pen_professionals,'contacts'=>$contacts);
			
        return view('admin.dashboard',compact('counters'));
    }
    

}