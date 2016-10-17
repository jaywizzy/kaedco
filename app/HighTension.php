<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HighTension extends Model
{
    protected $primarykey = 'high_tension_nerc_code';

    public $incrementing = false;

    public function feeder() {
    	return $this->belongsTo('App\Feeder');
    }

    public function transformer() {
    	return $this->hasMany('App\Transformer');
    }
}
