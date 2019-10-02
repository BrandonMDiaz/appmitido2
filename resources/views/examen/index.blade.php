@extends('layouts.opcion')

@section('content')

  <div class="">

    <div class="header-tutoriales subtitulo">
      <h1>Exámenes</h1>
    </div>
    <div class="container-examen">
      <div class="categorias-examenes">
        @foreach ($categorias as $cat)
          <div class="categoria-examen-2">
            <a href="{{ route('examen.show', ['id' => $cat->id]) }}">
              <img src="{{URL::asset('/images/math.jpg')}}" class="categoria-examen-img">
              <div class="categoria-examen-body">
                <p class="nombre-categoria-2">{{$cat->nombre}}</p>
              </div>
            </a>
          </div>
        @endforeach
      </div>
    </div>

  </div>
@endsection
