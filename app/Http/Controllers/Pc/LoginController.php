<?php
namespace App\Http\Controllers\Pc;

use App\Http\Controllers\Controller;
use App\Services\UserService;
use App\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Validator;

class LoginController extends Controller
{
    protected $guard = 'api';
    protected $username = 'username';

    /**
     * 用户注册
     *
     * @param Request $request
     * @return
     */
    public function register (Request $request, UserService $userService) {
        if($request->method() == 'GET') {
            return view('pc.login.register');
        }

        $validator = Validator::make($request->all(), [
            'captcha' => 'required|captcha',
        ], [
            'captcha.required'  => '图形验证码必填',
            'captcha.captcha'   => '图形验证码错误',
        ]);

        if ($validator->fails()) {
            return output_error($validator->errors()->first());
        }

        $userService->register($request);
    }


    /**
     * 检测会员的{会员名 / 邮箱 / 手机号}是否存在
     *
     * @return string
     */
    public function registerCheck () {
        $type = trim(request('type', ''));
        $value = trim(request('value', ''));
        $notId = trim(request('notId', ''));

        $model = new User;
        if(!empty($notId)){
            $model = $model->where('user_id', '<>', $notId);
        }

        if($type == 'username'){
            $rs = $model->where('username', $value)->first();
        }else if($type == 'phone'){
            $rs = $model->where('phone', $value)->orWhere('username', $value)->first();
        }else if($type == 'email'){
            $rs = $model->where('email', $value)->first();
        }

        echo $rs ? 'false' : 'true';
    }

    /**
     * 登陆
     *
     * @param Request $request
     * @return array|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function login(Request $request) {
        if($request->method() == 'GET') {
            return view('pc.login.login');
        }

        // 验证登陆
        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'password' => 'required',
            'captcha'  => 'required|captcha',
        ], [
            'username.required' => '用户名必填!',
            'password.required' => '密码必填!',
            'captcha.required' => '图形验证码必填!',
            'captcha.captcha'  => '图形验证码错误!'
        ]);

        if ($validator->fails()) {
            return output_error($validator->errors()->first());
        }

        $username = $request->get('username', '');
        $password = $request->get('password', '');
        $loginType = 'username';
        if(isMobile($username)) {
            $loginType = 'phone';
        }elseif(isEmail($username)){
            $loginType = 'email';
        }

        // 这里改用 JWT-Auth 进行认证
        if ($token = Auth::guard($this->guard)->attempt([ $loginType => $username, 'password' => $password ])) {
            setcookie('userToken', 'Bearer '.$token, time()+60*60*24*14, '/');
            return output_success('login Success');
        }

        return output_error('用户名密码错误');
    }

    public function findPassword(Request $request) {
        if($request->method() == 'GET') {
            return view('pc.login.findPassword');
        }

    }
}