<?php
namespace App\Services\Message;


use App\Services\UserService;
use App\User;

class Message implements MessageInterface
{

    public $type;       // 消息类型（存在于 const TYPES）
    public $account;    // 发送帐号(手机号/邮箱号)

    public function __construct($type, $account){
        $this->type = $type;
        $this->account = $account;
    }

    public function send(){}

    public function code () {
        return mt_rand(100000, 999999);
    }

    public function checkType(){
        if(! in_array($this->type, self::TYPES)){
            return false;
        }
        return true;
    }

    public function user () {
        $userService = new UserService();
        $user = $userService->getUserOfAccount($this->account);
        return $user;
    }
}