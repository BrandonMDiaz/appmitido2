@extends('layouts.opcion')

@section('content')

  <div class="">

    <div class="header-tutoriales subtitulo">
      <h1>Exámenes</h1>

    </div>

    <div class="">
      <p>Los examenes vienen con 10 preguntas de diferentes temas, cada examen tendrá
      13 minutos para ser contestado, escoge cualquier categoria y empieza a conocer
    tus fuertes y debilidades</p>
    </div>
    <div class="container-examen">


      <div class="lista-categorias">
        <p class="hide">Total de categorias: <span id="total">{{count($categorias)}}</span></p>
        @foreach ($categorias as $categoria)
          <p class="hide" id="data{{$loop->index}}"> {{$categoria->examenes}} </p>
          <div class="cat-exm">
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
    <script src="{{ asset('js/examenIndex.js') }}" defer> </script>

  </div>
@endsection
