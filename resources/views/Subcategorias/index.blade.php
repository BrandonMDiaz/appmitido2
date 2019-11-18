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
                      <div class="">
                        <a href="{{ route('subcategorias.edit', $sub->id) }}" class="btn btn-sm btn-warning">Editar</a>
                        <button class="btn btn-sm btn-danger" type="button" data-toggle="modal" data-target="#exampleModal">Eliminar</button>
                      </div>
                    </td>
                  </tr>
                  <div id="exampleModal" class="modal " tabindex="-1" role="dialog">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title">Eliminar Subcategoria</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <p>Si eliminas esta subcategoria eliminaras todas las preguntas asociadas a la misma.</p>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Volver</button>
                          <form action="{{ route('subcategorias.destroy', $sub->id) }}" method="POST">
                            <input type="hidden" name="_method" value="DELETE">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-danger" onclick="disableButton(this)">Borrar</button>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
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
