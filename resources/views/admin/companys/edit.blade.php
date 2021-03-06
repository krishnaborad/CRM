@extends('admin.layouts.adminapp')

@section('content')
<!-- Content Header (Page header) -->
<section class="box-body">

  <h1>Edit Company</h1>
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

                                <div class="form-body">
                                    <label for="post_title">Company Name</label>
                                    <input type="text" class="form-control" name="name" value="{{ $company->name }}" ><br>
                                </div>

                            <button type="submit" class="btn btn-primary"><i class="fa fa-pencil" aria-hidden="true"></i>
                                Update Company  </button>

                    </form>
                </div>
            </section>
            </section>
        </div>
@endsection
