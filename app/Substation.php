<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Substation extends Model
{
    protected $primaryKey = 'injectionCode';

    public $incrementing = false;

    public function areaOffice(){
        return $this->belongsTo('App\AreaOffice');
    }

}
