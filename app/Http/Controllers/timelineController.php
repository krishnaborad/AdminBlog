<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\upload;
use App\Comment;
class timelineController extends Controller
{
    public function index()
    {
        $img = upload::all();
        $comments = Comment::all();
        return view('timeline', compact('img','comments'));
    }
    public function upload(Request $request, $id)
    {

                $this->validate($request, [

               'details'=>'required',
               'comment'=>'required',
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
                $comment = new Comment;
                if (Auth::user())
                {
                    $comment->user_id = Auth::user()->id;
                    $comment->name = Auth::user()->name;
                    $comment->email = Auth::user()->email;

                }
                else
                {
                    $comment->name = $request->input('name');
                    $comment->email = $request->input('email');
                }

                $comment->comment = $request->input('comment');
                $comment->save();

                return redirect('timeline/'.$id);
    }
}
