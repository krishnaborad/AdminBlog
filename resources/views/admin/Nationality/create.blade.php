@extends('admin.layouts.adminapp')
@section('content')
<div class="box-inner">
  <div class="box-content">
      <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">Add State</button>
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
                            <label for="country_id">Select Country </label>
                            <select  id="country_id" class="select2 form-control" name="country_id">
                                  @foreach($countries as $country)
                                    <option value="{{$country->id}}">{{$country->name}}</option>
                                  @endforeach
                                </select>
                          </div>
                          <div class="form-group">
                              <label for="name">Name</label>
                              <input type="text" name="name" placeholder="Enter City Name" class="form-control" id="name" value="">
                          </div>
                          <button type="button" class="btn btn-primary btn-save " ><i class="fa fa-plus" aria-hidden="true"></i>Add </button>

                    </div>
                </div>
              </div>
          </form>
              <table class="ui celled table hover table-bordered responsive" id="table">
                  <thead>
                      <tr>
                        <th>Countries</th>
                        <th>States</th>
                      </tr>
                  </thead>
                  @foreach($states as $state)
                  <tbody>
                     <tr>
                        <td>{{(isset($state->countries->name ))? $state->countries->name : ""}}</td>
                        <td>{{$state->name}}</td>
                    </tr>
                  </tbody>
                  @endforeach
              </table>
          </div>
        </div>
          <script type="text/javascript">
                $(document).on('click','.btn-save', function() {

                        var url  = "{{ URL::to('/') }}/admin/Nationality/create";
                        var $state     = {};
                        $state.name = $('#name').val();
                        $state.country_id = $('#country_id').val();
                        if($state.name != '' && $state.country_id != '') {
                        $.ajax({
                            type: "POST",
                            url: url,
                            data: $state,
                            dataType: 'html',
                            cache: false,
                            success: function(data){
                              if(data == 3)
                              {
                                swal("ADDED", "Added Successfully!", "success");
                                document.getElementById('clear').reset();
                                $(".modal").modal('hide');

                                $('#table').append("<tr><td> " + $state.country_id + "</td><td>" + $state.name + "</td></tr>");
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
