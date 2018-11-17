@extends('layouts.app')
@section('content')
<div class="container-fluid">
  @foreach($universities as $university)
    <div class="box">
          <div class="">
              <div class="col- box-inner" style="padding:25px;">
                      <font size="4">{{$university->uni_name}}</font>
                      <br>{{$university->uni_email}}
                      <br>{{$university->uni_address}}
                      <br>{{$university->website}}
                      <br>{{$university->uni_phone}}
              </div>
          </div>
    </div>
  @endforeach
</div>
@endsection
