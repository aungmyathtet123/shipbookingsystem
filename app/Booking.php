<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = ['name','email','phone_no','note'];

     public function routes()
    {
    	return $this->belongsToMany('App\Route', 'bookingdetail')
			    	->withPivot('seat')
			    	->withPivot('date')
			    	->withTimestamps();
    }
    
}

