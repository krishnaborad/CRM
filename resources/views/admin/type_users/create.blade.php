@extends('admin.layouts.adminapp')
@section('content')

  <!-- Content Header (Page header) -->
  <section class="box-body">
      @if(Session::has('flash_message'))
          <div class="alert alert-warning alert-dismissible"><span class="glyphicon glyphicon-ok"></span>
              <em> {!! session('flash_message') !!}</em>
          </div>
      @endif
    <h1>Guest Users</h1>
        <section class="content">
            <div class="box" id="example2">
                      <div class="box-header with-border" >
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


                <div class="box-body">
                <form class="form-horizontal form-material" action="" method="post">
                        {{ csrf_field() }}
                <div class="form-body">
                    <label for="name" title="Enter User Type">Name <font color="red" size="5">*</font> </label>
                    <input type="text" id="name"class="form-control" name="name" placeholder="Enter User Type"><br>
                </div>
                <button type="submit" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i>
                    Add User Type</button>

                </form>
        </div>
    </section>
</section>
</div>
@endsection
