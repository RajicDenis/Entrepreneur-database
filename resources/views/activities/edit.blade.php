@extends('activities.app')

@section('content')

<style>
	.lo {
		text-align: center;
	}
	.panel-title {
		text-align: center;
		font-family: 'Amaranth', sans-serif;
		font-weight: bold;
	}
	.form-group {
		display: flex;
		justify-content: center;
	}
	.txtarea {
		width: 500px;
	}
	
</style>

<a href="{{ action('ActivityController@index', $activity->people_id) }}" class="glyphicon glyphicon-chevron-left goback"></a>

<div class="col-md-6 col-md-offset-3 mb">

	<h1 class="a-title">AKTIVNOSTI -- {{ App\Utilities::getPerson($activity->people_id) }}</h1> 

	@if(Session::has('added'))
		<div class="center">
			<div class="alert {{ Session::get('alert_type') }} fade in">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				{{ Session::get('added') }}
			</div>
		</div>
	@endif

	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">Uredi aktivnost</h3>
		</div>
	    <div class="panel-body">
		    <form class="form-horizontal" action="{{ action('ActivityController@update') }}" role="form" method="POST">				
				<input type="hidden" name="_token" value="{{ csrf_token() }}">	
				<input type="hidden" name="aid" value="{{ $activity->id }}">	

	    		<div class="form-group">
				    <label class="control-label col-sm-3" for="desc">Opis aktivnosti</label>
				    <div class="col-sm-4 txtarea">
				      <textarea class="form-control" name="desc" rows="4" required>{{ $activity->desc }}</textarea>

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
				      <input type="date" name="date" value="{{ date('Y-m-d', strtotime($activity->date)) }}" required>

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

</div>

@endsection