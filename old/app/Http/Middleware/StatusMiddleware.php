<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class StatusMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(Auth::check() && Auth::user()->user_type!='admin' && Auth::user()->active_status=='inactive'){
            $user_id = Auth::user()->id;
            $user=User::where('id', $user_id)->first();
            User::where('id',$user->id)->update(['last_login'=>null, 'online'=>0]);
            $request->session()->forget('user_id');
            Auth::logout();
                return redirect()->to('login')->with('error', 'Your session has expired because your account is deactivated.');
                
        }
        return $next($request);
    }
}
