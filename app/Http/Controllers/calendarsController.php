<?php

namespace App\Http\Controllers;

use MaddHatter\LaravelFullcalendar\Event;
use Auth, Request;
use App\calendar;
class calendarsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = Auth::user();
        $tasks = calendar::all();
        return view('admin.calendar.index', ['tasks' => $tasks , 'users'=> $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
          $input = Request::all();
          $task = new calendar();
          $task->title = $input['title'];
          $task->date = $input['date'];
          $task->user_id = Auth::user()->id;

          $task->save();

          return back();

      }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,$id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $tasks = calendar::all();
      $calendars = calendar::find($id);
      return view('admin.calendar.index', compact('calendars','tasks'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update()
    {
          $input = Request::all();
          $calendar = calendar::find($input['eventid']);
          $calendar->title = $input['title'];
          $calendar->save();
          return response ()->json ( $calendar );


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function remove()
    {

      $input = Request::all();
      $cal = calendar::find($input['eventid']);
      $cal->delete();
      return redirect('admin/calendar');

    }
}
