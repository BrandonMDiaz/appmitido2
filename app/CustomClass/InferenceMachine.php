<?php
namespace App\CustomClass;

/**
*
*/
class InferenceMachine
{
  function encender($memoria, $bc){
    $list = [];
    $contador = 0;
    /*cargar memoria. La memoria tiene que tener adentro todos los
    atomos que se obtuvieron de las respuestas del examen*/
    /*Va a tener en su array el nombre de esos atomos. Ejemplo:
    ['autodidacta', 'presion', 'bueno diseñando', ... ]
    */

    /*Tambien va a cargar las reglas, para saber que atomos se cumplen*/

    /*si en la regla hay un '&' entonces usaremos un IF con && . Si en
    la regla hay un '|' . entonces usaremos un IF con || para simular una
    conjuncion y una */

    /*Hacemos una busqueda en la cadena, si estan los dos atomos entonces generamos
    el otro atomo y lo metemos a la memoria de trabajo y asi sucesivamente hasta
    alcanzar el atomo objetivo*/
    foreach ($bc->reglas as $regla) {
      //separar regla en pedacitos
      $reg = new Regla($regla);
      /* Iterar sobre los atomos de la regla y ver si ya estan en la memoria de
      trabajo o tenemos que preguntar al usuario (en nuestro caso no preguntamos
      ya que tenemos los atomos con el test)*/
      foreach ($reg->reglaAtomos as $atom) {
        /* checamos que el atomo no esté ya en la memoria de trabajo (En este caso se tendria
        que preguntar al usuario y agregar ese dato a la memoria de trabajo, pero como
        nosotros hizimos un test ya lo sacamos de antemano)*/
        if($memoria->atomoPresente($atom)){
          //no hacer nada
        }
        else {
          //preguntar, sin embargo no preguntaremos nada ya que ya se hizo el test
          //si fuera un SBC completo si se preguntaría
        }
      }

      //checamos la regla a ver si se genera su atomo a partir de los atomos que
      //estan en la memoria de trabajo
      if($reg->probarRegla($memoria)){
        //aqui puede fallar !!!!!!!!!!
         $memoria->cargarAtomo($reg->atomoGenerado);
        // $memoria->cargarAtomo($reg->atomoGenerado->data);
      }
      //si es atomo objetivo y está en la memoria de trabajo hay que regresarlo
      if($reg->generaObjetivo){

        // if($reg->atomoGenerado == 'Psicologia'){
        // }

        //agregar data en caso que hagas bien la clase atomo y los arrays de objetos
        if($memoria->atomoPresente($reg->atomoGenerado)){
          /* aqui en vez de regresar el primero que funcione, podiras regresar
          una lista con todos los resultados objetivos posibles */
          if($contador == 3){
            return $list;
          }
          $list[] = $reg->atomoGenerado;
          $contador ++;
          // return $reg->atomoGenerado->data;
        }
      }
    }//end foreach
    return $list;
  }


  function encender($memoria, $bc){
    $list = [];
    $contador = 0;
    foreach ($bc->reglas as $regla) {
      //separar regla en pedacitos
      $reg = new Regla($regla);
      foreach ($reg->reglaAtomos as $atom) {
        if($memoria->atomoPresente($atom)){
          //no hacer nada
        }
        else {
        }
      }
      if($reg->probarRegla($memoria)){
         $memoria->cargarAtomo($reg->atomoGenerado);
      }
      if($reg->generaObjetivo){
        if($memoria->atomoPresente($reg->atomoGenerado)){
          if($contador == 3){
            return $list;
          }
          $list[] = $reg->atomoGenerado;
          $contador ++;
        }
      }
    }
    return $list;
  }
}
