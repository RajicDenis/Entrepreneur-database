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
	<div class="main">
		<div class="db-table responsive">
	      <table class="table table-hover" id="company_table">
	            <thead>

	              <tr>
	                <th class="rb">ID</th>
	                <th>NAZIV TVRTKE</th>
	                <th>MB</th>
	                <th>TEL/MOB</th>
	                <th>EMAIL</th>
	                <th>DJELATNOST</th>
	                <th>KONTAKT</th>
	                <th class="cont"></th>
	              </tr>

	            </thead>

	            <tbody>
	            @php $emails=[]; @endphp
				
	          	@foreach($companies as $company)
					@foreach($filtered as $f)
						@if($pid == 1)
							@if($company->id == $f->company_id)
			                  <tr class="tr-type" data-type="{{ $company->type }}">
			                    <td><a class="lnk" href="{{ action('CompanyController@showCompany', $company->id) }}">{{ $company->id }}</a></td>
			                    <td><a class="lnk" href="{{ action('CompanyController@showCompany', $company->id) }}">{{ $company->name }}</a></td>
			                    <td><a class="lnk" href="{{ action('CompanyController@showCompany', $company->id) }}">{{ $company->mb }}</a></td>
			                    <td><a class="lnk" href="{{ action('CompanyController@showCompany', $company->id) }}">{{ $company->phone }}</a></td>
			                    <td><a class="lnk" href="{{ action('CompanyController@showCompany', $company->id) }}">{{ $company->email }}</a></td>
			                    <td><a class="lnk" href="{{ action('CompanyController@showCompany', $company->id) }}">{{ $company->role }}</a></td>
			                    <td><a class="lnk" href="{{ action('CompanyController@showCompany', $company->id) }}">{{ $company->contact }}</a></td>
			                    <td class="del-td"><a class="del" href="{{ action('CompanyController@remove', $company->id) }}"><span class="glyphicon glyphicon-trash"></span></a></td>
			                  </tr>

			                  	@if($company->email != '') 
									{{$emails = $company->email.';'}} 
			                 	@endif

			                @endif
			            @endif
			            @if($pid == 2)
							@if($company->id == $f->id)
			                  <tr class="tr-type" data-type="{{ $company->type }}">
			                    <td><a class="lnk" href="{{ action('CompanyController@showCompany', $company->id) }}">{{ $company->id }}</a></td>
			                    <td><a class="lnk" href="{{ action('CompanyController@showCompany', $company->id) }}">{{ $company->name }}</a></td>
			                    <td><a class="lnk" href="{{ action('CompanyController@showCompany', $company->id) }}">{{ $company->mb }}</a></td>
			                    <td><a class="lnk" href="{{ action('CompanyController@showCompany', $company->id) }}">{{ $company->phone }}</a></td>
			                    <td><a class="lnk" href="{{ action('CompanyController@showCompany', $company->id) }}">{{ $company->fax }}</a></td>
			                    <td><a class="lnk" href="{{ action('CompanyController@showCompany', $company->id) }}">{{ $company->role }}</a></td>
			                    <td><a class="lnk" href="{{ action('CompanyController@showCompany', $company->id) }}">{{ $company->contact }}</a></td>
			                    <td class="del-td"><a class="del" href="{{ action('CompanyController@remove', $company->id) }}"><span class="glyphicon glyphicon-trash"></span></a></td>
			                  </tr>
			                    
			                  	@if($company->email != '') 
									{{$emails = $company->email.';'}} 
			                 	@endif
								              
			                @endif
			            @endif
			            @if($pid == 3)
			            	@foreach($roled as $r)
								@if($company->id == $f->company_id && $company->id == $r->id)
				                  <tr class="tr-type" data-type="{{ $company->type }}">
				                    <td><a class="lnk" href="{{ action('CompanyController@showCompany', $company->id) }}">{{ $company->id }}</a></td>
				                    <td><a class="lnk" href="{{ action('CompanyController@showCompany', $company->id) }}">{{ $company->name }}</a></td>
				                    <td><a class="lnk" href="{{ action('CompanyController@showCompany', $company->id) }}">{{ $company->mb }}</a></td>
				                    <td><a class="lnk" href="{{ action('CompanyController@showCompany', $company->id) }}">{{ $company->phone }}</a></td>
				                    <td><a class="lnk" href="{{ action('CompanyController@showCompany', $company->id) }}">{{ $company->fax }}</a></td>
				                    <td><a class="lnk" href="{{ action('CompanyController@showCompany', $company->id) }}">{{ $company->role }}</a></td>
				                    <td><a class="lnk" href="{{ action('CompanyController@showCompany', $company->id) }}">{{ $company->contact }}</a></td>
				                    <td class="del-td"><a class="del" href="{{ action('CompanyController@remove', $company->id) }}"><span class="glyphicon glyphicon-trash"></span></a></td>
				                  </tr>

				                  	@if($company->email != '') 
										{{$emails = $company->email.';'}} 
			                 		@endif
				                @endif
				            @endforeach
			            @endif
		            @endforeach
	            @endforeach
	          
	          </tbody>
	      	</table>
	      	
	  	</div>
	</div>
</div>
@stop