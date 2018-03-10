@extends('admin.layouts.adminapp')
@section('content')
<section class="box-body">
    @if(Session::has('flash_message'))
        <div class="alert alert-warning alert-dismissible"><span class="glyphicon glyphicon-ok"></span>
            <em> {!! session('flash_message') !!}</em>
        </div>
    @endif
  <h2>Add Family details   <a class="btn btn-success pull-right" href="{{ URL::previous() }}">Go Back</a></h2>

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
                  <form  class="form-horizontal form-material"  method="post">
                      {{ csrf_field() }}

                      <div class="form-box">
                          <label for="post_title"title=" Please Enter Your Name">Name </label>
                          <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Enter Your Name"><br>
                      </div>
                         <div class="form-box">
                             <label title=" Please Select Relation "for="box">Select Relation</label>
                             <select  class="select2 form-control"  name="relation">
                                 <option>Father</option>
                                 <option>Mother</option>
                                 <option>Husband </option>
                                 <option>Daughter </option>
                                 <option>Son </option>
                                 <option>Wife</option>
                                 <option>Sister</option>
                                 <option>Brother</option>
                                 <option>Uncle</option>
                                 <option>Aunty</option>
                             </select>
                         </div>
                      </div>
                      <div class="form-box">
                          <label title=" Please Add Mobile Number"for="post_title">Mobile Number</label>
                          <input type="text" class="form-control" name="phone" value="{{ old('phone') }}" placeholder="Enter Your phone"><br>
                      </div>
                      <div class="form-box">
                          <label title=" Please Add Birthday Date dd/mm/yy"for="post_title">Birthday Date</label>
                          <input type="text" class="form-control" name="birthday" value="{{ old('birthday') }}" placeholder="Enter Your birthday date"><br>
                      </div><br><br>
                      <button type="submit" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i>
                          Add Member</button>
                  </form><br><br><br>
      </div>
      </section>
      </section>
      </div>
@endsection
