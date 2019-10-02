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
          <h3 class="card-title">Listado de categorias</h3>
        </div>
        <div class="card-body">

          <table class="table">
              <thead>
                  <tr>
                      <th>ID</th>
                      <th>Categoria</th>
                  </tr>
              </thead>
              <tbody>
                  @foreach($categorias as $cat)
                      <tr>
                          <td>{{ $cat->id }}</td>
                          <td>{{ $cat->nombre }}</td>
                          <td>
                              <a href="{{ route('categorias.show', $cat->id) }}">Detalles</a>
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
