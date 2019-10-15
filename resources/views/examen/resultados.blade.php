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
          <h3 class="card-title">LISTADO DE EXAMENES</h3>
        </div>
        <div class="card-body">

          <table class="table">
            <thead>
              <tr>
                <th>Categoria</th>
                <th>Examen</th>
                <th>Calificacion</th>
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
                @foreach ($cat->examenes as $exm)
                  <tr>
                    <td></td>
                    <td>Examen {{ $loop->index + 1 }}</td>
                    <td>{{$exm->calificacion}}</td>
                    <td> <a href="{{route("resultados.show", ['id' => $exm->id])}}">Ver mas</a>  </td>
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
