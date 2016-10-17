<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Substation extends Model
{
<<<<<<< HEAD
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
    protected $incrementing = false;

	 /**
     * Get the substation that owns the AreaOffice.
     */    

    public function AreaOffice(){
        return $this->belongsTo('App\AreaOffice');
    }
=======
    protected $primaryKey = 'injection_code';

    public $incrementing = false;

     public function substation(){
         return $this->belongsTo('App\Substation');
     }
>>>>>>> 205ac6dbe452fb96874aba6815cb9892d50c8bae

}
