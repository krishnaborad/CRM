
@extends('admin.layouts.adminapp')
@section('content')
  <!-- Content Header (Page header) -->
  <section class="box-body">
      @if(Session::has('flash_message'))
          <div class="alert alert-warning alert-dismissible"><span class="glyphicon glyphicon-ok"></span>
              <em> {!! session('flash_message') !!}</em>
          </div>
      @endif
      <h2>Add User<a class="btn btn-success pull-right" href="{{ URL::previous() }}">Go Back</a></h2>
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
                <form class="form-horizontal form-material" action="" method="post">
                        {{ csrf_field() }}

                    {{--<div class="form-box">
                        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
                        <br><br><br><br><br>
                        <img src="{{url('profiles/default.png')}}" id="profile-img-tag" style="width:85px; height:85px; position:absolute; top:40px; left:450px; border-radius:50%" />
                        <center>
                        <input type="file" name="image"id="profile-img"></center>
                        <br>
                        <!-- image preview Script Start-->
                        <script type="text/javascript">
                            function readURL(input)
                            {
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
                        <!-- Image Preview Script End -->

                </div>--}}
                <div class="form-box"{{ $errors->has('name') ? ' has-error' : 'enter' }}>
                    <label for="name"  title=" Please Enter Your Name">Name <font color="red" size="5">*</font> </label>
                    <input type="text" id="name" class="form-control" name="name" value="{{ old('name') }}" placeholder="Enter Your Name"><br>
                </div>
                <div class="form-box"{{ $errors->has('email') ? ' has-error' : 'enter' }}>
                    <label for="email" title=" Please Enter Your Email">Email <font color="red" size="5">*</font> </label>
                    <input type="text" id="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Enter Your Email"><br>
                </div>
                <div class="form-box"{{ $errors->has('phone_no') ? ' has-error' : 'enter' }}>
                    <label for="phone_no" title=" Please Enter Your Phone Number">Mobile Number <font color="red" size="5">*</font> </label>
                    <input type="text" id="phone_no" class="form-control" name="phone_no" value="{{ old('phone_no') }}" placeholder="Enter Your Mobile Number"><br>
                </div>


                <div class="form-box">

                    <label for="birthday" title=" Please Enter Your Birthday Date dd/mm/yy">Birthday <font color="red" size="5">*</font> </label>
                    <input type="text" id="birthday" class="form-control" name="birthday" value="{{ old('birthday') }}" placeholder="Enter Your Birthday"><br>

                 </div>




                <div class="form-box"{{ $errors->has('contry') ? ' has-error' : 'enter' }}>
                    <!-- <label>Nationality <font color="red" size="5">*</font> </label><br><br> -->
                    <br><br>
                    <label for="contry" title=" Please Enter Your Contry">Contry :  &nbsp;</label> <input id="contry" type="text" class="{{ $errors->has('contry') ? ' has-error' : 'enter' }} "name="contry" value="{{ old('contry') }}"id="txt_state"  placeholder="&nbsp;&nbsp;Enter your Contry">
                     &nbsp; &nbsp; &nbsp;
                    <label for="state" title=" Please Enter Your State">State :  &nbsp;</label> <input type="text" name="state" class="{{ $errors->has('state') ? ' has-error' : 'enter' }}" value="{{ old('state') }}" id="state"  placeholder="&nbsp;&nbsp;Enter your State">
                    &nbsp; &nbsp; &nbsp;
                    <label for="city" title=" Please Enter Your City">City :  &nbsp;</label> <input type="text" name="city" class="{{ $errors->has('city') ? ' has-error' : 'enter' }}" value="{{ old('city') }}" id="city"  placeholder="&nbsp;&nbsp;Enter your City"> </br>
                </div><br>

                <div class="form-box"{{ $errors->has('marital_status') ? ' has-error' : 'enter' }}>
                    <label title=" Please Select Current Status">Marital Status :<font color="red" size="5">*</font></label>
                    <input type="radio" id="marital_status" name="marital_status" value="0" @if(old('marital_status') ==  0)  @endif /> <label for="marital_status">Single</label>
                    <input type="radio" id="marital_status1" name="marital_status" value="1" @if(old('marital_status') ==  1)  @endif /><label for="marital_status1">Married</label>

                </div>

                <br>
                <div class="form-box"{{ $errors->has('gender') ? ' has-error' : 'enter' }}>
                    <label title=" Please Select Gender">Gender <font color="red" size="5">*</font> &nbsp; : &nbsp;&nbsp;&nbsp;&nbsp;</label>
                    <input type="radio" id="gender"  name="gender" value="1" @if(old('gender') ==  1)  @endif /><label for="gender">Female</label>
                    <input type="radio" id="gender1" name="gender" value="0" @if(old('gender') ==  0)  @endif /><label for="gender1">Male</label>

                </div><br>


                <div class="form-box">
                    <label title=" Please Select User Type">Select User Type :</label>
                    <select  class="select2 form-control"  name="type_id">
                    @foreach($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>

                    @endforeach
                    </select>
                </div><br><br>
                <button type="submit" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i>
                    Add User</button>

                </form><br><br><br>

        </div>
    </section>
</section>
</div>

@endsection
