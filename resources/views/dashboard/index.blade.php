@extends('adminlte::page')

@section('css')
<link rel="stylesheet" href="{{asset('css/style.css')}}">
@stop


@section('content')
<div class="card">

  <div class="card-header">
    <h3>Bienvenido {{auth()->user()->name}} </h3>
  </div>
  @can('dashboard')
  <div class="card-body">
  </div>
  @endcan
</div>
@stop

@section('footer')
      <div class="text-center">
          <p class="alert" style="background-color: rgba(255,255,255,0.7); color:teal; font-size:10px;"><strong>- WALTER BAMAC - TODOS LOS DERECHOS RESERVADOS © 2022</strong></p>
      </div>
 @endsection

@section('js')
@endsection
