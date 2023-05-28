<?php
namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use App\Models\EventCategory;
use App\Models\Event;

class EventCategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $categories = EventCategory::where('is_deleted',0)->get();
        return view('admin.event_categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.event_categories.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
        ]);

        $category = new EventCategory([
            'title' => $request->get('title'),
            'created_at' => date('Y-m-d'),
            'updated_at' => date('Y-m-d'),
        ]);
        $category->save();
        return redirect()->route('event-categories')->with('success', __("public.data_added"));
    }

    public function edit($id)
    {
        $category = EventCategory::findorFail($id);
        return view('admin.event_categories.edit', compact('category'));
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
        ]);
        
        $category = EventCategory::findOrFail($request->get('id'));
        $category->title = $request->get('title');
        $category->updated_at = date('Y-m-d');
        $category->save();
        return redirect()->route('event-categories')->with('success', __("public.data_updated"));
    }

    
    public function destroy($id)
    {
        $category = EventCategory::where('id', $id)->first();
        $event = Event::where('event_category',$category->title)->get();
        if($event->count()>0){
            return redirect()->back()->with('error', __("public.category_already"));
        }else{
            $category = EventCategory::where('id', $id)->update(['is_deleted'=>1]);
            return redirect()->route('event-categories')->with('error', __("public.data_deleted"));   
        }
    }

}
