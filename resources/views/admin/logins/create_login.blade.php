@extends('admin.layouts.adminapp')
@section('content')

<h2>Add New Login</h2>
<div class="box-inner">
    <div class="box-content"><br><br>
    <div class="row">
        <div class="well col-md-7 center login-box">
            <div class="alert alert-info">
                Please Register New Account.
            </div>  <br>
                    <form class="" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            <div class="input-group input-group-lg">

                              <span class="input-group-addon"><i class="glyphicon glyphicon-user red"></i></span>
                                    <input type="text" id="name" class="form-control" placeholder="Enter Your  Name" name="name" ><br>

                              </div>
                              <br>
                               <div class="input-group input-group-lg">

                                   <span class="input-group-addon"><i class="glyphicon glyphicon-envelope red"></i></span>
                                        <input type="text" id="email" class="form-control" placeholder="Enter Your Email" name="email" ><br>
                                </div>
                                <br>
                                <div class="input-group input-group-lg">

                                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock red"></i></span>
                                         <input type="password" id="password" class="form-control" placeholder="Enter Your Password" name="password" ><br><br>
                                </div>

                                <br>

                                <button class="btn btn-primary"type="submit">Login</button>

                                <br><br>
                    </form>
                  </div>
            </div>
          </div>
      </div>

@endsection
