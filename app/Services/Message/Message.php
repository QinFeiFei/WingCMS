<?php
namespace App\Services\Message;


class Message implements MessageInterface
{
    public function send(){}

    public function code () {
        return mt_rand(100000, 999999);
    }

    public function checkType(){

    }
}