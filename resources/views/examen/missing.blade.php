@extends('layouts.opcion')

@section('content')
<div class="centrar" style="margin-top: 30px; ">

  <div class="card" style="width: 30rem; padding: 2%;">
    <h3>Lo sentimos!</h3>
    <h5>No hay mas preguntas por contestar, espera a que la universidad
    suba mas preguntas o practica con otra categoria.</h5>
    <a class="btn btn-primary"href="{{route('examen.index')}}">Volver</a>
  </div>
</div>

  @endsection
