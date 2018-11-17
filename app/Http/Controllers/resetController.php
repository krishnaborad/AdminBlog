<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

use Hash;
use Auth;
use App\User;

class resetController extends Controller
{
    public function index()
    {
         return view('admin.profile_edit.reset');
    }
    public function update(Request $request)
    {
          $this->validate($request, [
                'old_password' => 'required',
                'password'     => 'required|min:6|confirmed',

             ]);
           $user = Auth::user();
           $old_password = $request->input('old_password');

              if (!Hash::check($old_password, $user->password))
              {
                  \Session::flash('flash_message','Product successfully saved.');
                  return back();
              }
              else
              {

                  $user->password = bcrypt($request->input('password'));
                  $user->save();
                  Auth::logout();
                  return redirect('login');

              }
    }
}
