<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HighTension extends Model
{
    protected $primarykey = 'high_tension_code';

    public $incrementing = false;

    public function feeder() {
    	return $this->belongsTo('App\Feeder');
    }
}
