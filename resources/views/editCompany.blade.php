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

</style>

<div class="col-md-6 col-md-offset-3 mb">

	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">{{ $company->name }}</h3>
		</div>
	    <div class="panel-body">
		    <form class="form-horizontal" action="{{ action('CompanyController@update') }}" role="form" method="POST">				

				<input type="hidden" name="_token" value="{{ csrf_token() }}">	
				<input type="hidden" name="cid" value="{{ $company->id }}">

        		<div class="form-group">
				    <label class="control-label col-sm-3" for="name">Naziv tvrtke</label>
				    <div class="col-sm-4">
				      <input type="text" class="form-control" name="name" value="{{ $company->name }}">

				        @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    	@endif

				    </div>
				  </div>

				  <div class="form-group">
				    <label class="control-label col-sm-3" for="phone">Tel/Mob</label>
				    <div class="col-sm-4"> 
				      <input type="text" class="form-control" name="phone" value="{{ $company->phone }}">

				        @if ($errors->has('phone'))
                        <span class="help-block">
                            <strong>{{ $errors->first('phone') }}</strong>
                        </span>
                    	@endif

				    </div>
				  </div>

				  <div class="form-group">
				    <label class="control-label col-sm-3" for="email">E-mail</label>
				    <div class="col-sm-4">
				      <input type="email" class="form-control" name="email" value="{{ $company->email }}">

				        @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    	@endif

				    </div>
				  </div>

				  <div class="form-group">
				    <label class="control-label col-sm-3" for="contact">Kontakt osoba</label>
				    <div class="col-sm-4">
				      <input type="text" class="form-control" name="contact" value="{{ $company->contact }}">

				        @if ($errors->has('contact'))
                        <span class="help-block">
                            <strong>{{ $errors->first('contact') }}</strong>
                        </span>
                    	@endif

				    </div>
				  </div>

				  <div class="form-group">
				    <label class="control-label col-sm-3" for="role">Djelatnost</label>
				    <div class="col-sm-4">
				      <input type="text" class="form-control" name="role" value="{{ $company->role }}">

				        @if ($errors->has('role'))
                        <span class="help-block">
                            <strong>{{ $errors->first('role') }}</strong>
                        </span>
                    	@endif

				    </div>
				  </div>

				  <div class="form-group">
				    <label class="control-label col-sm-3" for="mb">Matični broj</label>
				    <div class="col-sm-4"> 
				      <input type="text" class="form-control" name="mb" value="{{ $company->mb }}">

				        @if ($errors->has('mb'))
                        <span class="help-block">
                            <strong>{{ $errors->first('mb') }}</strong>
                        </span>
                    	@endif

				    </div>
				  </div>

				<div class="form-group">
				    <label class="control-label col-sm-3" for="name">Vrsta</label>
				    <div class="col-sm-4">
				      <select class="form-control" name="type">
							<option value="d.o.o." @if($company->type == 'd.o.o.') selected @endif>D.O.O.</option>
							<option value="obrt" @if($company->type == 'obrt') selected @endif>OBRT</option>
                      		<option value="udruga" @if($company->type == 'udruga') selected @endif>UDRUGA</option>
							<option value="ostalo" @if($company->type == 'ostalo') selected @endif>OSTALO</option>
				      </select>

				        @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
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

</div>

@stop