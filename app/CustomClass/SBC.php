<?php

namespace App\CustomClass;

use App\CustomClass\Memory;
use App\CustomClass\InferenceMachine;
use App\CustomClass\ModuloConocimiento;

use App\CustomClass\Reglas;
use App\CustomClass\Atomo;


/**
 * SBC
 */
class SBC
{

  /* le estamos pasando los atomos que ya extraimos con las preguntas
  si se quisiera hacer pregunta por pregunta no se pasaria este arreglo
  y se preguntaria en la parte de la maquina de inferencia cuando se
  esten checando las reglas */
  static public function runSBC($arrayAtomos){
    //instanciamos maquina de inferencia
    $inferenceEngine = new InferenceMachine();
    //instancia de memoria
    $memoria = new Memory();
    //instancia de modulo de conocimiento (ya tiene cargada las reglas)
    $moduloConocimiento = new ModuloConocimiento();

    //load atomos a memoria
    foreach ($arrayAtomos as $at) {
        // $atomo = new Atomo();
        // $atomo->setData($at);
        // $atomo->setObjetivo(false);
        $memoria->cargarAtomo($at);
    }

    return $inferenceEngine->encender($memoria, $moduloConocimiento);

  }

}
