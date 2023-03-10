<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


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
    protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required',
        ]);

        $login_type = filter_var($request->input('username'), FILTER_VALIDATE_EMAIL )
        ? 'email'
        : 'username';

        $request->merge([
            $login_type => $request->input('username')
        ]);

        if (Auth::attempt($request->only($login_type, 'password'))) {
            
            activity("user")->log("User login");
            return redirect()->intended(Auth::user()->isAdmin() ? '/admin/dashboard' : '/dashboard');
        }

        return redirect()->back()
        ->withInput()
        ->withErrors([
            'username' => 'These credentials do not match our records.',
        ]);
    }

    public function logout(Request $request)
    {
        activity("user")->log("User logout");
        Auth::logout();
        return redirect("/");
    }

    public function username(){
        return "username";
    }

    protected function authenticated(Request $request, $user)
    {
        if($user->isAdmin()){
            return redirect('admin/dashboard');
        }else{
            return redirect('/dashboard');
        }
    }
}
