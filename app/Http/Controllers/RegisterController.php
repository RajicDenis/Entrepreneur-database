<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Register;
use Session;

class RegisterController extends Controller
{
 	public function index() {

 		$register = Register::orderBy('date', 'desc')->get();

 		return view('register')->with('register', $register);

 	}   

 	public function addReg(Request $request) {

 		$this->validate($request, [
                'date' => 'date|required',
                'class' => 'max:100',
                'via' => 'max:100',
                'subject' => 'max:200'
            ]);

 		$register = new Register;

 		$register->date = $request->date;
 		$register->class = $request->class;
 		$register->desc = $request->desc;
 		$register->via = $request->via;
 		$register->subject = $request->subject;

 		$register->save();

 		Session::flash('success', 'Dokument uspješno dodan!');
 		Session::flash('alert_type', 'alert-success');

 		return redirect()->back();

 	}

 	public function show($id) {

 		$register = Register::find($id);

 		return view('editRegister')->with('register', $register);

 	}

 	public function update(Request $request) {

 		$register = Register::find($request->rid);

 		$register->date = $request->date;
 		$register->class = $request->class;
 		$register->desc = $request->desc;
 		$register->via = $request->via;
 		$register->subject = $request->subject;

 		$register->save();

 		Session::flash('edited', 'Dokument uspješno izmijenjen!');
 		Session::flash('alert_type', 'alert-warning');

 		return redirect('register/showRegister/'.$request->rid.'');

 	}

 	public function remove($id) {

 		$register = Register::destroy($id);

 		Session::flash('removed', 'Dokument izbrisan!');
 		Session::flash('alert_type', 'alert-danger');

 		return redirect()->back();

 	}

}
