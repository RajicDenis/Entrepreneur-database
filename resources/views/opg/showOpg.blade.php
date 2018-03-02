@extends('layouts.app')

<style>
	.showbox {
		position: relative;
		display: flex;
		flex-direction: row;
		width: 100%;
		height: 500px;
		box-shadow: 0 0 10px rgba(8,8,8,0.8);
		border-radius: 20px;
		background-size: cover;
	}
	.bcg {
		width: 100%;
		height: 500px;
		pointer-events: none;
	}
	.showbox, .bcg {
	    border-top-left-radius: 90px;
        border-bottom-right-radius: 90px;
	}
	.mb {
		padding-bottom: 100px;
		padding-top: 30px;
	}
	.bc-left {
		position: absolute;
		display: flex;
		flex-direction: column;
		justify-content: center;
		align-items: center;
		color: black;
		width: 250px;
		height: 100%;
		font-weight: 600;
		font-family: 'Amaranth', sans-serif;
	}
	.bc-lgo {
		width: 60px;
		height: 60px;
		background-size: cover;
	}
	.bc-right {
		position: absolute;
		display: flex;
		flex-direction: column;
		justify-content: center;
		align-items: flex-end;
    	padding-right: 60px;
		color: white;
		width: 60%;
		height: 80%;
		right: 0;
	}
	.info {
		font-family: 'Amaranth', sans-serif;
		font-size: 20px;
		padding: 15px 0;
	}
	.glyphicon {
		font-size: 25px;
		margin-left: 15px;
	}
	.glyphicon-search, .glyphicon-plus {
		margin:0 !important;
	}
	h1 {
		font-weight: 600;
	}
	.edit-btn {
		position: absolute;
		display: flex;
		justify-content: center;
		align-items: center;
		color: white;
		width: 50px;
		height: 50px;
		border-radius: 8px;
		box-shadow: 0 0 7px rgba(8,8,8,0.7);
		background: #ff571a;
		margin: 24% 50%;
		opacity: 0;
		transition: all 0.3s ease-in-out;
	}
	.edit-btn:hover {
		text-decoration: none;
		color: #ff003f;
	}
	.glyphicon-edit {
		margin: 0;
	}
	/* Alert */
    .alert-warning, .alert-success, .alert-danger {
        text-align: center;
        font-family: 'Amaranth', sans-serif;
        font-size: 17px;
    }

    /* Contact table */
    .contact {
	    margin-top: 50px;
    }
    .panel-heading {
    	background: #ff003f !important;
    }
    .panel-title {
    	text-align: center;
    	font-family: 'Amaranth', sans-serif;
    	font-size: 20px;
    	color: white !important;
    }
    th {
    	background: white !important;
    	color: black !important;
    }
    .panel-body {
    	display: flex;
	    flex-direction: column;
	    justify-content: center;
	    align-items: center;
    }

    /* Modal */
    .txtarea {
    	width: 70% !important;
    }
    .btn-box {
    	text-align: center;
    	margin-top: 25px;
    }
    .modal-header {
    	text-align: center;
    	font-family: 'Amaranth', sans-serif;
    	font-size: 25px;
    }

	.select2 {
		display: block !important;
	}

	.glyphicon-remove {
		color: #ff003f;
		font-size: 18px;
		transition: all 0.2s ease-in-out;
	}
	.glyphicon-remove:hover {
		transform: scale(1.15);
	}

    @media all and (max-width: 1500px) {
    	.mb {
    		width: 85% !important;
    		margin-left: 7.5% !important;
    	}
    }

    @media all and (max-width: 800px) {
    	.bc-left {
		    width: 150px;
    	}
    	.bc-right {
    		padding-right: 15px;
    	}
    	.edit-btn {
    		top: 50px;
    	}
    }

    @media all and (max-width: 480px) {
    	.hiden {
    		display: none !important;
    	}
    }

    @media all and (max-width: 400px) {
    	.bcg {
    		display: none;
    	}
    	.showbox {
    		flex-direction: column;
    		height: 700px;
    	}
    	.bc-left {
    		position: relative;
    		width: 100%;
    	}
    	.bc-right {
    		position: relative;
    		color: black;
    		width: 100%;
    		align-items: center;
    	}
    	.edit-btn {
    		top: 250px;
    		left: -20px;
    	}
    }
	
</style>

@section('content')

<div class="col-md-6 col-md-offset-3 mb">

	@if(Session::has('company'))
		<div class="center">
			<div class="alert {{ Session::get('alert_type') }} fade in">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				{{ Session::get('company') }}
			</div>
		</div>
	@endif

	@if(Session::has('contact'))
		<div class="center">
			<div class="alert {{ Session::get('alert_type') }} fade in">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				{{ Session::get('contact') }}
			</div>
		</div>
	@endif

	@if(Session::has('editContact'))
		<div class="center">
			<div class="alert {{ Session::get('alert_type') }} fade in">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				{{ Session::get('editContact') }}
			</div>
		</div>
	@endif

	@if(Session::has('newInterest'))
		<div class="center">
			<div class="alert {{ Session::get('alert_type') }} fade in">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				{{ Session::get('newInterest') }}
			</div>
		</div>
	@endif

	@if(Session::has('removeInterest'))
		<div class="center">
			<div class="alert {{ Session::get('alert_type') }} fade in">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				{{ Session::get('removeInterest') }}
			</div>
		</div>
	@endif

	<div class="showbox">
		<img class="bcg" src="{{ asset('public/images/bcn.png') }}">

		<div class="bc-left">
			<img class="bc-lgo" src="{{ asset('public/images/lg.png') }}">
			<h1 style="text-align: center;">{{ $opg->name }}</h1>
			<h4 style="text-align: center;">({{ $opg->city }})</h2>
		</div>

		<div class="bc-right">
			<div class="info">{{ $opg->street }}<span class="glyphicon glyphicon-home hiden"></span></div>
			<div class="info">{{ $opg->email }}<span class="glyphicon glyphicon-envelope hiden"></span></div>
			<div class="info">{{ $opg->tel }}<span class="glyphicon glyphicon-phone-alt hiden"></span></div>
			<div class="info">{{ $opg->mb }}<span class="glyphicon glyphicon-asterisk hiden"></span></div>
		</div>

		<a class="edit-btn" href="{{ action('OpgController@edit', $opg->id) }}"><span class="glyphicon glyphicon-edit"></span></a>
	</div>

	<div class="contact">
		
		<div class="panel panel-default">
			<div class="panel-heading">
		    	<h3 class="panel-title">Kontakt</h3>
		  	</div>

		  	<div class="panel-body">
		    	<table class="table table-striped">

				  <thead>

				    <tr>
				      <th>#</th>
				      <th>Opis aktivnosti</th>
				      <th>Datum</th>
				      <th style="width: 25px;"></th>
				    </tr>

				  </thead>

				  <tbody>
					@php $e = 1; @endphp
					@foreach($opg->contacts as $c)
					    <tr>
					      <td>{{$e}}</td>
					      <td>{{ $c->desc }}</td>
					      <td>{{ date('d.m.Y', strtotime($c->date)) }}</td>
					      <td style="width: 25px;"><a href="{{ action('OpgcontactController@editContact', $c->id) }}" class="btn btn-warning btn-xs">Uredi</a></td>
					    </tr>
					   @php $e++; @endphp
					@endforeach
				  </tbody>
				</table>

				<button type="button" class="btn btn-success" data-toggle="modal" data-target="#newContact">Dodaj</button>

		  	</div>
		</div>

	</div>

	<div class="contact">
		
		<div class="panel panel-default">
			<div class="panel-heading">
		    	<h3 class="panel-title">Interesi</h3>
		  	</div>

		  	<div class="panel-body">
		    	<table class="table table-striped">

				  <thead>

				    <tr>
				      <th>#</th>
				      <th>Interes</th>
				      <th>Područje</th>
				      <th style="width: 25px;"></th>
				    </tr>

				  </thead>

				  <tbody>
					@php $e = 1; @endphp
					@foreach($opg->interests as $int)
					    <tr>
					      <td>{{ $e }}</td>
					      <td>{{ $int->name }}</td>
					      <td>{{ $int->area }}</td>
					      <td style="width: 25px;"><a class="del" href="{{ action('InterestController@removeOpgInterest', $int->id) }}"><span class="glyphicon glyphicon-remove"></span></a></td>
					    </tr>
					   @php $e++; @endphp
					@endforeach
				  </tbody>
				</table>

				<button type="button" class="btn btn-success" data-toggle="modal" data-target="#newInterest">Dodaj</button>

		  	</div>
		</div>

	</div>

</div>

<!-- Create Modal -->
<div class="modal fade" id="newContact" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Dodaj novi događaj</h5>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" action="{{ action('OpgcontactController@addNew') }}" role="form" method="POST">				
			<input type="hidden" name="_token" value="{{ csrf_token() }}">	
			<input type="hidden" name="cid" value="{{ $opg->id }}">	

    		<div class="form-group">
			    <label class="control-label col-sm-3" for="desc">Opis aktivnosti</label>
			    <div class="col-sm-4 txtarea">
			      <textarea class="form-control" name="desc" rows="4" required></textarea>

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
			      <input type="date" name="date" required>

			        @if ($errors->has('date'))
                    <span class="help-block">
                        <strong>{{ $errors->first('date') }}</strong>
                    </span>
                	@endif

			    </div>
			  </div>

			<div class="btn-box">
			  <button type="button" class="btn btn-default" data-dismiss="modal">Zatvori</button>
        	  <button type="submit" class="btn btn-success">Spremi</button>
        	</div>
		</form>

      </div>
    </div>
  </div>
</div>

<!-- Interest Modal -->
<div class="modal fade" id="newInterest" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Dodaj novi interes</h5>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" action="{{ action('InterestController@addOpgInterest') }}" role="form" method="POST">				
			<input type="hidden" name="_token" value="{{ csrf_token() }}">	
			<input type="hidden" name="cid" value="{{ $opg->id }}">	

    		<div class="form-group">
			    <label class="control-label col-sm-3" for="name">Interes</label>
			    <div class="col-sm-4 txtarea">
			      <select class="interest2" name="interests[]" multiple="multiple">
			      	@foreach($interests as $int)
			      
						<option value="{{ $int->id }}">{{ $int->name }}</option>
						
			      	@endforeach
			      </select>

			        @if ($errors->has('name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                	@endif

			    </div>
			  </div>

			<div class="btn-box">
			  <button type="button" class="btn btn-default" data-dismiss="modal">Zatvori</button>
        	  <button type="submit" class="btn btn-success">Spremi</button>
        	</div>
		</form>

      </div>
    </div>
  </div>
</div>

@stop