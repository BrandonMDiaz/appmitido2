@extends('layouts.opcion')

@section('content')

  <div class="contenido">
      <div class="categorias-tutoriales">
        <div class="wrapper-tutoriales">
          <h3 class="subtitulo">Tutoriales</h3>

          <ul id="lista-tutoriales">
            @if (count($subcategorias) == 0)
              <p style="color:#d4d4d4; font-size:19px;">No hay subcategorias</p>
            @endif
            @foreach ($subcategorias as $sub)
              <li>
                <p onclick="dropDown(this)" class="titulo-tutorial">
                  {{$sub->nombre}}
                </p>
                <ul id="list-type"style="word-break: break-all;" class="sub-menu">
                  @if (count($sub->tutoriales) == 0)
                    <p style="color:#d4d4d4; font-size:19px;">No hay tutoriales</p>
                  @endif
                  @foreach ($sub->tutoriales as $tut)
                      <li style="word-break: break-all; white-space: normal;">
                        <a id="font-link" style="word-break: break-all; white-space: normal;" href="{{route('tutorialA.show', $tut->id)}}">
                          {{$tut->titulo}}
                      </a>
                      </li>
                  @endforeach
                </ul>
              </li>
            @endforeach
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
        </div>
      </div>
      <script src="{{ asset('js/dropdown.js') }}" defer></script>
    </div>
@endsection
