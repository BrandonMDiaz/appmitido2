@extends('layouts.opcion')

@section('content')
  <div class="editar-btn">
    <a class="btn btn-primary"href="{{route('perfil.show')}}">Editar</a>
  </div>
  <div>
    <div class="row" style="margin-top:20px;">
      <div class="col-md-8 offset-2">
        <form class="card" method="POST" action="{{ route('perfil.editar', $user->id) }}">
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
            <div class="form-group">
              <label for="logo" class="form-label">{{ __('Logo') }}</label>
              <input type="file" name="logo" value="">
            </div>

            <button type="submit"class="btn btn-primary" name="button">modificar</button>
          </div>

        </form>

      </div>
    </div>
  </div>

@endsection
