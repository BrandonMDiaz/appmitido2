<?php
namespace App\CustomClass;
/**
 *
 */
class Estadistica
{

  public static function estadisticas($categorias){
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
