@extends('admin.layouts.adminapp')
@section('content')
<style media="screen">
        .onoffswitch {
            position: relative; width: 66px;
            -webkit-user-select:none; -moz-user-select:none; -ms-user-select: none;
        }
        .onoffswitch-checkbox {
            display: none;
        }
        .onoffswitch-label {
            display: block; overflow: hidden; cursor: pointer;
            border: 2px solid #FFFFFF; border-radius: 20px;
        }
        .onoffswitch-inner {
            display: block; width: 200%; margin-left: -100%;
            transition: margin 0.3s ease-in 0s;
        }
        .onoffswitch-inner:before, .onoffswitch-inner:after {
            display: block; float: left; width: 50%; height: 33px; padding: 0; line-height: 33px;
            font-size: 14px; color: white; font-family: Trebuchet, Arial, sans-serif; font-weight: bold;
            box-sizing: border-box;
        }
        .onoffswitch-inner:before {
            content: "ON";
            padding-left: 5px;
            background-color: #3C8DBC; color: #FFFFFF;
        }
        .onoffswitch-inner:after {
            content: "OFF";
            padding-right: 5px;
            background-color: #EEEEEE; color: #999999;
            text-align: right;
        }
        .onoffswitch-switch {
            display: block; width: 18px; margin: 7.5px;
            background: #FFFFFF;
            position: absolute; top: 0; bottom: 0;
            right: 29px;
            border: 2px solid #FFFFFF; border-radius: 20px;
            transition: all 0.3s ease-in 0s;
        }
        .onoffswitch-checkbox:checked + .onoffswitch-label .onoffswitch-inner {
            margin-left: 0;
        }
        .onoffswitch-checkbox:checked + .onoffswitch-label .onoffswitch-switch {
            right: 0px;
        }

</style>
<!-- Content Header (Page header) -->
<div class="box-content alerts">

        @if(Session::has('flash_message'))
               <div class="alert alert-success">
                   <button type="button" class="close" data-dismiss="alert">&times;</button>
                   {!! session('flash_message') !!}<strong> Well done!</strong>
               </div>
         @endif

</div>
<h2>General Settings</h2>
        <div class="box-inner">
            <div class="box-content">
                      <br>

                    <form class="form-horizontal form-material example"  method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}<br>
                        <table class="table table-striped table-bordered responsive ">
                            <tr>
                                <td>1.</td>
                                <td>Company Option</td>
                                <td>
                                    <div class="onoffswitch">
                                         <input type="checkbox" name="value" class="onoffswitch-checkbox" id="myonoffswitch" value="1" @if($company->value == 1) checked @endif>
                                         <label class="onoffswitch-label" for="myonoffswitch">
                                             <span class="onoffswitch-inner"></span>
                                             <span class="onoffswitch-switch"></span>
                                         </label>
                                     </div>
                                </td>
                            </tr>
                            <tr>
                                <td>2.</td>
                                <td>Reset Password</td>
                                <td>

                                        <a class="pull-left" href="{{ url('admin/profile_edit/reset')}}"><i class="fa fa-key"></i> &nbsp;&nbsp;Reset Password</a><br>
                                </td>
                            </tr>
                            <tr>
                                <td>3.</td>
                                <td>Add new admin Login</td>
                                <td>

                                            <a class="" href="{{ url('admin/logins')}}"><i class="glyphicon glyphicon-log-in" aria-hidden="true"></i>        &nbsp;&nbsp;Login Setting</a>
                                </td>
                            </tr>
                        </table>
                        <br><br>
                        <center><button type="submit" class="btn btn-primary">change</button></center>

                    </form><br><br>
                </div>
            </section>
        </section>
    </div>
@endsection
