@extends('layouts.opcion')

@section('content')
  <div class="row">
    <div class="col-md-8 offset-2">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Crear examen</h3>
        </div>
        <div class="card-body">

          {{-- @if(isset($documento)) --}}
          {{-- <form action="{{ route('', $documento->id) }}" method="POST"> --}}
          <input type="hidden" name="_method" value="PATCH">
          {{-- @else --}}
          {{-- <form action="{{ route('documentos.store') }}" method="POST"> --}}
          {{-- @endif --}}
          {{-- @csrf --}}

          <div class="form-group">
            <label class="form-label">Nombre del examen</label>
            <input type="image" class="form-control" name="no_oficio" value="{{ isset($documento) ? $documento->no_oficio : '' }}{{ old('no_oficio') }}" >
          </div>
          <div class="form-group">
            <label class="form-label">Escuela</label>
            <input type="text" class="form-control" name="envia" value="{{ isset($documento) ? $documento->envia : '' }}{{ old('envia') }}" placeholder="Nombre de persona que envía">
          </div>

          <div class="form-group">
            <label class="form-label">Imagen</label>
            <input type="image" class="form-control" name="no_oficio" value="{{ isset($documento) ? $documento->no_oficio : '' }}{{ old('no_oficio') }}" >
          </div>

          <button type="submit" class="btn btn-primary ml-auto">Aceptar</button>

        </form>

      </div>
    </div>
  </div>
</div>


@endsection
