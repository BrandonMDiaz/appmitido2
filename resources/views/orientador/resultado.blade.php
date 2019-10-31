@extends('layouts.opcion')

@section('content')
  <div class="res-voc">
    @if (count($carreras) != 0)
      <div class="flex2">
      @foreach ($carreras as $carrera)
        <div class="body-voc" style="margin-bottom: 30px;">
          <div class="text-center">
            <p class="subtitulo">
              {{$carrera}}
            </p>
          </div>
          <div class="texto-div">
            <p class="texto-voc">
              {{ $texto[$loop->index][0]}}
            </p>
            <p class="texto-voc">
              {{$texto[$loop->index][1]}}
            </p>
          </div>
        <div class="centrar">
          <a href="{{route('examen.index')}}" class="btn btn-primary">Comenzar a estudiar</a>
        </div>
      </div>
      @endforeach
    </div>

    @else
      <div class="body-voc">
        <div class="text-center">
          <p class="subtitulo">
            Sigue intentando
          </p>
        </div>
        <div class="texto-div">
          <p>No se encontró una carrera</p>
        </div>
      <div class="centrar">
        <a href="{{route('examen.index')}}" class="btn btn-primary">Comenzar a estudiar</a>
      </div>
    </div>
    @endif



  </div>

@endsection
