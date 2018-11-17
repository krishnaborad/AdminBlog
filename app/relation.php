<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class relation extends Model
{
    protected $table='family';
    public function user()
    {

          return $this->belongsToMany('App\users', 'user_id', 'id');

    }
}
