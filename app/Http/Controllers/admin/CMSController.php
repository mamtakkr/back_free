<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Hash;
use App\Models\FooterContentSetting;
use App\Models\Contact;

class CMSController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    

    public function termConditionEdit()
    {
        $terms = FooterContentSetting::first();
        return view('admin.cms.term_condition_edit', compact('terms'));
    }


    public function termConditionUpdate(Request $request)
    {
        $this->validate($request,[
            'terms_title' => 'required|max:255',
            'terms_description' => 'required',
        ]);
        
        if(!empty($request->id)){
            $terms = FooterContentSetting::findOrFail($request->get('id'));
            $terms->terms_title = $request->get('terms_title');
            $terms->terms_description = $request->get('terms_description');
            $terms->save();
        }else{
             $terms = new FooterContentSetting([
                'terms_title' => $request->get('terms_title'),
                'terms_description' => $request->get('terms_description'),
            ]);
            $terms->save();
        }
        return redirect()->back()->with('success', __("public.data_updated"));
    }
    

    public function privacyPolicyEdit()
    {
        $privacy = FooterContentSetting::first();
        return view('admin.cms.privacy_policy_edit', compact('privacy'));
    }


    public function privacyPolicyUpdate(Request $request)
    {
        $this->validate($request,[
            'privacy_title' => 'required|max:255',
            'privacy_description' => 'required',
        ]);
        
        if(!empty($request->id)){
            $privacy = FooterContentSetting::findOrFail($request->get('id'));
            $privacy->privacy_title = $request->get('privacy_title');
            $privacy->privacy_description = $request->get('privacy_description');
            $privacy->save();
        }else{
             $privacy = new FooterContentSetting([
                'privacy_title' => $request->get('privacy_title'),
                'privacy_description' => $request->get('privacy_description'),
            ]);
            $privacy->save();
        }
        return redirect()->back()->with('success', __("public.data_updated"));
    }
    

    public function equalMentEdit()
    {
        $equal_m = FooterContentSetting::first();
        return view('admin.cms.equal_mention_edit', compact('equal_m'));
    }


    public function equalMentUpdate(Request $request)
    {
        $this->validate($request,[
            'equal_men_title' => 'required|max:255',
            'equal_men_description' => 'required',
        ]);
        
        if(!empty($request->id)){
            $equal_m = FooterContentSetting::findOrFail($request->get('id'));
            $equal_m->equal_men_title = $request->get('equal_men_title');
            $equal_m->equal_men_description = $request->get('equal_men_description');
            $equal_m->save();
        }else{
             $equal_m = new FooterContentSetting([
                'equal_men_title' => $request->get('equal_men_title'),
                'equal_men_description' => $request->get('equal_men_description'),
            ]);
            $equal_m->save();
        }
        return redirect()->back()->with('success', __("public.data_updated"));
    }
    
    public function contactsShow()
    {
        $contacts = Contact::get();
        return view('admin.cms.contacts_show', compact('contacts'));
    }
    
}