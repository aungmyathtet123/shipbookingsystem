<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ship extends Model
{
    protected $fillable = [
    'operator_id', 'max_upseat', 'max_lowseat'];

 public function Operator($value='')
{
    return $this->belongsTo('App\Operator');
	
}
			    	
}


