@extends('admin.layouts.adminapp')
@section('content')

<section class="box-body">

    @if(Session::has('flash_message'))
        <div class="alert alert-warning alert-dismissible"><span class="glyphicon glyphicon-ok"></span>
            <em> {!! session('flash_message') !!}</em>
        </div>
    @endif

    <h2>Timeline<a class="btn btn-success pull-right" href="{{ URL::previous() }}">Go Back</a></h2>

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

                      @if (count($errors) > 0)
                          <div class="alert alert-danger">
                              <strong>Whoops!</strong> There were some problems with your input.<br><br>
                              <ul>
                                  @foreach ($errors->all() as $error)
                                      <li>{{ $error }}</li>
                                  @endforeach
                              </ul>
                          </div>
                      @endif

              <div class="box-body">

                  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
                  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">


              		@if ($message = Session::get('success'))
              		<div class="alert alert-success alert-block">
              			<button type="button" class="close" data-dismiss="alert">×</button>
              		        <strong>{{ $message }}</strong>
              		</div>
              		<img src="/images/{{ Session::get('path') }}">
              		@endif

                <center>

          		<form enctype="multipart/form-data" method="POST">
          			{{ csrf_field() }}
          			<div class="row">
          				<div class="form-group">
                            <label for="image">Select Image</label><input id="image" type="file" name="image[]"/>
          				</div><br>
                        <div class="form-group">
                               <label for="details">Details</label>
                               <textarea id="details" class="form-control" name="details" placeholder="Enter Article Details....."></textarea>
                           </div>

          				<div class="form-group">
                            <br>
          					<button type="submit" class="btn btn-success">Upload</button>
          				</div>
          			</div>
          		</form>
                <br><br><br>
                <h2>Timeline Article Upload</h2><hr>
                    <table class="table table-bordered table-striped ">
                       @foreach($img as $image)
                                <div class="item">
                                    <!-- fancybox start -->
                                       <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
                                       <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
                                       <script src="http://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
                                       <a class="fancybox" rel="ligthbox" href="{{asset($image->image)}}">

                                      <img src="{{asset($image->image)}}" class="img-responsive" width="200px" alt="" />
                                                               <script type="text/javascript">
                                                               	$(document).ready(function() {
                                                               		$(".fancybox").fancybox();
                                                               	});
                                                               </script>
                                     </a>
                                    <!-- fancybox End -->
                                </div>

                                <div class="tab">
                                        {{$image->details}}
                                </div>
                                <br><br>

                                        <a id="delete-button" href="{{ url('admin/upload/delete/' . $image->id) }}" class="btn btn-danger"> <i class="glyphicon glyphicon-trash"></i> Delete</a>
                                        <br>
                          </tr><br><br>
                          @endforeach

                    </table>
                 <br><br><br>
              </div>
          </section>
      </section>
</div>

@endsection
