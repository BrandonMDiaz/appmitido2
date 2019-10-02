<nav class="sticky contenedor2 color-universidad">
  <div class='logo2'>
    <img class='icono2' src="{{URL::asset('/images/icon.png')}}"/>
    <h2>Appmitido</h2>
  </div>

  <ul class="contenedor-navbar2">


    <li class="dropdown">
      <a id="navbarDropdown" class="dropdown-toggle color-un" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
        Tutoriales <span class="caret"></span>
      </a>
      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" href="{{  route('perfil')  }}">
          Crear Tutorial
        </a>
        <a class="dropdown-item" href="{{ route('home') }}">
          Modificar Tutorial
        </a>
        <a class="dropdown-item" href="{{ route('home') }}">
          Eliminar Tutorial
        </a>
      </div>
    </li>

    <li class="dropdown">
      <a id="navbarDropdown" class="dropdown-toggle color-un" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
        Categorias <span class="caret"></span>
      </a>
      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" href="{{ route('home') }}">
          Crear Categorias
        </a>
        <a class="dropdown-item" href="{{ route('home') }}">
          Modificar Categorias
        </a>
        <a class="dropdown-item" href="{{ route('home') }}">
          Eliminar Categorias
        </a>
      </div>
    </li>

    <li class="dropdown">
      <a id="navbarDropdown" class="dropdown-toggle color-un" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
        SubCategoria <span class="caret"></span>
      </a>
      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" href="{{ route('home') }}">
          Crear SubCategoria
        </a>
        <a class="dropdown-item" href="{{ route('home') }}">
          Modificar SubCategoria
        </a>
        <a class="dropdown-item" href="{{ route('home') }}">
          Eliminar SubCategoria
        </a>
      </div>
    </li>

    <li class="dropdown">
      <a id="navbarDropdown" class="dropdown-toggle color-un" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
        Preguntas <span class="caret"></span>
      </a>
      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" href="{{ route('home') }}">
          Crear Preguntas
        </a>
        <a class="dropdown-item" href="{{ route('home') }}">
          Modificar Preguntas
        </a>
        <a class="dropdown-item" href="{{ route('home') }}">
          Eliminar Preguntas
        </a>
      </div>
    </li>

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
      <li class=" dropdown">
        <a id="navbarDropdown" class="dropdown-toggle color-un" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
          {{ Auth::guard('universidad')->user()->name }} <span class="caret"></span>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="{{ route('home') }}">
            Perfil
          </a>
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
</ul>
</nav>
