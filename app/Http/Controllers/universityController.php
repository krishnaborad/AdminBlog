<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\state;
use App\University;
use App\country;
use Image;
use Session;
use \Input as Input;
class universityController extends Controller
{
    public function index()
    {
      $countries = country::all();
      $states = state::all();
      $universities = University::all();
      return view('admin.university.index',compact('states','countries','universities'));
    }
    public function create(Request $request)
    {
        $university = new University;
        $university->state_id = $request->input('state_id');
        $university->uni_name = $request->input('uni_name');
        $university->uni_email = $request->input('uni_email');
        $university->uni_address = $request->input('uni_address');
        $university->website = $request->input('website');
        $university->uni_phone = $request->input('uni_phone');
        $university->save();
        alert('Upload','University Data Successfully Uploaded', 'success');
        return back();
    }
}
