<?php

namespace App\Http\Controllers;

use App\Universidad;
use App\Pregunta;
use App\Examen;
use App\Categoria;
use App\ExamenPregunta;

use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

  /**
  * Show the application dashboard.
  *
  * @return \Illuminate\Contracts\Support\Renderable
  */
  public function index(Request $request)
  {

    $user = Auth::user();
    if($request->id != null && $user->examen != $request->id){
      $user->examen = $request->id;
      $user->save();
    }
    if($request->id != null){
      $categorias = Categoria::getExamen($request->id ,Auth::user()->id);
      // $categorias = DB::table('categorias')->where('universidad_id', $request->id)->get();
    }
    else if($user->examen > 0){
      $categorias = Categoria::getExamen($user->examen ,Auth::user()->id);
    }
    else{
      return redirect('/universidad');
    }
    $data = $this->estadisticas($categorias);
    return view('home.index', compact('categorias','data'));
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
