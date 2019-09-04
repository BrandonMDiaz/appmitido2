@extends('layouts.opcion')

@section('content')

<div id="my-modal" class="modal">
  <div class="modal-exam">
    <h1>EXAMEN DE MATEMATICAS!!</h1>
    <h4>Estas por iniciar un examen de matematicas, este examen
      contiene 10 preguntas que tendras que responder en un lapso de 10 minutos.
    </h4>
    <br>
    <h5>Presiona el boton cuando estes listo</h5>
    <button type="button" name="button" onclick="empezar()">Empezar</button>
  </div>
</div>


  {{-- <div class="examen"> --}}
    <div class="tiempo">
      <p id="timer">
        <span id="timer-min">10</span>
        <span>:</span>
        <span id="timer-sec">00</span>
      </p>
    </div>
    <div  class="preguntas-lista">
      <div id='preg2' class="preguntas-todas">
        @foreach ($preguntas as $pregunta)
          <div id="pregCompl-{{$loop->index + 1}}" class="main-pregunta">

            <div class="pregunta">
              <p id='pregunta-{{$loop->index + 1}}'>{{$pregunta->pregunta}}</p>
            </div>
            <div class="opciones">
              <div id="1{{$loop->index}}op" class="opcion">
                <div id="1{{$loop->index}}div" class="en-linea">
                  <input type="radio" onclick="preguntaContestada({{'1' . $loop->index }})" name="answer" />
                  <p>a)</p>
                </div>
                <p  id="1{{$loop->index}}">{{$pregunta->opcion1}}</p>
              </div>
              <div id="2{{$loop->index}}op" class="opcion">
                <div id="2{{$loop->index}}div" class="en-linea">
                  <input type="radio" onclick="preguntaContestada({{'2' . $loop->index }})" name="answer" />
                  <p>b)</p>
                </div>
                <p id="2{{$loop->index}}">{{$pregunta->opcion2}}</p>

                {{-- <button type="button" onclick="preguntaContestada(this.id)" name="button">{{$pregunta->opcion2}}</button> --}}
              </div>
              <div id="3{{$loop->index}}op" class="opcion">
                <div id="3{{$loop->index}}div" class="en-linea res-mala-div">
                  <input type="radio" onclick="preguntaContestada({{'3' . $loop->index }})" name="answer" />
                  <p>c)</p>
                  <i class="fas fa-times res-mala"></i>
                </div>
                <p id="3{{$loop->index}}">{{$pregunta->opcion3}}</p>
                {{-- <button id="3{{$loop->index}}" type="button" onclick="preguntaContestada(this.id)" name="button">{{$pregunta->opcion3}}</button> --}}
              </div>
              <div id="4{{$loop->index}}op" class="opcion">
                <div id="4{{$loop->index}}div" class="en-linea res-buena-div">
                  <input type="radio" onclick="preguntaContestada({{'4' . $loop->index }})"  name="answer" />
                  <p>d)</p>
                  <i class="fas fa-check res-buena"></i>
                </div>
                <p id="4{{$loop->index}}">{{$pregunta->respuesta}}</p>
                {{-- <button id="4{{$loop->index}}" type="button" onclick="preguntaContestada(this.id)" name="button">{{$pregunta->respuesta}}</button> --}}
              </div>
            </div>

          </div>
        @endforeach
      </div>

    </div>

    <button type="button" name="button">Finalizar</button>
    <div class="numeros">
      <ul>
        <li> <p id="<<" onclick="cambiarDePregunta(this.id)"> << </p> </li>
        <li> <p id="0-cp" class="selected" onclick="cambiarDePregunta(this.id)"> 1 </p> </li>
        <li> <p id="1-cp" onclick="cambiarDePregunta(this.id)"> 2 </p></li>
        <li> <p id="2-cp" onclick="cambiarDePregunta(this.id)"> 3 </p></li>
        <li> <p id="3-cp" onclick="cambiarDePregunta(this.id)"> 4 </p></li>
        <li> <p id="4-cp" onclick="cambiarDePregunta(this.id)"> 5 </p></li>
        <li> <p id="5-cp" onclick="cambiarDePregunta(this.id)"> 6 </p></li>
        <li> <p id="6-cp" onclick="cambiarDePregunta(this.id)"> 7 </p></li>
        <li> <p id="7-cp" onclick="cambiarDePregunta(this.id)"> 8 </p></li>
        <li> <p id="8-cp" onclick="cambiarDePregunta(this.id)"> 9 </p></li>
        <li> <p id="9-cp" onclick="cambiarDePregunta(this.id)"> 10 </p></li>
        <li> <p id=">>" onclick="cambiarDePregunta(this.id)"> >> </p> </li>
      </ul>
    </div>
  {{-- </div> --}}

  <script type="text/javascript" src="{{ asset('js/examen.js') }}">
  </script>
@endsection
