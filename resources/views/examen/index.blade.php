@extends('layouts.opcion')

@section('content')

  <div class="">

    <div class="header-tutoriales subtitulo">
      <h1>Exámenes</h1>
    </div>
    <div class="container-examen">
      <div class="categorias-examenes">
        <div class="categoria-examen-2">
          <a href="{{ route('examen.show', ['id' => 2]) }}">
            <img src="{{URL::asset('/images/math.jpg')}}" class="categoria-examen-img">
            <div class="categoria-examen-body">
              <p class="nombre-categoria-2">Matematicas</p>
            </div>
          </a>
        </div>

        <div class="categoria-examen-2">
          <img src="{{URL::asset('/images/math.jpg')}}" class="categoria-examen-img">
          <div class="categoria-examen-body">
            <p class="nombre-categoria-2">Matematicas</p>
          </div>
        </div>

        <div class="categoria-examen-2">
          <img src="{{URL::asset('/images/math.jpg')}}" class="categoria-examen-img">
          <div class="categoria-examen-body">
            <p class="nombre-categoria-2">Matematicas</p>
          </div>
        </div>

        <div class="categoria-examen-2">
          <img src="{{URL::asset('/images/math.jpg')}}" class="categoria-examen-img">
          <div class="categoria-examen-body">
            <p class="nombre-categoria-2">Matematicas</p>
          </div>
        </div>

      </div>
    </div>

  </div>
@endsection
