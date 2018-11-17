
@extends('admin.layouts.adminapp')
@section('content')
<h2>Add New User</h2>
@if ($errors->any())
    <div class="alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
        <div class="box-inner">
            <div class="box-content">

                <form class="form" action="{{url('admin/user/create')}}" method="post">
                        {{ csrf_field() }}


                <div class="form-box"{{ $errors->has('name') ? ' has-error' : 'enter' }}>
                    <label for="name"  title=" Please Enter Your Name">Name <font color="red" size="5">*</font> </label>
                    <input type="text" id="name" class="form-control" name="name" value="{{ old('name') }}" placeholder="Enter Your Name"><br>
                </div>
                <div class="form-box"{{ $errors->has('email') ? ' has-error' : 'enter' }}>
                    <label for="email" title=" Please Enter Your Email">Email <font color="red" size="5">*</font> </label>
                    <input type="text" id="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Enter Your Email"><br>
                </div>
                <div class="form-box"{{ $errors->has('phone_no') ? ' has-error' : 'enter' }}>
                    <label for="phone_no" title=" Please Enter Your Phone Number">Mobile Number <font color="red" size="5">*</font> </label>
                    <input type="text" id="phone_no" class="form-control" name="phone_no" value="{{ old('phone_no') }}" placeholder="Enter Your Mobile Number"><br>
                </div>


                <div class="form-box">

                    <label for="birthday" title=" Please Enter Your Birthday Date dd/mm/yy">Birthday <font color="red" size="5">*</font> </label>
                    <input type="date" id="birthday" class="form-control" name="birthday" value="{{ old('birthday') }}" placeholder="dd/mm/yyyy">

                 </div>

                <div class="form-box"{{ $errors->has('marital_status') ? ' has-error' : 'enter' }}>
                    <label title=" Please Select Current Status">Marital Status :<font color="red" size="5">*</font></label>
                    <input type="radio" id="marital_status" name="marital_status" value="0" @if(old('marital_status') ==  0)  @endif /> <label for="marital_status">Single</label>
                    <input type="radio" id="marital_status1" name="marital_status" value="1" @if(old('marital_status') ==  1)  @endif /><label for="marital_status1">Married</label>

                </div>

                <br>
                <div class="form-box"{{ $errors->has('gender') ? ' has-error' : 'enter' }}>
                    <label title=" Please Select Gender">Gender <font color="red" size="5">*</font> &nbsp; : &nbsp;&nbsp;&nbsp;&nbsp;</label>
                    <input type="radio" id="gender"  name="gender" value="1" @if(old('gender') ==  1)  @endif /><label for="gender">Female</label>
                    <input type="radio" id="gender1" name="gender" value="0" @if(old('gender') ==  0)  @endif /><label for="gender1">Male</label>

                </div><br>

                <div class="form-box">
                    <label title=" Please Select User Type">Select User Type :</label>
                    <select  class="select2 form-control"  name="type_id">
                    @foreach($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>

                    @endforeach
                    </select>
                </div><br><br>

                <div class="form-box row"{{ $errors->has('contry') ? ' has-error' : 'enter' }}>

                    <br>
                    <div class="col-sm-4">

                      <label for="contry" title=" Please Enter Your Contry">Country  <font color="red" size="5">*</font></label>
                      {!! Form::select('country', ['' => 'Select'] +$countries,'',array('class'=>'form-control','id'=>'country'));!!}

                    </div>
                    <div class="col-sm-4">
                      <label for="state" title=" Please Enter Your State">State <font color="red" size="5">*</font></label>
                      <select name="state" id="state" class="form-control" >
                      </select>

                    </div>
                    <div class="col-sm-4">

                      <label for="city" title=" Please Enter Your City">City <font color="red" size="5">*</font></label>
                      <select name="city" id="city" class="form-control" >
                      </select>
                      </div>


                </div><br>
                <button type="submit" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i>
                    Add User</button>

              </form>
                <br><br><br>

                </div>
            </div>
        </div>
    </div>
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
@endsection
