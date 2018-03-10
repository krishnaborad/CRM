@extends('admin.layouts.adminapp')
@section('content')

<!-- Content Header (Page header) -->
<section class="box-body">
    @if(Session::has('flash_message'))
        <div class="alert alert-warning alert-dismissible"><span class="glyphicon glyphicon-ok"></span>
            <em> {!! session('flash_message') !!}</em>
        </div>
    @endif
  <h2>Users Family Details<a class="btn btn-success pull-right" href="{{ URL::previous() }}">Go Back</a></h2>
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
                    <form  class="form-horizontal form-material">
                    <a class="btn btn-info" href="{{ url('admin/user/add/'.$data->id) }}"><i class="fa fa-plus" aria-hidden="true"></i>
                        Add Family Member</a>

                    <br> <br>
                    <table class="table table-bordered table-striped">

                        <thead>
                            <tr>
                                <th>Id</th>
                                <th> name </th>
                                <th> Relation </th>
                                <th> Phone Number</th>
                                <th> Birthday Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        @foreach($data->relation as $relations)
                        <tr>
                                <td>{{ $loop->iteration }}</td>

                                <td>{{ $relations->name }}</td>
                                <td>{{ $relations->relation }}</td>
                                <td>{{ $relations->phone}}</td>
                                <td>{{ $relations->birthday }}</td>
                                <td>{{ $relations->created_at }}</td>
                                <td>
                                    <a id="delete-button" href="{{ url('admin/user/user_family/delete/' . $relations->id) }}" class="btn btn-danger  waves-effect waves-light deleteText"> <i class="glyphicon glyphicon-trash"></i>  Delete</a>
                                </td>
                        @endforeach

                        </tbody>
                    </table>
                </form><br><br><br>
        </div>
    </section>
</section>
</div>


@endsection
