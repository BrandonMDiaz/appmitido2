@extends('layouts.opcion')

@section('content')

  <div class="page-header">
    <div class="page-title">
    </div>
  </div>

  <div class="row">
    <div class="col-md-12 offset-0">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">LISTADO DE PREGUNTAS</h3>
        </div>
        <div class="card-body">

          <table class="table">
            <thead>
              <tr>
                <th>SUBCATEGORIA</th>
                <th>PREGUNTA</th>
                <th>IMAGEN</th>
                <th>OPCION</th>
                <th>OPCION</th>
                <th>OPCION</th>
                <th>RESPUESTA</th>
                <th></th>


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
              @foreach($subcategorias as $sub)
                <tr>
                  <td>
                    <h4>
                      {{$sub->nombre}}
                    </h4>
                  </td>
                  <td></td>
                  <td></td>
                  <td></td>

                </tr>
                @foreach ($sub->preguntas as $preg)
                  <tr>
                    <td></td>
                    <td>{{ $preg->pregunta }}</td>
                    <td>{{ $preg->imagen }}</td>
                    <td>{{ $preg->opcion1 }}</td>
                    <td>{{ $preg->opcion2 }}</td>
                    <td>{{ $preg->opcion3 }}</td>
                    <td>{{ $preg->respuesta }}</td>

                    <td>
                      <a href="{{ route('preguntas.edit', $preg->id) }}" class="btn btn-sm btn-warning">Editar</a>
                      <form action="{{ route('preguntas.destroy', $preg->id) }}" method="POST">
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
