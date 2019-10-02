@extends('layouts.opcion')

@section('content')

  <div class="page-header">
    <div class="page-title">
    </div>
  </div>

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
              {{-- @foreach ($subcategorias as $sub)
                <tr>
                  <td>{{$sub->categoria->nombre}}</dt>
                  <td>{{$sub->id}}</dt>
                  <td>{{$sub->nombre}}</dt>
                  <td>
                    <a href="{{ route('subcategorias.show', $sub->id) }}" class="btn btn-sm btn-warning">Editar</a>

                    <form action="" method="POST">
                      <input type="hidden" name="_method" value="DELETE">
                      @csrf
                      <button type="submit" class="btn btn-sm btn-danger">Borrar</button>
                    </form>
                  </td>
                </tr>
              @endforeach --}}
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
                      <a href="{{ route('subcategorias.edit', $sub->id) }}" class="btn btn-sm btn-warning">Editar</a>
                      <form action="{{ route('subcategorias.destroy', $sub->id) }}" method="POST">
                        <input type="hidden" name="_method" value="DELETE">
                        @csrf
                        <button type="submit" class="btn btn-sm btn-danger">Borrar</button>
                      </form>
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

@endsection
