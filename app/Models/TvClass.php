<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TvClass extends Model
{
    protected $table='tv_class';
    public $timestamps = false;
    protected $primaryKey='tv_class_id';
    protected $guarded=[];
}
