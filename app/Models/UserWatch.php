<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserWatch extends Model
{
    use SoftDeletes;

    protected $table='user_watch';
    public $timestamps = true;
    protected $primaryKey='watch_id';
    protected $dates = ['deleted_at'];
    protected $guarded = [];

    public function tv()
    {
        return $this->hasOne('App\Tv', 'tv_id', 'tv_id');
    }

}
