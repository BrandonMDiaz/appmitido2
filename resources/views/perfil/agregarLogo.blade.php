@extends('layouts.opcion')

@section('content')
  <div class="container">
    <div class="card">
      <div class="card-body">

    <h1>Bienvenido!</h1>
    <h5>Antes de comenzar agrega un logo a tu perfil para que los aspirantes
      puedan reconocer tu institucion de una manera mas rapida</h5>
      <form enctype="multipart/form-data" style="margin-top:40px;" action="{{route('universidad.edit', $user->id)}}" method="post">
        <input type="hidden" name="_method" value="PATCH">
        @csrf

          <label class="form-label" for="logo">Agregar logo</label>
            @error('logo')
            <p style="background-color: #ef7070;">
              <strong>{{ $message }}</strong>
            </p>
            @enderror
        <div class="form-group">
          <input type="file" name="logo" accept="image/*" onchange="loadFile(event)">
        </div>

        <div style="margin-top:3%; margin-bottom:3%;">
          <img class="imagen-per" id="output"/>
        </div>
        <button class="btn btn-primary"type="submit" name="button">Subir imagen</button>
      </form>
    </div>
  </div>

  </div>
  <script>
    var loadFile = function(event) {
      var reader = new FileReader();
      reader.onload = function(){
        var output = document.getElementById('output');
        output.src = reader.result;
      };
      reader.readAsDataURL(event.target.files[0]);
    };
  </script>
@endsection
