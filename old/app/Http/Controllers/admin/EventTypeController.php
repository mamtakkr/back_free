<?php
namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use App\Models\EventType;
use App\Models\Event;

class EventTypeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $types = EventType::where('is_deleted',0)->get();
        return view('admin.event_types.index', compact('types'));
    }

    public function create()
    {
        return view('admin.event_types.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
        ]);

        $type = new EventType([
            'title' => $request->get('title'),
            'created_at' => date('Y-m-d'),
            'updated_at' => date('Y-m-d'),
        ]);
        $type->save();
        return redirect()->route('event-types')->with('success', 'Data Added Successfully');
    }

    public function edit($id)
    {
        $type = EventType::findorFail($id);
        return view('admin.event_types.edit', compact('type'));
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
        ]);
        
        $type = EventType::findOrFail($request->get('id'));
        $type->title = $request->get('title');
        $type->updated_at = date('Y-m-d');
        $type->save();
        return redirect()->route('event-types')->with('success', 'Data Updated Successfully');
    }
    
    
    public function destroy($id)
    {
        $type = EventType::where('id', $id)->first();
        $event = Event::where('event_type',$type->title)->get();
        if($event->count()>0){
            return redirect()->back()->with('error', 'There is already an event related to this event type. You cannot delete this event type');
        }else{
            $type = EventType::where('id', $id)->update(['is_deleted'=>1]);
            return redirect()->route('event-types')->with('error', 'Data Deleted');   
        }
    }


}
