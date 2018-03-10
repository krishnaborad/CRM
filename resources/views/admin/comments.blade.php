@extends('admin.layouts.adminapp')
@section('content')<section class="box-body">
    @if(Session::has('flash_message'))
        <div class="alert alert-warning alert-dismissible"><span class="glyphicon glyphicon-ok"></span>
            <em> {!! session('flash_message') !!}</em>
        </div>
    @endif
    <h2>Comments  <a class="btn btn-success pull-right" href="{{ URL::previous() }}">Go Back</a></h2>
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
                                 @foreach($comments as $comment)
                                     <font color="#3C8DBC" size="5" >{{ $comment->name }}</font><br>
                                     <font color="black" size="3" >{{ $comment->comment }}</font><br>
                                     <font color="#555555" size="3" >{{ $comment->email }}</font>----------------{{ $comment->created_at }}

                                     <a id="delete-button" href="{{ url('admin/comments/delete/' . $comment->id) }}" class="btn btn-danger waves-effect waves-light deleteText pull-right"> <i class="glyphicon glyphicon-trash"></i> Delete</a>
                                     <br><br>
                                 @endforeach
                             </form><br><br><br>
                        </div>
            </section>
        </section>
</div>

@endsection
