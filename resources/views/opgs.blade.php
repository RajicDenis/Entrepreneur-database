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
          <table class="table table-hover" id="opg_table">
              <thead>

                  <tr>
                    <th class="rb">ID</th>
                    <th>GRAD</th>
                    <th>NASELJE</th>
                    <th>MB</th>
                    <th>NAZIV</th>
                    <th>ULICA</th>
                    <th>EMAIL</th>
                    <th>TEL</th>
                    <th class="cont"></th>
                  </tr>

              </thead>

              <tbody>

              @foreach($opgs as $opg)
                  <tr class="tr-type">
                    <td><a class="lnk" href="{{ action('OpgController@showOpg', $opg->id) }}">{{ $opg->id }}</a></td>
                    <td><a class="lnk" href="{{ action('OpgController@showOpg', $opg->id) }}">{{ $opg->city }}</a></td>
                    <td><a class="lnk" href="{{ action('OpgController@showOpg', $opg->id) }}">{{ $opg->town }}</a></td>
                    <td><a class="lnk" href="{{ action('OpgController@showOpg', $opg->id) }}">{{ $opg->mb }}</a></td>
                    <td><a class="lnk" href="{{ action('OpgController@showOpg', $opg->id) }}">{{ $opg->name }}</a></td>
                    <td><a class="lnk" href="{{ action('OpgController@showOpg', $opg->id) }}">{{ $opg->street }}</a></td>
                    <td><a class="lnk" href="{{ action('OpgController@showOpg', $opg->id) }}">{{ $opg->email }}</a></td>
                    <td><a class="lnk" href="{{ action('OpgController@showOpg', $opg->id) }}">{{ $opg->tel }}</a></td>
                    <td class="del-td"><a class="del" href="{{ action('OpgController@remove', $opg->id) }}"><span class="glyphicon glyphicon-trash"></span></a></td>
                  </tr>
              @endforeach
              
              </tbody>
          </table>
      </div>

  </div>

</div>

@stop