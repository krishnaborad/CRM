@extends('layouts.app')

@section('content')
@if(Session::has('flash_message'))
<div class="alert alert-warning alert-dismissible"><span class="glyphicon glyphicon-ok"></span>
    <em> {!! session('flash_message') !!}</em>
</div>
@endif
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default" id="example2">

                <div class="panel-heading"><b>Create New Account</b></div>

                <div class="box-body" >
                    <form class="form-horizontal" method="POST" action="">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Enter Your Name"><br>

                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email" class="col-md-4 control-label">Email</label>

                            <div class="col-md-6">
                                    <input type="text" class="form-control" name="email" value="{{ old('email') }}" placeholder="Enter Your Email"><br>

                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('phone_no') ? ' has-error' : '' }}">
                            <label for="phone_no" class="col-md-4 control-label">Mobile Number</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="phone_no" value="{{ old('phone_no') }}" placeholder="Enter Your Mobile Number"><br>
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Nationality</label>

                            <div class="col-md-6">
                                <label>Contry&nbsp;:</label> <input type="text" class="{{ $errors->has('contry') ? ' has-error' : 'enter' }} "name="contry" value="{{ old('contry') }}"id="txt_state"  placeholder="Enter your Contry"><br>

                                <label>State&nbsp;&nbsp;&nbsp;:</label> <input type="text" name="state" class="{{ $errors->has('state') ? ' has-error' : 'enter' }}" value="{{ old('state') }}" id="txt_state"  placeholder="Enter your State"><br>

                                <label>City&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</label> <input type="text" name="city" class="{{ $errors->has('city') ? ' has-error' : 'enter' }}" value="{{ old('city') }}" id="txt_city"  placeholder="Enter your City"> </br>
                            </div>
                        </div><br>

                        <div class="form-group{{ $errors->has('gender') ? ' has-error' : '' }}">
                            <label for="phone_no" class="col-md-4 control-label">Gender</label>

                            <div class="col-md-6">
                                <input type="radio" id="gender" name="gender" value="1" @if(old('gender') ==  1)  @endif />Female
                                <input type="radio" id="gender" name="gender" value="0" @if(old('gender') ==  0)  @endif />Male
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('gender') ? ' has-error' : '' }}">
                            <label for="marital_status" class="col-md-4 control-label">marital status</label>

                            <div class="col-md-6">
                                <input type="radio"  value="{{ old('marital_status') }}"id="marital_status" name="marital_status" value="0" @if(old('marital_status') ==  0)  @endif />single
                                <input type="radio" id="marital_status" value="{{ old('marital_status') }}" name="marital_status" value="1" @if(old('marital_status') ==  1)  @endif />married

                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('gender') ? ' has-error' : '' }}">
                            <label for="marital_status" class="col-md-4 control-label">marital status</label>

                            <div class="col-md-6">
                                <select  class="select2 form-control"  name="type_id">
                                @foreach($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>

                                @endforeach
                                </select>

                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-info">
                                    Submit
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
