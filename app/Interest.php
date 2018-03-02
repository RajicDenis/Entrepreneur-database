<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Interest extends Model
{
    public function companies() {

		return $this->belongsToMany('App\Company');
		
	}

	public function opgs() {

		return $this->belongsToMany('App\Opg');
		
	}
}
