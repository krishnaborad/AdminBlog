<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class state extends Model
{
    protected $tabel = 'states';
    public function countries()
    {

        return $this->hasOne('App\country','id','country_id');


    }
}
