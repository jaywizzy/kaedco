<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transformer extends Model
{
    protected $primarykey = 'transformer_nerc_code';

    public $incrementing = false;

    public function highTension(){
    	return $this->belongsTo('App\HighTension');
    }
}
