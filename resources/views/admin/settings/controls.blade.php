@extends('admin.layouts.adminapp')
@section('content')
<div class="box-content alerts">

        @if(Session::has('flash_message'))
               <div class="alert alert-success">
                   <button type="button" class="close" data-dismiss="alert">&times;</button>
                   {!! session('flash_message') !!}<strong> Well done!</strong>
               </div>
         @endif

</div>
<!-- Content Header (Page header) -->
<section class="box-body">

  <h1>General Settings</h1>
      <section class="content">
          <div class="box" id="example2">
                    <div class="box-header with-border">
                        <div class="box-tools pull-right">
                          <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                                  title="Collapse">
                            <i class="fa fa-minus"></i></button>
                          <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                            <i class="fa fa-times"></i></button>
                        </div>
                      </div>

                  <!-- Flash successfull Message Start -->

                  <!-- Flash successfull message End -->
                      <br>

                    <form class="form-horizontal form-material"  method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            <a class="btn btn-info" href="{{ url('admin/logins')}}"><i class=""></i>Login Setting</a><br>

                            <!-- <a class="w3-button w3-block w3-light-grey w3-border" href="{{url('admin/settings/personal')}}">Users </a><br>
                            <a class="w3-button w3-block w3-light-grey w3-border" href="{{url('admin/settings/personal')}}">Security Control</a> -->

                    </form>
                </div>
            </section>
        </section>
    </div>
@endsection
