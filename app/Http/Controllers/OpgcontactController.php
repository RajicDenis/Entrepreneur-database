<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Opgcontact;
use Session;

class OpgcontactController extends Controller
{
    public function addNew(Request $request) {

    	$this->validate($request, [
                'opg_id' => 'integer',
                'desc' => 'max:255',
                'date' => 'date'
            ]);

    	$contacts = new Opgcontact;

    	$contacts->opg_id = $request->cid;
    	$contacts->desc = $request->desc;
    	$contacts->date = $request->date;

    	$contacts->save();

    	Session::flash('contact', 'Novi događaj uspješno dodan!');
        Session::flash('alert_type', 'alert-success');

    	return redirect()->back();

    }

    public function editContact($id) {

    	$contact = Opgcontact::find($id);

    	return view('opg/editOpgcontact')->with('contact', $contact);

    }

    public function update(Request $request) {

    	$this->validate($request, [
                'opg_id' => 'integer',
                'desc' => 'max:255',
                'date' => 'date'
            ]);

    	$contact = Opgcontact::find($request->contact_id);

    	$contact->opg_id = $request->cid;
    	$contact->desc = $request->desc;
    	$contact->date = $request->date;

    	$contact->save();

    	Session::flash('editContact', 'Događaj uspješno uređen!');
        Session::flash('alert_type', 'alert-warning');

    	return redirect('showOpg/'.$request->cid.'');

    }
}
