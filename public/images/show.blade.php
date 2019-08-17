@extends('layouts.app')

@section('content')

  <div class="body-show-viaje">
    <div class="fotos-show">
      <div class="first-image">
        <img src="https://www.mexicodestinos.com/blog/wp-content/uploads/2018/08/bicicletas-micos-huasteca-potosina-336x420.jpg" alt="">
      </div>
      <div class="second-group">
        <div class="first-image-inside">
          <img src="https://www.eluniversal.com.mx/sites/default/files/styles/f01-1023x630/public/2017/12/22/xilitla_pueblo_magico_huasteca_potosina_las_pozas.jpg?itok=XCxpswdB&c=252c0af2cf652276e7cbf5546805bab3" alt="">
        </div>
        <div class="third-image">
          <img src="https://www.mexicodestinos.com/blog/wp-content/uploads/2018/08/bicicletas-micos-huasteca-potosina-336x420.jpg" alt="">
        </div>
        <div class="fourth-image">
          <img src="https://www.mexicodestinos.com/blog/wp-content/uploads/2018/08/bicicletas-micos-huasteca-potosina-336x420.jpg" alt="">
        </div>
        <div class="fifth-image">
          <img src="https://www.mexicodestinos.com/blog/wp-content/uploads/2018/08/bicicletas-micos-huasteca-potosina-336x420.jpg" alt="">
        </div>
      </div>
    </div>
    <div class="informacion-show-viaje">
      <div class="container">
        <div class="grid-informacion">
          <div class="informacion-1">
            <div class="titulo">
              <h1>{{$viaje->lugar}}</h1>
              <a href="#">
                <h6>{{$viaje->userViaje->name}}</h6>
              </a>
            </div>
            <div class="punto-de-encuentro">
              <i class="fas fa-map-pin"></i>
              <h4> {{$viaje->punto_de_encuentro}}</h4>
            </div>
            <div class="fechas">
              <span>{{$viaje->fecha_de_salida}}</span> - <span>{{$viaje->fecha_de_regreso}}</span>
            </div>
            <h4 class="sub-titulo">Destinos</h4>
            <div class="destinos">
              @foreach ($viaje->destinos as $destino)
                <div class="contenedor-informacion-2">
                  <h2>{{$destino->nombre}}</h2>
                </div>
              @endforeach
            </div>

            <div class="descripcion">
              <h4  class="sub-titulo">Descripcion</h4>
              <div class="contenedor-informacion-2">
                <p>{{$viaje->informacion}}
                </p>
                </div>
              </div>
              <div class="incluye">
                <h4 class="sub-titulo">Incluye</h4>
                <div class="contenedor-informacion-2">
                  {{$viaje->incluye}}
                </div>
              </div>
              <div class="no-incluye">
                <h4 class="sub-titulo">No incluye</h4>
                <div class="contenedor-informacion-2">
                  {{$viaje->no_incluye}}
                </div>
              </div>
            </div>

            <div class="informacion-2">
              <div class="box">
                <div class="precio-2">
                  <h1>{{$viaje->precio}} <span class="por-persona">por persona<span></h1>
                </div>
                <div class="cupos">
                  <h3>Cupos Disponibles: {{$viaje->cupo}}</h3>
                </div>
                <div class="informacion">
                  <h5>Para mas informacion:</h5>
                  <p>
                    {{$viaje->contacto}}
                  </p>
                  {{-- <ul>
                    <li>3315363213</li>
                    <li>1233332112</li>
                    <li>http::\\facebook.com</li>
                  </ul> --}}
                </div>
              </div>
            </div>

        </div>
      </div>
    </div>
    <div class="comentarios-show-viaje">

    </div>
  </div>

@endsection
