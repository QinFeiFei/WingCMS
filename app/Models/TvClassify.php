<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TvClassify extends Model
{
    protected $table='tv_classify';
    public $timestamps = true;
    protected $primaryKey='classify_id';
    protected $guarded=[];

}
