<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\upload;
use App\Comment;
use Auth;
class commentController extends Controller
{
    public function index($id)
    {
        $images = upload::find($id);
        $comments = Comment::all();
        return view('comment',compact('comments','images'));
    }
    public function store(Request $request, $id)
    {

                $this->validate($request, [

               'name'=>'required',
               'email'=>'required|email|unique:users,email',
               'comment'=>'required',
                ]);

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
            
                $comment->save();

                return redirect('comment/'.$id);
    }
}
