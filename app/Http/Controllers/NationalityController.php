<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\country;
use App\state;
use App\city;
use DB;
class NationalityController extends Controller
{
      public function index()
      {
          $countries = DB::table("countries")->pluck("code","name","id")->all();
          return view('admin.Nationality.index',compact('countries'));
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
      public function test_index()
      {
        $states = state::all();
        $countries = country::all();
        $cities = city::all();
        return view('admin.Nationality.index',compact('countries','states','cities'));
      }
      public function store_country(Request $request)
      {
        $country = new country;
        $country->code = $request->input('code');
        $country->name = $request->input('name');
        $country->save();
        return 1;
      }
      public function create()
      {
        $states =state::all();
        $countries = country::all();
        return view('admin.Nationality.create', compact('countries','states'));
      }
      public function state_store(Request $request)
      {
        $state = new state;
        $state->country_id = $request->input('country_id');
        $state->name = $request->input('name');
        $state->save();
        return 3;
      }
      public function create_city()
      {
        $cities = city::all();
        $states = state::all();
        return view('admin.Nationality.create_city' ,compact('states','cities'));
      }
      public function city_store(Request $request)
      {
        $city = new city;
        $city->state_id = $request->input('state_id');
        $city->name = $request->input('name');
        $city->save();
        return 2;
      }

}
