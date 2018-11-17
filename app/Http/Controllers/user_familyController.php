<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class user_familyController extends Controller
{
    public function index()
    {
        return view('admin.users.user_family');
    }
}
