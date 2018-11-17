<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class users extends Model
{
    protected $table="user_details";

    public function users()
    {

        return $this->hasOne('App\guest','id','type_id');

    }
    public function relation()
    {

        return $this->hasMany('App\relation','user_id','id');

    }

}
