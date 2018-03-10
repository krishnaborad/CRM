<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\profiles;
class settingsController extends Controller
{
    public function index()
    {
        $photo = profiles::all();
        return view('admin.settings.general' ,compact('photo'));
    }
    public function control_index()
    {
        return view('admin.settings.controls');
    }
    public function store(Request $request)
    {
        if(isset($request->image))
        {
            foreach($request->image as $file)
            {
                $images = new profiles;
                $filename = $file->getClientOriginalName();
                $extension = $file->getClientOriginalExtension();
                $size = $file->getClientSize();
                $path = "images/".$filename;

                $file->move(public_path('images'),$filename);
                $images->path = $path;
                $images->save();
            }
        }

        \Session::flash('flash_message','profile picture updated successfully.');
        return redirect('admin/general');
    }
}
