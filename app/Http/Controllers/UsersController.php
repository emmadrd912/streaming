<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use DB;

class UsersController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $users = User::all();
    return view('users.index', compact('users'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $roles = Role::all();
    return view('users.create', compact('roles'));
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $request->validate([
         'name'=>'required',
         'email'=> 'required|string',
         'password' => 'required|string',
       ]);
       $user = new User([
         'name' => $request->get('name'),
         'email'=> $request->get('email'),
         'password'=> bcrypt($request->get('password')),
       ]);
       $user->assignRole($request->get('roles'));
       $user->save();
       return redirect('/users')->with('success', 'User has been added');
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    // return view('users.profile', ['user' => User::findOrFail($id)]);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    $user = User::find($id);
    $roles = Role::all();
    return view('users.edit', compact('user', 'roles'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
    $request->validate([
      'name'=>'required',
      'email'=> 'required|string',
      'password' => 'required|string',
      'roles' => 'required'
    ]);
    $user=User::find($id);
    $user->name = $request->get('name');
    $user->email = $request->get('email');
    $user->password = bcrypt($request->get('password'));
    DB::table('model_has_roles')->where('model_id',$id)->delete();
    $user->assignRole($request->get('roles'));
    $user->save();

    return redirect('/users')->with('success', 'User has been updated');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    $user = User::find($id);
    $user->delete();

    return redirect('/users')->with('success', 'User has been deleted Successfully');
  }
}
