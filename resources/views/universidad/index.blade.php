@extends('layouts.opcion')

@section('content')

  <div class="universidades">
    <div class="container">
      <div class="jumbotron jumbotron-fluid">
        <div class="container">
          <h1 class="display-4">Universidades</h1>
          <p class="lead">Escoge la universidad a la que quieres entrar</p>
        </div>
      </div>
    </div>
    <div class="buscar">
      <input class="search" type="text" name="" value="" placeholder="buscar...">
    </div>
    <div class="universidades-lista">
      @foreach ($universidades as $universidad)
        <a href="{{route('home', ['id' => $universidad->id])}}">
          <div class="universidad">
            <div class="logo-universidad2">
              <img class="logo-universidad" src="{{URL::asset('/images/uvm.jpg')}}" alt="">
            </div>
            <div class="inf-universidad">
              <h5 class="nombre-universidad">{{$universidad->nombre}}</h5>
            </div>
          </div>
        </a>
      @endforeach
      <a href="{{route('home', ['id' => $universidad->id])}}">
        <div class="universidad">
          <div class="logo-universidad2">
            <img class="logo-universidad" src="{{URL::asset('/images/udg2.png')}}" alt="">
          </div>
          <div class="inf-universidad">
            <h5 class="nombre-universidad">{{$universidad->nombre}}</h5>
          </div>
        </div>
      </a>
      {{-- <div class="universidad">
        <div class="logo-universidad">
          <img class="logo-universidad" src="{{URL::asset('/images/math.jpg')}}" alt="">
        </div>
        <div class="inf-universidad">
          <p class="nombre-universidad">Universidad de guadalajara</p>
        </div>
      </div> --}}


    </div>
  </div>
@endsection
