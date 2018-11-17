@extends('admin.layouts.adminapp')
@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.jquery.min.js"></script>
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
 <!-- <link rel="stylesheet" href="https://resources/demos/style.css"> -->
 <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
 <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<h2>Pos</h2>
<div class="box-inner">
      <div class="box-content">
          <a href="#" class="btn btn-info btn-setting">Add New Customer</a>
          <br><br>
          <form class="form" action="#" method="post">
              <div class="form-group">
                <label for="customer"> Select Customer</label><br>
                <select id="customer" class="form-control chosen" name="cust" style="width:99.98%;margin:0px;">
                  @foreach($user as $data)
                    <option value="$data->id">{{ ucwords($data->name) }} - {{$data->phone_no}}</option>
                  @endforeach
                </select>
              </div>
              <div class="form-group">
                <label for="">Select Date:</label>
                <input class="form-control" id="datepicker" type="date" value="<?php echo date('d/m/Y');?>" />

                  <script type="text/javascript">

                  $("#datepicker").datepicker({
                          maxDate: 0
                      });
                  </script>
              </div>
              <div class="form-group">
                  <label for="products">Select Products</label>
                  <select class="form-control select2" name="" >
                    @foreach($products as $product)
                      <option value="">{{$product->name}}</option>
                    @endforeach
                  </select>
              </div>
              <div class="form-group">

              </div>
              <center><button type="submit" class="btn btn-primary" name="button">Submit</button></center>
          </form>
      </div>
</div>
<!-- Modal starts -->
<div class="modal fade col-sm-12 login-form" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog ">
      <form class="form" action="" id="" method="post">
        {{  csrf_field() }}
        <div class="modal-content col-sm-12">
          <div class="modal-header ">
            <button type="button" class="close" data-dismiss="modal">×</button>
            <font size="5">Fill All Details</Font>
          </div>
          <div class="box-content alerts">

                  @if(Session::has('flash_message'))
                         <div class="alert alert-success">
                             <button type="button" class="close" data-dismiss="alert">&times;</button>
                             {!! session('flash_message') !!}<strong> Well done!</strong>
                         </div>
                   @endif
          </div>
          <div class="modal-body">
            <div class="form-box"{{ $errors->has('name') ? ' has-error' : 'enter' }}>
                <label for="name"  >Name <font color="red" size="5">*</font> </label>
                <input type="text" id="name" placeholder="Enter Your Name" class="form-control" name="name" value="{{ old('name') }}" placeholder="Enter Your Name"  ><br>
            </div>
            <div class="form-box"{{ $errors->has('email') ? ' has-error' : 'enter' }}>
                <label for="email" >Email <font color="red" size="5">*</font> </label>
                <input type="text" id="email" placeholder="Enter Your Email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Enter Your Email" ><br>
            </div>
            <div class="form-box"{{ $errors->has('phone_no') ? ' has-error' : 'enter' }}>
                <label for="phone_no" >Mobile Number <font color="red" size="5">*</font> </label>
                <input type="text" id="phone_no" placeholder="Enter Your Mobile Number" class="form-control" name="phone_no" value="{{ old('phone_no') }}" placeholder="Enter Your Mobile Number" ><br>
            </div>
            <div class="form-box">
                <label for="birthday">Birthday <font color="red" size="5">*</font> </label>
                <input type="date" id="birthday" class="form-control" name="birthday" value="{{ old('birthday') }}" placeholder="dd/mm/yyyy"  >
             </div>
             <div class="form-box row"{{ $errors->has('contry') ? ' has-error' : 'enter' }}>

                 <br>
                 <div class="col-sm-4">

                   <label for="contry" >Country  <font color="red" size="5">*</font></label>
                   {!! Form::select('country', ['' => 'Select'] +$countries,'',array('class'=>'form-control','id'=>'country'));!!}

                 </div>
                 <div class="col-sm-4">
                   <label for="state">State <font color="red" size="5">*</font></label>
                   <select name="state" id="state" class="form-control" >
                   </select>

                 </div>
                 <div class="col-sm-4">
                   <label for="city" >City <font color="red" size="5">*</font></label>
                   <select name="city" id="city" class="form-control" >
                   </select>
                 </div>
             </div><br>
             <div class="form-box"{{ $errors->has('marital_status') ? ' has-error' : 'enter' }}>
                <label>Marital Status :<font color="red" size="5">*</font></label>
                <input type="radio" id="marital_status" name="marital_status" value="0" @if(old('marital_status') ==  0)  @endif /> <label for="marital_status">Single</label>
                <input type="radio" id="marital_status1" name="marital_status" value="1" @if(old('marital_status') ==  1)  @endif /><label for="marital_status1">Married</label>
            </div>
            <br>
            <div class="form-box"{{ $errors->has('gender') ? ' has-error' : 'enter' }}>
                <label >Gender <font color="red" size="5">*</font> &nbsp; : &nbsp;&nbsp;&nbsp;&nbsp;</label>
                <input type="radio" id="gender"  name="gender" value="1" @if(old('gender') ==  1)  @endif /><label for="gender">Female</label>
                <input type="radio" id="gender1" name="gender" value="0" @if(old('gender') ==  0)  @endif /><label for="gender1">Male</label>
            </div><br>
            <div class="form-box">
                <label >Select User Type :</label>
                <select  class="select2 form-control"  name="type_id">
                  @foreach($users as $user)
                      <option value="{{ $user->id }}">{{ $user->name }}</option>
                  @endforeach
                </select>
            </div>
          <br><br>
          </div>
            <div class="modal-footer">
              <a href="#" class="btn btn-default" data-dismiss="modal">Close</a>
              <button type="submit" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i>
               Add User</button>
            </div>
          </div>
        </form>
        </div>
    </div>
  </div>

  <!-- script -->
  <script type="text/javascript">
      $('#country').change(function(){
      var countryID = $(this).val();
      if(countryID){
          $.ajax({
             type:"GET",
             url:"{{url('admin/user/get-state-list')}}?country_id="+countryID,
             success:function(res){
              if(res){
                  $("#state").empty();
                  $("#state").append('<option>Select</option>');
                  $.each(res,function(key,value){
                      $("#state").append('<option value="'+key+'">'+value+'</option>');
                  });
              }else{
                 $("#state").empty();
              }
             }
          });
      }else{
          $("#state").empty();
          $("#city").empty();
      }
     });
      $('#state').on('change',function(){
      var stateID = $(this).val();
      if(stateID){
          $.ajax({
             type:"GET",
             url:"{{url('admin/user/get-city-list')}}?state_id="+stateID,
             success:function(res){
              if(res){
                  $("#city").empty();
                  $.each(res,function(key,value){
                      $("#city").append('<option value="'+key+'">'+value+'</option>');
                  });

              }else{
                 $("#city").empty();
              }
             }
          });
      }else{
          $("#city").empty();
      }
   });
  </script>

<!-- Modal end -->
@endsection
