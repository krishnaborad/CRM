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
<section class="box-body">

  <h1>Order Details</h1>

      <section class="content">
          <div class="box" id="example2">
                    <div class="box-header with-border">
                        <div class="box-tools pull-right">
                          <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                                  title="Collapse">
                            <i class="fa fa-minus"></i></button>
                          <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                            <i class="fa fa-times"></i></button>
                        </div>
                      </div>

                  <!-- Flash successfull Message Start -->
                  <form class=""  method="post" action="{{ url('admin/order/deleteall')}}" >
                      {{csrf_field()}}
                  <!-- Flash successfull message End -->
                  <button type="submit"class="btn btn-danger waves-effect waves-light deleteText pull-left" >Delete All Selected</button>
                  <br><hr>
                      <br>

                    <table class="table table-bordered table-striped " id="example">
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
                                <th></th>
                                <th></th>
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
                                        <a onclick="myFunction()"  href="{{ url('admin/orders/order_pdf/'.$order->id) }}"class="btn btn-primary"> <i class="fa fa-send"></i> Confirm</a>

                                        <!-- The actual snackbar -->
                                        <div id="snackbar">Order Downloaded successfully</div>
                                    </td>
                                    <td>
                                        <a href="{{ url('admin/order/show/' . $order->id) }}" class="btn btn-info "> <i class="fa fa-eye"></i> View order</a>
                                    </td>
                                    <td>
                                        <a id="delete-button" href="{{ url('admin/order/delete/' . $order->id) }}" class="btn btn-danger "> <i class="glyphicon glyphicon-trash"></i>  Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </form>
</div>
</section>
</section>
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
<script type="text/javascript">
$(document).ready(function() {
$('#example').DataTable();
} );
</script>
<script type="text/javascript">
function myFunction() {
// Get the snackbar DIV
var x = document.getElementById("snackbar")

// Add the "show" class to DIV
x.className = "show";

// After 3 seconds, remove the show class from DIV
setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
}
</script>
