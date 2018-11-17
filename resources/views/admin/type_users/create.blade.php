@extends('admin.layouts.adminapp')
@section('content')
<h2>Add User New Role</h2>
        <div class="box-inner">
            <div class="box-content">

                    <form  class="form" method="post">
                             {{ csrf_field() }}
                        <div class="form-body">
                            <label for="name" title="Enter User Type">Name <font color="red" size="5">*</font> </label>
                            <input type="text" id="name"class="form-control" name="name" placeholder="Enter User Type"><br>
                        </div>
                        <button type="submit" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i>
                            Add User Role</button>

                        </form>
        </div>
    </div>
</div>
@endsection
