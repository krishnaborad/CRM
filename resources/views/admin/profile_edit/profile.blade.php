@extends('admin.layouts.adminapp')
@section('content')

  <!-- Content Header (Page header) -->
  <section class="box-body">

    <h1>Profile</h1>
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

                    <form class="form-horizontal form-material" method=""action="">

                        {{ csrf_field() }}
                        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>

                  <!-- <img src="{{url('download.png')}}" id="profile-img-tag" width="200px"  style="width:150px; height:150px; float:left; border-radius:50%; margin-right:25px;"/><br><br><br>



                            <br><br>    <br><br>    <br><br>
                            <input type="file" name="image[]" id="profile-img"><br>

                            <button type="submit" class="btn btn-info">Upload</button>
                            <script type="text/javascript">
                                function readURL(input) {
                                    if (input.files && input.files[0]) {
                                        var reader = new FileReader();

                                        reader.onload = function (e) {
                                            $('#profile-img-tag').attr('src', e.target.result);
                                        }
                                        reader.readAsDataURL(input.files[0]);
                                    }
                                }
                                $("#profile-img").change(function(){
                                    readURL(this);
                                });
                            </script> -->
                        </form>
                            <br><br><br>

                        <table>
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>{{ Auth::user()->name }}</th>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <th>{{ Auth::user()->email }}</th>
                                </tr>
                                <tr>
                                    <th>Password</th>
                                    <th><a href="{{ url('admin/profile_edit/reset')}}" class="buttons"><i class="fa fa-key fa-fw" aria-hidden="true"></i>Reset password</a></th>
                                </tr>
                            </thead>
                        </table>

                </div>
                </section>
                </section>
                </div>


@endsection
