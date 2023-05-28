<?php
namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Origin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class OriginController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $origins = Origin::where('is_deleted',0)->orderBy('id', 'DESC')->get();
        return view('admin.origins.index', compact('origins'));
    }

    public function create()
    {
        return view('admin.origins.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);

        $origins = new Origin([
            'name' => $request->get('name'),
            'created_at' => date('Y-m-d'),
            'updated_at' => date('Y-m-d'),
        ]);
        $origins->save();
        return redirect()->route('origins-index')->with('success', 'Data Added Successfully');
    }

    public function edit($id)
    {
        $origin = Origin::findorFail($id);
        return view('admin.origins.edit', compact('origin'));
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);

        $origin = Origin::findOrFail($request->get('id'));
        $origin->name = $request->get('name');
        $origin->updated_at = date('Y-m-d');
        $origin->save();
        return redirect()->route('origins-index')->with('success', 'Data Updated Successfully');
    }


    public function destroy($id)
    {
        $origin = Origin::where('id', $id)->first();
        $origin->update(['is_deleted'=>1]);
        return redirect()->route('origins-index')->with('error', 'Data Deleted');
    }

}
