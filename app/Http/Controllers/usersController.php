<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Illuminate\Support\Facades\Input;
use App\users;
use App\guest;
use App\relation;
use DB;
class usersController extends Controller
{
    public function index()
    {
        $user = users::all();

        $relations = relation::all();
        return view('admin.users.index' ,compact('user','relations'));

    }
    public function create()
    {
        $users = guest::all();
        $relations = relation::all();
        return view('admin.users.create', compact('users','relations'));
    }
    public function store(Request $request)
    {

        $this->validate($request, [

       'name'=>'required',
       'email'=>'required|email|unique:users,email',
       'phone_no'=>'required|min:10|numeric',
       'birthday'=>'required::d/m/Y',
       'type_id'=>'required',
       'contry'=>'required',
       'state'=>'required',
       'city'=>'required',
       'gender'=>'required',


        ]);

        $data = new users;

        $data->name = $request->input('name');
        $data->email = $request->input('email');
        $data->phone_no = $request->input('phone_no');
        $data->birthday = $request->input('birthday');
        $data->contry = $request->input('contry');
        $data->state = $request->input('state');
        $data->city = $request->input('city');
        $data->marital_status = (!empty($request->input('marital_status'))) ? $request->input('marital_status'):"0";
        $data->gender = (!empty($request->input('gender'))) ? $request->input('gender'):"0";
        $data->type_id = $request->input('type_id');
        $data->save();



        \Session::flash('flash_message','user successfully saved.');
        return redirect('admin/users');
    }
    public function edit($id)
    {
        $data = users::find($id);
        $users = guest::all();
        return view('admin.users.edit', compact('data','users'));
    }
    public function update(Request $request ,$id)
    {
        $data = users::find($id);
        $data->name = $request->input('name');
        $data->email = $request->input('email');
        $data->phone_no = $request->input('phone_no');
        $data->birthday = $request->input('birthday');
        $data->contry = $request->input('contry');
        $data->state = $request->input('state');
        $data->city = $request->input('city');
        $data->marital_status = (!empty($request->input('marital_status'))) ? $request->input('marital_status'):"0";
        $data->gender = (!empty($request->input('gender'))) ? $request->input('gender'):"0";
        $data->type_id = $request->input('type_id');
        $data->save();

        \Session::flash('flash_message','successfully Updated.');
        return redirect('admin/users');

    }
    public function show($id)
    {
        $data = users::find($id);
        $users = guest::all();
        $relations = relation ::find($id);
        return view('admin.users.show', compact('data','users','relation'));
    }

    public function family_index($id)
    {
        $data = users::find($id);
        return view('admin.users.user_family', compact('data'));
    }
    public function family_add()
    {
        $users = guest::all();
        return view('admin.users.add', compact('users','relation'));
    }
    public function family_store(Request $request, $id)
    {

         $this->validate($request, [
         'name'=>'required',
         'relation'=>'required',
         'phone'=>'required',
         'birthday'=>'required',


     ]);
        $data = users::find($id);

        $relations = new relation;
        $relations->name = $request->input('name');
        $relations->relation = $request->input('relation');
        $relations->phone = $request->input('phone');
        $relations->birthday = $request->input('birthday');
        $relations->user_id = $data->id;
        $relations->save();

        \Session::flash('flash_message','successfully Updated.');
        return redirect('admin/user/user_family/'.$id);
    }
    public function delete($id)
    {
        $data = users::find($id);
        $data->delete();
        return redirect('admin/users');
    }
    public function relation_delete($id)
    {
        $relations = relation::find($id);
        $relations->delete();
        return redirect('admin/users');
    }

}
