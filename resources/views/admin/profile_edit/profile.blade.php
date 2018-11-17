@extends('admin.layouts.adminapp')
@section('content')

<h2>Profile</h2>
        <div class="box-inner">
            <div class="box-content">

                    <form class="form" method="post"action="">

                        {{ csrf_field() }}
                            <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
                            <div class="row">

                            <div class="col-sm-6">
                                <img src="{{url('download.png')}}" id="profile-img-tag" width="200px"  style="width:150px; height:150px; float:left; border-radius:50%; margin-right:25px;"/><br><br><br>
                                <br><br>    <br><br>    <br><br>
                                <input type="file" name="image" id="profile-img"><br>

                            </div>

                            <div class="col-sm-6">
                                <br><br><br><br><br>
                                <button type="submit" class="btn btn-info">Upload</button>
                                <script type="text/javascript">
                                    function readURL(input) {
                                        if (input.files && input.files[0]) {
                                            var reader = new FileReader();

                                            reader.onload = function (e) {
                                                $('#profile-img-tag').attr('src', e.target.result);
                                            }
                                            reader.readAsDataURL(input.files[0]);
                                        }
                                    }
                                    $("#profile-img").change(function(){
                                        readURL(this);
                                    });
                                </script>
                            </div>
                            </div>
                    </form>
                    <br><br><br>

                        <table class="table table-striped table-bordered bootstrap-datatable datatable responsive ">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>{{ Auth::user()->name }}</th>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <th>{{ Auth::user()->email }}</th>
                                </tr>
                                <tr>
                                    <th>Password</th>
                                    <th><a href="{{ url('admin/profile_edit/reset')}}" class="buttons"><i class="fa fa-key fa-fw" aria-hidden="true"></i>Reset password</a></th>
                                </tr>
                            </thead>
                        </table>

                </div>
        </div>
    </div>
</div>

@endsection
