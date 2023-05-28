<?php
namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Participate;
use App\Models\User;
use Illuminate\Http\Request;
use \Validator;
use URL;
use Auth;
use DB;

class EventController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    
	public function events(Request $request)
    {
		$event_categories = DB::table('event_categories')->where('is_deleted',0)->get();
		$event_types = DB::table('event_types')->where('is_deleted',0)->get();
        return view('events', compact('event_categories','event_types'));
	}
    
	public function myEvents(Request $request)
    {
		$events = Event::with('relUser')->where('user_id',Auth::user()->id)->orderBy('start_date','desc')->get();
        return view('events.my_events', compact('events'));
	}
	
	public function event_details($id)
    {
        $event = Event::findorFail($id);
        $participate_exists = Participate::where(['event_id' => $id, 'participate_from' => Auth::user()->id])->first();
        $participates = Participate::where('event_id',$id)->get();
        return view('events.event_details', compact('event','participate_exists','participates'));
	}
    
	public function fetchAllEvents() {
	    
		$events = Event::with('relUser')->orderBy('start_date','desc')->get();
		
	    $output = "";
		if ($events->count() > 0) {
			$output = view("events.show_all_events", compact('events'))->render();
		}else{
		  //  dd($posts);
		    $output = view("events.show_all_events", compact('events'))->render();
		}

		return json_encode($output);
	}
	

	public function eventStore(Request $request) 
	{
	
        $validator =  Validator::make($request->all(), [
			'title' => 'required',
			'event_type' => 'required',
			'event_category' => 'required',
			'address' => 'required',
			'postal_code' => 'required',
			'town' => 'required',
			'email' => 'required',
			'start_date' => 'required',
			'end_date' => 'required',
			'registration_deadline' => 'required',
			'registration_limit' => 'required',
			'organizer' => 'required',
            'banner' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
			'couples' => 'required',
			'women' => 'required',
			'men' => 'required',
			'transgender' => 'required',
			'description' => 'required',
        ],[
			'description.required' => __('public.description_required'),
            'banner.max' => __('public.banner_max')    
        ]);
        
        if($validator->fails()) {
            return response()->json([
                'status' => 401,
                'message' => 'validation error',
                'errors' => $validator->errors()
            ]);
        }else{
            $new_name = "";
            $image = $request->file('banner');
            if ($image != '') {
                $new_name = preg_replace('/[^A-Za-z0-9\-]/', '-', $request->get('event_type')) . rand() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('images/events/') , $new_name);
            }
    
	
    		$eventData = [
    		    'user_id' => Auth::user()->id,
    		    'title' => $request->title, 
				'event_type' => $request->event_type,
				'event_category' => $request->event_category,
				'address' => $request->address,
				'postal_code' => $request->postal_code,
				'town' => $request->town,
				'email' => $request->email,
				'start_date' => $request->start_date,
				'end_date' => $request->end_date,
				'registration_deadline' => $request->registration_deadline,
				'registration_limit' => $request->registration_limit,
				'organizer' => $request->organizer,
				'banner' => $new_name,
				'couples' => $request->couples,
				'women' => $request->women,
    		    'men' => $request->men,
				'transgender' => $request->transgender,
				'description' => $request->description
    		];
    		
    		Event::create($eventData);
    		return response()->json([
    			'status' => 200,
    		]);
        }

	}
	
	
	public function eventSearch(Request $request) 
	{
		$event_categories = $request->event_categories;
		$event_types = $request->event_types;
		
		$query = Event::with('relUser')->select("events.*");
		
		if(!empty($request->start_date))
		{
		$query = $query->where('start_date',$request->start_date);
		}
		
		if(!empty($request->price))
		{
		$query = $query->where('price',$request->price);
		}
		
		if(!empty($request->town))
		{
		$query = $query->where('town',$request->town);
		}
		
		if(!empty($request->postal_code))
		{
		$query = $query->where('postal_code',$request->postal_code);
		}
		
		if(!empty($event_categories))
		{
		$query = $query->whereIn('event_category',$event_categories);
		}
		
		if(!empty($event_types))
		{
		$query = $query->whereIn('event_type',$event_types);
		}
		
		$events = $query->orderBy('start_date','desc')->get();
		
	    $output = "";
		if ($events->count() > 0) {
			$output = view("events.show_all_events", compact('events'))->render();
		}else{
		  //  dd($posts);
		    $output = view("events.show_all_events", compact('events'))->render();
		}

		return json_encode($output);
	}
	
	
	public function participateStore(Request $request) 
	{
	    $participateData = [
		    'event_id' => $request->event_id,
		    'participate_from' => $request->participate_from,
		    'created_at' => date("Y-m-d"),
		    'updated_at' => date("Y-m-d"),
		];
		Participate::create($participateData);
		$participates = Participate::where('event_id', $request->event_id)->get();
		Event::where('id', $request->event_id)->update(['total_participates' => count($participates)]);
		return response()->json([
			'status' => 200,
		]);
	}
	
	
	
	public function fetchParticipate(Request $request) {
		$user_id = $request->get('user_id');
		$user = User::findOrFail($user_id);
		$participate = Participate::where('participate_from',$user_id)->first();
	    $output = view("events.show_participate", compact('user','participate'))->render();

		return json_encode($output);
	}
	
		
	
	public function acceptStore(Request $request) 
	{
		$total_participate = Participate::where(['event_id'=>$request->event_id,'status'=>'accepted'])->get();
		$event = Event::findorFail($request->event_id);
		
		if($event->registration_limit==$event->total_registration)
	    {
		    return response()->json([
    			'status' => 400,
    		]);
		}else{
		    $participates = Participate::where(['event_id'=>$request->event_id,'participate_from'=>$request->participate_from])->update(['status'=>'accepted']);
		    $total_par = Participate::where(['event_id'=>$request->event_id,'status'=>'accepted'])->get();
	        if($participates )
		    {
    		    Event::where('id',$request->event_id)->update(['total_registration'=>count($total_par)]);
        		return response()->json([
        			'status' => 200,
        			
        		]);
		    }
		}
	}
		
	
	public function rejectStore(Request $request) 
	{
		$participates = Participate::where(['event_id'=>$request->event_id,'participate_from'=>$request->participate_from])->update(['status'=>'rejected']);
		return response()->json([
			'status' => 200,
		]);
	}
	
	

}