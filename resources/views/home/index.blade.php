@extends('layouts.header')

@section('content')

  <div class="contenido">
      <div class="categorias-tutoriales">
        <div class="wrapper-tutoriales">
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
              <p>Español</p>
              <ul>
                <li>Gramatica</li>
                <li>Conjugacion</li>
                <li>Lecturas</li>
              </ul>
            </li>
            <li>
              <p>Ingles</p>
              <ul>
                <li>Grammar</li>
                <li>Conjugations</li>
                <li>Readings</li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
      <div class="categorias-examenes">

        <div class="categoria-examen-2">
          <img src="img/matematicas.jpg" class="categoria-examen-img">
          <div class="categoria-examen-body">
            <p class="nombre-categoria-2">Matematicas</p>
          </div>
        </div>

        <div class="categoria-examen-2">
          <img src="img/matematicas.jpg" class="categoria-examen-img">
          <div class="categoria-examen-body">
            <p class="nombre-categoria-2">Matematicas</p>
          </div>
        </div>

        <div class="categoria-examen-2">
          <img src="img/matematicas.jpg" class="categoria-examen-img">
          <div class="categoria-examen-body">
            <p class="nombre-categoria-2">Matematicas</p>
          </div>
        </div>

        <div class="categoria-examen-2">
          <img src="img/matematicas.jpg" class="categoria-examen-img">
          <div class="categoria-examen-body">
            <p class="nombre-categoria-2">Matematicas</p>
          </div>
        </div>

        <div class="categoria-examen-2">
          <img src="img/matematicas.jpg" class="categoria-examen-img">
          <div class="categoria-examen-body">
            <p class="nombre-categoria-2">Matematicas</p>
          </div>
        </div>

        <div class="categoria-examen-2">
          <img src="img/matematicas.jpg" class="categoria-examen-img">
          <div class="categoria-examen-body">
            <p class="nombre-categoria-2">Matematicas</p>
          </div>
        </div>

        <div class="categoria-examen-2">
          <img src="img/matematicas.jpg" class="categoria-examen-img">
          <div class="categoria-examen-body">
            <p class="nombre-categoria-2">Matematicas</p>
          </div>
        </div>

        <div class="categoria-examen-2">
          <img src="img/matematicas.jpg" class="categoria-examen-img">
          <div class="categoria-examen-body">
            <p class="nombre-categoria-2">Matematicas</p>
          </div>
        </div>

      </div>
    </div>
  <script src="{{ asset('js/dropDown.js') }}" defer></script>
@endsection
