<?php

namespace App\Http\Controllers\Pc;


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
        return view('pc.user.editInfo');
    }


    /**
     * 修改密码
     *
     * @return mixed
     */
    public function editPassword () {
        return view('pc.user.editPassword');
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