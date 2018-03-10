@extends('admin.layouts.adminapp')
@section('content')
<!-- Content Header (Page header) -->
<section class="box-body">
    <div id="app">
            @include('flash-message')

            @yield('content')
        </div>
  <h1>Product details</h1>
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

                  <!-- Flash successfull message End -->
                      <br>

                        <form  class="form-horizontal form-material" method="post" action="{{ url('admin/product/deleteall')}}">
                            {{ csrf_field() }}
                            <a class="btn btn-info" href="{{ url('admin/product/create') }}">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New Products</a>

                            <button type="submit"class="btn btn-danger waves-effect waves-light deleteText" >Delete All Selected</button>
                            <br><hr>

                                <table class="table table-bordered table-striped datatable">
                                    <thead>
                                        <tr>
                                            <th>All<br><INPUT type="checkbox" name="delete_id[]" onchange="checkAll(this)" /></th>
                                            <th>Id</th>
                                            <th>Product Name</th>
                                            <th>Product prise </th>
                                            <th>Product code</th>
                                            <th>Description</th>
                                            <th>New Arrivals</th>
                                            <th>Category</th>
                                            <th>Company</th>
                                            <th>Created At</th>
                                            <th>Action</th>
                                        </tr>

                                    </thead>
                                    <tbody>

                                 @foreach($products as $product)
                                            <tr>
                                                <td>
                                                    <INPUT type="checkbox" name="delete_id[]"  value="{{$product->id}}" />
                                                </td>

                                                <td>{{ $loop->iteration }}</td>
                                                <td><a href="{{ url('frontend/product_details/'.$product->id) }}">{{ $product->name }}</a></td>
                                                <td><i class="fa fa-inr" aria-hidden="true"></i> {{ $product->prise }}</td>
                                                <td>{{ $product->product_code }}</td>
                                                <td>{{ $product->description }}</td>
                                                <td>{{ ( $product->new_arrivals == 0 )? "no" : "yes" }}</td>
                                                <td>{{(isset( $product->category->name ))? $product->category->name : ""}}</td>
                                                <td>{{(isset( $product->company->name ))? $product->company->name : ""}}</td>
                                                <td>{{ $product->created_at }}</td>
                                                <td>
                                                    <a href="{{ url('admin/product/edit/' . $product->id) }}"class="btn btn-success btn-xs" ><i class="fa fa-pencil-square-o" aria-hidden="true"></i>  Edit</a>

                                                    <a id="delete-button" href="{{ url('admin/product/delete/' . $product->id) }}" class="btn btn-danger btn-xs waves-effect waves-light deleteText"> <i class="glyphicon glyphicon-trash"></i>  Delete</a>
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
<script>
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
