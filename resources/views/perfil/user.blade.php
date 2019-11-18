@extends('layouts.opcion')

@section('content')
  <div class="perfil">
    <div class="perfil-background">
      <div class="icon-book">
        <i class="fas fa-book"></i>
      </div>
      <div class="f">
        <p>{{$user->name}}</p>
      </div>
      <div class="editar-btn">
        <a class="btn btn-primary"href="{{route('perfil.show')}}">editar</a>
      </div>
    </div>

    <div class="inf-perfil">
      <h3>Estadísticas</h3>
      <div class="chart">
        <canvas id="myChart" width="400" height="400"></canvas>
      </div>
      {{-- <div class="inf-p">
        <p>Mejor categoria: {{$categorias[array_keys($data->promedioCat, max($data->promedioCat))[0]]->nombre}}</p>
        <p>Total de respuestas correctas: {{$data->respuestaCorr[array_keys($data->promedioCat, max($data->promedioCat))[0]]}}/{{count($categorias[array_keys($data->promedioCat, max($data->promedioCat))[0]]->examenes) * 10}}</p>
      </div> --}}
    </div>
    <h2 style="margin-left: 3%;">Categorias</h2>
    <div class="lista-categorias">
      <p class="hide">Total de categorias: <span id="total">{{count($categorias)}}</span></p>
      <p class="hide" id="dataX"> {{json_encode($data) }} </p>

      @foreach ($categorias as $categoria)
        <p class="hide" id="data{{$loop->index}}"> {{$categoria->examenes}} </p>
        <div class="cat-exm">
          <div class="body-exam">
            <div class="tit-cat">
              <p id='cat{{$loop->index}}'>{{$categoria->nombre}}</p>
            </div>
            <ul class="body-cat">
              <p>Examenes realizados: {{count($categoria->examenes)}}</p>
              <p>Promedio: {{$data->promedioCat[$loop->index]}}%</p>
            </ul>
            <div class="">
              <a href="{{ route('resultados.index') }}">Ver exámenes</a>
            </div>
          </div>
          <div class="chart-exam">
            <div class="chart">
              <canvas id="chart{{$loop->index}}" width="200" height="200"></canvas>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>
  
  <script src="{{ asset('js/perfil.js') }}" defer> </script>
  <script type="text/javascript">
    const categorias = @json($categorias);
  </script>
@endsection
