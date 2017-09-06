<?php
namespace App\Services\Message;

interface MessageInterface {

    const TYPES = [
        'test',             // 测试
        'register',         // 注册
        'findPassword',     // 找回密码
        'modPasswordSucc',  // 修改密码成功
        'modPassword',      // 修改密码
        'rebindEmail',      // 重新绑定邮箱
        'bindEmailSucc',    // 绑定邮箱成功
        'bindEmail',        // 绑定邮箱
        'rebindPhone',      // 重新绑定邮箱
        'bindPhoneSucc',    // 绑定邮箱成功
        'bindPhone',        // 绑定邮箱
    ];

    /**
     * 发送消息
     */
    public function send();
}