<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Interest;

class MailController extends Controller
{
    public function sendMail() {

    	$data = array( 'email' => 'rete@micsocks.net', 'first_name' => 'Lar', 'from' => 'rete@micsocks.net', 'from_name' => 'Vel' );

		Mail::send( 'email.testMail', $data, function( $message ) use ($data)
		{
		    $message->to( $data['email'] )->from( $data['from'], $data['first_name'] )->subject( 'Welcome!' );
		});

    }

    public function test(Request $request) {

    	if(Request::ajax()) {
		    $test = Interest::orderBy('id', 'desc')->get();
            return view::make('test')->with('test', $test)->renderSections()['content'];
 		} else {
 			$test = Interest::orderBy('id', 'asc')->get();
 			return view('test')->with('test', $test);
 		}
    }
}
