<?php
namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class CityController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $cities = City::where('is_deleted',0)->orderBy('id', 'DESC')->get();
        return view('admin.cities.index', compact('cities'));
    }

    public function create()
    {
        $countries = Country::where('is_deleted',0)->orderBy('name','ASC')->get();
        return view('admin.cities.create',compact('countries'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'country_id' => 'required',
            'name' => 'required',
        ]);

        $cities = new City([
            'country_id' => $request->get('country_id'),
            'name' => $request->get('name'),
            'created_at' => date('Y-m-d'),
            'updated_at' => date('Y-m-d'),
        ]);
        $cities->save();
        return redirect()->route('cities-index')->with('success', __("public.data_added"));
    }

    public function edit($id)
    {
        $city = City::findorFail($id);
        $countries = Country::where('is_deleted',0)->orderBy('name','ASC')->get();
        return view('admin.cities.edit', compact('city','countries'));
    }

    public function update(Request $request)
    {
        
        $city = City::findOrFail($request->get('id'));
        $city->country_id = $request->get('country_id');
        $city->name = $request->get('name');
        $city->updated_at = date('Y-m-d');
        $city->save();
        return redirect()->route('cities-index')->with('success', __("public.data_updated"));
    }


    public function destroy($id)
    {
        $city = City::where('id', $id)->first();
        $city->update(['is_deleted'=>1]);
        return redirect()->route('cities-index')->with('error', __("public.data_deleted"));
    }

}
