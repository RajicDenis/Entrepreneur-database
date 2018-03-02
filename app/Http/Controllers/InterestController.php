<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Interest;
use App\Company;
use App\Opg;
use Session;
use DB;

class InterestController extends Controller
{

	public function create() {

		$interests = Interest::all();

		return view('createInterest')->with('interests', $interests);

	}

    public function add(Request $request) {

    	$interest = new Interest;

    	$interest->name = $request->name;
    	$interest->area = $request->area;

    	$interest->save();

    	Session::flash('interest', 'Interes uspješno dodan!');
    	Session::flash('alert_type', 'alert-success');

    	return redirect()->back();

    }

    public function addCompanyInterest(Request $request) {

    	$company = Company::find($request->cid);

    	$company->interests()->sync($request->interests, false);

    	Session::flash('newInterest', 'Dodan novi interes!');
    	Session::flash('alert_type', 'alert-success');

    	return redirect()->back();

    }

    public function addOpgInterest(Request $request) {

        $opg = Opg::find($request->cid);

        $opg->interests()->sync($request->interests, false);

        Session::flash('newInterest', 'Dodan novi interes!');
        Session::flash('alert_type', 'alert-success');

        return redirect()->back();

    }

    public function remove($id) {

    	$interest = Interest::destroy($id);

    	Session::flash('remove', 'Interes izbrisan!');
    	Session::flash('alert_type', 'alert-danger');

    	return redirect()->back();

    }

    public function removeCompanyInterest($id) {

    	$interest = DB::table('company_interest')->where('interest_id', $id)->delete();

    	Session::flash('removeInterest', 'Interes izbrisan!');
    	Session::flash('alert_type', 'alert-danger');

    	return redirect()->back();

    }

    public function removeOpgInterest($id) {

        $interest = DB::table('interest_opg')->where('interest_id', $id)->delete();

        Session::flash('removeInterest', 'Interes izbrisan!');
        Session::flash('alert_type', 'alert-danger');

        return redirect()->back();

    }
}
