@extends('admin.layouts.adminapp')
@section('content')
<!-- Content Header (Page header) -->
<section class="box-body">

  <h1>Add New Category</h1>
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

                        <form class="form-horizontal form-material" action="" method="post">
                                {{ csrf_field() }}
                        <!-- Add company start -->
                        <?php
                            $company = App\setting::where('key','company_options')->first();
                        ?>
                        <h3>
                            @if($company->value==1)
                                <div class="form-body">
                                    <label for="post_body">Select Company </label>
                                    <select  class="select2 form-control"  name="company_id">
                                        @foreach($companys as $company)
                                            <option value="{{ $company->id }}">{{ $company->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            @endif
                            <?php
                                $company = App\setting::where('key','theme_id')->first();
                            ?>
                            @if($company->value==3)
                                <div class="form-body">
                                    <label for="post_body">Select Theme </label>
                                    <select  class="select2 form-control"  name="theme">
                                        @foreach($companys as $company)
                                            <option value="{{ $company->theme }}">{{ $company->theme}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            @endif
                        </h3>
                        <!-- Add Company End -->
                        @if ($errors->any())
                            <div class="alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <!-- Add Category start -->
                        <div class="form-body">
                            <label for="post_title">Category Name &nbsp: </label>
                            <input type="text" class="form-control" name="name" value="" placeholder="Enter Category Name"><br>
                        </div>
                        <!-- Add category End -->
                        <button type="submit" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i>
                            Add Category</button>

                    </form>
                </form>
            </div>
        </section>
        </section>
    </div>
@endsection
