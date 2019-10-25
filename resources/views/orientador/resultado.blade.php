@extends('layouts.opcion')

@section('content')
  <div class="centrar">
    <p class="titulo">
      {{$carrera}}
    </p>
    <p>
      {{ $texto}}
      La carrera de Derecho es una disciplina, que brinda instrumentos para
      lograr que las personas en
      sus relaciones diarias con los demás, se rijan por leyes que permitan que
      la sociedad funcione justa y ordenadamente.
    </p>
    <img src="" alt="">
    <p>
      {{$textoAptitudes}}
      Todo futuro Abogado debe tener conocimiento de los fundamentos de hecho y
      derecho. Debe tener un razonamiento lógico, capacidad de análisis y síntesis,
      debe saber manejar y solucionar conflictos, además debe tener gusto por la
      lectura y buena memoria. Pero sobre todo un abogado debe tener siempre
      presente su vocación de justicia, un sentido ético personal y social,
      además de una gran facilidad de palabra y persuasión.
    </p>
    <a href="#" class="btn btn-primary">Comenzar a estudiar</a>
  </div>

@endsection
