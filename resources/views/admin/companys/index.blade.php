@extends('admin.layouts.adminapp')

@section('content')
<!-- Content Header (Page header) -->
<section class="box-body">

  <h1>Company details</h1>
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

                    <form  class="form-horizontal form-material">
                    <a class="btn btn-info" href="{{ url('admin/company/create') }}"><i class="fa fa-plus" aria-hidden="true"></i>
                        Add New Company</a>
                    <br> <br>
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Company</th>
                                <th>Created at</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                            @foreach($companys as $company)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $company->name }}</td>
                                    <td>{{ $company->created_at }}</td>
                                    <td>
                                        <a href="{{ url('admin/company/edit/' . $company->id) }}"class="btn btn-success" ><i class="fa fa-pencil-square-o" aria-hidden="true"></i>  Edit</a>

                                        <a href="{{ url('admin/company/delete/' . $company->id)}}"class="btn btn-danger waves-effect waves-light deleteText" >
                                        <i class="fa fa-trash-o" aria-hidden="true" ></i>  Delete</a>
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
