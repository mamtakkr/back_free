<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;
use Intervention\Image\Facades\Image;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function profile_show()
    {
        return view('admin.profile.profile_show');
    }
    
    public function profile_update_action(Request $request)
    {
        $this->validate($request,[
            'email' => 'required|string|email|max:255|unique:users',
            'first_name' => 'required',
            'last_name' => 'required',
            'username' => 'required',
        ]);
        
        $user = User::findOrFail($request->get('id'));
        $user->email = $request->get('email');
        $user->first_name = $request->get('first_name');
        $user->last_name = $request->get('last_name');
        $user->username = $request->get('username');
        $user->updated_at = date('Y-m-d');
        $user->save();
        return redirect()->back()->with('success', __("public.data_updated"));
    }

    
    public function profileImg_update(Request $request)
    {
        $image_name = $request->old_image_url;
        $image = $request->file('new_image_url');
        if ($image != '') {
            $image_name = Auth::user()->id.rand() . '.' . $image->getClientOriginalExtension();
            $image = Image::make($image)->resize(260, 280);
            $image->save(public_path('images/users/') . $image_name);
        } 
        
        $user = User::findOrFail($request->get('id'));
        if ($request->old_image_url != null) {
            if ($request->file('new_image_url')) {
                $file = public_path('/images/users/' . "/" . $request->old_image_url);
                if (file_exists($file)) {
                    unlink($file);
                }
                $user->image_url = $image_name;
            }
        } else {
            $user->image_url = $image_name;
        }

        $user->updated_at = date('Y-m-d');
        $user->save();
        return redirect()->back()->with('success', __("public.data_updated"));
    }


    public function change_password_edit()
    {
        return view('admin.profile.change_password_edit');
    }


    public function password_update_action(Request $request)
    {
            $this->validate($request,[
                'password' => ['required', 'confirmed', Rules\Password::defaults()],
                ]);
        
        $user = User::findOrFail($request->get('id'));
        $user->password = Hash::make($request->password);
        $user->updated_at = date('Y-m-d');
        $user->save();
        return redirect()->back()->with('success', __("public.data_updated"));
    }
    
}