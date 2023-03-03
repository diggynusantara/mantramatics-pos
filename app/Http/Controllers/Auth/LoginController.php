<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        // $this->middleware('auth');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'username' => 'required|min:4',
            'password' => 'required|string|min:6'
        ]);

        if (auth()->attempt([
                'username' => $request->username,
                'password' => $request->password,
                'status'   => 1
            ])) {

            return redirect()->intended('home');
        }

        return redirect()->back()->with('danger', 'Password Invalid or Inactive Users !');
    }
}
