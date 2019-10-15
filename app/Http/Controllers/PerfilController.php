<?php

namespace App\Http\Controllers;

use App\Examen;
use App\Categoria;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PerfilController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

  public function perfil()
  {
    $examen = Auth::user()->examen;

    $categorias = Categoria::getExamen($examen ,Auth::user()->id);
    $data = $this->estadisticas($categorias);
    return view('perfil.user', compact('categorias', 'data'));
  }

  private function estadisticas($categorias){
    $obj =  new \stdClass;
    $obj->promedioCat = array();
    $obj->respuestaCorr = array();
    $obj->respuestaCorrPorExamen = array();
    $temp = 0;
    $repCorr = 0;
    $contador = 0;
    foreach ($categorias as $categoria) {
      $contador = 0;
      $obj->respuestaCorrPorExamen[] = array();
      foreach ($categoria->examenes as $examen) {
        $temp = $examen->calificacion + $temp;
        $repCorr = $repCorr + $examen->calificacion;
        $contador++;
      }
      $obj->respuestaCorr[] = $temp;
      if($contador == 0){
        $obj->promedioCat[] = 0;
      }else{
        $obj->promedioCat[] = ($repCorr/($contador*10)) * 100;
      }
    }
    return $obj;
  }
}
