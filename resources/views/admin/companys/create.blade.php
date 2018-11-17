@extends('admin.layouts.adminapp')

@section('content')
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css">
<script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script>
 <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.0.1/js/bootstrap.min.js"></script>
 <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
 <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/iCheck/1.0.2/icheck.min.js"></script>

<h2>Add Company Details</h2>
        <div class="box-inner">
            <div class="box-content">
                        <form class="form" action="{{url('admin/company/create')}}"  enctype="multipart/form-data" method="post">
                                {{ csrf_field() }}

                        <div class="form-body">
                            <br>
                            <div class="col-sm-6">

                                <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>

                                <img src="{{url('default_logo.jpg')}}" id="profile-img-tag" width="200px" class="pull-left" style="width:150px; height:150px; float:left; border-radius:50%; margin-right:25px;"/>

                            </div>
                            <div class="col-sm-6">
                                <label for="">Add Company Logo</label><br><br>
                                    <input type="file" name="logo" id="profile-img"><br>

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
                            <br><br><br><br><br><br><br><br><br>
                        </div>
                        <div class="form-body">
                            <label for="post_title ">Company Name <font color="red" size="5">*</font> </label>
                            <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Enter Company Name"><br>
                        </div>
                        <div class="form-body">
                            <label for="post_title"> Email <font color="red" size="5">*</font> </label>
                            <input type="text" class="form-control" name="email" value="{{ old('email') }}" placeholder="Enter Company Email"><br>
                        </div>
                        <div class="form-body">
                            <label for="post_title">Mobile No. <font color="red" size="5">*</font> </label>
                            <input type="text" class="form-control" name="phone" value="{{ old('phone') }}" placeholder="Enter Company Mobile Number"><br>
                        </div>

                        <div class="form-body">
                            <label for="post_title">Address<font color="red" size="5">*</font> </label>
                            <textarea name="location"class="form-control" value="{{ old('location') }}" placeholder="Enter Company Location" rows="5" cols="100"></textarea><br><br>
                        </div>
                        <button type="submit" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i>
                            Add Company</button>

                    </form>
                </div>
        </div>
    </div>
</div>
@endsection
