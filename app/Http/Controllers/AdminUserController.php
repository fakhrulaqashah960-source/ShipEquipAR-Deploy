<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;


class AdminUserController extends Controller
{


public function index()
{

$users = User::all();


return view('admin.users.index',
compact('users'));

}


public function edit($id)
{
    $user = User::findOrFail($id);

    return view(
        'admin.users.edit',
        compact('user')
    );
}


public function update(Request $request,$id)
{


$user = User::findOrFail($id);



$user->update([

'name'=>$request->name,

'email'=>$request->email,

'role'=>$request->role

]);



return redirect()
    ->route('admin.users.index')
    ->with('success','User updated successfully');

}





public function destroy($id)
{
    $user = User::findOrFail($id);

    $user->delete();

    return redirect()
        ->route('admin.users.index')
        ->with('success','User deleted successfully');
}

public function create()
{
    return view('admin.users.create');
}

public function store(Request $request)
{

    $request->validate([
        'name'=>'required',
        'email'=>'required|email|unique:users',
        'password'=>'required|min:8',
        'role'=>'required'
    ]);


    User::create([

        'name'=>$request->name,

        'email'=>$request->email,

        'password'=>bcrypt($request->password),

        'role'=>$request->role

    ]);


    return redirect()
        ->route('admin.users.index');

}

}