<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Route extends Model
{
    protected $fillable = ['city_from','city_to','ship_id','time','lower_price','upper_price'];

    public function bookings()
    {
    	return $this->belongsToMany('App\Booking', 'bookingdetail')
			    	->withPivot('seat')
			    	->withPivot('date')
			    	->withTimestamps();
    }

    public function Ship($value='')
	{
	    return $this->belongsTo('App\Ship');
		
	}
    
}
