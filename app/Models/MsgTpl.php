<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MsgTpl extends Model
{
    protected $table='msg_tpl';
    protected $primaryKey='msg_tpl_id';
    protected $guarded=[];

}
