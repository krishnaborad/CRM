<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\upload;
use App\Comment;
class admincommentsController extends Controller
{
    public function index()
    {
        $img = upload::all();
        $comments = Comment::all();
        return view('admin.comments',compact('comments'));
    }
    public function store(Request $request, $id)
    {
                $comment = new Comment;
                if (Auth::user())
                {
                    $comment->user_id = Auth::user()->id;
                    $comment->name = Auth::user()->name;
                    $comment->email = Auth::user()->email;

                }
                else
                {
                    $comment->name = $request->input('name');
                    $comment->email = $request->input('email');
                }
                $comment->comment = $request->input('comment');
                $comment->upload_id = $request->input('upload_id');
                $comment->save();
                return redirect('comment/'.$id);
    }
    public function delete($id)
    {
        $comments = Comment::find($id);
        $comments->delete();
        return redirect('admin/comments');
    }
}
