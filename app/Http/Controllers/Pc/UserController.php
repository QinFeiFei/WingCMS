<?php

namespace App\Http\Controllers\Pc;

use App\Services\UserService;
use App\User;
use Exception;
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
            
        }else{

        }
    }


    /**
     * 绑定手机
     *
     * @return mixed
     */
    public function bindPhone () {
        return view('pc.user.bindPhone');
    }


    /**
     * 绑定邮箱
     *
     * @return mixed
     */
    public function bindEmail () {
        return view('pc.user.bindEmail');
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