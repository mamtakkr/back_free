<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;
use App\Models\Plan;

class CheckSubscription
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
        if(Auth::check() && !empty(Auth::user()->trial_ends_at && Auth::user()->trial_ends_at < date('Y-m-d')) || !empty(Auth::user()->ends_at && Auth::user()->ends_at < date('Y-m-d'))){
            $plans = Plan::get();
            return response()->view('subscriptions.index',compact('plans'));
                
        }
        return $next($request);
    }
}
