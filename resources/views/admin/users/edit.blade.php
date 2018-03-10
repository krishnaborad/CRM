@extends('admin.layouts.adminapp')
@section('content')

<!-- Content Header (Page header) -->
<section class="box-body">
    @if(Session::has('flash_message'))
        <div class="alert alert-warning alert-dismissible"><span class="glyphicon glyphicon-ok"></span>
            <em> {!! session('flash_message') !!}</em>
        </div>
    @endif
  <h2>Add User</h2>
      <section class="content">
          <div class="box"id="example2">
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
                    <form  action="{{ url('admin/user/edit/'.$data->id) }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                {{--<div class="form-box">
                        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
                        <br><br><br><br><br>
                        <img src="{{url('profiles/default.png')}}" id="profile-img-tag" style="width:85px; height:85px; position:absolute; top:40px; left:450px; border-radius:50%" />
                        <center>
                        <input type="file" name="profile" id="profile-img"></center>
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
                <div class="form-box">
                    <label for="post_title">Name</label>
                    <input type="text" class="form-control" value="{{ $data->name }}" name="name"><br>
                </div>
                <div class="form-box">
                    <label for="post_title">Email </label>
                    <input type="text" class="form-control" value="{{$data->email}}"  name="email"><br>
                </div>
                <div class="form-box">
                    <label for="post_title">Mobile Number </label>
                    <input type="text" class="form-control" name="phone_no" value="{{$data->phone_no}}"><br>
                </div>
                <div class="form-box">

                    <label for="post_title">BirthDay </label>
                    <input type="text" class="form-control" name="birthday" value="{{ $data->birthday }}" ><br>

                 </div>
                <div class="form-box">
                    <label>Nationality <font color="red" size="5"></font> </label><br><br>
                    <label>Contry :  &nbsp; &nbsp;</label> <input type="text" name="contry" id="txt_state" value="{{$data->contry}}" placeholder="&nbsp;&nbsp;Enter your state"> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                    <label>State :  &nbsp; &nbsp;</label> <input type="text" name="state" id="txt_state" value="{{$data->state}}" placeholder="&nbsp;&nbsp;Enter your state"> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                    <label>City :  &nbsp; &nbsp;</label> <input type="text" name="city" id="txt_city" value="{{$data->city}}" placeholder="&nbsp;&nbsp;Enter your city"> </br>
                </div><br>

                <div class="form-box">
                    <script src="{{ asset('jquery-birthday-picker.min.js') }}"></script>
                    <div class="" id="demo">


                    </div>
                    <script type="text/javascript">
                        $("#demo").birthdayPicker({
                        maxAge: 100,
                        minAge: 0,
                        maxYear: r,
                        <a href="https://www.jqueryscript.net/time-clock/">date</a>Format: "middleEndian",
                        monthFormat: "number",
                        placeholder: true,
                        defaultDate: false,
                        sizeClass: "span2"
});
                    </script>

                </div><br>
                <div class="form-box">
                    <label for="post_title">Marital Status :</label>

                        <input type="radio" id="marital_status" name="marital_status" value="0" {{ $data->marital_status == '0' ? 'checked' : '' }} ><label for="marital_status">Single</label>

                        <input type="radio" id="marital_status1" name="marital_status" value="1" {{ $data->marital_status == '1' ? 'checked' : '' }} ><label for="marital_status1">Married</label>

                </div>
                <br>
                <div class="form-box">
                    <label>Gender &nbsp; : &nbsp;&nbsp;&nbsp;&nbsp;</label>
                    <input type="radio" id="gender" name="gender" value="1" {{$data->gender == '1' ? 'checked' : ''}} ><label for="gender">Female</label>
                    <input type="radio" id="gender1" name="gender" value="0"{{$data->gender == '0' ? 'checked' : ''}} ><label for="gender1">Male</label>
                </div>

                <br>
                <div class="form-box">
                    <label for="box">Select User Type </label>
                    <select  class="select2 form-control"  name="type_id">
                        @foreach($users as $user)
                            @if($user->id == $data->type_id)
                                <option value="{{ $user->id }}" selected >{{ $user->name }}</option>
                            @else
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endif
                        @endforeach
                    </select>
                </div><br><br>
                <button type="submit" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i>
                    Update Profile</button>

                </form><br><br><br>
        </div>
    </section>
</section>
</div>


@endsection
