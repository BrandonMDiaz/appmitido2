@extends('layouts.opcion')

@section('content')
  <div class="">
    <header id="header-landing">
      <div class="estudia-header">
        <h1>Preparate con esta aplicacion para que tengas una mayor oportunidad <br>
          de entrar a la universidad de tus sueños</h1>
        </div>
        <div class="login-landing">
          <div class="header-login">
            <button id="btn-asp" onclick="show(this)" class="btn-header button-selected" type="button" name="button">Aspirante</button>
            <button id="btn-uni" onclick="show(this)" class="btn-header"type="button" name="button">Universidad</button>
          </div>

          <div id='form-asp' class="forms-login-asp">
            <div class="card-body">
              <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group row">
                  <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                  <div class="col-md-6">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                    @error('email')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
                </div>

                <div class="form-group row">
                  <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                  <div class="col-md-6">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                    @error('password')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
                </div>

                <div class="form-group row">
                  <div class="col-md-6 offset-md-4">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                      <label class="form-check-label" for="remember">
                        {{ __('Remember Me') }}
                      </label>
                    </div>
                  </div>
                </div>

                <div class="form-group row mb-0">
                  <div class="col-md-8 offset-md-4">
                    {{-- <div class="flex"> --}}

                    <button type="submit" class="btn btn-primary">
                      {{ __('Login') }}
                    </button>
                    <a href="{{'register'}}" class="btn btn-primary">
                      Registrarse
                    </a>
                    {{-- </div> --}}
                    @if (Route::has('password.request'))
                      <a class="btn btn-link" href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                      </a>
                    @endif
                  </div>
                </div>
              </form>
            </div>
          </div>

          <div id='form-uni' class="forms-login-uni hide">
            <div class="card-body">

              <form method="POST" action="{{ route('universidad-login') }}">
                @csrf
                <div class="form-group row">
                  <label for="emailU" class="col-sm-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                  <div class="col-md-6">
                    <input id="emailU" type="email" class="form-control{{ $errors->has('emailU') ? ' is-invalid' : '' }}" name="emailU" value="{{ old('emailU') }}" required autofocus>
                    @if ($errors->has('emailU'))
                      <span class="invalid-feedback">
                        <strong>{{ $errors->first('emailU') }}</strong>
                      </span>
                    @endif
                  </div>
                </div>
                <div class="form-group row">
                  <label for="passwordU" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
                  <div class="col-md-6">
                    <input id="passwordU" type="password" class="form-control{{ $errors->has('passwordU') ? ' is-invalid' : '' }}" name="passwordU" required>
                    @if ($errors->has('passwordU'))
                      <span class="invalid-feedback">
                        <strong>{{ $errors->first('passwordU') }}</strong>
                      </span>
                    @endif
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-6 offset-md-4">
                    <div class="form-check">
                        <input type="checkbox" name="rememberU" class="form-check-input" {{ old('remember') ? 'checked' : '' }}> {{ __('Remember Me') }}
                        <label for="rememberU" class="form-check-label">
                        </label>
                    </div>
                  </div>
                </div>
                <div class="form-group row mb-0">
                  <div class="col-md-8 offset-md-4">
                    {{-- <div class="flex"> --}}
                    <button type="submit" class="btn btn-primary">
                      {{ __('Login') }}
                    </button>
                    <a  href="{{ route('registerU') }}" class="btn btn-primary">
                      Registrarse
                    </a>
                    {{-- </div> --}}
                    <a class="btn btn-link" href="{{ route('password.request') }}">
                      {{ __('Forgot Your Password?') }}
                    </a>
                  </div>
                </div>
              </form>
            </div>
          </div>

        </div>
      </header>

      <div class="subtitulo-landing">
        <h1 > Aprende con nosotros </h1>
      </div>
      <div class="cards-landing">

        <div class="card" style="width: 18rem;">
          <img src="/images/exam.jpg" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Examenes</h5>
            <p class="card-text">Hay una serie de examenes para que el aspirante pueda practicar.<br>
              Vienen con cronometro y separados por categorias.
              Hay examenes de 10 preguntas y examenes completos. </p>
            </div>
          </div>

          <div class="card" style="width: 18rem;">
            <img src="/images/tutorial.jpg" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Tutoriales</h5>
              <p class="card-text">Las universidades se encargaran de subir tutoriales para que los aspirantes tengan
                informacion por la cual apoyarse.</p>
              </div>
            </div>

            <div class="card" style="width: 18rem;">
              <img src="/images/quest.jpg" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">Orientador Vocacional</h5>
                <p class="card-text">Incluimos un orientador vocacional para aquellos jovenes que aun no
                  no saben que ca estudiar.</p>
                </div>
              </div>
            </div>
            <div class="universidad-landing">
              <div class="uni-img">
                <img class="uni-img" src="/images/universidad.jpg" alt="">
              </div>
              <div class="estudia-header2">
                <h5>Universidades</h5>
                <h1>Ayuda a los aspirantes a lograr su meta. </h1>
                <h4>Juntos podremos prepar a los interesados en sacar la mejor nota.</h4>

              </div>
            </div>
          </div>
          <script src="{{ asset('js/landing.js') }}" defer></script>

        @endsection
