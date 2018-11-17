@extends('admin.layouts.adminapp')
@section('content')
<style media="screen">
        /* The snackbar - position it at the bottom and in the middle of the screen */
        #snackbar
        {
            visibility: hidden; /* Hidden by default. Visible on click */
            min-width: 500px; /* Set a default minimum width */
            margin-left: -125px; /* Divide value of min-width by 2 */
            background-color: #666666; /* Black background color */
            color: #fff; /* White text color */
            text-align: center; /* Centered text */
            border-radius: 10px; /* Rounded borders */
            padding: 20px; /* Padding */
            position: fixed; /* Sit on top of the screen */
            z-index: 1; /* Add a z-index if needed */
            left: 50%; /* Center the snackbar */
            bottom: 300px; /* 30px from the bottom */

        }

        /* Show the snackbar when clicking on a button (class added with JavaScript) */
        #snackbar.show
        {
            visibility: visible; /* Show the snackbar */

            /* Add animation: Take 0.5 seconds to fade in and out the snackbar.
            However, delay the fade out process for 2.5 seconds */
            -webkit-animation: fadein 0.5s, fadeout 0.5s 2.5s;
            animation: fadein 0.5s, fadeout 0.5s 2.5s;
        }

        /* Animations to fade the snackbar in and out */
        @-webkit-keyframes fadein
         {
            from {bottom: 0; opacity: 0;}
            to {bottom: 300px; opacity: 1;}
        }

        @keyframes fadein
        {
            from {bottom: 0; opacity: 0;}
            to {bottom: 300px; opacity: 1;}
        }

        @-webkit-keyframes fadeout
        {
            from {bottom: 300px; opacity: 1;}
            to {bottom: 0; opacity: 0;}
        }

        @keyframes fadeout
        {
            from {bottom: 300px; opacity: 1;}
            to {bottom: 0; opacity: 0;}
        }
</style>
<div class="box-content alerts">

        @if(Session::has('flash_message'))
               <div class="alert alert-success">
                   <button type="button" class="close" data-dismiss="alert">&times;</button>
                   {!! session('flash_message') !!}<strong> Well done!</strong>
               </div>
         @endif

</div>
<h2>Orders Details</h2>
        <div class="box-inner">
            <div class="box-content">


                  <!-- Flash successfull Message Start -->
                  <form class="form"  method="post" action="{{ url('admin/order/deleteall')}}" >
                      {{csrf_field()}}<br>
                  <!-- Flash successfull message End -->
                  <button type="submit"class="btn btn-danger waves-effect waves-light deleteText pull-left" >Delete All Selected</button>
                  <br><br><br>

                    <table class="table table-striped table-bordered bootstrap-datatable responsive" id="example">
                        <thead>
                            <tr>
                                <th>All<br><INPUT type="checkbox" name="delete_id[]" onchange="checkAll(this)" /></th>
                                <th>Id</th>
                                <th>Product Name</th>
                                <th>Custmer Name</th>
                                <th>Custmer Email</th>
                                <th>Custmer Conatct Number</th>
                                <th>Custmer Address</th>
                                <th>confirm order</th>
                                <th>Send Mail</th>
                                <th>View Details</th>
                                <th>Delete Order</th>
                            </tr>

                        </thead>
                        <tbody>

                     @foreach($orders as $order)
                                <tr>
                                    <td>
                                        <INPUT type="checkbox" name="delete_id[]"  value="{{$order->id}}" />
                                    </td>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{(isset( $order->product->name ))? $order->product->name : ""}}</td>
                                    <td>{{ $order->custmer_name }}</td>
                                    <td>{{ $order->email }}</td>
                                    <td>{{ $order->custmer_phone }}</td>
                                    <td>{{ $order->custmer_address }}</td>
                                    <td>
                                        <a onclick="myFunction()"  href="{{ url('admin/orders/order_pdf/'.$order->id) }}"class="btn btn-info btn-sm"> <i class="glyphicon glyphicon-send"></i> Confirm</a>

                                        <!-- The actual snackbar -->
                                        <div id="snackbar">Order Downloaded successfully</div>
                                    </td>
                                    <td>
                                      <a id="delete-button" href="{{ url('admin/order/mail/') }}" class="btn btn-warning btn-sm "><i class="glyphicon glyphicon-envelope"></i> Send Mail</a>
                                    </td>
                                    <td>
                                        <a href="{{ url('admin/order/show/' . $order->id) }}" class="btn btn-primary  "> <i class="fa fa-eye"></i></a>
                                    </td>


                                    <td>
                                        <a id="delete-button" href="{{ url('admin/order/delete/' . $order->id) }}" class="btn btn-danger remove "> <i class="glyphicon glyphicon-trash"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
<script type="text/javascript">
    function checkAll(ele)
     {
        var checkboxes = document.getElementsByTagName('input');
            if (ele.checked) {
                for (var i = 0; i < checkboxes.length; i++)
                 {
                    if (checkboxes[i].type == 'checkbox')
                     {
                        checkboxes[i].checked = true;
                    }
                }
            }
            else
             {
                 for (var i = 0; i < checkboxes.length; i++)
                  {
                     console.log(i)
                     if (checkboxes[i].type == 'checkbox')
                      {
                         checkboxes[i].checked = false;
                       }
                   }
               }
           }
</script>
