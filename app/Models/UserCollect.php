<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserCollect extends Model
{
    protected $table='user_collect';
    public $timestamps = true;
    protected $primaryKey='collect_id';
    protected $guarded = [];

    public function tv()
    {
        return $this->hasOne('App\Tv', 'tv_id', 'tv_id');
    }



}
