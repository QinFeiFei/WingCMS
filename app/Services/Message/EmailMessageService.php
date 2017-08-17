<?php
namespace App\Services\Message;

use Illuminate\Http\Request;
use Mail;

class EmailMessageService extends Message implements MessageInterface{


    /**
     * 发送消息
     */
    public function send()
    {
        Mail::send('emails.register', ['code' => $this->code()], function ($message) use ($user) {
            $message->from($address, $name = null);
            $message->sender($address, $name = null);
            $message->to($address, $name = null);
            $message->cc($address, $name = null);
            $message->bcc($address, $name = null);
            $message->replyTo($address, $name = null);
            $message->subject($subject);
            $message->priority($level);
        });
    }



}