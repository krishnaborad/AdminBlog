@extends('admin.layouts.adminapp')
@section('content')
<div class="box-inner">
  <div class="box-content">
        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">Add Country</button>
      <a href="{{url('admin/Nationality/create')}}" class="btn btn-info">Add State</a>
      <a href="{{url('admin/Nationality/create_city')}}" class="btn btn-info">Add City</a>
      <br><br>
        <form  id="clear" method="post">
          {{  csrf_field() }}
          <div class="modal fade col-sm-12" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog ">
                  <div class="modal-content col-sm-12">
                    <div class="modal-header ">
                      <button type="button" class="close" data-dismiss="modal">×</button>
                      <font size="5">Add Country</Font>
                    </div>
                    <div class="form-body">
                      <label for="code">Code</label>
                      <input type="text" class="form-control" name="code" value="" id="code" placeholder="Enter Country Code">
                    </div>
                    <!-- Add Category start -->
                    <div class="form-body">
                        <label for="post_title">Category Name &nbsp: </label>
                        <input type="text" class="form-control" name="name" value="" id="name" placeholder="Enter Category Name"><br>
                    </div>
                    <!-- Add category End -->
                    <button type="button" class="btn btn-primary btn-save " ><i class="fa fa-plus" aria-hidden="true"></i>Add Category</button>
                  </div>
              </div>
          </div>
        </form>


          <table class="table table-striped table-bordered bootstrap-datatable responsive" id="table">
                    <thead>
                        <tr>
                            <!-- <th>Id</th> -->
                            <th>Code</th>
                            <th>Name</th>
                        </tr>
                    </thead>
                    @foreach($countries as $country)
                    <tbody>
                      <tr>
                                <!-- <td>{{$loop->iteration}}</td> -->
                                <td>{{$country->code}}</td>
                                <td>{{$country->name}}</td>
                      </tr>
                      @endforeach
                    </tbody>

          </table>



      </div>
  </div>
  <br><h4>Countries</h4>



  <script type="text/javascript">
        $(document).on('click','.btn-save', function() {

                var url  = "{{ URL::to('/') }}/admin/Nationality";
                var $country     = {};
                $country.name = $('#name').val();
                $country.code = $('#code').val();
                $country.id = $(this).val();
                if($country.name != '' && $country.code != '') {
                $.ajax({
                    type: "POST",
                    url: url,
                    data: $country,
                    dataType: 'html',
                    cache: false,
                    success: function(data){
                      if(data == 1)
                      {
                        swal("ADDED", "Added Successfully!", "success");
                        document.getElementById('clear').reset();
                        $(".modal").modal('hide');

                        $('#table').append("<tr><td> " + $country.code + "</td><td>" + $country.name + "</td></tr>");
                      }
                       else
                       {
                        swal("Oops", "Enter Valid Data !", "error");
                        }
                    }
                });
              }
              else
              {
                swal("Please", " fil up required fields.", "error");
              }
            });
  </script>


@endsection
