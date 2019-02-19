<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;

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

    use AuthenticatesUsers {
        logout as performLogout;
    }

    public function logout(Request $request)
    {
        if (Auth::user()->type == "Orang tua") {
            $this->performLogout($request);
            return redirect()->route('orangtua.login');
        } else if(Auth::user()->type == "Siswa") {
            $this->performLogout($request);
            return redirect()->route('siswa.login');
        } else {
            $this->performLogout($request);
            return redirect()->route('admin.login');
        }

    }
    /**
     * Where to redirect users after login.
     *
     * @var string
     */

     // habis admin login, dia akan masuk ke sini
    // protected $redirectTo = 'admin/dashboard';
    protected function authenticated(Request $request, $user)
    {
        if ($user->type == 'Admin'){
            return redirect()->route('admin.dashboard');
        }
        else if ($user->type == 'Orang tua'){
            return redirect()->route('orangtua.dashboard');
        }
        else if ($user->type == 'Siswa'){
            return redirect()->route('student.index');
        }
    }

   //  public function username()
   // {
   //     $identity  = request()->get('identity');
   //     $fieldName = filter_var($identity, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
   //     request()->merge([$fieldName => $identity]);
   //     return $fieldName;
   // }


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        // $this->username = $this->findUsername();
    }

    // public function findUsername()
    // {
    //     $login = request()->input('login');
    //     $fieldType = filter_var($login, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
    //     request()->merge([$fieldType => $login]);
    //     return $fieldType;
    // }

    /**
     * Get username property.
     *
     * @return string
     */
    // public function username()
    // {
    //     return $this->username;
    // }
}
