@extends('admin.layouts.adminapp')

@section('content')
<!-- Content Header (Page header) -->
<section class="box-body">

  <h1>Edit Product</h1>
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

                <form  action="{{ url('admin/product/edit/'.$product->id) }}" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <!-- Company Start -->
                                        <?php
                                            $company = App\setting::where('key','company_options')->first();
                                        ?>
                                        <h3>
                                        @if($company->value==1)
                                        <div class="form-group">
                                            <label for="post_body">Select Company </label>
                                            <select  class="select2 form-control"  name="company_id">
                                                @foreach($companys as $company)
                                                    @if($company->id == $product->company_id)
                                                        <option value="{{ $company->id }}" selected >{{ $company->name }}</option>
                                                    @else
                                                        <option value="{{ $company->id }}">{{ $company->name }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                        @endif
                                </h3>
                                <!-- Company End -->


                        <div class="form-group">
                            <label for="post_title">Product Name</label>
                            <input type="text" class="form-control" name="name" value="{{$product->name}}"  placeholder="Enter Product Name"> <br>
                        </div>
                        <div class="form-group">
                            <label for="post_title">Product prise</label>
                            <input type="text" class="form-control" name="prise" value="{{$product->prise}}"  placeholder="Enter prise"> <br>
                        </div>
                        <div class="form-group">
                            <label for="post_title">Product Code</label>
                            <input type="text" class="form-control" name="product_code" value="{{$product->product_code}}" placeholder="Enter Product Code"><br>
                        </div>
                        <div class="form-group">
                            <label for="post_body">Description</label>
                            <textarea class="form-control" name="Description" placeholder="Enter Description">{{$product->description}}</textarea>
                        </div>
                        <div class="form-group" >
                        <label>
                            <input or="post_body" type="checkbox" name="new_arrivals" value="1"
                            @if($product->new_arrivals == 1) checked @endif > New Arrivals<br>
                        </label>

                        </div>

                        <div class="form-group" >
                            <label for="post_body">Select Category </label>
                            <select  class="select2 form-control" name="category_id">
                            @foreach($categorys as $category)
                                @if($category->id == $product->category_id)
                                    <option value="{{ $category->id }}" selected >{{ $category->name }}</option>
                                @else
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endif
                            @endforeach

                        </select>
                        </div>


                            <br><br>
                        <div class="form-group" >
                            <label for="post_body">Select Image</label>
                            <input type="file" name="image[]" multiple >
                        </div>    <br>


                    <button type="submit" class="btn btn-primary"></i>Update Product</button><br><br>

                    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
                    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
                    <script src="//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
                            <div class="form-group" >
                                <label for="post_body">Product Images </label>
                                <br><font color="#687282" size="3" >Click On Image  <i class="fa fa-search-plus fa fw"></i></font>
                                        <table class="table table-bordered table-striped">
                                                @foreach($product->images as $image)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>
                                                            <a class="fancybox" rel="ligthbox" href="{{asset($image->image_path )}}">
                                                            <img src="{{asset($image->image_path )}}" class="img-responsive" width="50px" alt="" /></td>
                                                            </a>

                                                            <script type="text/javascript">
                                                              $(".fancybox").fancybox({
                                                                  openEffect: "none",
                                                                  closeEffect: "none"
                                                              });
                                                            </script>

                                                        <p><td><a href="{{ url('admin/product/delete/' . $image->id .'/'.$product->id) }}" class="btn btn-danger btn-xs waves-effect waves-light deleteText"> <i class="glyphicon glyphicon-trash"></i> Delete</a></td></p>

                                                    </tr>
                                                    <a href='{{ asset("images/$product->product_image") }}'>{{ $product->product_image }}</a>

                                                @endforeach
                                        </table>
                                </div>
                                <br><br><br>

            </form>
        </div>
    </section>
    </section>
</div>

@endsection
