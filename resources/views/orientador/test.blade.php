@extends('layouts.opcion')

@section('content')

  <div class="orientador pad">
    {{-- <div class="titulo">
      <h1>Orientador vocacional</h1>
    </div> --}}

    <div class="or-pregunta">
      <div class="preg">
        <h1 id="pregunta"></h1>
        </div>
        <div class="res">
          <button onclick="botonPrecionado(10)" id="respuesta1"></button>
          <button onclick="botonPrecionado(6.6)" id="respuesta2"></button>

          <button onclick="botonPrecionado(3.3)" id="respuesta3"></button>
          <button onclick="botonPrecionado(0)" id="respuesta4"></button>
        </div>
      </div>
    </div>
    <form id="voc-form" class="" action="{{ route('vocacion.orientador') }}" method="post">
      @csrf
      <input id= "con1" type="hidden" name="linguistico_verbal" value="">
      <input id= "con2" type="hidden" name="mate" value="">
      <input id= "con3" type="hidden" name="espacio_visual" value="">
      <input id= "con4" type="hidden" name="interpersonal" value="">
      <input id= "con5" type="hidden" name="creativa" value="">
      <input id= "con6" type="hidden" name="intrapersonal" value="">

    </form>
    <script type="text/javascript" src="{{ asset('js/vocacion.js') }}"></script>
  @endsection
