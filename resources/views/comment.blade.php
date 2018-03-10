@extends('layouts.app')
@section('content')

<form action="" method="post">
                {{ csrf_field() }}
                <div class="box-body">
                    <div class="comment">
                        <h4>Comments</h4><hr>
                        @guest
                        <div class="form-group">

                            <label for="name">Name</label>
                            <input type="text" class="form-control" name="name"placeholder="Enter your name">
                        </div>
                            <label for="email">E-mail</label>
                            <input  id="emailAddress" type="email" class="form-control" name="email" placeholder="Enter your email"><br>
                        @else
                            hello    ... {{ Auth::user()->name }}
                        @endguest

                        <textarea class="form-control" name="comment" placeholder="Comment here..."></textarea><br>
                        <button type="submit" class="btn btn-primary" name="add_comment">Add Comment</button>
                    </div>
                </div>
            </form>

            <div class="box-body">
                <div class="form-group">
                @foreach($comments as $comment)
                    <div class="col-sm-1">
                        <div class="thumbnail">
                            <img class="img-responsive user-photo" src="https://ssl.gstatic.com/accounts/ui/avatar_2x.png">
                        </div><!-- /thumbnail -->
                    </div><!-- /col-sm-1 -->
                    <div class="col-sm-5 ">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <strong>{{ $comment->name }}</strong> <span class="text-muted pull-right">{{ $comment->created_at }}</span>
                            </div>

                            <div class="panel-body">
                                {{ $comment->comment }} <br>
                                <div class="pull-right">
                                    {{ $comment->email }}
                                </div>
                            </div><!-- /panel-body -->
                        </div><!-- /panel panel-default -->
                    </div>

                @endforeach

                </div>
            </div>

@endsection
