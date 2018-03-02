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
        .col-md-10 {
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

<div class="col-md-10 col-md-offset-1 mb">

  @if(Session::has('created'))
    <div class="center">
      <div class="alert {{ Session::get('alert_type') }} fade in">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        {{ Session::get('created') }}
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

  <div class="main">
                    
      <div class="db-table responsive">
          <table class="table table-hover" id="company_table">
              <thead>

                  <tr>
                    <th class="rb">ID</th>
                    <th>NAZIV TVRTKE</th>
                    <th>TEL/MOB</th>
                    <th>E-MAIL</th>
                    <th>DJELATNOST</th>
                    <th>KONTAKT</th>
                    <th>VRSTA</th>
                    <th class="cont"></th>
                  </tr>

              </thead>

              <tbody>

              @foreach($companies as $company)
                  <tr class="tr-type" data-type="{{ $company->type }}">
                    <td><a class="lnk" href="{{ action('CompanyController@showCompany', $company->id) }}">{{ $company->id }}</a></td>
                    <td><a class="lnk" href="{{ action('CompanyController@showCompany', $company->id) }}">{{ $company->name }}</a></td>
                    <td><a class="lnk" href="{{ action('CompanyController@showCompany', $company->id) }}">{{ $company->phone }}</a></td>
                    <td><a class="lnk" href="{{ action('CompanyController@showCompany', $company->id) }}">{{ $company->email }}</a></td>
                    <td><a class="lnk" href="{{ action('CompanyController@showCompany', $company->id) }}">{{ $company->role }}</a></td>
                    <td><a class="lnk" href="{{ action('CompanyController@showCompany', $company->id) }}">{{ $company->contact }}</a></td>
                    <td><a class="lnk" href="{{ action('CompanyController@showCompany', $company->id) }}">{{ $company->type }}</a></td>
                    <td class="del-td"><a class="del" href="{{ action('CompanyController@remove', $company->id) }}"><span class="glyphicon glyphicon-trash"></span></a></td>
                  </tr>
              @endforeach
              
              </tbody>
          </table>
      </div>

     


  </div>

</div>



@stop