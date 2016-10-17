<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Substation extends Model
{

	/**
     * The primary key associated with the model.
     *
     * @var string
     */

    protected $primaryKey = 'injectionCode';

     /**
     * Indicates if the model should be auto incrementing
     *
     * @var bool
     */
    public $incrementing = false;

	 /**
     * Get the substation that owns the AreaOffice.
     */    

    public function AreaOffice(){
        return $this->belongsTo('App\AreaOffice');
    }

     public function substation(){
         return $this->belongsTo('App\Substation');
     }
}
