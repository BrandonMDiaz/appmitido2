@extends('layouts.opcion')

@section('content')

  <div class="centrar">
    <h2>
      Bienvenido {{$user->name}}
    </h2>
  </div>
  <div class="centrar">
    <img class="imagen-per" src="{{$user->logo_url}}" alt="">
  </div>
  <div class="centrar">

  <div class="body-homeU">
    <p>En tu lado izquierdo hay una barra de tareas donde podras encontrar
    las opciones necesarias para crear tutoriales, agregar categorias, subcategorias
    y preguntas. Las categorias, subcategorias y preguntas serviran para crear los examenes
    con los cuales los aspirantes van a poder practicar.
    Para que un alumno pueda hacer un examen tienes que tener minimo 10 preguntas en 1 o muchas subcategorias
    que abonen a la misma categoria.
</p>
  <h4>Categorias</h4>
  <p>Un ejemplo de categoria seria: Matematicas, Español, Ingles, Estilistica, etc.</p>
  <h4>Subcategorias</h4>
  <p>Una subcategoria se desprende de una categoria, un ejemplo de una subcategoria de
  la categoria "Matematicas" podria ser "fracciones" o "trigonometria"</p>
  <h4>Tutoriales</h4>
  <p>Los tutoriales tienen la intencion de servir como una explicacion completa
  sobre una subcategoria, si se crea un tutorial de la subcategoria "suma de fracciones"
  el tutorial tendria que contener la informacion necesaria para que el aspirante aprenda
  a realizar una suma de fracciones.</p>
  <h4>Preguntas</h4>
  <p>Las preguntas serán creadas para una subcategoria en especifico, estas Preguntas
  se usaran para crear examenes con los cuales los aspirantes podran ver cuales son sus
  materias fuertes.</p>
  <h4>Examenes</h4>
  <p>Los examenes se crearan automaticamente a partir de las preguntas que hayas subido
  a la plataforma.</p>
  </div>
</div>

@endsection
