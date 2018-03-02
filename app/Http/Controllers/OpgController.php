<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Opg;
use App\Opgcontact;
use App\Interest;
use DB;
use Session;

class OpgController extends Controller
{
	public function index() {

		$opgs = Opg::all();

		return view('opgs')->with('opgs', $opgs);

	}

    public function showOpg($id) {

        $opg = Opg::find($id);
        $contacts = Opgcontact::where('opg_id', $id)->get();
        $interests = Interest::all();

        if(DB::table('interest_opg')->where('opg_id', $id)->get() != null) {
            $opgInt = DB::table('interest_opg')->where('opg_id', $id)->get();
        } else {
            $opgInt = null;
        }

        return view('opg/showOpg')
            ->with('opg', $opg)
            ->with('contacts', $contacts)
            ->with('interests', $interests)
            ->with('opgInt', $opgInt);

    }

    public function edit($id) {

        $opg = Opg::find($id);

        return view('opg/editOpg')->with('opg', $opg);

    }

    public function create() {

        return view('opg/createOpg');

    }

    public function store(Request $request) {

        $this->validate($request, [
                'name' => 'max:200',
                'city' => 'max:250',
                'email' => 'max:250',
                'tel' => 'max:250',
                'mb' => 'max:250'
            ]);

        $opg = new Opg;

        $opg->city = $request->city;
        $opg->mb = $request->mb;
        $opg->name = $request->name;
        $opg->town = $request->town;
        $opg->postal = $request->postal;
        $opg->street = $request->street;
        $opg->email = $request->email;
        $opg->tel = $request->tel;

        $opg->save();

        Session::flash('created', 'Tvrtka uspješno dodana!');
        Session::flash('alert_type', 'alert-success');

        return redirect()->back();

    }

    public function update(Request $request) {

        $this->validate($request, [
                'name' => 'max:200',
                'city' => 'max:250',
                'email' => 'max:250',
                'tel' => 'max:250',
                'mb' => 'max:250'
            ]);

        $opg = Opg::find($request->cid);

        $opg->city = $request->city;
        $opg->mb = $request->mb;
        $opg->name = $request->name;
        $opg->town = $request->town;
        $opg->postal = $request->postal;
        $opg->street = $request->street;
        $opg->email = $request->email;
        $opg->tel = $request->tel;

        $opg->save();

        Session::flash('company', 'Podaci uspješno uređeni!');
        Session::flash('alert_type', 'alert-warning');

        return redirect('showOpg/'.$request->cid.'');

    }

    public function remove($id) { 

    	$opg = Opg::destroy($id);

        Session::flash('remove', 'Tvrtka izbrisana!');
        Session::flash('alert_type', 'alert-danger');

        return redirect()->back();

    }

}
