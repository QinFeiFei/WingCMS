<?php
namespace App\Services\Message;

interface MessageInterface {

    const TYPES = [
        'test',             // 测试
        'register',         // 注册
        'findPassword',     // 找回密码
        'modPasswordSucc',  // 修改密码成功
        'modPassword',      // 修改密码
    ];

    /**
     * 发送消息
     */
    public function send();
}