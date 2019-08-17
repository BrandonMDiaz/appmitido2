@extends('layouts.opcion')

@section('content')

  <div class="contenido">
      <div class="categorias-tutoriales">
        <div class="wrapper-tutoriales">
          <h3 class="subtitulo">Tutoriales</h3>

          <ul id="lista-tutoriales">
            <li>
              <p onclick="dropDown(this)" class="titulo-tutorial">
                Matematicas
              </p>
              <ul class="sub-menu">
                <li>Divisiones</li>
                <li>Fracciones</li>
                <li>Logica</li>
              </ul>
            </li>
            <li>
              <p class="titulo-tutorial">Español</p>
              <ul>
                <li>Gramatica</li>
                <li>Conjugacion</li>
                <li>Lecturas</li>
              </ul>
            </li>
            <li>
              <p class="titulo-tutorial">Ingles</p>
              <ul>
                <li>Grammar</li>
                <li>Conjugations</li>
                <li>Readings</li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
      <div>
        <h3 class="subtitulo">Examenes</h3>
        <div class="categorias-examenes">

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
          
          <div class="categoria-examen-2">
            <img src="{{URL::asset('/images/math.jpg')}}" class="categoria-examen-img">
            <div class="categoria-examen-body">
              <p class="nombre-categoria-2">Matematicas</p>
            </div>
          </div>

        </div>
      </div>
    </div>
  <script src="{{ asset('js/dropDown.js') }}" defer></script>
@endsection
