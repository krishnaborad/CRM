@extends('layouts.app')
@section('content')


              <div class="box-body"><center>
                <form  action="{{ url('frontend/product_details/'.$product->id) }}" >
                        {{ csrf_field() }}
                        <div class="form-group">

                            <label for="" class="pull-left">Product Images</label><br><br>
                        </div>
                        <div class=" form-group vertpan pic">
                            @foreach($product->images as $image)
                            <div class="col-sm-2">
                                    <img src="{{asset($image->image_path )}}"  />
                            </div>
                            @endforeach
                        </div>
                                <br><br><br><br><br><br><br><br><br><br><br><br>

                        <table class="table table-bordered table-striped" id="tbl">
                            <center>
                                <label class="pull-left">Product Details</label><br><br>
                                <tr>
                                    <td align='center'>product Name</td>
                                    <td><font color="#3C8DBC" size="3">{{$product->name}}</font></td>
                                </tr>
                                <tr>
                                    <td align='center'>prise</td>
                                    <td><font color="#3C8DBC" size="3"><i class="fa fa-inr" aria-hidden="true"></i>{{$product->prise}}</font></td>
                                </tr>
                                <tr>
                                    <td align='center'>Product_code</td>
                                    <td><font color="#3C8DBC" size="3">{{$product->product_code}}</font></td>
                                </tr>
                                <tr>
                                    <td align='center'>Description</td>
                                    <td><font color="#3C8DBC" size="3">{{$product->description}}</font></td>
                                </tr>
                                <tr>
                                    <td align='center'>New Arrivals</td>
                                    <td><font color="#3C8DBC" size="3">{{ ( $product->new_arrivals == 0 )? "no" : "yes" }}</font></td>
                                </tr>
                                <tr>
                                    <td align='center'>Category</td>
                                    <td><font color="#3C8DBC" size="3">{{(isset( $product->category->name ))? $product->category->name : ""}}</font></td>
                                </tr>
                                <tr>
                                    <td align='center'>Company Name</td>
                                    <td><font color="#3C8DBC" size="3">{{(isset( $product->company->name ))? $product->company->name : ""}}</font></td>
                                </tr>

                            </center>
                        </table>
                </form>


                <br><br><br>




@endsection
