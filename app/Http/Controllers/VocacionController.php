<?php

namespace App\Http\Controllers;

use App\CustomClass\SBC;
use Illuminate\Http\Request;

class VocacionController extends Controller
{

  public function index(){
    return view('orientador.index');
  }

  public function test(){
    return view('orientador.test');
  }

  public function orientador(Request $request){

    $carrera = [];
    $arrayAtomos = [];

		if($request->linguistico_verbal == 1){
      $arrayAtomos[] = 'lingüístico-verbal';
		}
		if($request->mate == 1){
      $arrayAtomos[] = 'lógico-matemático';

		}
		if($request->espacio_visual == 1){
      $arrayAtomos[] = 'espacio-visual';
		}
		if($request->interpersonal == 1){
      $arrayAtomos[] = 'interpersonal';
		}
		if($request->creativa == 1){
      $arrayAtomos[] = 'creativa';
		}
    if($request->intrapersonal == 1){
      $arrayAtomos[] = 'intrapersonal';
    }
    $carrera = SBC::runSBC($arrayAtomos);
    dd($carrera);
    return view('orientador.resultado', compact('carrera'));
  }

}
