
@extends('admin.layouts.adminapp')

@section('content')
<script type="text/javascript">
    $(document).ready(function() {
    $('#datatable').DataTable();
    } );
</script>
<!-- Content Header (Page header) -->
<section class="box-body">
    @if(Session::has('flash_message'))
        <div class="alert alert-warning alert-dismissible"><span class="glyphicon glyphicon-ok"></span>
            <em> {!! session('flash_message') !!}</em>
        </div>
    @endif
  <h2>Add User</h2>
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
                  <br>
                  <!-- <form  style="border: 4px solid #7CACD5;margin-top: 15px;padding: 10px;" action="{{route('import_excel')}}" class="form-horizontal" method="post"   enctype="multipart/form-data">
                      {{csrf_field()}}
                    <center>    <input type="file" name="import_file" /></center>
                        <button  class="btn btn-primary">Import File</button>
                    </form>
                    <br><hr>  -->
                      <a class="btn btn-info pull-left" href="{{ url('admin/user/create') }}"><i class="fa fa-plus" aria-hidden="true"></i>
                        &nbsp;  Add User</a>


                  <div class=" pull-right dropdown ">
                          <script src="http://www.position.absolute.com/creation/print/jquery.printpage.js"></script>
                      <button class="btn btn-1 dropdown-toggle" type="button" data-toggle="dropdown">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Convert&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      <span class="caret"></span></button>
                      <ul class="dropdown-menu">
                        <li><a href="{{route('pdf_formate')}}"  target="_blank">PDF</a></li>
                        <li><a href="{{route('excel_formate')}}" target="_blank">Excel</a></li>

                      </ul>
                  </div>

              <div class="box-body">
                    <form  class="form-horizontal form-material">


                    <br> <br>
                    <table class="table table-bordered table-striped" id="datatable">

                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Mobile Number</th>
                                <th>Gender</th>
                                <th>User Type</th>
                                <th>Date</th>
                                <th>Add Family Member</th>
                                <th></th>
                                <th>Action</th>
                                <th></th>
                            </tr>
                        </thead>
                        @foreach($user as $data)
                        <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $data->name }}</td>
                                <td>{{ $data->email }}</td>
                                <td>{{ $data->phone_no }}</td>
                                <td>{{ ( $data->gender == 0 )? "male" : "female" }}</td>
                                <td>{{(isset( $data->users->name ))? $data->users->name : ""}}</td>
                                <td>{{ $data->created_at }}</td>
                                <td>
                                    <a href="{{url('admin/user/user_family/' .$data->id) }}" class="btn btn-info"> <i class="fa fa-plus"></i>Add Family </a>

                                </td>
                                <td>
                                    <a  href="{{ url('admin/user/show/' . $data->id) }}" class="btn btn-warning "><i class="fa fa-eye" aria-hidden="true"></i></a>
                                </td>
                                <td>
                                    <a href="{{ url('admin/user/edit/' . $data->id)}}" class="btn btn-success"> <i class="fa fa-edit"></i></a>


                                </td>
                                <td>
                                    <a id="delete-button" href="{{ url('admin/user/delete/' . $data->id) }}" class="btn btn-danger waves-effect waves-light deleteText"> <i class="glyphicon glyphicon-trash"></i></a>
                                </td>

                        </tr>
                        @endforeach

                        </tbody>
                    </table>
                </form><br><br><br>
        </div>
    </section>
</section>
</div>


@endsection
