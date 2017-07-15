<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ArticleAddition extends Model
{
    use SoftDeletes;

    protected $table='article_addition';
    public $timestamps = true;
    protected $primaryKey='addition_id';
    protected $guarded=[];
    protected $dates = ['deleted_at'];




}
