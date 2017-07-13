<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TvClassify extends Model
{
    use SoftDeletes;

    protected $table='tv_classify';
    public $timestamps = true;
    protected $primaryKey='classify_id';
    protected $guarded=[];
    protected $dates = ['deleted_at'];








}
