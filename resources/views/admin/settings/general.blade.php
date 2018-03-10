@extends('admin.layouts.adminapp')
@section('content')
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<!-- Content Header (Page header) -->
<section class="box-body">

  <h1>General Settings</h1>
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

                    <form class="form-horizontal form-material"  method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            <!-- Profile Picture start -->
                            <div class="row">


                            <div class="col-sm-6">

                                <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>

                                <img src="{{url('download.png')}}" id="profile-img-tag" width="200px" class="pull-left" style="width:150px; height:150px; float:left; border-radius:50%; margin-right:25px;"/>

                            </div>
                            <div class="col-sm-6">
                                    <input type="file" value="" name="image[]" id="profile-img"><br>

                                    <button type="submit" class="btn btn-info pull-left">Upload</button>
                                    <script type="text/javascript">
                                        function readURL(input) {
                                            if (input.files && input.files[0])
                                            {
                                                var reader = new FileReader();

                                                reader.onload = function (e)
                                                {
                                                    $('#profile-img-tag').attr('src', e.target.result);
                                                }
                                                reader.readAsDataURL(input.files[0]);
                                            }
                                        }
                                        $("#profile-img").change(function()
                                        {
                                            readURL(this);
                                        });
                                    </script>

                                </div>

                            <!-- Profile picture end -->
                            </div><br><br>
                                <div class="">
                                    <a class="w3-button w3-block w3-light-grey w3-border" href="{{ url('admin/profile_edit/reset')}}"><i class="fa fa-key"></i> Reset Password</a><br>

                                    <!-- <a class="w3-button w3-block w3-light-grey w3-border" href="{{url('admin/settings/personal')}}">Personal Settings</a><br>
                                    <a class="w3-button w3-block w3-light-grey w3-border" href="{{url('admin/settings/personal')}}">Company Details</a> -->
                                </div>

                    </form>
                </div>
            </section>
        </section>
    </div>
@endsection
