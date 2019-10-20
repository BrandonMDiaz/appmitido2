<nav class="sticky contenedor2 background-col">
    <a class='logo2' href="{{ route('landing') }}">
      <img class='icono2' src="{{URL::asset('/images/icon.png')}}"/>
      <h2>Appmitido</h2>
    </a>

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
            <a class="dropdown-item" href="{{  route('perfil')  }}">
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
