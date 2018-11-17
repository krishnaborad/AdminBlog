@extends('admin.layouts.adminapp')
@section('content')
<h2>Add Family Details</h2>
        <div class="box-inner">
            <div class="box-content">

                  <form  class="form"  method="post">
                      {{ csrf_field() }}

                      <div class="form-box">
                          <label for="post_title"title=" Please Enter Your Name">Name </label>
                          <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Enter Your Name"><br>
                      </div>
                         <div class="form-box">
                             <label title=" Please Select Relation "for="box">Select Relation</label>
                             <select  class="select2 form-control"  name="relation">
                                 <option>Father</option>
                                 <option>Mother</option>
                                 <option>Husband </option>
                                 <option>Daughter </option>
                                 <option>Son </option>
                                 <option>Wife</option>
                                 <option>Sister</option>
                                 <option>Brother</option>
                                 <option>Uncle</option>
                                 <option>Aunty</option>
                             </select>
                         </div>
                    <br>
                      <div class="form-box">
                          <label title=" Please Add Mobile Number"for="post_title">Mobile Number</label>
                          <input type="text" class="form-control" name="phone" value="{{ old('phone') }}" placeholder="Enter Your phone"><br>
                      </div>
                      <div class="form-box">
                          <label title=" Please Add Birthday Date dd/mm/yy"for="post_title">Birthday Date</label>
                          <input type="date" class="form-control" name="birthday" value="{{ old('birthday') }}" placeholder="Enter Your birthday date"><br>
                      </div><br><br>
                      <button type="submit" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i>
                          Add Member</button>
                  </form><br><br><br>

              </div>
          </div>
      </div>
 </div>
@endsection
