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
	.hd2 {
		background: white !important;
		color: black !important;
	}
	.bgw {
		background: white;
		color: black;
	}
	.glyphicon-remove {
		color: #ff003f;
		transition: all 0.2s ease-in-out;
	}
	.glyphicon-remove:hover {
		transform: scale(1.15);
	}

</style>

<div class="col-md-6 col-md-offset-3 mb">

	@if(Session::has('interest'))
		<div class="center">
			<div class="alert {{ Session::get('alert_type') }} fade in">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				{{ Session::get('interest') }}
			</div>
		</div>
	@endif

	@if(Session::has('remove'))
		<div class="center">
			<div class="alert {{ Session::get('alert_type') }} fade in">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				{{ Session::get('remove') }}
			</div>
		</div>
	@endif


	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">Dodaj interes</h3>
		</div>
	    <div class="panel-body">
		    <form class="form-horizontal" action="{{ action('InterestController@add') }}" role="form" method="POST">				
				<input type="hidden" name="_token" value="{{ csrf_token() }}">	

        		<div class="form-group">
				    <label class="control-label col-sm-3" for="name">Naziv</label>
				    <div class="col-sm-4">
				      <input type="text" class="form-control" name="name">

				        @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    	@endif

				    </div>
				  </div>

				  <div class="form-group">
				    <label class="control-label col-sm-3" for="area">Područje</label>
				    <div class="col-sm-4">
				      <input type="text" class="form-control" name="area">

				        @if ($errors->has('area'))
                        <span class="help-block">
                            <strong>{{ $errors->first('area') }}</strong>
                        </span>
                    	@endif

				    </div>
				  </div>
				 
				  <div class="form-group lo"> 
				      	<button type="submit" class="btn btn-warning">Dodaj</button>
				  </div>
				
        	</form>
	    </div>
	</div>

	<div class="contact">
		
		<div class="panel panel-default">
			<div class="panel-heading hd2">
		    	<h3 class="panel-title">Interesi</h3>
		  	</div>

		  	<div class="panel-body">
		    	<table class="table table-striped">

				  <thead>

				    <tr>
				      <th class="bgw">#</th>
				      <th class="bgw">Interes</th>
				      <th class="bgw">Područje</th>
				      <th class="bgw" style="width: 25px;"></th>
				    </tr>

				  </thead>

				  <tbody>
					@php $e = 1; @endphp
					@foreach($interests as $i)
					    <tr>
					      <td>{{$e}}</td>
					      <td>{{ $i->name }}</td>
					      <td>{{ $i->area }}</td>
					      <td style="width: 25px;"><a class="del" href="{{ action('InterestController@remove', $i->id) }}"><span class="glyphicon glyphicon-remove"></span></a></td>
					    </tr>
					   @php $e++; @endphp
					@endforeach
				  </tbody>
				</table>

		  	</div>
		</div>

	</div>

</div>

@stop