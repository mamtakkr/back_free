<?php
namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;

class PlanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    public function index()
    {
        $plans = Plan::get();
        return view('admin.plans.index', compact('plans'));
    }

    public function create()
    {
        return view('admin.plans.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'price' => 'required',
            'trial_days' => 'required',
            'plan_type' => 'required',
        ]);

        $slug = Str::slug($request->plan_type);
        $plan_id = $request->get('plan_type').'_'.$this->generateRandomString();

        $plans = new Plan([
            'name' => $request->get('name'),
            'slug' => $slug,
            'price' => $request->get('price'),
            'plan_id' => $plan_id,
            'trial_days' => $request->get('trial_days'),
            'plan_type' => $request->get('plan_type'),
            'description' => $request->get('description'),
            'created_at' => date('Y-m-d'),
            'updated_at' => date('Y-m-d'),
        ]);
        $plans->save();
        return redirect()->route('plans')->with('success', 'Data Added Successfully');
    }
    
    public function edit($id)
    {
        $plan = Plan::findorFail($id);
        return view('admin.plans.edit', compact('plan'));
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'price' => 'required',
            'trial_days' => 'required',
            'plan_type' => 'required',
        ]);

        $plan = Plan::findOrFail($request->get('id'));
        $plan->name = $request->get('name');
        $plan->price = $request->get('price');
        $plan->trial_days = $request->get('trial_days');
        $plan->plan_type = $request->get('plan_type');
        $plan->description = $request->get('description');
        $plan->updated_at = date('Y-m-d');
        $plan->save();
        return redirect()->route('plans')->with('success', 'Data Updated Successfully');
    }


}








