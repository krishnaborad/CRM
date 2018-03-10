@extends('admin.layouts.adminapp')
@section('content')
<!-- Content Header (Page header) -->

<section class="box-body">

  <h1>Add New Product</h1>
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

                    <form class="form-horizontal form-material" action="{{ url('admin/product/create') }}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <?php
                                $company = App\setting::where('key','company_options')->first();
                            ?>
                            <h3>
                            @if($company->value==1)
                            <div class="box-body">
                                    <label for="box_body">Select Company </label>
                                    <select  class="select2 form-control"  name="company_id">
                                        @foreach($companys as $company)
                                            <option value="{{ $company->id }}">{{ $company->name }}</option>
                                        @endforeach
                                    </select>
                            </div>
                            @endif
                            </h3>
                            @if ($errors->any())
                                <div class="alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                        <div class="box-body">

                            <label for="post_title">Product Name</label>
                            <input type="text" class="form-control" name="name" value="{{ old('name') }}"  placeholder="Enter Product Name"> <br>
                        </div>
                        <div class="box-body">

                            <label for="post_title">Product Prise</label>
                            <input type="text" class="form-control" name="prise" value="{{ old('prise') }}"  placeholder="Enter Prise"> <br>
                        </div>
                         <!--  -->

                        <div class="box-body"{{ $errors->has('product_code') ? ' has-error' : 'enter' }}>

                            <label for="post_title">Product Code</label>
                            <input type="text" class="form-control" name="product_code" value="{{ old('product_code') }}" placeholder="Enter Product Code"><br>

                        </div>

                        <div class="box-body">
                            <label for="description">Description</label>
                            <textarea id="description" class="form-control" name="Description" value="{{ old('description') }}" placeholder="Enter Description"></textarea>
                        </div>

                        <div class="box-body" >
                            <label>
                              <input  type="checkbox" name="new_arrivals" value="1"> New Arrivals<br>
                            </lable>
                        </div>

                        <div class="box-body">
                            <label for="box">Select Category </label>
                            <select  class="select2 form-control"  name="category_id">
                            @foreach($categorys as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>

                            @endforeach
                            </select>
                        </div>

                         <label for="box">Select Image</label>
                        <input type="file" name="image[]" multiple >
                        <br><br><br>

                        <button type="submit" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i>
                            Add Product</button>
                            <br><br><br><br><br>
                    </form>
                </div>
            </section>
        </section>
    </div>

@endsection
