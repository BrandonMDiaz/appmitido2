@extends('layouts.opcion')

@section('content')

  <div class="centrar">
    <p>
      Bienvenido {{$user->name}}
    </p>
  </div>
  <div class="centrar">
    <img class="imagen-per" src="{{Storage::url($user->logo)}}" alt="">
  </div>
@endsection
