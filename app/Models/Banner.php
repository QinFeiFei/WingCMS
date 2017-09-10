<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Banner extends Model
{
    protected $table='banner';
    public $timestamps = false;
    protected $primaryKey='banner_id';
    protected $guarded=[];








}
