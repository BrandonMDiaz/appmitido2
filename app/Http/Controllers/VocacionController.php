<?php

namespace App\Http\Controllers;

use App\CustomClass\SBC;
use Illuminate\Http\Request;

class VocacionController extends Controller
{


  public function orientador(Request $request){

    $carrera = [];
    $arrayAtomos = [];

		if($request->linguistico_verbal > 35){
      $arrayAtomos[] = 'lingüístico-verbal';
		}
		if($request->mate > 35){
      $arrayAtomos[] = 'lógico-matematico';

		}
		if($request->espacio_visual > 35){
      $arrayAtomos[] = 'espacio-visual';
		}
		if($request->interpersonal > 35){
      $arrayAtomos[] = 'interpersonal';

		}
		if($request->creativa > 28){
      $arrayAtomos[] = 'creativa';
		}
    $arrayAtomos = ['creativa','interpersonal','espacio-visual', 'lógico-matemático'];

    $carrera = SBC::runSBC($arrayAtomos);
    dd($carrera);
  }

  public function reglas(){

  }

}
