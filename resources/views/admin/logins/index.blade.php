@extends('admin.layouts.adminapp')
@section('content')
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

              <div class="box-body">
                    <form  class="form-horizontal form-material">

                        <a class="btn btn-info" href="{{ url('admin/login/create_login') }}"><i class="fa fa-plus" aria-hidden="true"></i>
                            Add Account</a>

                        <br> <br>

                        <br> <br>
                        <table class="table table-bordered table-striped" >

                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Password</th>
                                    <th>Create Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            @foreach($users as $user)
                                       <tr>
                                           <td>{{ $loop->iteration }}</td>
                                           <td> {{ $user->name }}</td>
                                           <td>{{ $user->email }}</td>
                                           <td>{{ $user->password }}</td>

                                           <td>{{ $user->created_at }}</td>
                                           <td>
                
                                               <a id="delete-button" href="{{ url('admin/login/delete/' . $user->id) }}" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i>Delete</a>
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
