<?php
namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use App\Models\Event;

class EventController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function pendingEvents()
    {
        $date = date("Y-m-d");
        $events = Event::whereDate('end_date', ">", $date)->orderBy('created_at', 'desc')->get();
        return view('admin.events.pending_events', compact('events'));
    }

    public function completedEvents()
    {
        $date = date("Y-m-d");
        $events = Event::whereDate('end_date', "<", $date)->orderBy('created_at', 'desc')->get();
        return view('admin.events.completed_events', compact('events'));
    }

    
    public function pendingEventView($id)
    {
        $event = Event::findorFail($id);
        return view('admin.events.pending_event_view', compact('event'));
    }

    
    public function completedEventView($id)
    {
        $event = Event::findorFail($id);
        return view('admin.events.completed_event_view', compact('event'));
    }

}
