@extends('layouts.opcion')

@section('content')
  <div class="row">
    <div class="col-md-10 offset-1">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Detalle de Categorias</h3>
          </div>
          <div class="card-body">

            <table class="table">
                <thead>
                    <tr>
                        <th> ID</th>
                        <th>NOMBRE</th>
                        <th>SUBCATEGORIAS</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{$categoria->id}}</td>
                        <td>{{$categoria->nombre}}</td>
                        <td>
                          @if (sizeOf($subcategorias) > 0)
                            @foreach ($subcategorias as $sub)
                              <ul>
                                <li><a href="/subcategorias/{{$sub->id}}">{{$sub->nombre}}</a></li>
                              </ul>
                            @endforeach
                          @else
                            <p>n/a</p>
                          @endif

                        </td>
                        <td>
                          <a href="{{route('categorias.edit', $categoria->id)}}" class="btn btn-sm btn-warning">Editar</a>
                          <form action="{{ route('categorias.destroy', $categoria->id) }}" method="POST">
                              <input type="hidden" name="_method" value="DELETE">
                              @csrf
                              <button type="submit" class="btn btn-sm btn-danger">Borrar</button>
                          </form>
                        </td>
                    </tr>
                </tbody>
            </table>

          </div>
        </div>
    </div>
</div>

  @endsection
