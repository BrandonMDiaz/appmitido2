@extends('layouts.opcion')

@section('content')
  <div class="res-voc">
    <div class="body-voc">
      <div class="text-center">
        <p class="subtitulo">
          {{$carrera}}
        </p>
      </div>
      <div class="texto-div">
        <p class="texto-voc">
          {{ $texto[0]}}
        </p>
        <p class="texto-voc">
          {{$texto[1]}}
        </p>
      </div>
    <div class="centrar">
      <a href="{{route('examen.index')}}" class="btn btn-primary">Comenzar a estudiar</a>
    </div>
  </div>

  </div>

@endsection
