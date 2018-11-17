@extends('admin.layouts.adminapp')
@section('content')
<div class="box-inner">
  <div class="box-content">
        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">Add City</button>
        <button onclick="goBack()" class="btn btn-warning pull-right"> <i class="fa fa-arrow-circle-left" style="font-size:18px"></i> Back</button>

        <form  id="clear" method="post">
          {{  csrf_field() }}
              <div class="modal fade col-sm-12" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog ">
                    <div class="modal-content col-sm-12">
                        <center>
                          <div class="modal-header ">
                            <button type="button" class="close" data-dismiss="modal">×</button>
                            <font size="5"><b>Add City</b></Font>
                          </div>
                        </center><br>
                            <div class="form-group">
                              <label for="state_id">Select State </label>
                              <select  id="state_id" class="select2 form-control" name="state_id">
                                    @foreach($states as $state)
                                      <option value="{{$state->id}}">{{$state->name}}</option>
                                    @endforeach
                                  </select>
                            </div>
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" placeholder="Enter City Name" class="form-control" id="name" value="">
                            </div>
                            <button type="button" class="btn btn-primary save " ><i class="fa fa-plus" aria-hidden="true"></i>Add </button>

                      </div>
                  </div>
                </div>
            </form>
                <table class="ui celled table hover table-bordered responsive" id="table">
                    <thead>
                        <tr>
                          <th><b>States</b></th>
                          <th><b>Cities</b></th>
                        </tr>
                    </thead>
                    @foreach($cities as $city)
                    <tbody>
                          <tr>
                            <td>{{(isset($city->state->name ))? $city->state->name : ""}}</td>
                            <td>{{$city->name}}</td>

                          </tr>
                    </tbody>
                    @endforeach
                </table>
            </div>
          </div>

          <script type="text/javascript">
                $(document).on('click','.save', function() {

                        var url  = "{{ URL::to('/') }}/admin/Nationality/create_city";
                        var $city     = {};
                        $city.name = $('#name').val();
                        $city.state_id = $('#state_id').val();
                        if($city.name != '' && $city.state_id != '') {
                        $.ajax({
                            type: "POST",
                            url: url,
                            data: $city,
                            dataType: 'html',
                            cache: false,
                            success: function(data){
                              if(data == 2)
                              {
                                swal("ADDED", "Added Successfully!", "success");
                                $(".modal").modal('hide');
                                document.getElementById('clear').reset();

                                $('#table').append("<tr><td> " + $city.state_id + "</td><td>" + $city.name + "</td></tr>");
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
