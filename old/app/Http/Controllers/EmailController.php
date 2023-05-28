<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Mail\SendMail;
class EmailController extends Controller
{
    
    public function send_email($to,$to_name,$from,$from_name,$subject,$data){
        \Mail::send('email',$data,function($message) use ($to,$to_name,$from,$from_name,$subject){
            $message->to($to,$to_name)->subject($subject);
            $message->from($from,$from_name);
        });
        Echo "Email Sent successfully";
    }
    
    
    public function reset_password_email($to,$to_name,$from,$from_name,$subject,$data){
        \Mail::send('emails.reset_password_email',$data,function($message) use ($to,$to_name,$from,$from_name,$subject){
            $message->to($to,$to_name)->subject($subject);
            $message->from($from,$from_name);
        });
        Echo "Email Sent successfully";
    }
}