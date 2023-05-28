<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use App\Models\Contact;
use App\Models\User;
use App\Models\UserDetail;
use App\Models\Like;
use App\Models\Follow;
use App\Models\Post;
use App\Models\Photo;
use App\Models\Video;
use App\Models\Visit;
use App\Models\City;
use App\Models\Event;
use App\Models\Secret;
use App\Models\Message;
use App\Models\Subscription;
use App\Models\Participate;
use App\Models\PrivatePhotosReq;
use App\Models\PrivateVideosReq;
use Auth;
use DB;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function index()
    {
        if(Auth::check())
        {
            $members = User::where('user_type', 'member')
                        ->where(['approved_status'=>'approved','active_status'=>'active'])
                        ->where('id','!=',Auth::user()->id)->orderBy('id','desc')->get();
            
            $events = Event::orderBy('id','desc')->get();
                        
            $user = User::where('user_type','admin')->first();
        
			$visits = Visit::where(['user_id'=>Auth::user()->id, 'seen'=>0])->where('who_visit','!=',$user->id)->count();
			$posts = Post::where('user_id',Auth::user()->id)->count();
			$photos = Photo::where('user_id',Auth::user()->id)->count();
			$videos = Video::where('user_id',Auth::user()->id)->count();
			$secrets = Secret::where(['sec_to_id'=>Auth::user()->id, 'seen'=>0])->where('sec_from_id','!=',$user->id)->count();
			
			$pri_photos = PrivatePhotosReq::where(['to_id'=>Auth::user()->id, 'status'=>'pending'])->count();
			$pri_videos = PrivateVideosReq::where(['to_id'=>Auth::user()->id, 'status'=>'pending'])->count();
			$total_msg = Message::where(['receiver_id'=>Auth::user()->id, 'is_read'=>0])->groupBy(['sender_id'])->get()->count();
// 			dd($total_msg);
			$counters = array('visits'=>$visits,'posts'=>$posts,'pictures'=>$photos,'videos'=>$videos,'secrets'=>$secrets,
			                    'pri_photos'=>$pri_photos,'pri_videos'=>$pri_videos,'total_msg'=>$total_msg);
			
            return view('index',compact('members','counters','events'));   
        }else{
            $members = User::where('user_type', 'member')
                    ->where(['approved_status'=>'approved','active_status'=>'active'])
                    ->get();
            return view('index',compact('members'));
        }
    }
   
    public function contactStore(Request $request)
    {
        $this->validate($request,[
            'email' => 'required|max:255',
            'title' => 'required|max:255',
            'message' => 'required|max:1000',
        ]);
        $contacts = new Contact([
            'email' => $request->get('email'),
            'title' => $request->get('title'),
            'message' => $request->get('message'),
            'created_at' => date("Y-m-d"),
            'updated_at' => date("Y-m-d")
        ]);
        $contacts->save();
        return redirect()->back()->with('success', __('public.Message_sent'));
    }
    
    
    public function get_city(Request $request)
    {
        // dd($request->all());
         return $city=City::where(['country_id'=>$request->country_id])->get();
    }
    
    
    public function cronJob(Request $request)
    {
        $date = date('Y-m-d');
        $events = Event::where('registration_deadline','<', $date)->get();
        if($events->count() > 0){
            foreach($events as $row)
            {
                $status = Participate::where(['event_id'=>$row->id,'status'=>'pending'])->update(['status'=>'rejected']);
                if($status)
                {
                    echo "Cron Job Successfully Created.";
                }
            }
        }else{
            echo "Something Went Wrong.";
        }
    }
    
    
    public function test(Request $request)
    {
        $user=auth()->user();
        dd();
    }
    
}




