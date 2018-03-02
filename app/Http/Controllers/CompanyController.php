<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;
use App\Contact;
use App\Interest;
use App\Opg;
use Session;
use DB;

class CompanyController extends Controller
{
    public function index(Request $request, $id = null) {

        if($id == 'doo') {
            $companies = Company::where('type', 'd.o.o.')->get();
        }

        if($id == null) {
            $companies = Company::all();
        }

        if($id == 'obrt') {
            $companies = Company::where('type', 'obrt')->get();
        }
    
    	if($id == 'udruga') {
            $companies = Company::where('type', 'udruga')->get();
        }

    	return view('layouts.main')->with('companies', $companies);

    }

    public function showCompany($id) {

    	$company = Company::find($id);
        $contacts = Contact::where('company_id', $id)->get();
        $interests = Interest::all();

        if(DB::table('company_interest')->where('company_id', $id)->get() != null) {

            $companyInt = DB::table('company_interest')->where('company_id', $id)->get();
        } else {
            $companyInt = null;
        }

    	return view('showCompany')
            ->with('company', $company)
            ->with('contacts', $contacts)
            ->with('interests', $interests)
            ->with('companyInt', $companyInt);

    }

    public function edit($id) {

    	$company = Company::find($id);

    	return view('editCompany')->with('company', $company);

    }

    public function create() {

    	return view('createCompany');

    }

    public function store(Request $request) {

    	$this->validate($request, [
                'name' => 'max:200',
                'phone' => 'max:250',
                'role' => 'max:250',
                'contact' => 'max:250',
                'mb' => 'max:250'
            ]);

    	$company = new Company;

    	$company->name = $request->name;
    	$company->phone = $request->phone;
    	$company->email = $request->email;
    	$company->role = $request->role;
    	$company->contact = $request->contact;
    	$company->mb = $request->mb;
        $company->type = $request->type;

    	$company->save();

    	Session::flash('created', 'Tvrtka uspješno dodana!');
        Session::flash('alert_type', 'alert-success');

    	return redirect()->back();

    }

    public function update(Request $request) {

    	$this->validate($request, [
                'name' => 'max:200',
                'phone' => 'max:250',
                'role' => 'max:250',
                'contact' => 'max:250',
                'mb' => 'max:250'
            ]);

    	$company = Company::find($request->cid);

    	$company->name = $request->name;
    	$company->phone = $request->phone;
    	$company->email = $request->email;
    	$company->role = $request->role;
    	$company->contact = $request->contact;
    	$company->mb = $request->mb;
    	$company->type = $request->type;

    	$company->save();

    	Session::flash('company', 'Podaci uspješno uređeni!');
        Session::flash('alert_type', 'alert-warning');

    	return redirect('showCompany/'.$request->cid.'');

    }

    public function remove($id) {

    	$company = Company::destroy($id);

    	Session::flash('remove', 'Tvrtka izbrisana!');
        Session::flash('alert_type', 'alert-danger');

    	return redirect()->back();

    }

    public function test() {

        $companies = Company::where('email', '!=', null)->where('type', 'udruga')->get();

        $opgs = Opg::where('email', '!=', null)->pluck('email');
    

        return view('test')->with('test', $companies)->with('opgs', $opgs);
    }


}
