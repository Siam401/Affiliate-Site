<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use DB;
use Illuminate\Contracts\Session\Session as SessionSession;

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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function logged_in(Request $request)
    {
        $user = DB::table('users')->where('email', $request->email)
            ->where('password', $request->password)
            ->first();
        // dd($user);

        if ($user == null) {
            return redirect('/login');
        } else {
            Session::put('name', $user->name);
            Session::put('email', $user->email);
            Session::put('password', $user->password);
            Session::put('role', $user->role);
            Session::put('affiliate_id', $user->affiliate_id);

            return redirect('/dashboard');
        }
    }

    protected function logout(Request $request)
    {
        $request->session()->flush();
        return redirect('/');
    }
}
