<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Interest;
use App\Company;
use App\Opg;
use DB;
use App\Utilities;

class SearchController extends Controller
{
    public function showForm() {

    	$interests = Interest::all();

    	return view('searchForm')->with('interests', $interests);

    }

    public function showOpgForm() {

        $interests = Interest::all();

        return view('opg/searchOpg')->with('interests', $interests);

    }

    public function searchFilter(Request $request) {

    	$interest = $request->interest;
    	$role = $request->role;
    	$pid = 0;
    	$roled = null;

    	if($interest != 0 && $role == 0) {
    		$filtered = DB::table('company_interest')->where('interest_id', $interest)->get();
    		$companies = Company::all();
    		$pid = 1;
    	} 

    	if($role != 0 && $interest == 0) {
    		$filtered = Company::where('role', Utilities::getRole($role))->get();
    		$companies = Company::all();
    		$pid = 2;
    	} 

    	if($interest != 0 && $role != 0) {
    		$filtered = DB::table('company_interest')->where('interest_id', $interest)->get();
    		$roled = Company::where('role', Utilities::getRole($role))->get();
    		$companies = Company::all();
    		$pid = 3;
    	}

    	if($interest == 0 && $role == 0) {
    		
    		return redirect('/');
    	}

    	return view('searchFilter')
    		->with('interest', $interest)
    		->with('companies', $companies)
    		->with('filtered', $filtered)
    		->with('pid', $pid)
    		->with('roled', $roled);

    }

    public function searchOpgFilter(Request $request) {

        $interest = $request->interest;

        $filtered = DB::table('interest_opg')->where('interest_id', $interest)->get();
        $opgs = Opg::all();


        return view('opg/searchOpgFilter')
            ->with('opgs', $opgs)
            ->with('filtered', $filtered);

    }

}
