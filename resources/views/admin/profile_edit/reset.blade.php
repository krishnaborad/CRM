@extends('admin.layouts.adminapp')

@section('content')

  <section class="box-body">
      @if(Session::has('flash_message'))
          <div class="alert alert-warning alert-dismissible"><span class="glyphicon glyphicon-ok"></span>
              <em> {!! session('flash_message') !!}</em>
          </div>
      @endif
    <h1>Reset Password</h1>
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
            <div class="login-box">
                    <form  class="form-group has-feedback" method="post">
                    {{ csrf_field() }}
                    <center>
                            <div class="form-group has-feedback" {{ $errors->has('old_password') ? ' has-error' : 'enter' }} >
                                <label title="Please Enter Your Current Password">Enter Your Current Password :</label>
                                <input id="password" placeholder="Enter your Current Password" type="password" class="form-control" name="old_password">
                                <span class="glyphicon glyphicon-lock form-control-feedback"></span>

                            </div>
                            <div class="form-group has-feedback " {{ $errors->has('password') ? ' has-error' : 'enter' }} >
                                <label title="Please Enter Your New Password" >Enter Your New Password :</label>
                                <input id="password" placeholder="Enter Your New password" type="password" class="form-control" name="password" >
                                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                            </div>
                            <div class="form-group has-feedback" {{ $errors->has('new_password') ? ' has-error' : 'enter' }} >
                                <label title="Please Re-Enter Your New Password">Re-enter Your New Password :</label>
                                <input id="password" placeholder="Re-type Your New Password" type="password" class="form-control" name="password_confirmation" >
                                <span class="glyphicon glyphicon-lock form-control-feedback"></span>

                            </div><br><br><button type="submit" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i>
                                update password</button>
                                <br><br><br>
                        </form>
                    </div>

                </section>
            </section>
        </div>
@endsection
