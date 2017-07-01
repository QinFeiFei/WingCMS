<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ArticleType extends Model
{
    use SoftDeletes;

    protected $table='article_type';
    public $timestamps = true;
    protected $primaryKey='type_id';
    protected $guarded=[];
    protected $dates = ['deleted_at'];




}
