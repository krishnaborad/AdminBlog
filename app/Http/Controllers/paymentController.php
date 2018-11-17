<?php

namespace App\Http\Controllers;
use Session;
use Redirect;
use Input;
use Auth;
use App\Payments;
use App\User;
use Cartalyst\Stripe\Laravel\Facades\Stripe;
use Illuminate\Http\Request;


class paymentController extends Controller
{
    public function index()
    {
        return view('admin.payment.index');
    }
    public function post(Request $request)
    {
        $this->validate($request, [

         'amount'=>'required',
         'number'=>'required|max:16',
         'cvc'=>'required|max:3',
        ]);


        $pay = new Payments;
        $pay->user_id = Auth::user()->id;
        $pay->amount = $request->input('amount');
        $pay->number = $request->input('number');
        $pay->cvc = $request->input('cvc');
        $pay->exp_month = $request->input('exp_month');
        $pay->exp_year = $request->input('exp_year');
        $pay->save();
        \Session::flash('flash_message','successfully saved.');
        return back();
    }
}
