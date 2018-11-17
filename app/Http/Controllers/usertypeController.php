<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\guest;
use App\users;
use DB;
class usertypeController extends Controller
{
    public function index()
    {
        $users = guest::all();
        return view('admin.type_users.index' ,compact('users'));
    }
    public function create()
    {
        return view('admin.type_users.create');
    }
    public function DataTable(Request $request)
    {
        $users = guest::select([
            'id',
            'name',
            'created_at',

        ]);
          return Datatables()
          ->of(guest::all())
          ->addColumn('action', function ($user) {

                 return '<a href="'.url('admin/type_user/delete/' . $user->id) .'"class="btn btn-danger waves-effect waves-light" >Delete</a>';
             })
             ->addColumn('name', function ($user)
              {
                 return $user->name;
            })

       ->make(true);

    }
    public function store(Request $request)
    {
        $this->validate($request, [
        'name'=>'required',
    ]);

        $user = new guest;
        $user->name = $request->input('name');
        $user->save();
        \Session::flash('flash_message','successfully saved.');
        return redirect('admin/type_users');
    }

    public function delete($id)
    {
        $user= guest::find($id);
        $user->delete();
        return redirect('admin/type_users');
    }


}
