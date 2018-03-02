<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    public function activities() {

		return $this->hasMany('App\Activity');
		
	}
}
