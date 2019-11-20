@extends('layouts.opcion')

@section('content')

  <div>
    <div class="perfil-background">
      <div class="icon-book">
        <i class="fas fa-book"></i>
      </div>
      <div class="f">
        <p>Editando</p>
      </div>
      <div class="editar-btn">
        <a class="btn btn-primary"href="{{route('perfil')}}">Volver </a>
      </div>
    </div>

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
      {{-- preparatoria --}}
      <div class="form-group">
        <label for="preparatoria" class="form-label">{{ __('Preparatoria') }}</label>
          <input id="preparatoria" type="text" class="form-control @error('preparatoria') is-invalid @enderror" name="preparatoria" value="{{  $user->preparatoria }}" autocomplete="preparatoria" autofocus>
          @error('preparatoria')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
      </div>
      {{-- promedio --}}
      <div class="form-group ">
        <label for="promedio" class="form-label">{{ __('Promedio') }}</label>
          <input id="promedio" type="text" class="form-control @error('promedio') is-invalid @enderror" name="promedio" value="{{  $user->promedio }}" autocomplete="promedio" autofocus>
          @error('promedio')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
      </div>
      <button type="submit"class="btn btn-primary" name="button" onclick="disableButton(this)">modificar</button>
    </div>

    </form>
    {{--
    <div class="form-group row">
    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

    <div class="col-md-6">
    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

    @error('password')
    <span class="invalid-feedback" role="alert">
    <strong>{{ $message }}</strong>
  </span>
  @enderror
</div>
</div>

<div class="form-group row">
  <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

  <div class="col-md-6">
    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
  </div>
</div> --}}
</div>
</div>
</div>

<script type="text/javascript" src="{{ asset('js/doubleForm.js') }}"></script>

@endsection
