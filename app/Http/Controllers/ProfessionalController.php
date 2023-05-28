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
use App\Models\Participate;
use Auth;
use DB;

class ProfessionalController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    
    public function professionals()
    {
        $professionals = User::where('user_type','professional')
                        ->where(['approved_status'=>'approved','active_status'=>'active'])
                        ->where('id', '!=', Auth::user()->id)->get();
        // dd($professionals);
		$cities = DB::table('cities')->orderBy('name','asc')->get();
        return view('professionals', compact('professionals','cities'));
    }
    
    public function pro_details($id)
    {
		if(Auth::check())
		{
		    if(Auth::user()->id!=$id)
		    {
    		    $visit = Visit::with('userDetails')->where('user_id',$id)->where('who_visit',Auth::user()->id);
    		    if($visit->count()==0)
    		    {
            		$visit_insert = Visit::create([
            			'user_id' => $id,
            			'who_visit' => Auth::user()->id,
            		]);
    		    }
		    }
		}	
	
        $pro_detail = UserDetail::where('user_id',$id)->first();
        $events = Event::where('user_id',$id)->get();
		$public_photos = Photo::where('user_id', $id)->where('photo_type','1')->get();
        $likes = Like::where('like_to', $id)->get();
        $like_exists = Like::where(['like_to' => $id, 'like_from' => Auth::user()->id])->first();
        $follows = Follow::where('follow_to', $id)->get();
        $follow_exists = Follow::where(['follow_to' => $id, 'follow_from' => Auth::user()->id])->first();
        
        if(!empty($pro_detail->relUser->club_start_time)){
            $start_time = (array) array_filter((array) json_decode($pro_detail->relUser->club_start_time));
            $start_time_object = [];
            foreach($start_time as $row)
            {
                $start_time_object[] = date('h:i A', strtotime($row));
            }
        }
        if(!empty($pro_detail->relUser->club_end_time)){
            $end_time = (array) array_filter((array) json_decode($pro_detail->relUser->club_end_time));
            $end_time_object = [];
            foreach($end_time as $row1)
            {
                $end_time_object[] = date('h:i A', strtotime($row1));
            }
        }
        
        $club_times=[];
        if(!empty($pro_detail->relUser->club_day)) 
        {
            $days = json_decode($pro_detail->relUser->club_day);
            foreach($days as $index => $value) {
                $club_times[] = __('public.'.ucfirst($days[$index]))." ".$start_time_object[$index]."/".$end_time_object[$index];
            }
        }
        return view('pro_details', compact('pro_detail', 'likes', 'like_exists', 'follows', 'follow_exists','events','public_photos','club_times'));
    }
	
	
    public function professionalSearch(Request $request)
    {
        $status = $request->status;
		$query = User::select('users.*', 'user_details.*')
		                ->join('user_details', 'user_details.user_id', '=', 'users.id')
		                ->where(['approved_status'=>'approved','active_status'=>'active']);

		if(!empty($status))
		{
		    $query1 = $query->where('users.id','!=',auth()->user()->id)->where('users.user_type','professional')->whereIn('user_details.status', $status);
		}

		
		if(!empty($request->city))
		{
            $city = $request->city;
		    $query1 = $query->where('users.id','!=',auth()->user()->id)->where('users.user_type','professional')->where('user_details.city', 'LIKE', "%$city%");
		}
		
		if(!empty($request->club_name))
		{
		    $query1 = $query->where('users.id','!=',auth()->user()->id)->where('users.user_type','professional')->where('users.club_name',$request->club_name);
		}
		
		if(!empty($request->zipcode))
		{
		    $query1 = $query->where('users.id','!=',auth()->user()->id)->where('users.user_type','professional')->where('user_details.zipcode',$request->zipcode);
		}
		
		$professionals = $query1->where('users.id','!=',auth()->user()->id)->where('users.user_type','professional')->orderBy('users.created_at','desc')->get();
// 		dd($professionals);
	    $output = "";
		if ($professionals->count() > 0) {
			$output = view("professionals.show_professionals", compact('professionals'))->render();
		}else{
		    $output = view("professionals.show_professionals", compact('professionals'))->render();
		}

		return json_encode($output);
    }
}




