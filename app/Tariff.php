<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tariff extends Model
{
    public function category(){
    	return $this->hasMany('App\Category');
    }
}
