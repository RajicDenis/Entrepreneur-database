<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Opg extends Model
{
    public function contacts() {

		return $this->hasMany('App\Opgcontact');

	}
 	
 	public function interests() {

		return $this->belongsToMany('App\Interest');
		
	}
}
