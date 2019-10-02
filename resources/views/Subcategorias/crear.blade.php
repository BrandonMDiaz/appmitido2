@extends('layouts.opcion')

@section('content')
  <div class="row">
    <div class="col-md-8 offset-2">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Crear categoria</h3>
        </div>
        <div class="card-body">
          @if(isset($subcategoria))
            <form action="{{ route('subcategorias.update', $subcategoria->id) }}" method="POST">
              <input type="hidden" name="_method" value="PATCH">
          @else
              <form action="{{ route('subcategorias.store') }}" method="POST">
          @endif
              @csrf
              <div class="form-group">
                <label class="form-label">Selecciona a que categoria pertenece</label>
                <select name="categoria_id" class="form-control">
                  @foreach($categorias as $cat)
                    <option value="{{ $cat->id }}" {{ isset($subcategoria) && $subcategoria->categoria_id == $cat->id ? 'selected' : '' }}>{{ $cat->nombre }}</option>
                  @endforeach
                </select>
              </div>
              <div class="form-group">
                <label class="form-label">Nombre de la subcategoria</label>
                <input type="text" class="form-control" name="nombre" value="{{ isset($subcategoria) ? $subcategoria->nombre : '' }}" placeholder="Subcategoria....">
              </div>
              <button type="submit" class="btn btn-primary ml-auto">Aceptar</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  @endsection
