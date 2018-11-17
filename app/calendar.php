<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Calendar extends Model
{
    protected $table = 'calendar';

    protected $fillable = ['title','date'];

    public function user()
    {

        return $this->hasOne('App\User','id','user_id');

    }
}
