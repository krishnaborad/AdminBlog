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
<h2>Product Details</h2>
        <div class="box-inner">
            <div class="box-content">

                        <form  class="form" method="post" action="{{ url('admin/product/deleteall')}}">
                            {{ csrf_field() }}
                            <br>
                            <div class="row ">
                               <div class="col-sm-2">
                                  <a class="btn btn-info pull-left" href="{{ url('admin/product/create') }}">
                                  <i class="fa fa-plus" aria-hidden="true"></i> Add New Products</a>
                                </div>
                                <div class="col-sm-2">
                                  <button type="submit"class="btn btn-danger waves-effect waves-light remove pull-left" >Delete All Selected</button>
                                </div>
                              </div><br><br>

                                <table  class="ui celled table hover datatable"  >
                                    <thead>
                                        <tr>
                                            <th>All<br><INPUT type="checkbox" name="delete_id[]" onchange="checkAll(this)" /></th>
                                            <th>Id</th>
                                            <th>Product Name</th>
                                            <th>Product code</th>
                                            <th>Product prise </th>
                                            <th>Category</th>
                                            <th>Created At</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody >

                                @foreach($products as $product)
                                            <tr>
                                                <td>
                                                    <INPUT type="checkbox" name="delete_id[]"  value="{{$product->id}}" />
                                                </td>
                                                <td>{{ $loop->iteration }}</td>
                                                <td contenteditable="false"><a href="{{ url('frontend/product_details/'.$product->id) }}">{{ $product->name }}</a></td>

                                                <td onblur="update({{ $product->id }})" id="{{ $product->id }}" contenteditable="true">{{ $product->product_code }}</td>

                                                <td contenteditable="false"><i class="fas fa-rupee-sign"></i> {{ $product->prise }}</td>
                                                <td contenteditable="false">{{(isset( $product->category->name ))? $product->category->name : ""}}</td>
                                                <td>{{ $product->created_at }}</td>
                                                <td>
                                                    <a href="{{ url('admin/product/edit/' . $product->id) }}"class="btn btn-success " ><i class="fa fa-edit" aria-hidden="true"></i> </a>
                                                    <a id="delete-button" href="{{ url('admin/product/delete/' . $product->id) }}" class="btn btn-danger  waves-effect waves-light remove"> <i class="glyphicon glyphicon-trash"></i> </a>
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
<!-- Inline Edit  -->
    <script type="text/javascript">
    function update(id){
        var product_code = $("#"+id).html();
        console.log (product_code);

          $.ajax({
              type: "POST",
              url: '{{ URL::to('/') }}/admin/products',
              data:{
                product_code:product_code,
                id:id,
                 '_token': $('input[name=_token]').val()
              },
              datatype:'html',
              success: function(data)
              {
                  console.log(data);
              }
          });
        }
    </script>
<!-- Inline Edit -->

<script type="text/javascript">
$(document).ready(function() {
   $('#example').DataTable( {
      "ajax": "data/arrays.txt",
      "columnDefs": [ {
          "targets": -1,
          "data": null,
          "defaultContent": "<button>Click!</button>"
      } ]
  } );

  $('#example tbody').on( 'click', 'button', function () {
      var data = table.row( $(this).parents('tr') ).data();
      alert( data[0] +"'s salary is: "+ data[ 5 ] );
  } );
} );
</script>
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
