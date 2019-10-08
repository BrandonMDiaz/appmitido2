@extends('layouts.opcion')

@section('content')

  <div class="">

    <div class="header-tutoriales subtitulo">
      <h1>Exámenes</h1>
    </div>
    <div class="container-examen">
      <div class="categorias-examenes">
        @foreach ($categorias as $categoria)
          <div class="categoria-examen-2">
            <img src="{{URL::asset('/images/math.jpg')}}" class="categoria-examen-img">
            <div class="exam-body">
              <p>{{$categoria->nombre}}</p>
              <p>Examenes realizados:</p>
              <p>Porcentaje de aciertos:</p>
              <p>Subcategoria fuerte:</p>
            </div>
            <div class="grafica">
              <p>progreso</p>
            </div>
          </div>



          <div class="categoria-examen-2">
            <a href="{{ route('examen.show', ['id' => $categoria->id]) }}">
              <img src="{{URL::asset('/images/math.jpg')}}" class="categoria-examen-img">
              <div class="categoria-examen-body">
                <p class="nombre-categoria-2">{{$categoria->nombre}}</p>
              </div>
            </a>
          </div>
        @endforeach
      </div>
    </div>

  </div>
@endsection
