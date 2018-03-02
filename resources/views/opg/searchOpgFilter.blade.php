@extends('layouts.app')

@section('content')

<style>
	/* Alert */
    .alert-success, .alert-danger {
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

	<div class="col-md-8 col-md-offset-2">
		<div class="db-table responsive">
	      <table class="table table-hover" id="opg_table">
	            <thead>

	              <tr>
                    <th class="rb">ID</th>
                    <th>GRAD</th>
                    <th>MB</th>
                    <th>NAZIV</th>
                    <th>ULICA</th>
                    <th>EMAIL</th>
                    <th>TEL</th>
                    <th class="cont"></th>
                  </tr>

	            </thead>

	            <tbody>
	            @php $emails=[]; @endphp
				
	          	@foreach($opgs as $opg)
					@foreach($filtered as $f)

							@if($opg->id == $f->opg_id)
			                  <tr class="tr-type">
			                    <td><a class="lnk" href="{{ action('OpgController@showOpg', $opg->id) }}">{{ $opg->id }}</a></td>
			                    <td><a class="lnk" href="{{ action('OpgController@showOpg', $opg->id) }}">{{ $opg->city }}</a></td>
			                    <td><a class="lnk" href="{{ action('OpgController@showOpg', $opg->id) }}">{{ $opg->mb }}</a></td>
			                    <td><a class="lnk" href="{{ action('OpgController@showOpg', $opg->id) }}">{{ $opg->name }}</a></td>
			                    <td><a class="lnk" href="{{ action('OpgController@showOpg', $opg->id) }}">{{ $opg->street }}</a></td>
			                    <td><a class="lnk" href="{{ action('OpgController@showOpg', $opg->id) }}">{{ $opg->email }}</a></td>
			                    <td><a class="lnk" href="{{ action('OpgController@showOpg', $opg->id) }}">{{ $opg->tel }}</a></td>
			                    <td class="del-td"><a class="del" href="{{ action('OpgController@remove', $opg->id) }}"><span class="glyphicon glyphicon-trash"></span></a></td>
			                  </tr>

			                  	@if($opg->email != '') 
									{{$emails = $opg->email.';'}} 
			                 	@endif

			                @endif
       
		            @endforeach
	            @endforeach
	          
	          </tbody>
	      	</table>
	      	
	  	</div>
	</div>
@stop