<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use App\Models\User;
use Auth;
use DB;
use URL;
use Illuminate\Contracts\Auth\PasswordBroker;

class PasswordResetLinkController extends Controller
{
    /**
     * Display the password reset link request view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.forgot-password');
    }

    /**
     * Handle an incoming password reset link request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
     public function store(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
        ]);

        $user = User::where('email',$request->email)->first();
        if(!empty($user))
        {
            $password_broker = app(PasswordBroker::class);
            $token = $password_broker->createToken($user); 

            DB::table('password_resets')->insert([
                'email'=>$user->email,
                'token'=>$token,
                'created_at'=>date('Y-m-d H:i:s')
            ]);

            $to = $user->email; 
            $to_name = $user->username; 
            $from = env('MAIL_USERNAME');
            $from_name = env('MAIL_FROM_NAME');
            
            $main_link = "Reset Password Notification " . env('APP_NAME');
            
            $url = url('/').'/reset-password/'.$token;
            
            $body = "<b>Hi " . $user->username . ", </b><br>
            <p style='text-align:left;'>".__('public.Password_Reset_Link')."<br></p>
            <br></strong>";
    
            app('App\Http\Controllers\EmailController')->reset_password_email($to, $to_name, $from, $from_name, $main_link, [
                'body' => $body,
                'url' => $url,
                'footer' => "<br><br>Regards,<br> ".env('APP_NAME')." <br><br>"
            ]);
            return redirect()->back()->with('success', __('public.Email_sent'));
        }else{
            return redirect()->back()->with('error', __('public.Email_does_not_exists'));
        }


        // We will send the password reset link to this user. Once we have attempted
        // to send the link, we will examine the response then see the message we
        // need to show to the user. Finally, we'll send out a proper response.
        // $status = Password::sendResetLink(
        //     $request->only('email')
        // );

        // return $status == Password::RESET_LINK_SENT
        //             ? back()->with('status', __($status))
        //             : back()->withInput($request->only('email'))
        //                     ->withErrors(['email' => __($status)]);
    }
    
}
