<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\product;
use App\users;
use App\guest;
use App\pos;
use App\relation;
use App\country;
use DB;
class posController extends Controller
{
    public function index()
    {
      $users = guest::all();
      $user = users::all();
      $relations = relation::all();
      $products = product::all();
      $countries = DB::table("countries")->pluck("name","id")->all();
      return view('admin.pos.index', compact('user','users','relations','products','countries') );
    }
    public function getStateList(Request $request)
    {
        $states = DB::table("states")
                    ->where("country_id",$request->country_id)
                    ->pluck("name","id");
        return response()->json($states);
    }
    public function getCityList(Request $request)
    {
        $cities = DB::table("cities")
                    ->where("state_id",$request->state_id)
                    ->pluck("name","id");
        return response()->json($cities);
    }
    public function store(Request $request)
    {

        $this->validate($request, [

       'name'=>'required',
       'email'=>'required|email|unique:users,email',
       'phone_no'=>'required|numeric|min:10',
       'birthday'=>'required::d/m/Y',
       'type_id'=>'required',
       'country'=>'required',
       'state'=>'required',
       'city'=>'required',
       'gender'=>'required',


        ]);

        $data = new users;

        $data->name = $request->input('name');
        $data->email = $request->input('email');
        $data->phone_no = $request->input('phone_no');
        $data->birthday = $request->input('birthday');
        $data->country = $request->input('country');
        $data->state = $request->input('state');
        $data->city = $request->input('city');
        $data->marital_status = (!empty($request->input('marital_status'))) ? $request->input('marital_status'):"0";
        $data->gender = (!empty($request->input('gender'))) ? $request->input('gender'):"0";
        $data->type_id = $request->input('type_id');
        $data->save();

       \Session::flash('flash_message','Customer successfully saved.');
        return redirect('admin/pos');
    }
    public function post()
    {
        $cust = Input::get ( 'cust' );
        $customer = users::where('name','LIKE','%'.$cust.'%')->orWhere('phone_no','LIKE','%'.$cust.'%')->get();
        if(count($customer) > 0)
        {
          return view('admin.pos.index')->withDetails($customer)->withQuery ( $cust );
        }
        else
        {
          \Session::flash('flash_message','No Results Found.');
           return redirect('admin/pos');
        }

    }

}
