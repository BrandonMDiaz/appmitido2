@extends('layouts.opcion')

@section('content')
  <div class="perfil">
    <div class="perfil-background">
      <div class="icon-book">
        <i class="fas fa-book"></i>
      </div>
      <div class="f">
        <p>Brandon</p>
      </div>
      <div class="editar-btn">
        <button class="btn btn-primary" type="button" name="button">editar</button>
      </div>
    </div>
    <div class="informacion-perfil">
      <div class="">
        <p>Universidad</p>
        <div class="">
          <p>UdG</p>

        </div>
      </div>

    </div>
    <div class="chart">
      <canvas id="myChart" width="200" height="200"></canvas>
    </div>
  </div>
  <script src="{{ asset('js/perfil.js') }}" defer> </script>
@endsection
