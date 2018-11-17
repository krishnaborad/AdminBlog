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
<h2>Add User</h2>
        <div class="box-inner">
            <div class="box-content">

                    <form  class="form"><br>

                        <a class="btn btn-info" href="{{ url('admin/login/create_login') }}"><i class="fa fa-plus" aria-hidden="true"></i>
                            Add Account</a>
                        <br> <br> <br>
                        <table class="table table-bordered table-striped" >

                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Password</th>
                                    <th>Create Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            @foreach($users as $user)
                                       <tr>
                                           <td>{{ $loop->iteration }}</td>
                                           <td> {{ $user->name  }}</td>
                                           <td>{{ $user->email }}</td>
                                           <td>{{ $user->password }}</td>
                                           <td>{{ $user->created_at }}</td>
                                           <td>

                                               <a id="delete-button" href="{{ url('admin/login/delete/' . $user->id) }}" class="btn btn-danger remove"><i class="glyphicon glyphicon-trash"></i>Delete</a>
                                           </td>

                                       </tr>
                                   @endforeach

                            </tbody>
                        </table>
                    </form><br><br><br>
            </div>
        </div>
        </div>
    </div>

@endsection
