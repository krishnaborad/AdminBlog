@extends('admin.layouts.adminapp')
@section('content')

<div class="box-inner">
            <div class="box-content">
                <br><br><br><br><br><br><br>
                <center><h2><font color="#3C8DBC">{{ Auth::user()->name }}</font></h2><center>
                <center><h4><font color="#3C8DBC">{{ Auth::user()->email }}</font></h4><center>
             </div>
             <br><br><br><br><br><br><br>

</div>

@endsection
