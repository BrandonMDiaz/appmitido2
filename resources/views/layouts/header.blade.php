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

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">

</head>
<body>
    <div id="app">

          <div class='contenedor'>
            <div class='logo'>
              <img class='icono' src="{{URL::asset('/images/icon.png')}}"/>
              <h1>Appmitido</h1>
            </div>
                <div class='sesion'>
                  <h6>Perfil</h6>
                  <h6>Salir</h6>
                </div>
                {{-- <div>
                  <a href="#">
                    <h4>Iniciar sesion</h4>
                  </a>
                </div> --}}
          </div>
          <nav class="sticky">
            <ul class="contenedor-navbar ">
              <li> <h5> Inicio </h5> </li>
              <li> <h5> Tutoriales </h5> </li>
              <li> <h5> Examenes </h5> </li>
              <li> <h5> Examen vocacional </h5></li>
            </ul>
        </nav>

        @yield('content')
    </div>
</body>
</html>
