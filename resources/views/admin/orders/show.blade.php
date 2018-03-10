@extends('admin.layouts.adminapp')
@section('content')
<!-- Content Header (Page header) -->
<section class="box-body">
    @if(Session::has('flash_message'))
        <div class="alert alert-warning alert-dismissible"><span class="glyphicon glyphicon-ok"></span>
            <em> {!! session('flash_message') !!}</em>
        </div>
    @endif
    <h2>Users Details<a class="btn btn-success pull-right" href="{{ URL::previous() }}">Go Back</a></h2>
      <section class="content" >
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

                  @if ($errors->any())
                      <div class="alert-danger">
                          <ul>
                              @foreach ($errors->all() as $error)
                                  <li>{{ $error }}</li>
                              @endforeach
                          </ul>
                      </div>
                  @endif

              <div class="box-body"><center>
                <form  action="{{ url('admin/orders/show/'.$order->id ) }}" method="get" enctype="multipart/form-data">
                        {{ csrf_field() }}



                <table class="table table-bordered table-striped" id="tbl">
                    <center>
                        <tr>
                            <td align='center'>Product Name</td>
                            <td><font color="#3C8DBC" size="3">{{(isset( $order->product->name ))? $order->product->name : ""}}</font></td>
                        </tr>

                        <tr>
                            <td align="center">Prise</td>
                            <td><font color="#3C8DBC" size="3"><i class="fa fa-inr"></i>&nbsp;{{(( $order->product->prise ))? $order->product->prise : "" }}</font></td>
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
        </section>
    </section>
</div>


@endsection
