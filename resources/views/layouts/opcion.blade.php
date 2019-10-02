<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- Scripts -->
  <script src="{{ asset('js/app.js') }}" defer></script>
  <script src="https://kit.fontawesome.com/0c5fd715c2.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.min.js"></script>
  {{-- Math --}}
  <script src="https://polyfill.io/v3/polyfill.min.js?features=es6"></script>
  <script id="MathJax-script" async src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-mml-chtml.js"></script>
  <!-- Fonts -->
  <link rel="dns-prefetch" href="//fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

  <!-- Styles -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <link href="{{ asset('css/main.css') }}" rel="stylesheet">


</head>
<body>
  <div id="app">
    @auth('universidad')
      @include('layouts.navbarUniversidad')
    @endauth

    {{-- @if(!Auth::guard('universidad')->check()) --}}
    @auth
      <nav class="sticky contenedor2 background-col">
        <div class='logo2'>
          <img class='icono2' src="{{URL::asset('/images/icon.png')}}"/>
          <h2>Appmitido</h2>
        </div>

        <ul class="contenedor-navbar2 background-col">
          <li>
            <a  href="#"> <h5> Tutoriales </h5> </a>
          </li>
          <li>
            <a href="{{route('examen.index')}}">
              <h5> Examenes </h5>
            </a>
          </li>
          <li>
            <a href="#">
              <h5> Test vocacional </h5>
            </a>
          </li>

          <!-- Authentication Links -->
          @guest
            <li class="">
              <a class="" href="{{ route('login') }}">
                <h5>
                  {{ __('Login') }}
                </h5>
              </a>
            </li>
            @if (Route::has('register'))
              <li class="">
                <a class="" href="{{ route('register') }}">
                  <h5>
                    {{ __('Register') }}
                  </h5>
                </a>
              </li>
            @endif
          @else
            <li class=" dropdown">
              <a id="navbarDropdown" class="dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                {{ Auth::user()->name }} <span class="caret"></span>
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('perfil') }}">
                  Perfil
                </a>
                <a class="dropdown-item" href="{{ route('home') }}">
                  Configuración
                </a>
                <a class="dropdown-item" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
              </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
              </form>
            </div>
          </li>
        @endguest
      </ul>
    </nav>
  @endauth

  @if(!Auth::guard('universidad')->check() && !Auth::check())
    @include('layouts.navbarUser')
  @endif


  @yield('content')
</div>
</body>
</html>
