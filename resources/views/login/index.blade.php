@extends('layouts.opcion')

@section('content')

  <div class="container">
    <div class="row justify-content-center" style="margin-top:30px;">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header  black-card">Universidad</div>
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
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Remember Me') }}
                    </label>
                  </div>
                </div>
              </div>
              <div class="form-group row mb-0">
                <div class="col-md-8 offset-md-4">
                  <button type="submit" class="btn btn-primary">
                    {{ __('Login') }}
                  </button>
                  <a href="{{route('registerU')}}" class="btn btn-primary">
                    Registrarse
                  </a>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection
