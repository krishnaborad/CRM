@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
         @if ($errors->any())
            <div class="alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <hr>
                        <li>{{ $error }}</li>

                    @endforeach
                    <br>
                </ul>
            </div>
        @endif
        <div class="col-md-8 col-md-offset-2">
            @if(Session::has('flash_message'))
            <div class="alert alert-warning alert-dismissible"><span class="glyphicon glyphicon-ok"></span>
                <em> {!! session('flash_message') !!}</em>
            </div>
            @endif

            <div class="panel panel-default" id="example2">

                <div class="panel-heading"><b>Order</b></div>

                <div class="box-body" >
                    <form class="form-horizontal" method="POST" action="{{ url('frontend/order/'.$product->id) }}">
                        {{ csrf_field() }}

                        <a href="{{ url('frontend/product_details/' . $product->id) }}"class="btn btn-warning col-sm-12" >All  Details </a>

                                <div class="form-group">
                                    <input type="hidden" name="product_id" value="{{(null !==($product->id == $product->product_id ))? $product->id : "" }}">

                                </div>
                                <div class="form-group">
                                    <input type="hidden" name="prise" value="{{(null !==($product->id == $product->prise ))? $product->prise : "" }}">

                                </div>
                                <div class="form-group">
                                    <input type="hidden" name="product_code" value="{{(null !==($product->id == $product->product_code ))? $product->product_code : "" }}">

                                </div>
                                <div class="form-group">
                                    <input type="hidden" name="category_id" value="{{(null !==($product->id == $product->category_id ))? $product->category_id : "" }}">
                                </div>

                            <center><h3>Fill All Details</h3></center>
                        <div class="form-group">
                            <label for="custmer_name">Name <font color="red">*</font></label>
                            <input class="form-control" type="text" value="{{old('custmer_name')}}" name="custmer_name">
                        </div>
                        <div class="form-group">

                            <label for="email">Email <font color="red">*</font></label>
                            <input class="form-control" type="text" name="email" value="{{old('email')}}">
                        </div>
                        <div class="form-group">
                            <label for="custmer_phone">Phone Number <font color="red">*</font></label>
                            <input class="form-control" type="text" name="custmer_phone" value="{{old('custmer_phone')}}">
                        </div>
                        <div class="form-group">
                            <label for="custmer_address">address <font color="red">*</font></label>
                            <textarea class="form-control" name="custmer_address" value="{{old('custmer_address')}}" rows="8" cols="80"></textarea>
                        </div>
                        <center><button type="submit"  class="btn btn-primary ">Submit</button></center>
                        <br><br><br>
                    </form>

                </div>
            </div>
        </div>


    </div>


</div>

@endsection

</script>
