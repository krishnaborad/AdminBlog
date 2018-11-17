<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class guestController extends Controller
{
    public function index()
    {
        return view('guest.index');
    }

}
