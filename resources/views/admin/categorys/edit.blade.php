@extends('admin.layouts.adminapp')
@section('content')
<!-- Content Header (Page header) -->
<section class="box-body">

  <h1>Edit Category</h1>
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

                        <form action="" class="form-horizontal form-material" method="post">
                                {{ csrf_field() }}
                        <!-- Company Start -->
                                <?php
                                    $company = App\setting::where('key','company_options')->first();
                                ?>
                                <h3>
                                @if($company->value==1)
                                    <div class="form-body">
                                        <label for="post_body">Select Company </label>
                                        <select  class="select2 form-control"  name="company_id">
                                            @foreach($companys as $company)
                                                @if($company->id == $category->company_id)
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
                        <?php
                            $company = App\setting::where('key','theme_id')->first();
                        ?>

                        <div class="form-body">
                                @if($company->value==3)
                            <label for="post_body">Select Theme </label>
                            <select  class="select2 form-control"  name="theme">
                                @foreach($companys as $company)
                                    @if($company->id == $category->theme)
                                        <option value="{{ $company->id }}" selected >{{ $company->theme }}</option>
                                    @else
                                        <option value="{{ $company->id }}">{{ $company->theme }}</option>
                                    @endif
                                @endforeach
                            </select>
                              @endif
                        </div>

                        <!-- Category start -->
                        <div class="form-body">
                            <label for="post_title">Category Name</label>
                            <input type="text" class="form-control" name="name" value="{{ $category->name }}" ><br>
                        </div>
                        <!-- Category End -->
                        <button type="submit" class="btn btn-primary"><i class="fa fa-pencil" aria-hidden="true"></i>
                            Update Category</button>

                    </form>
                </div>
            </section>
            </section>
        </div>
@endsection
