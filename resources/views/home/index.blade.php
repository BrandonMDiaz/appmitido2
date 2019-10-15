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
                <a href="#">
                  <li>Divisiones</li>
                </a>
                <a href="#">
                  <li>Fracciones</li>
                </a>
                <a href="#">
                  <li>Logica</li>
                </a>
              </ul>
            </li>
            <li>
              <p onclick="dropDown(this)" class="titulo-tutorial">Español</p>
              <ul class="sub-menu">
                <a href="#">
                  <li>Gramatica</li>
                </a>
                <a href="#">
                  <li>Conjugacion</li>
                </a>
                <a href="#">
                  <li>Lecturas</li>
                </a>
              </ul>
            </li>
            <li>
              <p onclick="dropDown(this)" class="titulo-tutorial">Ingles</p>
              <ul class="sub-menu">
                <a href="#">
                  <li>Grammar</li>
                </a>
                <a href="#">
                  <li>Conjugations</li>
                </a>
                <a href="#">
                  <li>Readings</li>
                </a>
              </ul>
            </li>
          </ul>
        </div>
      </div>
      <div>
        <h3 class="subtitulo">Examenes</h3>
        <div class="examen-indicacion">
          <p>
            Los examenes estan compuestos por 10 preguntas con un tiempo de 13
            minutos cada uno, los examenes estan diseñados para que descubras
            en que materias y que temas tienes que estudiar mas.
          </p>
        </div>
        <div class="categorias-examenes">

          <div class="lista-categorias ">
            <p class="hide">Total de categorias: <span id="total">{{count($categorias)}}</span></p>
            @foreach ($categorias as $categoria)
              <p class="hide" id="data{{$loop->index}}"> {{$categoria->examenes}} </p>
              <div class="wid">
                <div class="body-exam">
                  <div class="tit-cat">
                    <p>{{$categoria->nombre}}</hp>
                  </div>
                  <ul class="body-cat">
                    <p>Examenes realizados: {{count($categoria->examenes)}}</p>
                    <p>Porcentaje de aciertos: {{$data->promedioCat[$loop->index]}}%</p>
                    <a href="{{ route('examen.show', ['id' => $categoria->id]) }}" class="btn btn-primary"> Hacer un examen</a>
                  </ul>

                </div>
                <div class="chart-exam">
                  <div class="chart">
                    <canvas id="chart{{$loop->index}}" width="200" height="200"></canvas>
                  </div>
                  <div style="display:flex; justify-content: flex-end;">
                    <a href="{{ route('resultados.index') }}">Ver exámenes</a>
                  </div>
                </div>
              </div>
            @endforeach
          </div>





          {{-- <a href="{{route("",[$categoria->id])}}"> --}}
          {{-- @foreach ($categorias as $categoria)
            <div class="categoria-examen-2">
              <img src="{{URL::asset('/images/math.jpg')}}" class="categoria-examen-img">
              <div class="categoria-examen-body">
                <p class="nombre-categoria-2">{{$categoria->nombre}}</p>
              </div>
            </div>
          @endforeach --}}
          {{-- </a> --}}

        </div>
      </div>
    </div>
  <script src="{{ asset('js/dropDown.js') }}" defer></script>
@endsection
