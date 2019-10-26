
@extends('layouts.opcion')

@section('content')

  <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
  <script>tinymce.init({selector:'textarea'});</script>

    <div class="tut-show">
      <div class="tut-text">
        <div class="tut-titulo">
          <p>
            {{$tutoriale->titulo}}
          </p>
        </div>
        {!!$tutoriale->texto!!}
      </div>
    </div>
    <div class="">
      <button class="btn btn-sm btn-danger" type="button" data-toggle="modal" data-target="#exampleModal">Eliminar</button>
    </div>
          <div id="exampleModal" class="modal " tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Eliminar Tutorial</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <p>¿Estás seguro que quieres Eliminar el Tutorial?</p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Volver</button>
                  <form action="{{ route('tutoriales.destroy', $tutoriale->id) }}" method="POST">
                    <input type="hidden" name="_method" value="DELETE">
                    @csrf
                    <button type="submit" class="btn btn-sm btn-danger">Borrar</button>
                  </form>
                </div>
              </div>
            </div>
          </div>

@endsection
