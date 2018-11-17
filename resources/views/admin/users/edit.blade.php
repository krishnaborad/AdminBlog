@extends('admin.layouts.adminapp')
@section('content')
<h2>Edit User</h2>
        <div class="box-inner">
            <div class="box-content">

            <form  action="{{ url('admin/user/edit/'.$data->id) }}" class="form" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                <div class="form-box">
                    <label for="post_title">Name</label>
                    <input type="text" class="form-control" value="{{ $data->name }}" name="name"><br>
                </div>
                <div class="form-box">
                    <label for="post_title">Email </label>
                    <input type="text" class="form-control" value="{{$data->email}}"  name="email"><br>
                </div>
                <div class="form-box">
                    <label for="post_title">Mobile Number </label>
                    <input type="text" class="form-control" name="phone_no" value="{{$data->phone_no}}"><br>
                </div>
                <div class="form-box">

                    <label for="post_title">BirthDay </label>
                    <input type="date" class="form-control" name="birthday" value="{{ $data->birthday }}" ><br>

                 </div>
                 <div class="form-box row"{{ $errors->has('country') ? ' has-error' : 'enter' }}>

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

                <div class="form-box">
                    <script src="{{ asset('jquery-birthday-picker.min.js') }}"></script>
                    <div class="" id="demo">


                    </div>
                    <script type="text/javascript">
                        $("#demo").birthdayPicker({
                        maxAge: 100,
                        minAge: 0,
                        maxYear: r,
                        <a href="https://www.jqueryscript.net/time-clock/">date</a>Format: "middleEndian",
                        monthFormat: "number",
                        placeholder: true,
                        defaultDate: false,
                        sizeClass: "span2"
});
                    </script>

                </div><br>
                <div class="form-box">
                    <label for="post_title">Marital Status :</label>

                        <input type="radio" id="marital_status" name="marital_status" value="0" {{ $data->marital_status == '0' ? 'checked' : '' }} ><label for="marital_status">Single</label>

                        <input type="radio" id="marital_status1" name="marital_status" value="1" {{ $data->marital_status == '1' ? 'checked' : '' }} ><label for="marital_status1">Married</label>

                </div>
                <br>
                <div class="form-box">
                    <label>Gender &nbsp; : &nbsp;&nbsp;&nbsp;&nbsp;</label>
                    <input type="radio" id="gender" name="gender" value="1" {{$data->gender == '1' ? 'checked' : ''}} ><label for="gender">Female</label>
                    <input type="radio" id="gender1" name="gender" value="0"{{$data->gender == '0' ? 'checked' : ''}} ><label for="gender1">Male</label>
                </div>

                <br>
                <div class="form-box">
                    <label for="box">Select User Type </label>
                    <select  class="select2 form-control"  name="type_id">
                        @foreach($users as $user)
                            @if($user->id == $data->type_id)
                                <option value="{{ $user->id }}" selected >{{ $user->name }}</option>
                            @else
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endif
                        @endforeach
                    </select>
                </div><br><br>
                <button type="submit" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i>
                    Update Profile</button>

                </form><br><br><br>

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
