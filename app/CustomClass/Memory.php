<?php
namespace App\CustomClass;

/**
 * memoria de trabajo
 */
class Memory
{

  //guardar objetos de la clase atomo
  public $storage = [];

  function cargarAtomo($atomo){
    $this->storage[] = $atomo;
  }

  function atomoPresente($atomo){
    return in_array($atomo, $this->storage);
  }

  function limpiar(){
    $this->storage = [];
  }
}
