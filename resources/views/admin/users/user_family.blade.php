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
<h2>Users Family Details</h2>
        <div class="box-inner">
            <div class="box-content">

                    <form  class="form">
                    <a class="btn btn-info" href="{{ url('admin/user/add/'.$data->id) }}"><i class="fa fa-plus" aria-hidden="true"></i>
                        Add Family Member</a>

                    <br> <br>
                    <table class="table table-bordered table-striped">

                        <thead>
                            <tr>
                                <th>Id</th>
                                <th> name </th>
                                <th> Relation </th>
                                <th> Phone Number</th>
                                <th> Birthday Date</th>
                                <th> Publish Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        @foreach($data->relation as $relations)
                        <tr>
                                <td>{{ $loop->iteration }}</td>

                                <td>{{ $relations->name }}</td>
                                <td>{{ $relations->relation }}</td>
                                <td>{{ $relations->phone}}</td>
                                <td>{{ $relations->birthday }}</td>
                                <td>{{ $relations->created_at }}</td>
                                <td>
                                    <a id="delete-button" href="{{ url('admin/user/user_family/delete/' . $relations->id) }}" class="btn btn-danger  waves-effect waves-light deleteText"> <i class="glyphicon glyphicon-trash"></i>  Delete</a>
                                </td>
                        @endforeach

                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>

@endsection
