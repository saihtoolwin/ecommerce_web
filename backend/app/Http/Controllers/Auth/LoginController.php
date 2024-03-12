<?php

namespace App\Http\Controllers\Auth;

use App\Events\AutoLogoutEvent;
use App\Events\LoginEvent;
use App\Events\LogoutEvent;
use Session;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
class LoginController extends Controller
{
 
    use AuthenticatesUsers;

  
    protected $redirectTo = '/home';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function authenticated(Request $request, $user)
    {
        event(new LoginEvent($user->id,$user->name , $user->email ,null));
    }
    
    public function logout(Request $request)
    {
        $user = auth()->user();
        // dd($user);
        if ($user) {
            event(new LogoutEvent($user->id, Session::get('loginId')));
        }

        $this->guard()->logout();
        $request->session()->invalidate();

        $sessionLifetimeMinutes = config('session.lifetime');


        if ($sessionLifetimeMinutes) {
            event(new AutoLogoutEvent($user->id, Session::get('loginId')));
        }else
        {
            dd("Error");
        }

        return $this->loggedOut($request) ?: redirect('/');
    }
}
