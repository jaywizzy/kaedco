<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AreaOffice extends Model
{
	protected $primaryKey = 'nerc_code';
	public $incrementing = false;	

    public function injectionSubstations() {
    	return $this->hasMany('App\Substation');
    }
}
