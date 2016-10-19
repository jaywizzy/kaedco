<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransformerBookCode extends Model
{
    public function transformer() {
    	return $this->belongsTo('App\Transformer');
    }
}
