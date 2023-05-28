<?php
namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class CountryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $countries = Country::where('is_deleted',0)->orderBy('id', 'DESC')->get();
        return view('admin.countries.index', compact('countries'));
    }

    public function create()
    {
        return view('admin.countries.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);

        $countries = new Country([
            'name' => $request->get('name'),
            'created_at' => date('Y-m-d'),
            'updated_at' => date('Y-m-d'),
        ]);
        $countries->save();
        return redirect()->route('countries-index')->with('success', 'Data Added Successfully');
    }

    public function edit($id)
    {
        $country = Country::findorFail($id);
        return view('admin.countries.edit', compact('country'));
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);
        
        $country = Country::findOrFail($request->get('id'));
        $country->name = $request->get('name');
        $country->updated_at = date('Y-m-d');
        $country->save();
        return redirect()->route('countries-index')->with('success', 'Data Updated Successfully');
    }


    public function destroy($id)
    {
        $country = Country::where('id', $id)->first();
        $country->update(['is_deleted'=>1]);
        return redirect()->route('countries-index')->with('error', 'Data Deleted');
    }

}
