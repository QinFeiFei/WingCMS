<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tv extends Model
{
    use SoftDeletes;

    protected $table='tv';
    public $timestamps = true;
    protected $primaryKey='tv_id';
    protected $guarded=[];
    protected $dates = ['deleted_at'];






}
