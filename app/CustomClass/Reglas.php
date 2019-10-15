<?php
namespace App\CustomClass;
/*
Esta clase deberia de llamarse Modulo de conocimiento, y tener un array con
objetos de otra clase llamada reglas, sin embargo no soy tan crack aun con
esto de sistemas basados en conocimiento y me falta tiempo
*/
class Regla
{

  //los atomos que se necesitan para generar el resultado
  public $reglaAtomos = [];
  //los conectores que tiene
  public $conectoresLogicos = [];
  public $reglaCompleta;
  //si esta regla genera un atomo objetivo
  public $generaObjetivo = false;

  /* aqui puede fallar !!!!!!!!!!!!!!
  el atomo que genera la regla, si falla el arreglo de objetos le pongo el
  puro atomo en string al chile, a la verga */
  // private $atomoGenerado = new Atomo();
  public $atomoGenerado;

  function __construct($regla){
    $this->condensarRegla($regla);
    $this->reglaCompleta = $regla;
  }

  /*regresa true en caso que genera un atomo
  si se cumplen las condiciones basandonos en la memoria de trabajo se regresa true*/
  public function probarRegla($memoria){
    //contador
    $contador = 1;
    //contador array resultados
    $contadorArrayRes = 0;
    //guardamos los resultados pasados
    $arrayResultados = [];
    //checamos las condicines de la regla a ver si genera otro atomo
    foreach ($this->conectoresLogicos as $conector) {
      /* si nuestra regla solo tiene dos atomos usamos el primer if
      si tiene mas atomos usamos el else
      */
      if($contador <= 1){
        //switch con el tipo de conector logico por el que se itere
        switch ($conector) {
          case '|':
          //checamos si el atomo esta en la memoria de trabajo (puede estar tan solo 1 para que sea true)
          if($memoria->atomoPresente($this->reglaAtomos[$contador - 1]) || $memoria->atomoPresente($this->reglaAtomos[$contador])){
            $arrayResultados[] = true;
          }
          else {
            $arrayResultados[] = false;
          }
          break;
          case '&':
          //tienen que estar los dos atomos en la memoria para que sea true
          if($memoria->atomoPresente($this->reglaAtomos[$contador - 1]) && $memoria->atomoPresente($this->reglaAtomos[$contador])){
            $arrayResultados[] = true;
          }
          else {
            $arrayResultados[] = false;
          }
          break;
        }
        //aumentamos contador
        $contador+=$contador;
      }
      //si se tienen mas de dos atomos o mas de dos conectores logicos
      else {

        //switch con el tipo de conector logico por el que se itere
        switch ($conector) {
          case '|':
          //checamos si el atomo esta en la memoria de trabajo (puede estar tan solo 1 para que sea true)
          if($arrayResultados[$contadorArrayRes] || $memoria->atomoPresente($this->reglaAtomos[$contador])){
            $arrayResultados[] = true;
          }
          else {
            $arrayResultados[] = false;
          }
          break;
          case '&':
          //tienen que estar los dos atomos en la memoria para que sea true
          if($arrayResultados[$contadorArrayRes] && $memoria->atomoPresente($this->reglaAtomos[$contador])){
            $arrayResultados[] = true;
          }
          else {
            $arrayResultados[] = false;
          }
          break;
        }
        //aumentamos contadores
        $contador++;
        $contadorArrayRes++;
      }
    }
    //regresamos true o false dependiendo si genera el atomo o no
    return end($arrayResultados);
  }

  function condensarRegla($regla){
    //separamos la regla
    $separado = explode(" ", $regla);
    //instanciamos un atomo;
    // $this->atomoGenerado = new Atomo();

    if($separado[0] == '@'){
      //le ponemos su datos (nombre)
      $this->atomoGenerado =  $separado[1];
      // $this->atomoGenerado->data = $separado[1];


      //marcamos si es objetivo o no
      // $this->atomoGenerado->objetivo = true;
      $this->generaObjetivo = true;
    }
    else {
      //le ponemos su datos (nombre)
      $this->atomoGenerado = $separado[0];
      // $this->atomoGenerado->data = $separado[0];
      $this->generaObjetivo = false;

      // marcamos si es objetivo o no
      // $this->atomoGenerado->objetivo = false;
    }
    $anterior = '';
    $contador = 0;
    foreach ($separado as $pedacito) {
      if($anterior == ''){

      }
      else if($anterior == '@'){
        $this->atomoGenerado =  $pedacito;
      }
      else if($pedacito == '='){

      }
      else if($pedacito == '@') {
        $this->generaObjetivo = true;
      }
      //guardamos los conectores logicos
      else if($pedacito == '&' || $pedacito == '|'){
        $this->conectoresLogicos[] = $pedacito;
        $contador++;
      }
      //guardamos los atomos que forman el resultado
      else if($anterior == '=' || $anterior == '&' || $anterior == '|'){
        //concatenamos
        $this->reglaAtomos[] = $pedacito;
      }
      else {
        $this->reglaAtomos[$contador] = $this->reglaAtomos[$contador] . ' ' . $pedacito;
      }
      $anterior = $pedacito;
    }
  }
}
