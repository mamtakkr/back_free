<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserDetail;
use App\Models\Country;
use App\Models\Plan;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Carbon;
use Intervention\Image\Facades\Image;
use DB;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function registerType()
    {
        return view('auth.before-register');
    }
    
    public function create()
    {
		$countries = DB::table('countries')->orderBy('name','asc')->get();
		$origins = DB::table('origins')->orderBy('name','asc')->get();
		$cities = DB::table('cities')->orderBy('name','asc')->get();
        return view('auth.member-register',compact('countries','origins','cities'));
    }
    
    public function professionalCreate()
    {
		$countries = DB::table('countries')->orderBy('name','asc')->get();
		$origins = DB::table('origins')->orderBy('name','asc')->get();
		$cities = DB::table('cities')->orderBy('name','asc')->get();
        return view('auth.professional-register',compact('countries','origins','cities'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
	 
    public function store(Request $request)
    {
        $request->validate([
            'username' => 'bail|required|string|max:255',
            'you_are' => 'required',
            'email' => 'bail|required|string|email|max:255|unique:users',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'research' => 'required',
            'type_of_meeting' => 'required',
            'first_meeting' => 'required',
            'vibe' => 'required',
            'image_url' => 'required',
            'dob' => 'bail|required|date|before_or_equal:'.\Carbon\Carbon::now()->subYears(18)->format('Y-m-d'),
            // 'dob_couple' => 'before_or_equal:'.\Carbon\Carbon::now()->subYears(18)->format('Y-m-d'),
        ],[
            'username.required' => 'The nickname field is required.',    
            'username.string' => 'The nickname field must be a string.',    
            'username.max' => 'The nickname field should not be greater than 255 words.',    
            'you_are.required' => 'The gender field is required.',    
            'type_of_meeting.required' => 'The type of meeting field is required.',    
            'first_meeting.required' => 'The first meeting field is required.',    
            'image_url.required' => 'The profile photo field is required.',    
            'dob.before_or_equal' => 'You must be 18 years old or above',
            // 'dob_couple.before_or_equal' => 'You must be 18 years old or above',
        ]);
        if(!empty($request->country)){
            $country = Country::where('id',$request->country)->pluck('name')->first();
        }
        if(!empty($request->country_couple)){
            $country_couple = Country::where('id',$request->country_couple)->pluck('name')->first();
        }else{
            $country_couple = null;
        }
        
        
        if(!empty($request->dob)){
            $age = \Carbon\Carbon::parse($request->dob)->age;
        }
        if(!empty($request->dob_couple)){
            $age_couple = \Carbon\Carbon::parse($request->dob_couple)->age;
        }else{
            $age_couple = null;
        }

        
        $trial_days = Plan::where('plan_type','monthly')->pluck('trial_days')->first();
        if(!empty($trial_days))
        {
            $date = Carbon::now();
            $trial_ends_at = Carbon::now()->addDays($trial_days);
        }

        $image = $request->file('image_url');
        $input['imagename'] = time().'.'.$image->getClientOriginalExtension();
     
        $destinationPath = public_path('images/users');
        $img = Image::make($image->getRealPath());
        $img->resize(400, 250, function ($constraint) {
            $constraint->aspectRatio();
        })->save($destinationPath.'/'.$input['imagename']);
        
        

        $user = User::create([
            'username' => $request->username,
            'email' => $request->email,
            'user_type' => 'member',
            'password' => Hash::make($request->password),
            'experience' => $request->experience,
            'you_are' => $request->you_are,
            'image_url' => $input['imagename'],
            'approved_status' => 'pending',
            'active_status' => 'active',
            'trial_ends_at' => $trial_ends_at,
        ]);
            
            
        if($user)
        {
            $research = implode(',', $request->research);
            $type_of_meeting = implode(',', $request->type_of_meeting);
            $first_meeting = implode(',', $request->first_meeting);
            $vibe = implode(',', $request->vibe);
            
            $user_detail = new UserDetail([
                'user_id' => $user->id,
                'who_i' => $request->get('who_i'),
                'dob' => $request->get('dob'),
                'age' => $age,
                'size' => $request->get('size'),
                'weight' => $request->get('weight'),
                'origin' => $request->get('origin'),
                'country' => $country,
                'city' => $request->get('city'),
                'hair_size' => $request->get('hair_size'),
                'hair_color' => $request->get('hair_color'),
                'eye_colour' => $request->get('eye_colour'),
                'sillhouette' => $request->get('sillhouette'),
				
				'who_i_couple' => $request->get('who_i_couple'),
                'dob_couple' => $request->get('dob_couple'),
                'age_couple' => $age_couple,
                'size_couple' => $request->get('size_couple'),
                'weight_couple' => $request->get('weight_couple'),
                'origin_couple' => $request->get('origin_couple'),
                'country_couple' => $country_couple,
                'city_couple' => $request->get('city_couple'),
                'hair_size_couple' => $request->get('hair_size_couple'),
                'hair_color_couple' => $request->get('hair_color_couple'),
                'eye_colour_couple' => $request->get('eye_colour_couple'),
                'sillhouette_couple' => $request->get('sillhouette_couple'),
				
                'research' => $research,
                'type_of_meeting' => $type_of_meeting,
                'first_meeting' => $first_meeting,
                'vibe' => $vibe,
                'about' => $request->get('about'),
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d'),
            ]);
            $user_detail->save();
        }else{
            return redirect()->back()->with('error', 'Something went wrong.');
        }
        
	    if($user->approved_status == 'pending')
	    {
	        return redirect('login');
	    }
	    else{
            event(new Registered($user));
            User::where('id',$user->id)->update(['last_login'=>date("Y-m-d H:i:s"), 'online'=>1]);
            $request->session()->put('user_id', $user->id);
            Auth::login($user);
            return redirect(RouteServiceProvider::HOME);
	    }
    }
    
    
    
    	 
    public function professionalStore(Request $request)
    {
        $request->validate([
            'username' => 'bail|required|string|max:255',
            'email' => 'bail|required|string|email|max:255|unique:users',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'club_name' => 'required',
            'club_day' => 'required',
            'club_start_time' => 'required',
            'club_end_time' => 'required',
            'image_url' => 'required',
        ],[
            'username.required' => 'The nickname field is required.',    
            'username.string' => 'The nickname field must be a string.',    
            'username.max' => 'The nickname field should not be greater than 255 words.',    
            'club_name.required' => 'The club name field is required.',     
            'image_url.required' => 'The profile photo field is required.',   
        ]);


        $image = $request->file('image_url');
        $input['imagename'] = time().'.'.$image->getClientOriginalExtension();
     
        $destinationPath = public_path('images/users');
        $img = Image::make($image->getRealPath());
        $img->resize(400, 250, function ($constraint) {
            $constraint->aspectRatio();
        })->save($destinationPath.'/'.$input['imagename']);
        
        
        if(!empty($request->country)){
            $country = Country::where('id',$request->country)->pluck('name')->first();
        }else{
            $country = null;
        }

        
        $trial_days = Plan::where('plan_type','monthly')->pluck('trial_days')->first();
        if(!empty($trial_days))
        {
            $date = Carbon::now();
            $trial_ends_at = Carbon::now()->addDays($trial_days);
        }

        $club_day = implode('|', $request->club_day);
        $club_start_time = implode('|', $request->club_start_time);
        $club_end_time = implode('|', $request->club_end_time);

        $user = User::create([
            'username' => $request->username,
            'email' => $request->email,
            'user_type' => 'professional',
            'password' => Hash::make($request->password),
            'club_name' => $request->club_name,
            'club_day' => $club_day,
            'club_start_time' => $club_start_time,
            'club_end_time' => $club_end_time,
            'contact' => $request->contact,
            'image_url' => $input['imagename'],
            'approved_status' => 'pending',
            'active_status' => 'active',
            'trial_ends_at' => $trial_ends_at,
        ]);
            
        if($user)
        {
            
            $user_detail = new UserDetail([
                'user_id' => $user->id,
                'website_url' => $request->get('website_url'),
                'status' => $request->get('status'),
                'address' => $request->get('address'),
                'zipcode' => $request->get('zipcode'),
                'country' => $country,
                'city' => $request->get('city'),
                'about' => $request->get('about'),
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d'),
            ]);
            $user_detail->save();
        }else{
            return redirect()->back()->with('error', 'Something went wrong.');
        }
        
        if($user->approved_status == 'pending')
	    {
	        return redirect('login');
	    }
	    else{
            event(new Registered($user));
            User::where('id',$user->id)->update(['last_login'=>date("Y-m-d H:i:s"), 'online'=>1]);
            $request->session()->put('user_id', $user->id);
            Auth::login($user);
            return redirect(RouteServiceProvider::HOME);
	    }
            
    }
    
    
    
    
    
	
}
