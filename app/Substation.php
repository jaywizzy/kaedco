<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Substation extends Model
{
<<<<<<< HEAD
	protected $primarykey = 'injectionCode';

    public $incrementing = false;

=======

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
>>>>>>> ed0d7df002106ba7e102b844acefc7f843350e47

    public function AreaOffice(){
        return $this->belongsTo('App\AreaOffice');
    }

<<<<<<< HEAD
    
     

=======
     public function substation(){
         return $this->belongsTo('App\Substation');
     }
>>>>>>> ed0d7df002106ba7e102b844acefc7f843350e47
}
