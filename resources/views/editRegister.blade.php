@extends('layouts.app')

@section('content')

<style>
	.form-group {
	    display: flex;
    	justify-content: center;
    	margin: 0 0 15px 0 !important;
	}
	.control-label {
		text-align: center !important;
		width: 30%;
	}
    .form-control {
    	width: 70%;
    }
	.btn-warning {
		background: #ff003f;
		transition: all 0.2s ease-in-out;
	}
	.btn-warning:hover {
		background: #bb1133;
	}
	.panel {
		box-shadow: 0 0 8px rgba(8,8,8,0.5);
	}
	.panel, .panel-heading {
		border-top-right-radius: 30px;
		border-bottom-left-radius: 30px;
	}
	.panel-title {
		font-family: 'Amaranth', sans-serif;
	    font-size: 25px;
	    text-align: center;
	}
	.panel-heading {
		background: #ff003f !important;
    	color: white !important;
	}
	.panel-body {
		padding-top: 35px;
		font-family: 'Amaranth', sans-serif;
		font-size: 17px;
	}
	.lo {
		padding-top: 25px;
	}
	.mb {
		padding-bottom: 70px;
	}
	.back-box {
    	display: flex;
    	justify-content: center;
		width: 100%;
		margin-top: 25px;
    }
    .alert-warning, .alert-success, .alert-danger {
        text-align: center;
        font-family: 'Amaranth', sans-serif;
        font-size: 17px;
    }

</style>

<div class="col-md-6 col-md-offset-3 mb">

	@if(Session::has('edited'))
		<div class="center">
			<div class="alert {{ Session::get('alert_type') }} fade in">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				{{ Session::get('edited') }}
			</div>
		</div>
	@endif

	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">Uredi podatke</h3>
		</div>
	    <div class="panel-body">
		    <form class="form-horizontal" action="{{ action('RegisterController@update') }}" role="form" method="POST">				

				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<input type="hidden" name="rid" value="{{ $register->id }}">

				<div class="form-group">
			    <label class="control-label col-sm-3" for="date">Datum</label>
			      <input type="date" class="form-control" name="date" value="{{ $register->date }}" required>

			        @if ($errors->has('date'))
                    <span class="help-block">
                        <strong>{{ $errors->first('date') }}</strong>
                    </span>
                	@endif 

			  </div>

			  <div class="form-group">
			    <label class="control-label col-sm-3" for="class">Klasifikacijska oznaka</label>
			      <input type="text" class="form-control" name="class" value="{{ $register->class }}" required>

			        @if ($errors->has('class'))
                    <span class="help-block">
                        <strong>{{ $errors->first('class') }}</strong>
                    </span>
                	@endif
		    
			  </div>

			  <div class="form-group">
			    <label class="control-label col-sm-3" for="desc">Opis dokumenta</label>			    
			      <textarea class="form-control" name="desc" rows="4" required>{{ $register->desc }}</textarea>

			        @if ($errors->has('desc'))
                    <span class="help-block">
                        <strong>{{ $errors->first('desc') }}</strong>
                    </span>
                	@endif

			  </div>

			  <div class="form-group">
			    <label class="control-label col-sm-3" for="via">Poslano putem</label>
			      <input type="text" class="form-control" name="via"  value="{{ $register->via }}">

			        @if ($errors->has('via'))
                    <span class="help-block">
                        <strong>{{ $errors->first('via') }}</strong>
                    </span>
                	@endif

			  </div>

			  <div class="form-group">
			    <label class="control-label col-sm-3" for="subject">Kome</label>
			      <input class="form-control" name="subject"  value="{{ $register->subject }}">

			        @if ($errors->has('subject'))
                    <span class="help-block">
                        <strong>{{ $errors->first('subject') }}</strong>
                    </span>
                	@endif

			  </div>
				 
			  <div class="form-group lo"> 
			      	<button type="submit" class="btn btn-warning">Spremi</button>
			  </div>
				
        	</form>
	    </div>
	</div>

	<div class="back-box"><a class="btn btn-primary" href="{{ URL::route('showReg')}}">Nazad</a></div>

</div>

@stop