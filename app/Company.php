<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
	public function contacts() {

		return $this->hasMany('App\Contact');

	}
 	
 	public function interests() {

		return $this->belongsToMany('App\Interest');
		
	}
}
