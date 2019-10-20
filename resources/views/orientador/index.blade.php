@extends('layouts.opcion')

@section('content')
    <div class="orientador">
      <div class="cont">
        <div class="subtitulo" style="text-align:center; color:#333;">
          <p>Orientador vocacional</p>
        </div>
        <div class="">
          <div class="">
            <p>Elegir una carrear es una decision muy importante, un punto clave
              conocerse a si mismo, saber que cosas nos gustan y que cosas nos desgradan.
              Este test fue diseñado con la finalidad de que puedas identificar tus intereses
              en base a cosas que podrian agradarte.</p>
            <p>El orientador vocacional funciona con la ayuda de un sistema experto,
              el cual analiza una serie de reglas generadas a partir de una investigacion
              previa con un especialista en el tema.</p>
          </div>
          <div class="">
            <a class="btn btn-primary" href="{{route('vocacion.test')}}">Empezar</a>
          </div>
        </div>
      </div>
    </div>
@endsection
