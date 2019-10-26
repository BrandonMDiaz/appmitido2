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
          <h3 class="card-title">LISTADO DE TUTORIALES</h3>
        </div>
        <div class="card-body">

          <table class="table">
            <thead>
              <tr>
                <th>Id</th>
                <th>Titulo</th>
                <th>SubCategoria</th>
                <th></th>

              </tr>
            </thead>
            <tbody>
                @foreach ($tutoriales as $tut)
                  <tr>
                    <td>{{$tut->id}}</td>
                    <td>{{$tut->titulo}}</td>
                    <td>{{$tut->subcategoria->nombre}}</td>
                    <td>
                      <a href="{{route('tutoriales.show', $tut->id)}}">Ver mas</a>
                    </td>
                  </tr>
                @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

@endsection
