@extends('layouts.app')

@section('content')

<style>
	.form-group {
	    display: flex;
    	justify-content: center;
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
	}
	.mb {
		padding-bottom: 70px;
	}
	.btn-wrap {
		display: flex;
		width: 100%;
		justify-content: center;
		align-items: center;
	}

</style>

<div class="col-md-6 col-md-offset-3 mb">

	<div class="btn-wrap"><a href="{{ action('SearchController@showOpgForm') }}" class="btn btn-success">Pretraži OPG</a></div>

	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">Pretraži d.o.o. i obrt</h3>
		</div>
	    <div class="panel-body">
		    <form class="form-horizontal" action="{{ action('SearchController@searchFilter') }}" role="form" method="POST">				
				<input type="hidden" name="_token" value="{{ csrf_token() }}">	
				
        			<div class="form-group">
					    <label class="control-label col-sm-3" for="name">Interes</label>
					    <div class="col-sm-4 txtarea">
					      <select name="interest">
					      		<option value="0"></option>
					      	@foreach($interests as $int)
					      
								<option value="{{ $int->id }}">{{ $int->name }}</option>
								
					      	@endforeach
					      </select>

					    </div>
					  </div>

					  <div class="form-group">
					    <label class="control-label col-sm-3" for="name">Djelatnost</label>
					    <div class="col-sm-4 txtarea">
					      <select class="interest2" name="role">

					      	<option value="0"></option>				     
							<option value="1">Trgovina</option>							
							<option value="2">Usluge</option>
							<option value="3">Poljoprivreda i šumarstvo</option>
							<option value="4">Ugostiteljstvo</option>
							<option value="5">Prerađivačka</option>
							<option value="6">Proizvođačka</option>
							<option value="7">Frizerske usluge</option>
							<option value="8">Građevinarstvo</option>
							<option value="9">Intelektualne</option>
							<option value="10">Popravak namještaja i pokućstva</option>
							<option value="11">Cestovni prijevoz robe</option>
							 	
					      </select>

					    </div>
					  </div>
				 
				  <div class="form-group lo"> 
				      	<button type="submit" class="btn btn-warning">Pretraži</button>
				  </div>
				
        	</form>
	    </div>
	</div>

</div>

@stop