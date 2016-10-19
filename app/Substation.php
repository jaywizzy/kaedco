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

    protected $primaryKey = 'injection_nerc_code';

     /**
     * Indicates if the model should be auto incrementing
     *
     * @var bool
     */
    public $incrementing = false;
	 /**
     * Get the substation that owns the AreaOffice.
     */    
     protected $fillable = [
     'injection_nerc_code', 'injection_kaedc_code'];

    public function AreaOffice(){
        return $this->belongsTo('App\AreaOffice');
    }
     public function substation(){
         return $this->belongsTo('App\Substation');
     }
}
