<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    use AuthenticatesUsers, ThrottlesLogins;

    protected $guard = 'admin';
    protected $username = 'admin_name';

    public function login (Request $request) {
        dd($request->all());


        $this->validateLogin($request);

        if ($lockedOut = $this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        $credentials = $request->only('admin_name', 'password');

        // 这里改用 JWT-Auth 进行认证
        if ($token = Auth::guard($this->guard)->attempt($credentials)) {
            return response()->json(compact('token'));
        }

        if ($lockedOut) {
            $this->incrementLoginAttempts($request);
        }

        return $this->sendFailedLoginResponse($request);
    }



    public function logout () {

    }
}
