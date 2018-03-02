<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Receiver;
use Session;

class ReceiverController extends Controller
{
    public function index() {

 		$receiver = Receiver::orderBy('id', 'desc')->get();

 		return view('receiver')->with('receiver', $receiver);

 	}   

 	public function addRec(Request $request) {

 		$this->validate($request, [
                'date' => 'date|required',
                'class' => 'max:100',
                'via' => 'max:100',
                'subject' => 'max:200'
            ]);

 		$receiver = new Receiver;

 		$receiver->date = $request->date;
 		$receiver->class = $request->class;
 		$receiver->desc = $request->desc;
 		$receiver->via = $request->via;
 		$receiver->subject = $request->subject;

 		$receiver->save();

 		Session::flash('success', 'Dokument uspješno dodan!');
 		Session::flash('alert_type', 'alert-success');

 		return redirect()->back();

 	}

 	public function show($id) {

 		$receiver = Receiver::find($id);

 		return view('editReceiver')->with('receiver', $receiver);

 	}

 	public function update(Request $request) {

 		$receiver = Receiver::find($request->rid);

 		$receiver->date = $request->date;
 		$receiver->class = $request->class;
 		$receiver->desc = $request->desc;
 		$receiver->via = $request->via;
 		$receiver->subject = $request->subject;

 		$receiver->save();

 		Session::flash('edited', 'Dokument uspješno izmijenjen!');
 		Session::flash('alert_type', 'alert-warning');

 		return redirect('receiver/showRegister/'.$request->rid.'');

 	}

 	public function remove($id) {

 		$receiver = Receiver::destroy($id);

 		Session::flash('removed', 'Dokument izbrisan!');
 		Session::flash('alert_type', 'alert-danger');

 		return redirect()->back();

 	}
}
