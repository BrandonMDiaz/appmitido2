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
                          <div >
                            <a href="{{route('categorias.edit', $categoria->id)}}" class="btn btn-sm btn-warning">Editar</a>
                            <button class="btn btn-sm btn-danger" type="button" data-toggle="modal" data-target="#exampleModal">Eliminar</button>
                          </div>

                        </td>
                    </tr>
                </tbody>
            </table>

          </div>
        </div>
    </div>
</div>
<div id="exampleModal" class="modal " tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Eliminar Categoria</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>¿Si eliminas la categoria eliminaras todas las preguntas y subcategorias relacionadas
          con esta categoria.?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Volver</button>
        <form action="{{ route('categorias.destroy', $categoria->id) }}" method="POST">
            <input type="hidden" name="_method" value="DELETE">
            @csrf
            <button type="submit" class="btn btn-sm btn-danger" onclick="disableButton(this)">Borrar</button>
        </form>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript" src="{{ asset('js/doubleForm.js') }}"></script>

  @endsection
