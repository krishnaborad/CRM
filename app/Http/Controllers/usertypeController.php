<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\guest;
use App\users;
class usertypeController extends Controller
{
    public function index()
    {
        $users = guest::all();
        return view('admin.type_users.index' ,compact('users'));
    }
    public function create()
    {
        return view('admin.type_users.create');
    }
    public function store(Request $request)
    {
        $this->validate($request, [
        'name'=>'required',


    ]);

        $user = new guest;
        $user->name = $request->input('name');

        $user->save();
        \Session::flash('flash_message','successfully saved.');
        return redirect('admin/type_users');
    }

    public function delete($id)
    {
        $user= guest::find($id);
        $user->delete();
        return redirect('admin/type_users');
    }


}
