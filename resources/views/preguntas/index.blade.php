@extends('layouts.opcion')

@section('content')


<div class="page-header">
    <div class="page-title">
      <form id="form-cat" class="" action="{{route('preguntas.index')}}" method="get">

      <div class="form-group">
          <label class="form-label">Selecciona que subcategoria quieres ver</label>
          <select onchange="this.form.submit()" name="subcategoria_id" class="form-control">
            @foreach($subcategorias as $sub)
              <option onclick="buscar()" value="{{$sub->id}}" {{ isset($id) ?  $id == $sub->id ? 'selected' : '' : '' }}>{{  $sub->nombre }}</option>
            @endforeach
          </select>
      </div>
    </form>

    </div>
  </div>
  @if (session('status'))
    <div class="alert alert-success">
      {{session('status')}}
    </div>
  @endif
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
                <th>OPCION</th>
                <th>OPCION</th>
                <th>OPCION</th>
                <th>RESPUESTA</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
                <tr>
                  <td>
                    <h4>
                      {{isset($nombre) ? $nombre : ''}}
                    </h4>
                  </td>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>
                @foreach ($preguntas as $preg)
                  <tr>
                    <td></td>
                    <td>{{ $preg->pregunta }}</td>
                    <td>{{ $preg->opcion1 }}</td>
                    <td>{{ $preg->opcion2 }}</td>
                    <td>{{ $preg->opcion3 }}</td>
                    <td>{{ $preg->respuesta }}</td>

                    <td>
                      <a href="{{route('preguntas.show', $preg->id)}}">Mas informacion</a>
                      {{-- <a href="{{ route('preguntas.edit', $preg->id) }}" class="btn btn-sm btn-warning">Editar</a>
                      <form action="{{ route('preguntas.destroy', $preg->id) }}" method="POST">
                        <input type="hidden" name="_method" value="DELETE">
                        @csrf
                        <button type="submit" class="btn btn-sm btn-danger">Borrar</button>
                      </form> --}}
                    </td>
                  </tr>
                @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <div class="centrar" style="margin-top:20px;">
      @if (isset($preguntas) && count($preguntas) > 0)
        {{$preguntas->links()}}
      @endif
    </div>

  </div>
  <script type="text/javascript" src="{{ asset('js/pregunta.js') }}"></script>

@endsection
