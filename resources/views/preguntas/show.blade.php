@extends('layouts.opcion')

@section('content')

  <div  class="preguntas-lista">
    <div id='preg2' class="preguntas-todas">
      <div class="main-pregunta">
        <fieldset>
          <div class="pregunta">
            <div style="width:100%;" class="centrar">
              <p >
                {{$pregunta->pregunta}}
              </p>
            </div>
          </div>
          <div class="centrar">
            <img class="imagen-examen" src="{{isset($pregunta->imagen) ? $pregunta->imagen_url : ''}}" alt="">

          </div>
            <div class="opciones">
              <div  class="opcion">
                <input type="radio"/>
                <div  class="en-linea">
                  <p>a)</p>
                  <p>{{$pregunta->opcion1}}</p>
                </div>
              </div>
              <div  class="opcion">
                <input type="radio" value={{2}} />
                <div class="en-linea">
                  <p>b)</p>
                  <p>{{$pregunta->opcion2}}</p>
                </div>

              </div>
              <div  class="opcion">
                <input type="radio" value={{3}}/>
                <div class="en-linea">
                  <p>c)</p>
                  <p>{{$pregunta->opcion3}}</p>
                </div>
              </div>
              <div class="opcion">
                <input type="radio" value="{{4}}"/>
                <div class="en-linea">
                  <p>d)</p>
                  <p>{{$pregunta->respuesta}}</p>
                </div>
              </div>
            </div>
            <div class="flex-separados">
              <a href="{{ route('preguntas.edit', $pregunta->id) }}" class="btn btn-sm btn-warning">Editar</a>
              <button class="btn btn-sm btn-danger" type="button" data-toggle="modal" data-target="#exampleModal">Eliminar</button>
            </div>
          </fieldset>
        </div>
      </div>

      <div id="exampleModal" class="modal " tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Eliminar Pregunta</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p>¿Estás seguro que quieres Eliminar la preguntas?</p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Volver</button>
              <form action="{{ route('preguntas.destroy', $pregunta->id) }}" method="POST">
                <input type="hidden" name="_method" value="DELETE">
                @csrf
                <button type="submit"  class="btn btn-sm btn-danger">Borrar</button>
              </form>
            </div>
          </div>
        </div>
      </div>


<script type="text/javascript">

</script>
    @endsection
