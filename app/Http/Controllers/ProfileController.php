<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class ProfileController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
     $users = User::where('id', Auth::id())->get();
     return view('profile.index', compact('users'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
      // return view('users.create');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    //
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    // echo $id;
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    $user = User::findOrFail($id);
    return view('profile.edit', compact('user'));
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
       ]);

       $user = User::findOrFail($id);
       $user->name = $request->get('name');
       $user->email = $request->get('email');
       $user->password = bcrypt($request->get('password'));
       $user->save();
       return redirect('/profile')->with('success', 'Profile updated!');
   }
    //
    // $user=User::find($id);
    // $user->name = $request->get('name');
    // $user->email = $request->get('email');
    // $user->password = bcrypt($request->get('password'));
    // $user->save();
    //
    // return redirect('/users')->with('success', 'User has been updated');
    // }

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

    return redirect('/')->with('success', 'User has been deleted Successfully');
  }

}
