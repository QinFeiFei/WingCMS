<?php
namespace App\Http\Controllers\Pc;

use App\Events\PassWordUpdateEvent;
use App\Http\Controllers\Controller;
use App\MsgCodeRecord;
use App\Services\Message\Message;
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
     * @return mixed
     */
    public function register (Request $request, UserService $userService) {
        if($request->method() == 'GET') {
            return view('pc.login.register');
        }

        request()->offsetSet('register_type', $request->get('pc'));
        if($request->get('type') == 'username'){
            return $this->usernameRegister($request, $userService);
        }else if ($request->get('type') == 'email'){
            return $this->emailRegister($request, $userService);
        }else{
            return output_error('注册失败');
        }
    }


    /**
     * 使用用户名注册
     *
     * @param $request
     * @param $userService
     * @return array
     */
    private function usernameRegister ($request, $userService) {
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
     * 使用邮箱注册
     *
     * @param $request
     * @param $userService
     * @return array
     */
    private function emailRegister ($request, $userService) {
        $validator = Validator::make($request->all(), [
            'code' => 'required|msgcode:email,register,'.request()->get('code').','.request()->get('email'),
            'captcha' => 'required|captcha',
        ], [
            'code.required' => '邮箱验证码必填',
            'code.msgcode' => '邮箱验证码错误',
            'captcha.required'  => '图形验证码必填',
            'captcha.captcha'   => '图形验证码错误',
        ]);

        if ($validator->fails()) {
            return output_error($validator->errors()->first());
        }

        // 通过邮箱注册的用户，将用户名设置为邮箱
        request()->offsetSet('username', $request->get('email'));
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
     * 找回密码第一步
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function findPassword(Request $request) {
        if($request->method() == 'GET') {
            return view('pc.login.findPassword');
        }


        $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:user,email',
            'yzmcode' => 'required|captcha',
        ], [
            'email.required' => '邮箱必填',
            'email.email' => '邮箱格式错误',
            'email.exists' => '邮箱不存在',
            'yzmcode.required'  => '图形验证码必填',
            'yzmcode.captcha'   => '图形验证码错误',
        ]);

        if ($validator->fails()) {
            return back()->with('error', $validator->errors()->first());
        }

        return redirect()->route('pc::setPassword', ['type' => 'email', 'email' => request('email', '')]);
    }


    /**
     * 重置密码(找回密码第二步)
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function setPassWord (Request $request) {
        // show view
        if($request->method() == 'GET') {
            $validator = Validator::make($request->all(), [
                'type' => 'required|in:email,phone',
                'email' => 'email|exists:user,email',
                'phone' => 'mobile|exists:user,phone'
            ]);
            if ($validator->fails()) {
                redirect()->route('pc::error404');
            }

            return view('pc.login.setPassword');
        }


        // POST
        $code = request('code', '');
        $send_type = request('send_type', '');
        $send_from = request('send_form', '');
        $user = User::where($send_type, $send_from)->first();

        $validator = Validator::make($request->all(), [
            'code' => 'msgcode:email,findPassword,'.$code.','.$user->email,
            'send_type' => 'required|in:email,phone',
            'password' => 'required|between:5,30',
        ], [
            'send_type.required' => '数据异常!',
            'send_type.in' => '数据异常',
            'password.required' => '密码必填',
            'password.between' => '密码必须大于5位小于30位',
        ]);
        if ($validator->fails()) {
            return output_error($validator->errors()->first());
        }

        $userService = new UserService();
        if($userService->setPassword($user, request()->get('password'))){
            // 将验证码设置为已验证
            $message = new Message('findPassword', $send_from);
            $message->setCodeVerify($code, $send_type, $send_from);

            return output_success('重置密码成功!');
        }else{
            return output_error('重置密码失败!');
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