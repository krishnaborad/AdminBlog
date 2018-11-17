<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class image extends Model
{
        protected $table='images';

        // public function product()
        // {
        //
        //       return $this->belongsToMany('App\product', 'product_id', 'id');
        //
        // }
        public function users()
        {

              return $this->belongsToMany('App\users', 'id');

        }
}
