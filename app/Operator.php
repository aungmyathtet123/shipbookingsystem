<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Operator extends Model
{
    protected $fillable = ['name','logo'];


public function ships($value='')
{
    return $this->hasMany('App\Ship');
	
}

}
