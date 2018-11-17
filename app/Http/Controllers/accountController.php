<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\users;
use App\guest;

class accountController extends Controller
{
    public function index()
    {
        $user = users::all();
        $images = image::all();
        return view('account' ,compact('user','image'));

    }
    public function create()
    {
        $users = guest::all();
        return view('account', compact('users'));
    }
    public function store(Request $request)
    {

        $this->validate($request, [

       'name'=>'required',
       'email'=>'required|email|unique:users,email',
       'phone_no'=>'required|numeric',
       'type_id'=>'required',
       'contry'=>'required',
       'state'=>'required',
       'city'=>'required',
       'gender'=>'required',


        ]);

        $data = new users;

        $data->name = $request->input('name');
        $data->email = $request->input('email');
        $data->phone_no = $request->input('phone_no');
        $data->contry = $request->input('contry');
        $data->state = $request->input('state');
        $data->city = $request->input('city');
        $data->marital_status = (!empty($request->input('marital_status'))) ? $request->input('marital_status'):"0";
        $data->gender = (!empty($request->input('gender'))) ? $request->input('gender'):"0";
        $data->type_id = $request->input('type_id');
        $data->save();



        \Session::flash('flash_message','user successfully saved.');
        return redirect('account');
    }
}
