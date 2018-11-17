@extends('admin.layouts.adminapp')

@section('content')
<h2>Edit Company Details</h2>
        <div class="box-inner">
            <div class="box-content">
                        <form class="form" action="" enctype="multipart/form-data" method="post">
                                {{ csrf_field() }}
                                <div class="form-body">
                                    <br>
                                    <div class="col-sm-6">

                                        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>

                                        <img src='{{ asset("company_logos/$company->logo") }}' id="profile-img-tag"  width="200px" class="pull-left" style="width:150px; height:150px; float:left; border-radius:50%; margin-right:25px;"/>

                                    </div>
                                    <div class="col-sm-6">
                                            <input type="file" name="logo"  id="profile-img"><br>

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
                                    <label for="post_title">Company Name</label>
                                    <input type="text" class="form-control" name="name" value="{{ $company->name }}" ><br>
                                </div>
                                <div class="form-body">
                                    <label for="post_title"> Email <font color="red" size="5">*</font> </label>
                                    <input type="text" class="form-control" name="email" value="{{ $company->email }}" ><br>
                                </div>
                                <div class="form-body">
                                    <label for="post_title">Mobile No. <font color="red" size="5">*</font> </label>
                                    <input type="text" class="form-control" name="phone" value="{{ $company->phone }}"><br>
                                </div>
                                <div class="form-body">
                                    <label for="post_title">Address<font color="red" size="5">*</font> </label>
                                    <input type="text" class="form-control" name="location" value="{{ $company->location }}"><br>
                                </div>


                            <button type="submit" class="btn btn-primary"><i class="" aria-hidden="true"></i>
                                Update Company  </button>

                    </form>
                </div>
        </div>
    </div>
</div>
@endsection
