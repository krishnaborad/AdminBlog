
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
<h2>CUSTOMERS</h2>
        <div class="box-inner">
            <div class="box-content">

                  <!-- <form  style="border: 4px solid #7CACD5;margin-top: 15px;padding: 10px;" action="{{route('import_excel')}}" class="form-horizontal" method="post"   enctype="multipart/form-data">
                      {{csrf_field()}}
                    <center>    <input type="file" name="import_file" /></center>
                        <button  class="btn btn-primary">Import File</button>
                    </form>
                    <br><hr>  -->
                  <br><br>
              <div class="box-body">
                        <form  class="form" method="post" action="{{ url('admin/user/deleteall')}}">
                          {{csrf_field()}}

                          <div class="row ">
                             <div class="col-sm-2">

                                  <a class="btn btn-info pull-left" href="{{ url('admin/user/create') }}"><i class="fa fa-plus" aria-hidden="true"></i>
                                    &nbsp;  Add Customer</a>
                              </div>
                              <div class="col-sm-2">
                                  <button type="submit"class="btn btn-danger waves-effect waves-light remove pull-left" >Delete All Selected</button>
                              </div>

                              <div class=" col-sm-2 pull-right dropdown ">
                                  <button class="btn dropdown-toggle" type="button" data-toggle="dropdown">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Convert&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                  <span class="caret"></span></button>
                                  <ul class="dropdown-menu">
                                    <li><a href="{{route('pdf_formate')}}"  target="_blank">PDF</a></li>
                                    <!-- <li><a href="{{route('excel_formate')}}" target="_blank">Excel</a></li> -->

                                  </ul>
                              </div>
                            </div>

                    <br> <br> <br>
                    <table class="table table-striped table-bordered bootstrap-datatable datatable responsive" >

                        <thead>
                            <tr>
                              <th>All<br><INPUT type="checkbox" name="delete_id[]" onchange="checkAll(this)" /></th>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Mobile Number</th>
                                <th>Gender</th>
                                <th>User Type</th>
                                <th>Date</th>
                                <th>Add Family Member</th>
                                <th>Action</th>

                            </tr>
                        </thead>
                        @foreach($user as $data)
                        <tr>
                              <td>
                                  <INPUT type="checkbox" name="delete_id[]"  value="{{$data->id}}" />
                              </td>

                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $data->name }}</td>
                                <td>{{ $data->email }}</td>
                                <td>{{ $data->phone_no }}</td>
                                <td>{{ ( $data->gender == 0 )? "male" : "female" }}</td>
                                <td>{{(isset( $data->users->name ))? $data->users->name : ""}}</td>
                                <td>{{ $data->created_at }}</td>
                                <td>
                                    <a href="{{url('admin/user/user_family/' .$data->id) }}" class="btn btn-warning"> <i class="fa fa-plus"></i>Add Family </a>

                                </td>
                                <td>

                                            <a  href="{{ url('admin/user/show/' . $data->id) }}" class="btn btn-primary"><i class="fa fa-eye" aria-hidden="true"></i></a>

                                            <a href="{{ url('admin/user/edit/' . $data->id)}}" class="btn btn-success"> <i class="fa fa-edit"></i></a>

                                            <a id="delete-button" href="{{ url('admin/user/delete/' . $data->id) }}" class="btn btn-danger waves-effect waves-light remove  "> <i class="glyphicon glyphicon-trash"></i></a>

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
<script>
    function checkAll(ele)
     {
        var checkboxes = document.getElementsByTagName('input');
            if (ele.checked) {
                for (var i = 0; i < checkboxes.length; i++)
                 {
                    if (checkboxes[i].type == 'checkbox')
                     {
                        checkboxes[i].checked = true;
                    }
                }
            }
            else
             {
                 for (var i = 0; i < checkboxes.length; i++)
                  {
                     console.log(i)
                     if (checkboxes[i].type == 'checkbox')
                      {
                         checkboxes[i].checked = false;
                       }
                   }
               }
           }

</script>
