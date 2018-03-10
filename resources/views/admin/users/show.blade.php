@extends('admin.layouts.adminapp')
@section('content')
<!-- Content Header (Page header) -->
<section class="box-body">
    @if(Session::has('flash_message'))
        <div class="alert alert-warning alert-dismissible"><span class="glyphicon glyphicon-ok"></span>
            <em> {!! session('flash_message') !!}</em>
        </div>
    @endif
    <h2>Users Details<a class="btn btn-success pull-right" href="{{ URL::previous() }}">Go Back</a></h2>
      <section class="content" >
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

              <div class="box-body"><center>
                <form  action="{{ url('admin/user/show/'.$data->id ) }}" method="get" enctype="multipart/form-data">
                        {{ csrf_field() }}

                <div class="form-box">
                    <font color="#3C8DBC" size="6">{{ $data->name }}</font>
                </div><br>

                <table class="table table-bordered table-striped" id="tbl">
                    <center>
                        <tr>
                            <td align='center'>Email</td>
                            <td><font color="#3C8DBC" size="3">{{$data->email}}</font></td>
                        </tr>
                        <tr>
                            <td align='center'>Phone Number</td>
                            <td><font color="#3C8DBC" size="3">{{$data->phone_no}}</font></td>
                        </tr>
                        <tr>
                            <td align='center'>Birthday date</td>
                            <td><font color="#3C8DBC" size="3">{{ $data->birthday }}</font></td>
                        </tr>
                        <tr>
                            <td align='center'>Nationality </td>
                            <td>
                                <font color="#3C8DBC" size="3">{{$data->contry}}</font><br>
                                <font color="#3C8DBC" size="3">{{ $data->state }}</font><br>
                                <font color="#3C8DBC" size="3">{{ $data->city }}</font><br>
                            </td>
                        </tr>
                        <tr>
                            <td align='center'>Marital Status</td>
                            <td>
                            <font color="#3C8DBC" size="3">
                                    @if ($data->marital_status == 0 )
                                        <font color="#3C8DBC" size="3">Single</font>
                                    @else
                                        <font color="#3C8DBC" size="3">Married</font>
                                    @endif</font>
                            </td>
                        </tr>
                        <tr>
                            <td align='center'>Gender</td>

                            <td><font color="#3C8DBC" size="3">
                                @if ($data->gender == 0 )
                                    <font color="#3C8DBC" size="3">Male</font>
                                @else
                                    <font color="#3C8DBC" size="3">Female</font>
                                @endif
                            </font></td>
                        </tr>
                        <tr>
                            <td align='center'>User Type</td>

                            <td><font color="#3C8DBC" size="3">

                                @foreach($users as $user)
                                    @if($user->id == $data->type_id)
                                         <font color="#3C8DBC" size="3"><option  name="type_id" value="{{ $user->id }}" >{{ $user->name }}</option></font>

                                    @endif
                                @endforeach

                            </font></td>
                        </tr>
                    </center>
                </table>


                <h2>Family Details</h2><br><br>
                <table class="table table-bordered table-striped">

                    <thead>
                        <tr>
                            <th>Id</th>
                            <th> name </th>
                            <th> Relation </th>
                            <th> Phone Number</th>
                            <th> Birthday Date</th>

                        </tr>
                    </thead>
                    @foreach($data->relation as $relations)
                    <tr>
                            <td><font color="#3C8DBC" size="3">{{ $loop->iteration }}</font></td>
                            <td><font color="#3C8DBC" size="3">{{ $relations->name }}</font></td>
                            <td><font color="#3C8DBC" size="3">{{ $relations->relation }}</font></td>
                            <td><font color="#3C8DBC" size="3">{{ $relations->phone}}</font></td>
                            <td><font color="#3C8DBC" size="3">{{ $data->birthday }}</></td>

                    @endforeach

                    </tbody>
                </table>

            </form><br><br><br>
            </div>
            </section>
            </section>
            </div>


@endsection
