@extends('layouts.opcion')

@section('content')
  <div class="row">
    <div class="col-md-8 offset-2">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Crear pregunta</h3>
        </div>
        <div class="card-body">
          @if(isset($pregunta))
            <form action="{{ route('preguntas.update', $pregunta->id) }}" method="POST">
              <input type="hidden" name="_method" value="PATCH">
            @else
              <form action="{{ route('preguntas.store') }}" method="POST">
              @endif
              @csrf

              <div class="form-group">
                <label class="form-label">Selecciona a que SubCategoria pertenece</label>
                <select name="user_id" class="form-control">
                  @foreach($subcategorias as $sub)
                  <option value="{{ $sub->id }}" {{ isset($pregunta) && $pregunta->subcategoria_id == $sub->id ? 'selected' : '' }}>{{  $sub->nombre }}</option>
                  @endforeach
                </select>
              </div>

              <div class="form-group">
                <label class="form-label">Pregunta</label>
                <textarea name="pregunta" class="form-control" id="exampleFormControlTextarea1" rows="3" value="{{ isset($pregunta) ? $pregunta->pregunta : '' }}" placeholder="Pregunta completa"></textarea>
              </div>
              <div class="form-group">
                <label class="form-label">Imagen</label>
                <input type="text" class="form-control" name="envia" value="{{ isset($pregunta) ? $pregunta->imagen : '' }}" placeholder="Nombre de persona que envía">
              </div>
              <div class="form-group">
                <label class="form-label">Opcion 1</label>
                <input type="text" class="form-control" name="envia" value="{{ isset($pregunta) ? $pregunta->opcion1 : '' }}" placeholder="Nombre de persona que envía">
              </div>

              <div class="form-group">
                <label class="form-label">Opcion 2</label>
                <input type="text" class="form-control" name="envia" value="{{ isset($pregunta) ? $pregunta->opcion2 : '' }}" placeholder="Nombre de persona que envía">
              </div>
              <div class="form-group">
                <label class="form-label">Opcion 3</label>
                <input type="text" class="form-control" name="envia" value="{{ isset($pregunta) ? $pregunta->opcion3 : '' }}" placeholder="Nombre de persona que envía">
              </div>
              <div class="form-group">
                <label class="form-label">Respuesta</label>
                <input type="text" class="form-control" name="envia" value="{{ isset($pregunta) ? $pregunta->respuesta : '' }}" placeholder="Nombre de persona que envía">
              </div>
              <button type="submit" class="btn btn-primary ml-auto">Aceptar</button>

            </form>

          </div>
        </div>
      </div>
    </div>


  @endsection
