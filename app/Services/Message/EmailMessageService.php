<?php
namespace App\Services\Message;

use Illuminate\Http\Request;
use Mail;

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
        if( !$this->checkType()){ return output_error('邮件发送失败'); }

        $subject = $this->subject($this->type);
        $user    = $this->user();

        Mail::send('emails.'.$this->type, ['code' => $this->code(), 'user'=>$user], function ($message) use ($subject) {
            $message->to($this->account, $name = null);
            $message->subject($subject);
        });
    }


    public function subject($type) {
        return config('app.name') . ' - ' . str_replace(
            self::TYPES,
            [
                '注册',
                '找回密码',
                '修改密码'
            ],
            $type
        );
    }

}