<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;


class MsgCodeRecord extends Model
{
    protected $table='msg_code_record';
    protected $primaryKey='record_id';
    protected $guarded=[];
    public $timestamps = false;

    /**
     * 通过邮箱/手机查看1分钟内是否发送过
     *
     * @param $account
     */
    public function checkSend ($account) {
        $type = '';
        if( isEmail($account) ){
            $type = 'email';
        }else if( isMobile($account) ) {
            $type = 'phone';
        }else{
            $type = 'wechat';
        }

        return MsgCodeRecord::where('send_type', $type)
               ->where('send_form', $account)
               ->where('send_time', '>', Carbon::now()->subMinute())
               ->whereNull('verify_time')
               ->first();
    }

}
