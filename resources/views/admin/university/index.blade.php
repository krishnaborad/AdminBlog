@extends('admin.layouts.adminapp')
@section('content')
@include('sweetalert::alert')


<link rel="stylesheet" href="{{url('css/master.css')}}">
  <div class="row">
      <!-- Button trigger modal -->

      <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Add University</button>

      <!-- Modal -->
      <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content" id="modal">
            <div class="modal-body">
              <div class="row">
                <div class="col-sm-6">
                  <h2>Add University</h2>
                </div>
                <div class="col-sm-6">
                  <button type="button" class="btn btn-default pull-right" data-dismiss="modal">X</button><br>
                </div>
              </div>
              <hr>
              <form class="form" action="{{url('admin/university')}}" method="post">
                {{csrf_field()}}
               <div class="form-group">
                  <label for="">Select State</label>
                    <select class="select2 form-control" name="state_id">
                        @foreach($states as $state)
                            <option value="{{$state->id}}">{{$state->name}}</option>
                        @endforeach
                    </select>
                </div>

                  <div class="form-group">
                      <label for="uni_name">Name</label>
                      <input type="text" name="uni_name" placeholder="Enter University Name" class="form-control">
                  </div>

                  <div class="form-group">
                      <label for="uni_email">Email</label>
                      <input type="email" name="uni_email" placeholder="Enter Email" class="form-control">
                  </div>
                  <div class="form-group">
                      <label for="uni_address">address</label>
                      <textarea name="uni_address" class="form-control" rows="8" cols="80" placeholder="Address"></textarea>
                  </div>
                  <div class="form-group">
                      <label for="website">Website</label>
                      <input type="text" placeholder="www.example.com" name="website" class="form-control">
                  </div>
                  <div class="form-group">
                      <label for="uni_phone">Helpline Number</label>
                      <input type="text" placeholder="Enter phone Number" name="uni_phone" class="form-control">
                  </div>
              </div><br>
              <center><button type="submit" class="btn btn-primary btn-lg">Add</button></center>
          </form>
          </div>
        </div>
      </div>
  </div>
  <h2 align="center">universities</h2><hr>
  <table class="table table-striped  bootstrap-datatable datatable responsive">
    <thead>
        <tr>
            <td>Id</td>
            <td>University Name</td>
            <td>Email</td>
            <td>Address</td>
            <td>Website</td>
            <td>Helpline</td>
            <td>document</td>
        </tr>
    </thead>
    <tbody>
      @foreach($universities as $university)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$university-> uni_name}}</td>
            <td>{{$university-> uni_email}}</td>
            <td>{{$university-> uni_address}}</td>
            <td>{{$university-> website}}</td>
            <td>{{$university-> uni_phone}}</td>
            <td> <a href="{{url('admin/university/'.$university->id)}}" data-id="{{$university->uni_name}}" data-toggle="modal" data-target="#myModal2" class="btn btn-primary edit-modal" >Add</a> </td>
        </tr>
      @endforeach
    </tbody>
  </table>

  <!-- Modal Open For Reply Start-->
            <div class="modal fade  col-sm-12" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                          <div class="modal-content col-sm-12">
                            <div class="modal-header ">
                              <h2><b><center><i class="fa fa-reply" style="font-size:24px"></i> Reply</center></b></h2>
                              <button type="button" class="close" data-dismiss="modal"><i class="fa fa-close" style="font-size:30px;color:red"></i>
                              </button>
                            </div>
                            <form action="{{url('admin/university/' .$university->id)}}" method="post">
                                {{  csrf_field() }}
                                  <br>
                                  <div class="form-body">
                                        <label for="contact_id"><b>To</b></label>
                                        <input type="text" class="form-control" name="contact_id" value="" id="uni_id" ><br>
                                  </div>
                                  <br>
                                  <div class="modal-footer">
                                      <button type="submit" class="btn btn-primary save" ><i class="fa fa-send" aria-hidden="true"></i> Send</button><button type="button" class="btn btn-default" data-dismiss="modal"><span class='glyphicon glyphicon-remove'></span>Close</button>
                                  </div>
                                <br>
                                </form>
                            </div>
                      </div>
                  </div>
      <!-- Modal Open For Reply End-->
  <script>
  $(document).on('click', '.edit-modal', function() {
      $('#uni_id').val($(this).data('id'));
      id = $('#uni_id').val();
      $('#myModal').modal('show');
  });
  </script>

@endsection
