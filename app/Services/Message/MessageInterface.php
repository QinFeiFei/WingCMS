<?php
namespace App\Services\Message;

interface MessageInterface {

    const TYPES = [
        'register',         // 注册
        'findPassword',     // 找回密码
        'modPassword',      // 修改密码
    ];

    /**
     * 发送消息
     */
    public function send();

}