<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
    use SoftDeletes;

    protected $table='article';
    public $timestamps = true;
    protected $primaryKey='article_id';
    protected $guarded=[];
    protected $dates = ['deleted_at'];








}
