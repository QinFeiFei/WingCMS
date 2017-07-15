<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TvSpecial extends Model
{
    use SoftDeletes;

    protected $table='tv_special';
    public $timestamps = true;
    protected $primaryKey='sp_id';
    protected $guarded=[];
    protected $dates = ['deleted_at'];






}
