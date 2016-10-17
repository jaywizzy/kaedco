<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Substation extends Model
{
	protected $primarykey = 'injectionCode';

    public $incrementing = false;


    public function AreaOffice(){
        return $this->belongsTo('App\AreaOffice');
    }

    
     

}
