<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\profiles;
use App\setting;

class settingsController extends Controller
{
    public function index()
    {

        $photo = profiles::all();
        $company = setting::where('key','company_options')->first();
        return view('admin.settings.general' ,compact('photo','company'));

    }
    public function control_index()
    {

        return view('admin.settings.controls');

    }
    public function store(Request $request)
    {

        $company = setting::where('key','company_options')->first();
        $company->value = (!empty($request->input('value'))) ? $request->input('value') : "0";
        $company->save();
        \Session::flash('flash_message','Company Option updated successfully.');
        return redirect('admin/general');

    }

}
