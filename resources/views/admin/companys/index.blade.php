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
<h2>Company Details</h2>
        <div class="box-inner">
            <div class="box-content">

                    <form  class="form"><br>
                        <a class="btn btn-info pull-left" href="{{ url('admin/company/create') }}"><i class="fa fa-plus" aria-hidden="true"></i>
                            Add New Company</a>
                        <br> <br><br>
                        <table class="table table-striped table-bordered bootstrap-datatable datatable responsive">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Logo</th>
                                    <th>Company</th>
                                    <th>Created at</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                                @foreach($companys as $company)

                                    <tr>
                                        <td class="center">{{ $loop->iteration }}</td>
                                        <td class="center"><img src='{{ asset("company_logos/$company->logo") }}' id="profile-img-tag"  width="200px" class="pull-left" style="width:60px; height:60px; float:left; border-radius:50%; margin-right:25px;"/>  </td>
                                        <td class="center">{{ $company->name }}</td>
                                        <td class="center">{{ $company->created_at }}</td>
                                        <td class="center">
                                            <a href="{{ url('admin/company/view/' . $company->id) }}"class="btn btn-primary center" ><i class="fa fa-eye" aria-hidden="true"></i> </a>

                                            <a href="{{ url('admin/company/edit/' . $company->id) }}"class="btn btn-success center" ><i class="fa fa-edit" aria-hidden="true"></i>  </a>


                                            <a href="{{ url('admin/company/delete/' . $company->id)}}"class="btn btn-danger center waves-effect waves-light remove" >
                                            <i class="glyphicon glyphicon-trash" aria-hidden="true" ></i>  </a>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>

                        </table>
                    </form>

                </div>
        </div>
    </div>
</div>
@endsection
