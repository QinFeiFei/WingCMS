<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TvFeedback extends Model
{
    protected $table='tv_feedback';
    public $timestamps = true;
    protected $primaryKey='fb_id';
    protected $guarded = [];

}
