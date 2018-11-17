@extends('admin.layouts.adminapp')

@section('content')
<h2>Reset Password</h2>
        <div class="box-inner">
            <div class="box-content"><br><br>
                <div class="row">
                    <div class="well col-md-7 center login-box">
                        <div class="alert alert-info">
                            Please Enter Current Password.
                        </div>
                            <br>
                                <form  class="form-horizontal" method="post">
                                {{ csrf_field() }}
                                <center>
                                        <div class="input-group input-group-lg" {{ $errors->has('old_password') ? ' has-error' : 'enter' }} >
                                            <span class="input-group-addon"><i class="glyphicon glyphicon-lock blue"></i></span>
                                            <input id="password" placeholder="Enter your Current Password" type="password" class="form-control" name="old_password">
                                        </div><br>

                                        <div class="input-group input-group-lg" {{ $errors->has('password') ? ' has-error' : 'enter' }} >
                                            <span class="input-group-addon"><i class="glyphicon glyphicon-lock blue"></i></span>
                                            <input id="password" placeholder="Enter Your New password" type="password" class="form-control" name="password" >
                                        </div><br>

                                        <div class="input-group input-group-lg" {{ $errors->has('new_password') ? ' has-error' : 'enter' }} >
                                            <span class="input-group-addon"><i class="glyphicon glyphicon-lock blue"></i></span>
                                            <input id="password" placeholder="Re-type Your New Password" type="password" class="form-control" name="password_confirmation" >

                                        </div><br><br><button type="submit" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i>
                                            update password</button>
                                            <br><br><br>
                                    </center>
                                    </form>
                            </div>
                    </div>
            </div>
</div>
@endsection
