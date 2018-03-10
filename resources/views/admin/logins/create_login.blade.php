@extends('admin.layouts.adminapp')
@section('content')
<style>
    label{

    }
    input[type=text] {
    width: 30%;
    padding: 12px 20px;
    margin: 8px 0;
    box-sizing: border-box;
    border: 1px solid #555;
    outline: none;
    }

    input[type=text]:focus {
    background-color: lightblue;
    }
    input[type=password] {
    width: 30%;
    padding: 12px 20px;
    margin: 8px 0;
    box-sizing: border-box;
    border: 1px solid #555;
    outline: none;
    }

    input[type=password]:focus {
    background-color: lightblue;
    }
</style>
  <section class="content-header">
    <h1>Login</h1>
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
                    <div class="box-body">
                        @if ($errors->any())
                            <div class="alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    <center>
                    <form class="form-horizontal form-material" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <label for="name" title="Please Enter User Name"><b>Name&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
                           <input type="text" id="name" placeholder="Enter Your  Name" name="name" ><br>

                            <label for="email" title="Please Enter Email"><b>Email&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
                           <input type="text" id="email" placeholder="Enter Your Email" name="email" ><br>

                           <label for="password" title="Please Enter Password"><b>Password&nbsp;&nbsp;</b></label>
                           <input type="password" id="password" placeholder="Enter Your Password" name="password" ><br><br>

                           <button class="btn btn-info"type="submit">Login</button>

                    </form>
                </center>
                </div>
        </section>
    </section>
</div>

@endsection
