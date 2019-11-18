
@extends('layouts.opcion')

@section('content')

  <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
  <script>tinymce.init({selector:'textarea'});</script>
  <form  action="{{route('tutoriales.store') }}" method="post">
    @csrf
    @if (count($subcategorias) == 0)
      <div class="alert alert-danger">
        Agrega subcategorias para poder continuar
      </div>
    @endif
    <div class="form-group">
      <label class="form-label">Selecciona a que subcategoria pertenece</label>
      <select name="subcategoria_id" class="form-control">
        @foreach($subcategorias as $sub)
          <option value="{{ $sub->id }}">{{ $sub->nombre }}</option>
          {{-- {{ isset($pregunta) && $pregunta->subcategoria_id == $sub->id ? 'selected' : '' }} --}}
        @endforeach
      </select>
    </div>
    <div class="form-group">
      <label class="form-label">Titulo</label>
      <input type="text" class="form-control  @error('titulo') is-invalid @enderror" name="titulo" value="{{ isset($tutorial) ? $tutorial->titulo : old('titulo') }}" placeholder="Titulo del tutorial...">
      @error('titulo')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
      @enderror
    </div>
    {{-- <label for="titulo">Titulo</label>
    <input type="text" name="titulo" value=""> --}}
    <textarea class="description" name="description"></textarea>
    <button type="submit" class="btn btn-primary" onclick="disableButton(this)">Guardar</button>
  </form>
  <script type="text/javascript" src="{{ asset('js/doubleForm.js') }}"></script>

@endsection
