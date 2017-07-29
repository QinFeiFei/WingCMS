<?php

namespace App;

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


    /**
     * 关联影视类型表
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function classifys()
    {
        return $this->hasMany('App\TvClassify', 'tv_id', 'tv_id');
    }

}
