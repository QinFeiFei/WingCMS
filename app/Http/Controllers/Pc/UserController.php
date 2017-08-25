<?php

namespace App\Http\Controllers\Pc;

use App\Services\Message\Message;
use App\Services\UserService;
use App\User;
use Exception;
use Hash;
use Request;
use Validator;

class UserController extends PcController
{
    /**
     * 用户首页
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index () {
        return view('pc.user.index');
    }


    /**
     * 用户基本资料修改
     *
     * @return mixed
     */
    public function editInfo () {
        if(request()->method() == 'GET'){
            return view('pc.user.editInfo')->with(['user' => $this->getUser()]);
        }

        $validator = Validator::make(request()->all(), [
            'qq' => 'integer'
        ], [
            'qq.integer' => 'QQ号格式错误!'
        ]);
        if ($validator->fails()) {
            return output_error($validator->errors()->first());
        }

        try {
            $user = $this->getUser();
            User::where('user_id', $user->user_id)->update([
                'real_name' => request()->get('real_name'),
                'real_sex' => request()->get('real_sex'),
                'real_birthday' => request()->get('real_birthday'),
                'qq' => request()->get('qq'),
                'real_area' => request()->get('real_area')
            ]);

            return output_success('更新成功');
        }catch(Exception $e){
            return output_error('更新失败');
        }
    }


    /**
     * 修改密码
     *
     * @return mixed
     */
    public function editPassword () {
        if(request()->method() == 'GET'){
            return view('pc.user.editPassword');
        }

        $validator = Validator::make(request()->all(), [
            'code' => 'required|msgcode:email,modPassword,'.request()->get('code').','.$this->getUser()->email,
            'password' => 'required|between:5,30',
        ], [
            'code.required' => '验证码必填',
            'code.msgcode' => '验证码错误!',
            'password.required' => '密码必填',
            'password.between' => '密码必须大于5位小于30位',
        ]);
        if ($validator->fails()) {
            return back()->with('error', $validator->errors()->first());
        }

        $userService = new UserService();
        $user = User::find($this->getUser()->user_id);
        if($userService->setPassword($user, request()->get('password'))){
            // 将验证码设置为已验证
            $message = new Message('modPassword', $this->getUser()->email);
            $message->setCodeVerify(request()->get('code'), 'email', $this->getUser()->email);

            return back()->with('success', '密码修改成功');
        }else{
            return back()->with('error', '密码修改失败');
        }
    }


    /**
     * 绑定手机
     *
     * @return mixed
     */
    public function bindPhone () {
        if(request()->method() == 'GET'){
            return view('pc.user.bindPhone');
        }

        $validator = Validator::make(request()->all(), [
            'code' => 'msgcode:email,modPassword,'.request()->get('code').','.$this->getUser()->email,
            'password' => 'required|between:5,30',
        ], [
            'code.msgcode' => '验证码错误!',
            'password.required' => '密码必填',
            'password.between' => '密码必须大于5位小于30位',
        ]);
        if ($validator->fails()) {
            return back()->with('error', $validator->errors()->first());
        }

        $userService = new UserService();
        $user = User::find($this->getUser()->user_id);
        if($userService->setPassword($user, request()->get('password'))){
            // 将验证码设置为已验证
            $message = new Message('modPassword', $this->getUser()->email);
            $message->setCodeVerify(request()->get('code'), 'email', $this->getUser()->email);

            return back()->with('success', '密码修改成功');
        }else{
            return back()->with('error', '密码修改失败');
        }
    }


    /**
     * 绑定邮箱
     *
     * @return mixed
     */
    public function bindEmail () {
        if(request()->method() == 'GET'){
            $blade = empty($this->getUser()->email) ? 'pc.user.bindEmail' : 'pc.user.rebindEmail';
            return view($blade);
        }

        $validator = Validator::make(request()->all(), [
            'code' => 'required|msgcode:email,bindEmail,'.request()->get('code').','.request()->get('email'),
            'email' => 'required|email|unique:user,email'
        ], [
            'code.required' => '验证码必填',
            'code.msgcode' => '验证码错误!',
            'email.required' => '邮箱必填',
            'email.email' => '邮箱格式错误',
            'email.unique' => '该邮箱已被占用',
        ]);
        if ($validator->fails()) {
            return back()->with('error', $validator->errors()->first());
        }

        $userService = new UserService();
        $user = User::find($this->getUser()->user_id);
        if($userService->setEmail($user, request()->get('email'))){
            // 将验证码设置为已验证
            $message = new Message('bindEmail', request()->get('email'));
            $message->setCodeVerify(request()->get('code'), 'email', request()->get('email'));

            return back()->with('success', '邮箱绑定成功');
        }else{
            return back()->with('error', '邮箱绑定失败');
        }
    }


    /**
     * 修改邮箱
     *
     * @return mixed
     */
    public function rebindEmail () {
        $validator = Validator::make(request()->all(), [
            'code' => 'required|msgcode:email,rebindEmail,'.request()->get('code').','.request()->get('email'),
            'email' => 'required|email|unique:user,email'
        ], [
            'code.required' => '验证码必填',
            'code.msgcode' => '验证码错误!',
            'email.required' => '邮箱必填',
            'email.email' => '邮箱格式错误',
            'email.unique' => '该邮箱已被占用',
        ]);
        if ($validator->fails()) {
            return back()->with('error', $validator->errors()->first());
        }

        $userService = new UserService();
        $user = User::find($this->getUser()->user_id);
        if(! Hash::check(request()->get('password'), $user->password)){
            return back()->with('error', '密码验证失败.');
        }

        if($userService->setEmail($user, request()->get('email'))){
            // 将验证码设置为已验证
            $message = new Message('rebindEmail', request()->get('email'));
            $message->setCodeVerify(request()->get('code'), 'email', request()->get('email'));

            return back()->with('success', '邮箱绑定成功');
        }else{
            return back()->with('error', '邮箱绑定失败');
        }
    }


    /**
     * 修改头像
     *
     * @return mixed
     */
    public function editAvatar () {
        return view('pc.user.editAvatar');
    }


    /**
     * 第三方授权
     *
     * @return mixed
     */
    public function editOauth () {
        return view('pc.user.editOauth');
    }
}