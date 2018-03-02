@extends('layouts.app')

@section('content')

<style>
  .main-container {
    position: relative;
  }
  .wrap {
    position: absolute;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    margin-top: 50px;
    width: 100%;
    color: black;
  }
    
</style>

<div class="wrap">

    @foreach($test as $t)
      {{$t->email}}@if($t->email != null);@endif
      
    @endforeach

    {{--@foreach($opgs as $opg)
      {{$opg}}@if($opg != null);@endif
    @endforeach--}}

	

    <a href="show" class="btn btn-primary desc">Desc</a>
</div>

@stop