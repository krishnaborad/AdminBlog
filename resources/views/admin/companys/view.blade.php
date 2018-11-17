@extends('admin.layouts.adminapp')
@section('content')
<h2>Company Details</h2>
        <div class="box-inner">
            <div class="box-content">
                <form  action="{{ url('admin/company/view/'.$company->id  ) }}" class="form" method="get" enctype="multipart/form-data">
                        {{ csrf_field() }}

                <br>

                <center>
                <table class="" id="tbl">
                        <center>
                            <div class="form-box center">

                                            <img src='{{ asset("company_logos/$company->logo") }}' id="profile-img-tag"  width="200px" class="pull-left" style="width:200px; height:200px; float:left; border-radius:50%; margin-right:25px;"/>


                                </div>
                            </center>

                        <center>
                            <div class="form-box">
                                <font color="#3C8DBC" size="6">{{ $company->name }}</font>
                            </div>
                        </center>

                        <br>
                        <tr>
                            <td align='center'>Email :</td>
                            <td><a href="mailto:http://mail.google.com"><font color="#2644ef" size="3">{{$company->email}}</font></a></td>
                        </tr>
                        <tr>
                            <td align='center'>Contact :</td>
                            <td><font color="#3C8DBC" size="3">{{$company->phone}}</font></td>
                        </tr>
                        <tr>
                            <td align='center'>Location :</td>
                            <td><font color="#3C8DBC" size="3">{{$company->location}}</font></td>
                        </tr>

                </table>
            </center>


            </form><br><br><br>

                </div>
            </div>
        </div>
    </div>
@endsection
