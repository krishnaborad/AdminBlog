<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    protected $table = 'product';


        public function category()
        {

            return $this->hasOne('App\category','id','category_id');

        }
    
        public function company()
        {

            return $this->hasOne('App\company','id','company_id');

        }


}
