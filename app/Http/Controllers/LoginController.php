<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use Session;

class LoginController extends Controller
{
    public function login() {

    	return view('login');

    }

	public function postLogin(Request $request) 
	{
	    $this->validate($request, [
	        'username' => 'required|max:60',
	        'password' => 'required|min:6'
	    ]);

	    $attempt = Auth::attempt([
	        'username' => $request->username,
	        'password' => $request->password
	    ]);

	    if($attempt) {
			return Redirect('/');
		} else {

			Session::flash('failed', 'Netočni podaci!');
        	Session::flash('alert_type', 'alert-danger');

			return Redirect()->route('login');
		}

	    return redirect('/'); 
	}

	public function logout() {

		Auth::logout();
		Session::flush();
		return Redirect()->route('login');

	}

   
}
