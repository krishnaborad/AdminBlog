<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class loginController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.logins.index',compact('users'));
    }
    public function create()
    {

        return view('admin.logins.create_login');
    }
    public function store(Request $request)
    {
            $this->validate($request, [

           'name' => 'required|string|max:255',
           'email' => 'required|string|email|max:255|unique:users',
           'password' => 'required|string|min:6',

        ]);

            $user = new User;

            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->password = bcrypt($request->input('password'));
            $user->save();

            \Session::flash('flash_message','User Successfully Ragistered.');
            return redirect('admin/logins');
    }
    
    public function delete($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect('admin/logins');
    }


}
