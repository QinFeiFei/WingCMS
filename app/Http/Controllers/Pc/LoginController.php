<?php
namespace App\Http\Controllers\Pc;

use App\Http\Controllers\Controller;
use App\Services\UserService;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Validator;

class LoginController extends Controller
{
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

        $result = $userService->register($request->all());
        if( $result['code'] == 0 ){
            // PC端注册成功后，登陆用户
            $loginResult = $userService->login($request->all());

            if($loginResult['code'] == 0){
                setcookie('userToken', 'Bearer '.$loginResult['result'], time()+60*60*24*14, '/');
                return output_success('login success');
            }else{
                return $loginResult;
            }
        }else{
            return $result;
        }
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
        $model = $model->withTrashed();
        if(!empty($notId)){
            $model = $model->where('user_id', '<>', $notId);
        }

        if($type == 'username'){
            $rs = $model->where('username', $value)->first();
        }else if($type == 'phone'){
            $rs = $model->where('phone', $value)->orWhere('username', $value)->first();
        }else if($type == 'email'){
            $rs = $model->where('email', $value)->first();
        }else if($type == 'remail'){
            $rs = $model->where('email', $value)->first();
            $rs = $rs ? false : true;
        }

        echo $rs ? 'false' : 'true';
    }


    /**
     * 登陆
     *
     * @param Request $request
     * @return array|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function login(Request $request, UserService $userService) {
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

        $result = $userService->login($request->all());

        if($result['code'] == 0){
            setcookie('userToken', 'Bearer '.$result['result'], time()+60*60*24*14, '/');
            return output_success('login success');
        }else{
            return $result;
        }
    }


    /**
     * 注销
     *
     */
    public function logout (){
        auth('api')->logout();
        setcookie('userToken', '', time() - 3600);
    }


    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function findPassword(Request $request) {
        if($request->method() == 'GET') {
            return view('pc.login.findPassword');
        }


        $validator = Validator::make($request->all(), [
            'mail' => 'required|email|exists:user,email',
            'yzmcode' => 'required|captcha',
        ], [
            'mail.required' => '邮箱必填',
            'mail.email' => '邮箱格式错误',
            'email.exists' => '邮箱不存在',
            'yzmcode.required'  => '图形验证码必填',
            'yzmcode.captcha'   => '图形验证码错误',
        ]);

        if ($validator->fails()) {
            return back()->with('error', $validator->errors()->first());
        }


    }


    /**
     * 注册 - 服务协议
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function reg_licence () {
        return view('pc.login.licence');
    }


    /**
     * 注册 - 隐私声明
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function reg_declare () {
        return view('pc.login.declare');
    }
}