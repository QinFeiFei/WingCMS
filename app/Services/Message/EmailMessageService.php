<?php
namespace App\Services\Message;

use App\MsgCodeRecord;
use Illuminate\Http\Request;
use Mail;
use Mockery\CountValidator\Exception;

class EmailMessageService extends Message implements MessageInterface{

    public function __construct($type, $account)
    {
        parent::__construct($type, $account);
    }


    /**
     * 发送消息
     */
    public function send()
    {
        if( !$this->checkType() ){ return output_error('邮件发送失败'); }
        if( $this->checkSend($this->account) ){ return output_error('一分钟内发送过邮件'); }

        $subject = $this->subject($this->type);
        $user    = $this->user();
        $code    = $this->code();

        try {
            Mail::send('emails.'.$this->type, ['email' => $this->account, 'code' => $code, 'user'=>$user], function ($message) use ($subject) {
                $message->to($this->account, $name = null);
                $message->subject($subject);
            });
        }catch(\Exception $e){
            exit($e->getMessage());
            return output_error('邮件发送失败');
        }

        if( $this->createMsgRecord($code) ){
            return output_success('邮件发送成功');
        }else{
            return output_error('邮件发送失败');
        }
    }


    public function subject($type) {
        return config('app.name') . ' - ' . str_replace(
            self::TYPES,
            [
                '测试',
                '注册',
                '找回密码',
                '密码修改成功',
                '修改密码'
            ],
            $type
        );
    }

}