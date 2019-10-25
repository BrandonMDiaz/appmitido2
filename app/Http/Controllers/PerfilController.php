<?php

namespace App\Http\Controllers;

use App\Examen;
use App\User;
use App\CustomClass\Estadistica;

use App\Categoria;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PerfilController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

  public function show(){
    $user = Auth::user();
    return view('perfil.editar',compact('user'));
  }

  public function editar(Request $request, User $user){
    $request->validate([
            'name' => 'required|min:3|max:155',
            'preparatoria' => 'required|max:255',
            'promedio' => 'required|numeric',
        ]);
    $user->name = $request->name;
    $user->preparatoria = $request->preparatoria;
    $user->promedio = $request->promedio;
    $user->save();
    return redirect()->route('perfil');
  }
  public function perfil()
  {
    $examen = Auth::user()->examen;
    $user = Auth::user();
    $categorias = Categoria::getExamen($examen ,Auth::user()->id);
    // $data = $this->estadisticas($categorias);
    $data = Estadistica::estadisticas($categorias);

    return view('perfil.user', compact('categorias', 'data', 'user'));
  }

  private function estadisticas($categorias){
    $obj =  new \stdClass;
    $obj->promedioCat = array();
    $obj->respuestaCorr = array();
    $obj->respuestaCorrPorExamen = array();
    $repCorr = 0;
    $contador = 0;
    //se iteran las categorias
    foreach ($categorias as $categoria) {
      $contador = 0;
      $repCorr = 0;
      $obj->respuestaCorrPorExamen[] = array();
      //iterar los examenes que contiene cada categoria
      foreach ($categoria->examenes as $examen) {
        $repCorr = $repCorr + $examen->calificacion;
        $contador++;
      }
      $obj->respuestaCorr[] = $repCorr;
      if($contador == 0){
        $obj->promedioCat[] = 0;
      }else{
        $obj->promedioCat[] = number_format((float)(($repCorr/count($categoria->examenes)) * 10), 2, '.', '');
        // (($repCorr/count($categoria->examenes)) * 10);

      }
    }
    return $obj;
  }
}
