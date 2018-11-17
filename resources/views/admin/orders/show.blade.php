@extends('admin.layouts.adminapp')
@section('content')
<!-- Content Header (Page header) -->
<h2>Company Details</h2>
        <div class="box-inner">
            <div class="box-content">
            <br>
            <center>
                <form class="form" action="{{ url('admin/orders/show/'.$order->id ) }}" method="get" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <table class="table table-bordered table-striped" id="tbl">
                            <center>
                                <tr>
                                    <td align='center'>Product Name</td>
                                    <td><font color="#3C8DBC" size="3">{{(isset( $order->product->name ))? $order->product->name : ""}}</font></td>
                                </tr>

                                <tr>
                                    <td align="center">Prise</td>
                                    <td><font color="#3C8DBC" size="3"><i class="fas fa-rupee-sign"></i> {{(( $order->product->prise ))? $order->product->prise : "" }}</font></td>
                                </tr>
                                <tr>
                                    <td align='center'>Name</td>
                                    <td><font color="#3C8DBC" size="3">{{$order->custmer_name}}</font></td>
                                </tr>
                                <tr>
                                    <td align='center'>Email</td>
                                    <td><font color="#3C8DBC" size="3">{{$order->email}}</font></td>
                                </tr>
                                <tr>
                                    <td align='center'>Phone Number</td>
                                    <td><font color="#3C8DBC" size="3">{{$order->custmer_phone}}</font></td>
                                </tr>
                                <tr>
                                    <td align='center'>Address</td>
                                    <td><font color="#3C8DBC" size="3">{{$order->custmer_address}}</font></td>
                                </tr>
                            </center>
                        </table>
                </form><br><br><br>
            </div>
        </div>
    </div>
</div>


@endsection
