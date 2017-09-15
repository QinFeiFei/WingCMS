<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TvSeek extends Model
{
    protected $table='tv_seek';
    public $timestamps = true;
    protected $primaryKey='sk_id';
    protected $guarded = [];



}
