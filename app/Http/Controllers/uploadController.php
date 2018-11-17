<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\upload;
class uploadController extends Controller
{
    public function index()
    {
        $img = upload::all();
        return view('admin.upload.index', compact('img'));
    }
    public function upload(Request $request)
    {

        $this->validate($request, [

       'details'=>'required',
   ]);

        if(isset($request->image))
        {
            foreach($request->image as $file)
            {
                $images = new upload;
                $filename = $file->getClientOriginalName();
                $extension = $file->getClientOriginalExtension();
                $size = $file->getClientSize();
                $path = "pic/".$filename;

                $file->move(public_path('pic'),$filename);
                $images->image = $path;
                $images->details = $request->input('details');
                $images->save();
            }
        }
        return back()

            ->with('success','Article Uploaded successfully.');
    }
    public function delete($id)
    {
        $img= upload::find($id);
        $img->delete();
        return back()

            ->with('success','Article Deleted successfully.');
    }
}
