@extends('layouts.app')

@section('content')

<style>
	/* Alert */
    .alert-success, .alert-danger, .alert-warning {
        text-align: center;
        font-family: 'Amaranth', sans-serif;
        font-size: 17px;
    }
    .glyphicon-trash {
        font-size: 18px;
        color: #ff003f;
        transition: 0.2s all ease-in-out;
    }
    .glyphicon-trash:hover {
        transform: scale(1.3);
    }
    .del-td {
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .row > .col-xs-12 {
        width: 100%;
        height: 55px;
        text-align: center;
    }
    .dataTables_filter {
        text-align: center !important;
    }
    .input-sm {
        height: 40px;
        width: 200px !important;
        text-align: center;
        font-family: 'Amaranth', sans-serif;
        font-size: 18px;
    }
    .main {
        padding-bottom: 80px;
    }
    .table-hover {
        padding-bottom: 100px;
    }
    .db-table {
    	text-align: center;
    }
    .dataTables_wrapper {
    	padding-top: 20px;
    }
    .btn-box {
    	display: flex;
    	justify-content: center;
    	width: 100%;
    	font-family: 'Amaranth', sans-serif;
    }
    .addRegister {
    	width: 150px;
    }
    .modal-header {
    	text-align: center;
    	font-family: 'Amaranth', sans-serif;
    	font-size: 25px;
    }
    .form-group {
    	display: flex;
    	margin: 0 0 15px 0 !important;
    }
    .control-label {
    	width: 30%;
    }
    .form-control {
    	width: 70%;
    }
	.btn-default {
		margin-right: 10px;
	}
	.glyphicon-remove {
		color: #ff003f;
		font-size: 18px;
		transition: all 0.2s ease-in-out;
	}
	.glyphicon-remove:hover {
		transform: scale(1.15);
	}
	td {
		vertical-align: middle !important;
	}
    .reg-title {
        display: flex;
        justify-content: center;
        width: 100%;
        font-family: 'Amaranth', sans-serif;
        font-size: 27px;
        margin-bottom: 20px;
        border-bottom: 1px solid rgba(8,8,8,0.3);
    }

    @media all and (max-width: 1400px) {
        .col-md-8 {
            width: 85%;
            margin-left: 7.5%;
        }
    }

    @media all and (max-width: 980px) {
      .responsive {      
        overflow-x: auto !important;
      }
      .table {
        min-width: 930px !important;
      }
    }
</style>

<div class="col-md-8 col-md-offset-2 mb">

	@if(Session::has('success'))
		<div class="center">
			<div class="alert {{ Session::get('alert_type') }} fade in">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				{{ Session::get('success') }}
			</div>
		</div>
	@endif

	@if(Session::has('removed'))
		<div class="center">
			<div class="alert {{ Session::get('alert_type') }} fade in">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				{{ Session::get('removed') }}
			</div>
		</div>
	@endif

	<div class="main">
        <div class="reg-title">Evidencija poslanih dokumenata</div>
		<div class="btn-box"><a class="btn btn-success addRegister" data-toggle="modal" data-target="#newReg" href="#">Dodaj</a></div>
		<div class="db-table responsive">
	      <table class="table table-hover" id="reg_table">
	            <thead>

	              <tr>
	                <th class="rb">RB</th>
	                <th style="width: 100px;">DATUM</th>
	                <th>KLASIFIKACIJSKA OZNAKA</th>
	                <th>OPIS</th>
	                <th>POSLANO PUTEM</th>
	                <th>KOME</th>
	                <th></th>
	              </tr>

	            </thead>

	            <tbody>
	            @foreach($register as $r)
	            <tr>
	            	<td style="width: 5%;">{{ $r->id - 1 }}</td>
					<td style="width: 15%;"><a class="lnk" href="{{ action('RegisterController@show', $r->id) }}">{{ date('d-m-Y', strtotime($r->date)) }}</a></td>
					<td style="width: 10%;"><a class="lnk" href="{{ action('RegisterController@show', $r->id) }}">{{ $r->class }}</a></td>
					<td style="width: 40%;"><a class="lnk" href="{{ action('RegisterController@show', $r->id) }}">{{ $r->desc }}</a></td>
					<td style="width: 10%;"><a class="lnk" href="{{ action('RegisterController@show', $r->id) }}">{{ $r->via }}</a></td>
					<td style="width: 15%;"><a class="lnk" href="{{ action('RegisterController@show', $r->id) }}">{{ $r->subject }}</a></td>
					<td style="width: 5%;"><a class="del" href="{{ action('RegisterController@remove', $r->id) }}"><span class="glyphicon glyphicon-remove"></span></a></td>
				</tr>
	            @endforeach
	          
	          </tbody>
	      	</table>
	      	
	  	</div>
	</div>
</div>

<!-- Create Modal -->
<div class="modal fade" id="newReg" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Dodaj u evidenciju</h5>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" action="{{ action('RegisterController@addReg') }}" role="form" method="POST">				
			<input type="hidden" name="_token" value="{{ csrf_token() }}">	

			  <div class="form-group">
			    <label class="control-label col-sm-3" for="date">Datum</label>
			      <input type="date" name="date" required>

			        @if ($errors->has('date'))
                    <span class="help-block">
                        <strong>{{ $errors->first('date') }}</strong>
                    </span>
                	@endif

			  </div>

			  <div class="form-group">
			    <label class="control-label col-sm-3" for="class">Klasifikacijska oznaka</label>
			      <input type="text" class="form-control" name="class" required>

			        @if ($errors->has('class'))
                    <span class="help-block">
                        <strong>{{ $errors->first('class') }}</strong>
                    </span>
                	@endif
		    
			  </div>

			  <div class="form-group">
			    <label class="control-label col-sm-3" for="desc">Opis dokumenta</label>			    
			      <textarea class="form-control" name="desc" rows="4" required></textarea>

			        @if ($errors->has('desc'))
                    <span class="help-block">
                        <strong>{{ $errors->first('desc') }}</strong>
                    </span>
                	@endif

			    
			  </div>

			  <div class="form-group">
			    <label class="control-label col-sm-3" for="via">Poslano putem</label>
			      <input type="text" class="form-control" name="via">

			        @if ($errors->has('via'))
                    <span class="help-block">
                        <strong>{{ $errors->first('via') }}</strong>
                    </span>
                	@endif

			  </div>

			  <div class="form-group">
			    <label class="control-label col-sm-3" for="subject">Kome</label>
			      <input class="form-control" name="subject">

			        @if ($errors->has('subject'))
                    <span class="help-block">
                        <strong>{{ $errors->first('subject') }}</strong>
                    </span>
                	@endif

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