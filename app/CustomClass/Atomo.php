<?php
namespace App\CustomClass;
/**
 *
 */
class Atomo
{
  private $data;
  private $objetivo;

  function __construct($d = null, $t = null)
  {
    $this->data = $d;
    $this->objetivo = $t;
  }

  public function getData(){
    return $data;
  }
  public function getObjetivo(){
    return $objetivo
  }
  public function setData($d){
    $this->data = $d
  }
  public function setObjetivo($t){
    $this->objetivo = $t
  }


  // public $entorno = [];
  // public $intermedio = [];
  // public $objetivo = [];
  //
  //
  // function __construct($e, $i, $o)
  // {
  //   $entorno = $e;
  //   $intermedio = $i;
  //   $objetivo = $o;
  // }
}
