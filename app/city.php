<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class city extends Model
{
    protected $table = 'cities';
    public function State()
    {

          return $this->hasone('App\state', 'id', 'state_id');

    }

}
