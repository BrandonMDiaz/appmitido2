@extends('layouts.opcion')

@section('content')

  <div class="universidades">
    <div class="container">
      <div class="jumbotron jumbotron-fluid">
        <div class="container">
          <h1 class="display-4">Universidades</h1>
          <p class="lead">Selecciona la universidad a la cual quieres hacer tramites.</p>
        </div>
      </div>
    </div>

    <form class="buscar" style="align-items:center;" action="{{route('seleccionarU')}}" method="get">
        <input class="search" type="text" name="buscar" placeholder="buscar...">
        <div style="margin-left:20px;">
          <button type="submit" class="btn btn-primary">Buscar</button>
        </div>
    </form>
    <div class="universidades-lista">
      @foreach ($universidades as $universidad)
        <a href="{{route('home', ['id' => $universidad->id])}}">
          <div class="universidad">
            <div class="logo-universidad2">
              <img class="logo-universidad" src="{{isset($universidad->logo_url) ? $universidad->logo_url : URL::asset('/images/no_disponible.png')}}" alt="">
            </div>
            <div class="inf-universidad">
              <h5 class="nombre-universidad">{{$universidad->name}}</h5>
            </div>
          </div>
        </a>
      @endforeach

    </div>
    <div class="centrar" style="margin-top:20px;">
      {{ $universidades->links() }}
    </div>
  </div>
@endsection
