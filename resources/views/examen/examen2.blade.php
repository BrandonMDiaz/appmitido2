@extends('layouts.opcion')

@section('content')

  <div id="my-modal" class="modal modal-1">
    <div class="modal-exam">
      <h1>Examen de {{$nombre}}!!</h1>
      <h4>Estas por iniciar un examen de {{$nombre}}, este examen
        contiene 10 preguntas que tendras que responder en un lapso de 10 minutos.
      </h4>
      <br>
      <h5>Presiona el boton cuando estes listo</h5>
      <button type="button" name="button" onclick="empezar()">Empezar</button>
    </div>
  </div>


  {{-- <div class="examen"> --}}

  <div  class="preguntas-lista">
    <div class="titulo">
      <p>Examen de {{$nombre}}</p>
    </div>
    <form id="exam-form" action="{{ route('examen.store') }}" method="POST">
      @csrf
      <input type="hidden" name="categoria_id" value="{{$id}}">
      <div id='preg2' class="preguntas-todas">
        @foreach ($preguntas as $pregunta)
          <div id="pregCompl-{{$loop->index + 1}}" class="main-pregunta">
            <input type="hidden" name="preg_id[]" value="{{$pregunta->id}}">
            {{-- si la respuesta fue correcta o no --}}
            {{-- <input id='corr-{{$loop->index}}' type="hidden" name="corr-{{$loop->index}}" value=""> --}}
            <input id='corr-{{$loop->index}}' type="hidden" name="corr[]" value="">

            {{-- El valor que seleccionaste --}}
            <input id='resp-{{$loop->index}}' type="hidden" name="resp[]" value="">

            <div class="contador-pregunta">
              <p>Pregunta {{$loop->index + 1}} de 10</p>
            </div>
            <div class="pregunta">
              <p id='pregunta-{{$loop->index + 1}}'>
                {{$pregunta->pregunta}}</p>
              </div>
              <div class="opciones">
                <div id="1{{$loop->index}}op" class="opcion">
                  <input type="radio" onclick="preguntaContestada({{'1' . $loop->index }})" name="answer[]" value={{1}}/>
                  <div id="1{{$loop->index}}div" class="en-linea">
                    <p>a)</p>
                    <p id="1{{$loop->index}}">{{$pregunta->opcion1}}</p>
                  </div>
                </div>
                <div id="2{{$loop->index}}op" class="opcion">
                  <input type="radio" onclick="preguntaContestada({{'2' . $loop->index }})" name="answer[]" value={{2}} />
                  <div id="2{{$loop->index}}div" class="en-linea">
                    <p>b)</p>
                    <p id="2{{$loop->index}}">{{$pregunta->opcion2}}</p>
                  </div>

                  {{-- <button type="button" onclick="preguntaContestada(this.id)" name="button">{{$pregunta->opcion2}}</button> --}}
                </div>
                <div id="3{{$loop->index}}op" class="opcion">
                  <input type="radio" onclick="preguntaContestada({{'3' . $loop->index }})" name="answer[]" value={{3}}/>
                  <div id="3{{$loop->index}}div" class="en-linea">
                    <p>c)</p>
                    <p id="3{{$loop->index}}">{{$pregunta->opcion3}}</p>
                  </div>
                  {{-- <button id="3{{$loop->index}}" type="button" onclick="preguntaContestada(this.id)" name="button">{{$pregunta->opcion3}}</button> --}}
                </div>
                <div id="4{{$loop->index}}op" class="opcion">
                  <input type="radio" onclick="preguntaContestada({{'4' . $loop->index }})"  name="answer[]" value="{{4}}"/>
                  <div id="4{{$loop->index}}div" class="en-linea">
                    <p>d)</p>
                    <p id="4{{$loop->index}}">{{$pregunta->respuesta}}</p>
                  </div>
                </div>
              </div>

            </div>
          @endforeach
          <input id="tiempo" type="hidden" name="tiempo" value="">
          <input id="cal" type="hidden" name="calificacion" value="">

        </form>

      </div>

    </div>
    <div class="barra-preguntas sticky2">
      <div class="tiempo">
        <p id="timer">
          <span id="timer-min">10</span>
          <span>:</span>
          <span id="timer-sec">00</span>
        </p>
      </div>
      <div class="numeros">
        <p>Cambiar pregunta:</p>
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
      <div class="boton-finalizar">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
          Finalizar
        </button>
      </div>
    </div>

    <div id="exampleModal" class="modal " tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Terminar Examen</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <p>¿Estás seguro que quieres terminar el examen?</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Volver</button>
            <button type="button" onclick="finalizar()" class="btn btn-primary">Terminar</button>
          </div>
        </div>
      </div>
    </div>
    {{-- </div> --}}

    <script type="text/javascript" src="{{ asset('js/examen.js') }}">
    </script>
  @endsection
