
@extends('layouts.opcion')

@section('content')

  <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
  <script>tinymce.init({selector:'textarea'});</script>
  <div class="form-group">
    <label class="form-label">Selecciona a que subcategoria pertenece</label>
    <select name="subcategoria_id" class="form-control">
      @foreach($subcategorias as $sub)
        <option value="{{ $sub->id }}" {{ isset($pregunta) && $pregunta->subcategoria_id == $sub->id ? 'selected' : '' }}>{{  $sub->nombre }}</option>
      @endforeach
    </select>
  </div>
  <form  action="{{route('tutoriales.store') }}" method="post">
    @csrf
    <label for="titulo">Titulo</label>
    <input type="text" name="titulo" value="">
    <textarea class="description" name="description"></textarea>
    <button type="submit" class="btn btn-primary" name="button">Guardar</button>
  </form>
@endsection
