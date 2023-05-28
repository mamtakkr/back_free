<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use App\Models\User;
use App\Models\UserDetail;
use App\Models\Country;
use App\Models\City;
use App\Models\Origin;
use Auth;
use DB;
use Carbon;
use Intervention\Image\Facades\Image;


class ProfileController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    
    public function profile_edit($id)
    {
        $user = User::findorFail($id);
		$countries = DB::table('countries')->orderBy('name','asc')->get();
		$origins = DB::table('origins')->orderBy('name','asc')->get();
		$cities = DB::table('cities')->orderBy('name','asc')->get();
        return view('profile_edit',compact('user','countries','origins','cities'));
    }
    
    
    public function profile_update(Request $request)
    {
        $image_name = $request->old_image_url;
        $image = $request->file('new_image_url');
        if ($image != '') {
            $image_name = time().'.'.$image->getClientOriginalExtension();
            $image = Image::make($image)->resize(400, 250);
            $image->save(public_path('images/users/') . $image_name);
        } else {
                $request->validate([
                'username' => 'bail|required|string|max:255',
                'you_are' => 'required',
                'research' => 'required',
                'type_of_meeting' => 'required',
                'first_meeting' => 'required',
                'vibe' => 'required',
                'dob' => 'bail|required|date|before_or_equal:'.\Carbon\Carbon::now()->subYears(18)->format('Y-m-d'),
                'dob_couple' => 'before_or_equal:'.\Carbon\Carbon::now()->subYears(18)->format('Y-m-d'),
            ],[
                'username.required' => __("public.username_required"),    
                'username.string' => __("public.username_string"),    
                'username.max' => __("public.username_max"),    
                'you_are.required' => __("public.you_are_required"),    
                'type_of_meeting.required' => __("public.type_of_meeting_required"),    
                'first_meeting.required' => __("public.first_meeting_required"),    
                // 'image_url.required' => __("public.image_url_required"),    
                'dob.before_or_equal' => __("public.dob_before_or_equal"),
                'dob_couple.before_or_equal' => __("public.dob_couple_before_or_equal"),
            ]);
        }
        
        if(!empty($request->country)){
            $country = Country::where('id',$request->country)->pluck('name')->first();
        }
        if(!empty($request->country_couple)){
            $country_couple = Country::where('id',$request->country_couple)->pluck('name')->first();
        }
        
        $user = User::findOrFail($request->get('id'));
        $user->username = $request->get('username');
        $user->experience = $request->get('experience');
        $user->you_are = $request->get('you_are');

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
        
        if($user)
        {
            $research = implode(',', $request->research);
            $type_of_meeting = implode(',', $request->type_of_meeting);
            $first_meeting = implode(',', $request->first_meeting);
            $vibe = implode(',', $request->vibe);

            $userDetail = UserDetail::where('user_id',$request->get('id'))->first();
            $userDetail->who_i = $request->get('who_i');
            $userDetail->dob = $request->get('dob');
            $userDetail->size = $request->get('size');
            $userDetail->weight = $request->get('weight');
            $userDetail->origin = $request->get('origin');
            $userDetail->country = $country;
            $userDetail->city = $request->get('city');
            $userDetail->hair_size = $request->get('hair_size');
            $userDetail->hair_color = $request->get('hair_color');
            $userDetail->eye_colour = $request->get('eye_colour');
            
            $userDetail->who_i_couple = $request->get('who_i_couple');
            $userDetail->dob_couple = $request->get('dob_couple');
            $userDetail->size_couple = $request->get('size_couple');
            $userDetail->weight_couple = $request->get('weight_couple');
            $userDetail->origin_couple = $request->get('origin_couple');
            $userDetail->country_couple = $country_couple;
            $userDetail->city_couple = $request->get('city_couple');
            $userDetail->hair_size_couple = $request->get('hair_size_couple');
            $userDetail->hair_color_couple = $request->get('hair_color_couple');
            $userDetail->eye_colour_couple = $request->get('eye_colour_couple');
            $userDetail->research = $research;
            $userDetail->type_of_meeting = $type_of_meeting;
            $userDetail->first_meeting = $first_meeting;
            $userDetail->vibe = $vibe;
            $userDetail->about = $request->get('about');

            $userDetail->updated_at = date('Y-m-d');
            $userDetail->save();
            
            return redirect()->back()->with('success', __("public.Details_updated"));
            
            
        }
    }
    
    
    public function pro_profile_update(Request $request)
    {
        $image_name = $request->old_image_url;
        $image = $request->file('new_image_url');
        if ($image != '') {
            $image_name = time().'.'.$image->getClientOriginalExtension();
            $image = Image::make($image)->resize(400, 250);
            $image->save(public_path('images/users/') . $image_name);
        } else {
                $request->validate([
                'username' => 'bail|required|string|max:255',
                'club_name' => 'required',
                'club_day' => 'required',
                'club_start_time' => 'required',
                'club_end_time' => 'required',
            ],[
                'username.required' => __("public.username_required"),    
                'username.string' => __("public.username_string"),    
                'username.max' => __("public.username_max"),      
                'club_name.required' => __("public.club_name_required"),     
            ]);
        }
        
        if(!empty($request->country)){
            $country = Country::where('id',$request->country)->pluck('name')->first();
        }else{
            $country = null;
        }
        
        
        // $club_day = implode('|', $request->club_day);
        // $club_start_time = implode('|', $request->club_start_time);
        // $club_end_time = implode('|', $request->club_end_time);
        
        $club_day = json_encode($request->club_day);
        $club_start_time = json_encode($request->club_start_time);
        $club_end_time = json_encode($request->club_end_time);

        
        $user = User::findOrFail($request->get('id'));
        $user->username = $request->get('username');
        $user->club_name = $request->get('club_name');
        $user->club_day = $club_day;
        $user->club_start_time = $club_start_time;
        $user->club_end_time = $club_end_time;
        $user->contact = $request->get('contact');

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
        
        if($user)
        {
            $userDetail = UserDetail::where('user_id',$request->get('id'))->first();
            $userDetail->website_url = $request->get('website_url');
            $userDetail->status = $request->get('status');
            $userDetail->address = $request->get('address');
            $userDetail->zipcode = $request->get('zipcode');
            $userDetail->country = $country;
            $userDetail->city = $request->get('city');
            $userDetail->about = $request->get('about');

            $userDetail->updated_at = date('Y-m-d');
            $userDetail->save();
            
            return redirect()->back()->with('success', __("public.Details_updated"));
            
            
        }
    }
	
}




