<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feeder extends Model
{
    protected $primaryKey = 'area_office_code_nerc';
    public $incrementing = false;

    public function injectionSub() {
    	return $this->belongsTo('App\Substation');
    }

    public function hightension() {
    	return $this->hasMany('App\HighTension');
    }
}
