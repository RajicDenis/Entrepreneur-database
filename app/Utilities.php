<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Person;
use Carbon\Carbon;

class Utilities extends Model
{
    public static function getRole($id) {

    	if($id == 1) {
    		return "Trgovina";
    	} 

    	if($id == 2) {
    		return "Usluge";
    	} 

    	if($id == 3) {
    		return "Poljoprivreda i šumarstvo";
    	} 

    	if($id == 4) {
    		return "Ugostiteljstvo";
    	} 

    	if($id == 5) {
    		return "Prerađivačka";
    	} 

    	if($id == 6) {
    		return "Proizvođačka";
    	} 

    	if($id == 7) {
    		return "Frizerske usluge";
    	} 

    	if($id == 8) {
    		return "Građevinarstvo";
    	} 

    	if($id == 9) {
    		return "Intelektualne";
    	} 

    	if($id == 10) {
    		return "Popravak namještaja i pokućstva";
    	}

    	if($id == 11) {
    		return "Cestovni prijevoz robe";
    	}

    }

    public static function getPerson($id) {

        $person = Person::find($id);

        return $person->name .' '. $person->last_name;

    }

	public static function getDiffDays($date) {
    
    	$end = Carbon::parse($date);
    
    	$now = Carbon::now();

		$length = $end->diffInDays($now);
    
    	return $length;
    
    }
}
