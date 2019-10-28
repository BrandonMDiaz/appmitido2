@extends('layouts.opcion')

@section('content')
  <div class="resultados centrar">
    <div class="wrapper-re">

      <div class="titulo-re">
        <p>{{$datos->correctas}} respuesta correctas de 10 </p>
        <p>Te tomó un tiempo de {{$datos->minutos}}:{{$datos->segundos}}</p>
      </div>
      <div class="tutoriales-recomendados">
        <div class="tem">
          <div class="res-titulo en-linea">
            <i class="fas fa-bookmark"></i>
            <h3>Temas dominados</h3>
          </div>
          @foreach ($datos->categoriaB as $cat)
            <ul>
              <li class="en-linea res-buena-div">
                <p>{{$cat}}</p>
                <i class="fas fa-check res-buena"></i>
              </li>
            </ul>
          @endforeach
        </div>
        <div class="tem">
          <div class="res-titulo en-linea">
            <i class="fas fa-bookmark"></i>
            <h3>Temas que deberias repasar</h3>
          </div>
            @foreach ($datos->categoriaM as $cat)
              <ul>
                <li class="en-linea res-mala-div">

                  <p>{{$cat}}</p>
                  <i class="fas fa-times res-mala"></i>
                </li>
              </ul>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="preguntas-lista">
    <div id='preg2' class="preguntas-todas">
      @foreach ($examen->examenPregunta as $pregunta)
        <div id="pregCompl-{{$loop->index + 1}}" class="main-pregunta">
          <div class="contador-pregunta">
            <p>Pregunta {{$loop->index + 1}} de 10</p>
          </div>
          <div class="pregunta">
            <p id='pregunta-{{$loop->index + 1}}'>
              {{$pregunta->pregunta}}</p>
            </div>
            <div class="opciones">
              <div id="1{{$loop->index}}op" class="opcion">
                <p>a)</p>
                <div id="1{{$loop->index}}div" class="en-linea {{$pregunta->pivot->respuesta_seleccionada == $pregunta->opcion1 ? "res-mala-div" : ''}}">

                  {!! $pregunta->pivot->respuesta_seleccionada == $pregunta->opcion1 ? "<i class='fas fa-times res-mala'></i>" : ''!!}
                  <p id="1{{$loop->index}}">{{$pregunta->opcion1}}</p>
                </div>
              </div>
              <div id="2{{$loop->index}}op" class="opcion">
                <p>b)</p>
                <div id="2{{$loop->index}}div" class="en-linea {{$pregunta->pivot->respuesta_seleccionada == $pregunta->opcion2 ? "res-mala-div" : ''}}">
                  {!! $pregunta->pivot->respuesta_seleccionada == $pregunta->opcion2 ? "<i class='fas fa-times res-mala'></i>" : ''!!}

                  <p id="2{{$loop->index}}">{{$pregunta->opcion2}}</p>
                </div>

                {{-- <button type="button" onclick="preguntaContestada(this.id)" name="button">{{$pregunta->opcion2}}</button> --}}
              </div>
              <div id="3{{$loop->index}}op" class="opcion">
                <p>c)</p>
                <div id="3{{$loop->index}}div" class="en-linea {{$pregunta->pivot->respuesta_seleccionada == $pregunta->opcion3 ? "res-mala-div" : ''}}">
                  {!! $pregunta->pivot->respuesta_seleccionada == $pregunta->opcion3 ? "<i class='fas fa-times res-mala'></i>" : ''!!}
                  <p id="3{{$loop->index}}">{{$pregunta->opcion3}}</p>
                </div>
                {{-- <button id="3{{$loop->index}}" type="button" onclick="preguntaContestada(this.id)" name="button">{{$pregunta->opcion3}}</button> --}}
              </div>
              <div id="4{{$loop->index}}op" class="opcion">
                <p>d)</p>
                <div id="4{{$loop->index}}div" class="en-linea res-buena-div ">
                  {{-- {!! $pregunta->pivot->correcta == 1 ? "res-buena-div" : "res-mala-div" !!} --}}
                  {!! $pregunta->pivot->correcta == 1 ? "<i class='fas fa-check res-buena'></i>" : "" !!}
                  {{-- <i class='fas fa-check res-buena'></i> --}}
                  <p id="4{{$loop->index}}">{{$pregunta->respuesta}}</p>
                </div>
                {{-- <button id="4{{$loop->index}}" type="button" onclick="preguntaContestada(this.id)" name="button">{{$pregunta->respuesta}}</button> --}}
              </div>
            </div>

          </div>
        @endforeach
      </div>
    </div>
  <div class="barra-preguntas sticky2">
    <div class="numeros">
      <p>Ir a pregunta:</p>
      <ul>
        <li> <p id="<<" onclick="cambiarDePregunta(this.id)"> << </p> </li>
        <li {{$examen->examenPregunta[0]->pivot->correcta == 1 ? "class=bie-res" : "class=mal-res" }}>
           <p id="0-cp" onclick="cambiarDePregunta(this.id)"> 1 </p>
         </li>
        <li {{$examen->examenPregunta[1]->pivot->correcta == 1 ? "class=bie-res" : "class=mal-res" }}>
          <p id="1-cp"  onclick="cambiarDePregunta(this.id)"> 2 </p>
        </li>
        <li {{$examen->examenPregunta[2]->pivot->correcta == 1 ? "class=bie-res" : "class=mal-res" }}>
          <p id="2-cp"  onclick="cambiarDePregunta(this.id)"> 3 </p>
        </li>
        <li {{$examen->examenPregunta[3]->pivot->correcta == 1 ? "class=bie-res" : "class=mal-res" }}>
          <p id="3-cp"  onclick="cambiarDePregunta(this.id)"> 4 </p>
        </li>
        <li {{$examen->examenPregunta[4]->pivot->correcta == 1 ? "class=bie-res" : "class=mal-res"}}>
          <p id="4-cp"  onclick="cambiarDePregunta(this.id)"> 5 </p>
        </li>
        <li {{$examen->examenPregunta[5]->pivot->correcta == 1 ? "class=bie-res" : "class=mal-res"}}>
          <p id="5-cp"  onclick="cambiarDePregunta(this.id)"> 6 </p>
        </li>
        <li {{$examen->examenPregunta[6]->pivot->correcta == 1 ? "class=bie-res" : "class=mal-res"}}>
          <p id="6-cp"  onclick="cambiarDePregunta(this.id)"> 7 </p>
        </li>
        <li {{$examen->examenPregunta[7]->pivot->correcta == 1 ? "class=bie-res" : "class=mal-res"}}>
          <p id="7-cp"  onclick="cambiarDePregunta(this.id)"> 8 </p>
        </li>
        <li {{$examen->examenPregunta[8]->pivot->correcta == 1 ? "class=bie-res" : "class=mal-res"}}>
          <p id="8-cp"  onclick="cambiarDePregunta(this.id)"> 9 </p>
        </li>
        <li {{$examen->examenPregunta[9]->pivot->correcta == 1 ? "class=bie-res" : "class=mal-res"}}>
          <p id="9-cp"  onclick="cambiarDePregunta(this.id)"> 10 </p>
        </li>
        <li>
          <p id=">>" onclick="cambiarDePregunta(this.id)"> >> </p> </li>
      </ul>
    </div>
    {{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
      Volver a resultados
    </button>
    <div class="boton-finalizar">
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
        Revisar examen
      </button>
    </div> --}}
  </div>
  <script type="text/javascript" src="{{ asset('js/revisar.js') }}">
  </script>
@endsection
