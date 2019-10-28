@extends('layouts.opcion')

@section('content')

  <div>
    <div class="row" style="margin-top:20px;">
      <div class="col-md-8 offset-2">
        <form class="card" method="POST" action="{{ route('perfilU.edit', $user->id) }}">
          @csrf
          <input type="hidden" name="_method" value="PATCH">
          <div class="card-body">
            {{-- nombre --}}
            <div class="form-group">
              <label for="name" class="form-label">{{ __('Name') }}</label>
              <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}" required autocomplete="name" autofocus>
              @error('name')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
            {{-- Logo --}}
            <label class="form-label" for="logo">Agregar logo (si ya subiste un logo anteriormente se editara si agregas uno en este momento)</label>
              @error('logo')
              <p style="background-color: #ef7070; font-size:16px;">
                <strong >{{ $message }}</strong>
              </p>
              @enderror
            <div class="form-group">
              <input type="file" name="logo" accept="image/*" onchange="loadFile(event)">
            </div>

            <div style="margin-top:3%; margin-bottom:3%;">
              <img class="imagen-per" id="output"/>
            </div>
            <button type="submit"class="btn btn-primary" name="button">modificar</button>
          </div>
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
