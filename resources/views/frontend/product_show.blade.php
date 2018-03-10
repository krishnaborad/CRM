@extends('layouts.app')
@section('content')
<center><h1>PRODUCTS</h1></center>
            @if($message = Session::get('success'))
                <div class="alert alert-info alert-dismissible fade in" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                  <strong>Success!</strong> {{ $message }}
                </div>
            @endif

        <div class="col-sm-12">

                    <form  class="form-horizontal form-material" method="post" action="{{ url('frontend/product_show')}}">
                        {{ csrf_field() }}
                        <br>
                        <table>
                            <thead>

                                <th> Product Images</th>
                                <th> Product Name</th>
                                <th> Product Prise</th>
                                <th> Publish Date</th>
                                <th> </th>
                                <th> </th>

                            </thead>
                            <tbody>

                                @foreach($products as $product)
                                <tr>

                                    <td class="vertpan pic">
                                                @foreach($product->images as $image)
                                                <div class="col-sm-3">
                                                        <img src="{{asset($image->image_path )}}"  />
                                                </div>
                                                @endforeach
                                    </td>
                                    <td>{{$product->name}}</td>
                                    <td><b><i class="fa fa-inr" aria-hidden="true"></i>{{ $product->prise }}</b></td>

                                    <td>{{ $product->created_at }}</td>
                                    <td>
                                        <a class="btn btn-info" href="{{ url('frontend/order/'.$product->id) }}" method="post">Order</a>
                                    </td>
                                    <td>
                                        <a href="{{ url('frontend/product_details/' . $product->id) }}"class="btn btn-info" ><i class="fa fa-eye" aria-hidden="true"></i> Details </a>
                                    </td>


                                </tr>

                                @endforeach

                            </tbody>

                            </table>

                    </form>

                </div>
@endsection
