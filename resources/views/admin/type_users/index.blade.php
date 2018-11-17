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
                        <a class="btn btn-info pull-left" href="{{ url('admin/type_user/create') }}"><i class="fa fa-plus" aria-hidden="true"></i>Add User Role</a>

                        <table class="table table-striped table-bordered responsive">

                          <br> <br><br>
                          <table class="table" >
                              <thead>
                                  <tr>
                                      <th>Id</th>
                                      <th>Name</th>
                                      <th>Created_at</th>
                                      <th>Action</th>
                                  </tr>
                              </thead>
                              <tfoot>
                                <tr>
                                  <th>id</th>
                                  <th>Name</th>
                                  <th>created_at</th>
                                  <th>Action</th>
                                </tr>
                              </tfoot>
                          </table>


              </div>
          </div>
<script>
$(function() {
  var t = $('#tbl').DataTable({
    "columnDefs": [ {
           "searchable": false,
           "orderable": false,
           // "visible": false,  //visible ACTION Column hide last seconnd column because of (-1) targets
           // "targets": -2
       } ],
       "order": [[ 1, 'asc' ]],

      processing: true,
        serverSide: true,
        ajax: '{!! url('admin/type_users/DataTable') !!}',
        // "pagingType": "full_numbers",

        columns: [
            { data: 'id', name: 'id' },
            { data: 'name', name: 'name' },
            { data: 'created_at', name: 'created_at' },
            { data: 'action', name: 'action' }
      ]
    });

    t.on( 'draw.dt', function () {
   var PageInfo = $('#tbl').DataTable().page.info();
        t.column(0, { page: 'current' }).nodes().each( function (cell, i) {
           cell.innerHTML = i + 1 + PageInfo.start;
       } );
   } );

});
</script>

<script type="text/javascript">
$(document).ready(function() {
  // Setup - add a text input to each footer cell
  $('.test tfoot th').each( function () {
      var title = $(this).text();
      $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
  } );

  // DataTable
  var table = $('.test').DataTable();

  // Apply the search
  table.columns().every( function () {
      var that = this;

      $( 'input', this.footer() ).on( 'keyup change', function () {
          if ( that.search() !== this.value ) {
              that
                  .search( this.value )
                  .draw();
          }
      } );
  } );
} );
</script>
@endsection












{{--@foreach($users as $user)
    <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $user->name }}</td>
        <td>{{ $user->created_at }}</td>
        <td>

            <a href="{{ url('admin/type_user/delete/' . $user->id)}}"class="btn btn-danger waves-effect waves-light remove" >
            <i class="fa fa-trash" aria-hidden="true" ></i>  Delete</a>
        </td>
    </tr>
@endforeach--}}
