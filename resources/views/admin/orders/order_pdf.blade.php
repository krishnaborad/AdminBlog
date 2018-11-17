<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Order Details</title>
    </head>
    <body bgcolor="#e3e5f7">
    <style>
    table, th, td {
        /*border: 1px solid black;*/
        border-collapse: collapse;
    }
    th, td {
        padding: 15px;
    }
    </style>
    <center><h2><big>BILL DETAILS</big></h2></center>

    <font size="2" color="blue"><caption>www.faltu.com</caption></font>
    <br><hr>
        <br><br>

        <center>
        <table align="center" width="100%" >
                <tr>
                    <td><b>Product Name</b></td>
                    <td><b>{{(isset( $order->product->name ))? $order->product->name : ""}}</b></td>
                </tr>
                <tr>
                    <td><b>Product Code</b></td>
                    <td><b>{{$order->product_code}}</b></td>
                </tr>
                <tr>
                    <td><b>Name</b></td>
                    <td><b>{{$order->custmer_name}}</b></td>
                </tr>
                <tr>
                    <td><b>Email</b></td>
                    <td><b>{{$order->email}}</b></td>
                </tr>
                <tr>
                    <td><b>Phone Number</b></td>
                    <td><b>{{$order->custmer_phone}}</b></td>
                </tr>
                <tr>
                    <td><b>Address</b></td>
                    <td><b>{{$order->custmer_address}}</b></td>
                </tr>
                <tr>
                    <td><b>Product Prise</b></td>
                    <td><b>{{(isset( $order->product->prise ))? $order->product->prise : "" }}</b></td>
                </tr>
                <tr>
                    <td><b>Total Amount</b></td>
                    <td><hr><font size="4"><i class="fa fa-inr" aria-hidden="true"></i><b>{{(isset( $order->product->prise ))?$order->product->prise : "" }} </font>/- &nbsp;</b>
                    <hr></td>
                </tr>

        </table>
        </center>
    </body>
</html>
