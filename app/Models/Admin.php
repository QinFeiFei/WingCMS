<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Admin extends Model
{
    use SoftDeletes;

    protected $table='admin';
    public $timestamps = true;
    protected $primaryKey='admin_id';
    protected $guarded=[];
    protected $dates = ['deleted_at'];







}
