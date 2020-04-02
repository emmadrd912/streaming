<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use DB;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    // public function checksub() {
    //   if (Auth::user()->subscribed('default')) {
    //     DB::table('model_has_roles')->where('model_id',Auth::id())->delete();
    //     auth()->user()->assignRole('Premium');
    //   } else {
    //     DB::table('model_has_roles')->where('model_id',Auth::id())->delete();
    //     auth()->user()->assignRole('Free');
    //   }
    // }

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = RouteServiceProvider::CATALOG;
    protected function redirectTo( ) {
      // $this->checksub();
      if (Auth::check() && Auth::user()->isFree()) {
          return('/catalogfree');
      } else {
          return('/catalog');
      }
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => ['logout', 'getLogout']]);
    }
}
