<?php
namespace App\Services\Message;

use App\MsgCodeRecord;
use App\Services\UserService;
use App\User;
use Carbon\Carbon;

class Message implements MessageInterface
{

    public $type;       // 消息类型（存在于 const TYPES）
    public $account;    // 发送帐号(手机号/邮箱号)
    public $codeActiveTime = 10;    // 验证码有效时间(分钟)

    public function __construct($type, $account){
        $this->type = $type;
        $this->account = $account;
    }

    public function send(){}


    /**
     * 生成验证码
     *
     * @return int
     */
    public function code () {
        return mt_rand(100000, 999999);
    }


    /**
     * 检测一分钟内是否发送过
     *
     * @param $account
     * @return mixed
     */
    public function checkSend ($account) {
        $noCheck = ['test', 'modPasswordSucc', 'bindEmailSucc'];
        if(!in_array($this->type, $noCheck)){
            $model = new MsgCodeRecord();
            return $model->checkSend($account);
        }
    }


    /**
     * 将发送记录插入至数据库
     *
     * @param $code
     * @return bool
     */
    public function createMsgRecord ($code){
        $model = new MsgCodeRecord;
        $model->code = $code;
        $model->send_type = $this->getSendType($this->account);
        $model->send_form = $this->account;
        $model->send_time = Carbon::now();
        $model->send_content_type = $this->type;
        $model->ip = request()->getClientIp();
        return $model->save();
    }


    /**
     * 获取发送类型(phone / email / wechat)
     *
     * @param $account
     * @return string
     */
    public function getSendType($account) {
        $type = '';
        if( isEmail($account) ){
            $type = 'email';
        }else if( isMobile($account) ) {
            $type = 'phone';
        }else{
            $type = 'wechat';
        }
        return $type;
    }


    /**
     * 检测发送类型是否支持
     *
     * @return bool
     */
    public function checkType(){
        if(! in_array($this->type, self::TYPES)){
            return false;
        }
        return true;
    }


    /**
     * 根据邮箱号/手机号获取用户
     *
     * @return mixed|null
     */
    public function user () {
        $userService = new UserService();
        $user = $userService->getUserOfAccount($this->account);
        return $user;
    }


    /**
     * 验证码是否正确
     *
     * @param $code
     * @param $send_type
     * @return mixed
     */
    public function checkCode ($code, $send_type) {
        return MsgCodeRecord::where('send_type', $send_type)
            ->where('send_form', $this->account)
            ->where('code', $code)
            ->where('send_time', '>', Carbon::now()->subMinute($this->codeActiveTime))
            ->whereNull('verify_time')
            ->first();
    }


    public function setCodeVerify ($code, $send_type, $send_from){
        return MsgCodeRecord::where('code', $code)
            ->where('send_type', $send_type)
            ->where('send_form', $send_from)
            ->where('send_time', '>', Carbon::now()->subMinute($this->codeActiveTime))
            ->update(['verify_time' => Carbon::now()]);
    }
}