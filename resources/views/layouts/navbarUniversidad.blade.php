
<div class="wrapper">
    <!-- Sidebar  -->
    <nav id="sidebar">
        <div class="sidebar-header">
          <div class='logo2'>
            <img class='icono2' src="{{URL::asset('/images/icon.png')}}"/>
            <h2>Appmitido</h2>
          </div>
        </div>

        <ul class="list-unstyled components">
            <li class="active">
                <a onclick="dropDown(this)" data-toggle="collapse" class="pointer dropdown-toggle">Tutoriales</a>
                <ul class="list-unstyled drop" id="tutorialSubmenu">
                    <li>
                        <a href="#">Crear</a>
                    </li>
                    <li>
                        <a href="route('examen.index')">Modificar</a>
                    </li>
                    <li>
                        <a href="route('examen.index')">Eliminar</a>
                    </li>
                </ul>
            </li>
            <li>
                <a onclick="dropDown(this)" data-toggle="collapse" class=" pointer dropdown-toggle">Categorias</a>
                <ul class="list-unstyled drop" id="categoriaSubmenu">
                    <li>
                        <a href="{{route('categorias.create')}}">Crear</a>
                    </li>
                    <li>
                        <a href="{{route('categorias.index')}}">Modificar</a>
                    </li>
                    <li>
                        <a href="{{route('categorias.index')}}">Eliminar</a>
                    </li>
                </ul>
            </li>
            <li class="active">
                <a onclick="dropDown(this)" data-toggle="collapse" class="pointer dropdown-toggle">Subcategorias</a>
                <ul class="list-unstyled drop">
                    <li>
                        <a href="{{route('subcategorias.create')}}">Crear</a>
                    </li>
                    <li>
                        <a href="{{route('subcategorias.index')}}">Modificar</a>
                    </li>
                    <li>
                        <a href="{{route('subcategorias.index')}}">Eliminar</a>
                    </li>
                </ul>
            </li>
            <li >
                <a onclick="dropDown(this)" data-toggle="collapse" class="pointer dropdown-toggle">Preguntas</a>
                <ul class="list-unstyled drop">
                    <li>
                        <a href="{{route('preguntas.create')}}">Crear</a>
                    </li>
                    <li>
                        <a href="{{route('preguntas.index')}}">Modificar</a>
                    </li>
                    <li>
                        <a href="{{route('preguntas.index')}}">Eliminar</a>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>

    <!-- Page Content  -->
    <div id="content">

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">

                <button onclick="collapse()"type="button" id="sidebarCollapse" class="btn btn-info">
                    <i class="fas fa-align-left"></i>
                    <span>Toggle Sidebar</span>
                </button>
                <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-align-justify"></i>
                </button>
                <!-- Authentication Links -->
                @guest('universidad')
                  <li class="">
                    <a class="" href="{{ route('login') }}">
                      <h5 class="color-un">
                        {{ __('Login') }}
                      </h5>
                    </a>
                  </li>
                  @if (Route::has('register'))
                    <li class="">
                      <a class="" href="{{ route('register') }}">
                        <h5 class="color-un">
                          {{ __('Register') }}
                        </h5>
                      </a>
                    </li>
                  @endif
                @else
                  <li style="list-style-type: none;" class="">
                    <a id="navbarDropdown" class="dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                      {{ Auth::guard('universidad')->user()->name }} <span class="caret"></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item" href="{{ route('home') }}">
                        Configuración
                      </a>
                      <a class="dropdown-item" href="{{ route('universidad-logout') }}"
                      onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();">
                      {{ __('Logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('universidad-logout') }}" method="POST" style="display: none;">
                      @csrf
                    </form>
                  </div>
                </li>
              @endguest
            </div>
        </nav>
        @yield('content')
      </div>
</div>

<!-- Bootstrap CSS CDN -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
<!-- Popper.JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

<script type="text/javascript">
  function dropDown(id){
	   id.nextSibling.nextSibling.classList.toggle("drop");
   }
   function collapse(id){
     const sidebar = document.getElementById('sidebar');
 	   sidebar.classList.toggle("active");
    }

</script>

</div>
