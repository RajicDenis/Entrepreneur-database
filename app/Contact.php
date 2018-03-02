<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    public function companies() {

		return $this->belongsTo('App\Company');
		
	}

	public function opgs() {

		return $this->belongsTo('App\Opg');
		
	}
}
