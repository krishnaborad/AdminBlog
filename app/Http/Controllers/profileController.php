<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Image;
use App\profiles;
class profileController extends Controller
{
     public function index()
     {
         $img = profiles::all();
         return view('admin.profile_edit.profile',compact('img'));
     }
     public function store(Request $request)
     {

         if(isset($request->image))
         {
             foreach($request->image as $file)
             {
                 $images = new profiles;
                 $filename = $file->getClientOriginalName();
                 $extension = $file->getClientOriginalExtension();
                 $size = $file->getClientSize();
                 $path = "profile/".$filename;

                 $file->move(public_path('profile'),$filename);
                 $images->image = $path;
                 $images->save();
             }
         }
         return back()

             ->with('success','Article Uploaded successfully.');

    }

}
