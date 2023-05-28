<?php
namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class SliderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function sliders_show()
    {
        $sliders = Slider::orderBy('id', 'DESC')->paginate(10);
        return view('admin.sliders.sliders_show', compact('sliders'));
    }

    public function slider_create()
    {
        return view('admin.sliders.slider_create');
    }

    public function slider_create_action(Request $request)
    {
        $this->validate($request, [
            'image_url' => 'required', 'image', 'max:2048',
        ]);

        $image = $request->file('image_url');
        $input['imagename'] = time().'.'.$image->getClientOriginalExtension();
     
        $destinationPath = public_path('images/sliders');
        $img = Image::make($image->getRealPath());
        $img->resize(1620, 1080, function ($constraint) {
            $constraint->aspectRatio();
        })->save($destinationPath.'/'.$input['imagename']);

        $sliders = new Slider([
            'title' => $request->get('title'),
            'sub_title' => $request->get('sub_title'),
            'image_url' => $input['imagename'],
            'created_at' => date('Y-m-d'),
            'updated_at' => date('Y-m-d'),
        ]);
        $sliders->save();
        return redirect()->route('sliders-show')->with('success', __("public.data_added"));
    }

    public function slider_edit($id)
    {
        $slider = Slider::find($id);
        return view('admin.sliders.slider_edit', compact('slider'));
    }

    public function slider_update_action(Request $request)
    {
        $image_name = $request->old_image_url;

        $image = $request->file('new_image_url');
        if ($image != '') {
            $image_name = time().'.'.$image->getClientOriginalExtension();
      
            $destinationPath = public_path('images/sliders');
            $img = Image::make($image->getRealPath());
            
            $img->resize(1620, 1080, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath.'/'.$image_name);
        } 
        
        $slider = Slider::findOrFail($request->get('id'));
        $slider->title = $request->get('title');
        $slider->sub_title = $request->get('sub_title');

        if ($request->old_image_url != null) {
            if ($request->file('new_image_url')) {
                $file = public_path('/images/sliders/' . "/" . $request->old_image_url);
                if (file_exists($file)) {
                    unlink($file);
                }
                $slider->image_url = $image_name;
            }
        } else {
            $slider->image_url = $image_name;
        }

        $slider->updated_at = date('Y-m-d');
        $slider->save();
        return redirect()->route('sliders-show')->with('success', __("public.data_updated"));
    }


    public function slider_delete($id)
    {
        $slider = Slider::where('id', $id)->first();
        if ($slider->image_url != null) {
            $file = public_path('/images/sliders/' . "/" . $slider->image_url);
            if (file_exists($file)) {
                unlink($file);
            }
        } else {
            $slider->delete();
        }
        $slider->delete();
        return redirect()->route('sliders-show')->with('error', __("public.data_deleted"));
    }

    public function slider_status_update(Request $request)
    {
        if ($request->mode == 'true') {
            Slider::where('id', $request->id)->update(['status' => 'show']);
        } else {
            Slider::where('id', $request->id)->update(['status' => 'hide']);
        }
        return response()->json(['msg' => __("public.status_updated"), 'status' => true]);
    }
}
