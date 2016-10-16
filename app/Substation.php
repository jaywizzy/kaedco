<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Substation extends Model
{
    protected $primaryKey = 'injection_code';

    public $incrementing = false;

     public function substation(){
         return $this->belongsTo('App\Substation');
     }

}
