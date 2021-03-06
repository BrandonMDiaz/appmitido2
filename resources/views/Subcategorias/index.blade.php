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
          <h3 class="card-title">LISTADO DE SUBCATEGORIAS</h3>
        </div>
        <div class="card-body">

          <table class="table">
            <thead>
              <tr>
                <th>Categoria</th>
                <th>ID</th>
                <th>SubCategoria</th>
                <th>Opciones</th>

              </tr>
            </thead>
            <tbody>
              @foreach($categorias as $cat)
                <tr>
                  <td>
                    <h4>
                      {{$cat->nombre}}
                    </h4>
                  </td>
                  <td></td>
                  <td></td>
                  <td></td>

                </tr>
                @foreach ($cat->subCategorias as $sub)
                  <tr>
                    <td></td>
                    <td>{{ $sub->id }}</td>
                    <td>{{ $sub->nombre }}</td>
                    <td>
                      <a href="{{ route('subcategorias.show', $sub->id) }}">Ver mas...</a>
                      {{-- <div class="">
                        <a href="{{ route('subcategorias.edit', $sub->id) }}" class="btn btn-sm btn-warning">Editar</a>
                        <button class="btn btn-sm btn-danger" type="button" data-toggle="modal" data-target="#exampleModal">Eliminar</button>
                      </div> --}}
                    </td>
                  </tr>

                @endforeach
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>


  <script type="text/javascript" src="{{ asset('js/doubleForm.js') }}"></script>

@endsection
