@extends('layouts.opcion')

@section('content')
  @if (session('status'))
    <div class="alert alert-success">
      {{session('status')}}
    </div>
  @endif
  <div class="row">
    <div class="col-md-8 offset-2">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Crear Categoria</h3>
        </div>
        <div class="card-body">
          @if(isset($categoria))
            <form action="{{ route('categorias.update', $categoria->id) }}" method="POST">
              <input type="hidden" name="_method" value="PATCH">
          @else
              <form action="{{ route('categorias.store') }}" method="POST">
          @endif
              @csrf
              <div class="form-group">
                <label class="form-label">Nombre de la categoria</label>
                <input type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre" value="{{ isset($categoria) ? $categoria->nombre : '' }}" placeholder="Categoria...">
                @error('nombre')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
              <button type="submit" class="btn btn-primary ml-auto" onclick="disableButton(this)">Aceptar</button>
            </form>
          </div>
        </div>
      </div>
    </div>
    <script type="text/javascript" src="{{ asset('js/doubleForm.js') }}"></script>
  @endsection
