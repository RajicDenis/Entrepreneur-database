@extends('layouts.app')

@section('content')

<style>
	body {
		display: flex;
		justify-content: center;
		align-items: center;
	}
	input[type=text], input[type=password] {
		width: 250px;
		height: 50px;
		margin: 0 0 10px 0;
		text-align: center;
		font-size: 16px;
		border: 0;
		border-radius: 10px;
		background: rgba(8,8,8,0.3);
		color: white;
		font-family: 'Amaranth', sans-serif;
	}
	input[type=submit] {
		width: 250px;
		height: 50px;
		font-weight: 600;
		font-size: 16px;
		margin: 0;
		border: 0;
		border-radius: 10px;
		font-family: 'Amaranth', sans-serif;
	}
	input[type=submit]:hover {
		background: darkred;
	}
	@-webkit-keyframes autofill {
	to {
	    color: white;
	    background: rgba(105,105,105,0.7);
	}
	}
	input:-webkit-autofill {
	    -webkit-animation-name: autofill;
	    -webkit-animation-fill-mode: both;
	}
	.error-login {
		width: 250px;
		margin: 0 0 20px 0;
	}
	#login-btn {
		background-color: #EF2733;
		color: white;
	}
	#login-btn:hover {
		background: rgba(263,0,35,0.8);
	}
	.col-md-2 {
		z-index: 3;
	}
	.login-logo {
		width: 250px;
		height: 230px;
		padding: 20px;
	}
	.input-group {
		color: white;
		padding-top: 10px;
	}
	.form-signin {
		display: flex;
		flex-direction: column;
	}

	.main-container {
		display: flex;
	    flex-direction: column;
	    justify-content: center;
	    align-items: center;
	    min-height: 500px;
	}
	.db-choice, .login-logo {
		display: none;
	}
	.add-new {
		display: none;
	}
	.alert-success, .alert-danger {
        text-align: center;
        font-family: 'Amaranth', sans-serif;
        font-size: 17px;
    }
</style>
<div class="col-md-2">

	<img class="login-logo" src="{{ URL::asset('public/images/logo-transparent.png') }}">

	@if(Session('error'))
			<div class="error-login">{{ Session('error') }}</div>
	@endif

	@if(Session::has('failed'))
    <div class="center">
      <div class="alert {{ Session::get('alert_type') }} fade in">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        {{ Session::get('failed') }}
      </div>
    </div>
  @endif

	<form action="{{ action('LoginController@postLogin') }}" class="form-signin" method="POST">

		<input type="hidden" name="_token" value="{{ csrf_token() }}">

		<input id="username" class="form-control" type="text" name="username" placeholder="Username" required>

		<input id="password" class="form-control" type="password" name="password" placeholder="Password" required>

		<input id="login-btn" type="submit" name="login" value="Login"> 


	</form>	
</div>

@stop