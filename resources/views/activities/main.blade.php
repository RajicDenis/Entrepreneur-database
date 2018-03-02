@extends('activities.app')

@section('content')

<style>
	.header {
		display: none;
	}
	.a-name {
		float: right;
		margin: 10px 15px;
		background: darkgrey;
		padding: 8px 15px;
		border-radius: 5px;
		box-shadow: inset 0 0 5px rgba(8,8,8,0.7);
		font-family: 'Amaranth';
		color: white;
		cursor: pointer;
	}
	.btn-box {
		width: 100%;
	    height: 50px;
	    display: flex;
	    justify-content: center;
	    align-items: center;
	    margin-top: 20px;
	}
	#need_table {
		width: 75%;
	}
	.need-table {
		display: none;
    	justify-content: center;
    	margin-top: 40px;
	}
	.w120 {
		width: 120px;
	}
	.mark {
		background: #19A1CE;
		color: black;
		box-shadow: 0 0 5px rgba(8,8,8,0.7);
	}
	.shown {
		display: flex;
	}
	.glyphicon-plus {
		color: limegreen;
		font-size: 18px;
	}
	.glyphicon-trash {
		font-size: 15px;
	    color: red;
	    margin-top: 5px;
	}
	.center {
		display: flex;
		width: 100%;
		justify-content: center;
		margin-top: 30px;
	}
	.goback {
		padding: 6px;
	}
	.exportbox {
		width: 100%;
		display: flex;
		justify-content: center;
		align-items: center;
		margin-top: 20px;
	}
	.modal-title {
		text-align: center;
    	font-weight: 600;
    	font-family: 'Amaranth', sans-serif;
	}

</style>

<script>
	$(document).ready(function() {


		/*$('.need-table').each(function() {
			if($(this).data('id') != 1) {
				$(this).removeClass('shown');
			}
		});

		$('.a-name').each(function() {
			if($(this).data('id') == 1) {
				$(this).addClass('mark');
			}
		});

		$tableid = $('.need-table').data('id');

		$('.a-name').on('click', function() {
			$nametag = $(this).data('id');

			$('.a-name').removeClass('mark');
			$(this).addClass('mark');

			$('.need-table').removeClass('shown');
			$('[data-id='+$nametag+']').addClass('shown');

			$('.lid').val($nametag);
			
		});
    
    	$( ".sort" ).sortable({
			placeholder: "ui-state-highlight",
			cursor: 'pointer',
			start: function(e, ui) {
		        // creates a temporary attribute on the element with the old index
		        $(this).attr('data-previndex', ui.item.index());
		    },
		    update: function(e, ui) {
		        // gets the new and old index then removes the temporary attribute
		        var newIndex = ui.item.index();
		        var oldIndex = $(this).attr('data-previndex');
		        var personID = $('.mark').data('id');
		        $(this).removeAttr('data-previndex');
		        $.ajax({
		        	url: '{{ action('ActivityController@changeOrder') }}',
		        	type: 'GET',
		        	data: {
		        		old: oldIndex, 
		        		new: newIndex,
		        		id: personID
		        	}
		        });

		    }

		});*/

	});

</script>


<a href="{{ URL::route('home') }}" class="glyphicon glyphicon-home goback"></a>

<h1 class="a-title">AKTIVNOSTI</h1> 

<div class="btn-box">
	@foreach($person as $p)
    	<a data-id={{$p->id}} href="{{ action('ActivityController@index', $p->id) }}" @if($p->id == $selected->id) class="a-name mark" @else class="a-name" @endif>{{ $p->name }}</a> 
    @endforeach
</div>

@if(Session::has('remove'))
	<div class="center">
		<div class="alert {{ Session::get('alert_type') }} fade in">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			{{ Session::get('remove') }}
		</div>
	</div>
@endif

<div class="exportbox"><button type="button" class="btn btn-success exportbtn" data-toggle="modal" data-target="#newList"><div class="glyphicon glyphicon-save"></div></button></div>


	<div class="need-table responsive shown" data-id={{ $p->id }}>

	    <table class="table table-hover" id="need_table">
	        <thead>

	            <tr style="background: dimgrey; color: white;">
	            	<th style="width: 50px;">RB</th>
	                <th>Opis</th>
	                <th class="w120">Datum</th>
	                <th style="width: 25px;"></th>
					<th style="width: 25px;"></th>
	            </tr>

	        </thead>

	        <tbody class="sort">  
				
				@php $e = 1; $d = ''; @endphp
				@foreach($activities as $act)
            		@if(App\Utilities::getDiffDays($act->date) < 15)
					
		             <tr @if($act->date != $d && $d != '') style="border-top: 2px solid black;" @endif>
		             	<td>{{ $e }}</td>
		                <td>{{ $act->desc }}</td>
		                <td class="bb">
		                	@if($d == '' || $act->date != $d)
		                	{{ date('d.m.Y', strtotime($act->date)) }}
		                	@endif
		                </td>
		                <td style="width: 25px;"><a href="{{ action('ActivityController@edit', $act->id) }}" class="btn btn-warning btn-xs editm">Uredi</a></td>
		                <td><a href="{{ action('ActivityController@destroy', $act->id) }}" class="glyphicon glyphicon-trash del"></a></td>

		            </tr>
		            @php $e += 1; $d = $act->date; @endphp
	               
            	   @endif
	            @endforeach
	            	<tr>
	            		<td colspan=5><a href="{{ action('ActivityController@create', $act->people_id) }}"><div class="glyphicon glyphicon-plus"></div></a></td>
	            	</tr>

	        </tbody>
	    </table>

	</div>




<!-- Interest Modal -->
<div class="modal fade" id="newList" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Izlistaj aktivnosti</h5>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" action="{{ action('ExcelController@getExport') }}" role="form" method="POST">				
			<input type="hidden" name="_token" value="{{ csrf_token() }}">	
			<input type="hidden" class="lid" name="lid" value="{{$selected->id}}">	

    		<div class="form-group">
			    <label class="control-label col-sm-3" for="name">Početni datum</label>
			    <input type="date" name="start_date" required>

		        @if ($errors->has('name'))
                <span class="help-block">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            	@endif

			</div>

			<div class="form-group">
			    <label class="control-label col-sm-3" for="name">Završni datum</label>
			    <input type="date" name="end_date" required>

		        @if ($errors->has('name'))
                <span class="help-block">
                    <strong>{{ $errors->first('name') }}</strong>
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

@endsection