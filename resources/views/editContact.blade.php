@extends('layouts.app')

@section('content')

<style>
	.form-group {
	    display: flex;
    	justify-content: flex-start;
	}
	.control-label {
		text-align: center !important;
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
		justify-content: center;
	}
	.mb {
		padding-bottom: 70px;
	}
	.txtarea {
    	width: 70% !important;
    }
    .back-box {
    	display: flex;
    	justify-content: center;
		width: 100%;
		margin-top: 25px;
    }

</style>

<div class="col-md-6 col-md-offset-3 mb">

	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">Uredi događaj</h3>
		</div>
	    <div class="panel-body">
		    <form class="form-horizontal" action="{{ action('ContactController@update') }}" role="form" method="POST">				
				<input type="hidden" name="_token" value="{{ csrf_token() }}">	
				<input type="hidden" name="cid" value="{{ $contact->company_id }}">	
				<input type="hidden" name="contact_id" value="{{ $contact->id }}">

	    		<div class="form-group">
				    <label class="control-label col-sm-3" for="desc">Opis aktivnosti</label>
				    <div class="col-sm-4 txtarea">
				      <textarea class="form-control" name="desc" rows="4" required>{{ $contact->desc }}</textarea>

				        @if ($errors->has('desc'))
	                    <span class="help-block">
	                        <strong>{{ $errors->first('desc') }}</strong>
	                    </span>
	                	@endif

				    </div>
				  </div>

				  <div class="form-group">
				    <label class="control-label col-sm-3" for="date">Datum</label>
				    <div class="col-sm-4">
				      <input type="date" name="date" value="{{ $contact->date }}" required>

				        @if ($errors->has('date'))
	                    <span class="help-block">
	                        <strong>{{ $errors->first('date') }}</strong>
	                    </span>
	                	@endif

				    </div>
				  </div>			  
				 
				  <div class="form-group lo"> 
				      	<button type="submit" class="btn btn-warning">Spremi</button>
				  </div>
				
        	</form>
	    </div>
	</div>

	<div class="back-box"><a class="btn btn-primary" href="{{URL::previous()}}">Nazad</a></div>

</div>

@stop