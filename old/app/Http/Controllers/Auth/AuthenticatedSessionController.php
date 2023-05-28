<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoginRequest $request)
    {
		$request->validate([
            'email' => 'bail|required|string|email|max:255',
            'password' => ['required', Rules\Password::defaults()],
        ]);
		
		try {
		//dd($request->all());
		$front_user_type = isset($request->front_user_type) ? 'professional' : 'member';
		
        $user = User::where('email', $request->email)->first();
		
        if($user != null && $user->user_type == 'admin'){
            $request->authenticate();
            $request->session()->regenerate();
            return redirect('admin/dashboard');
        }else{
			if($user != null && $user->user_type == $front_user_type)
			{
			    if($user->approved_status == 'pending')
			    {
			        return redirect()->back()->with('error', 'Your profile is under review. Please wait till the administrator approves.');
			    }
			    elseif($user->approved_status == 'declined')
			    {
			        return redirect()->back()->with('error', 'Your registration request has been declined by the administrator.');
			    }
			    elseif($user->active_status == 'inactive')
			    {
			        return redirect()->back()->with('error', 'Your profile has been deactivated. Please contact the administrator.');
			    }else{
    				$request->authenticate();
    				$request->session()->regenerate();
    				User::where('id',$user->id)->update(['last_login'=>date("Y-m-d H:i:s"), 'online'=>1]);
    				$request->session()->put('user_id', $user->id);
    				return redirect()->intended(RouteServiceProvider::HOME);
			    }
			}
			else
			{
				return back()->withInput($request->input())->withErrors(['email'=> 'These credentials do not match our records.']);
			}
            
        }
		}
		catch(Exception $e) {
			return back()->with('flash_error',translate('Something Went Wrong!'));
		}
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        $user_id = $request->session()->get('user_id');
        $user=User::where('id', $user_id)->first();
        if(!empty($user)){
            if($user->user_type!='admin'){
                User::where('id',$user->id)->update(['last_login'=>null, 'online'=>0]);
                $request->session()->forget('user_id');
                Auth::guard('web')->logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();
                return redirect('/');    
            }else{
                $request->session()->forget('user_id');
                Auth::guard('web')->logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();
                return redirect('/'); 
            }
        }else{
            $request->session()->forget('user_id');
            Auth::guard('web')->logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect('/'); 
        }
        
    }
}
