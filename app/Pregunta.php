<?php

namespace App;

use App\Examen;
use App\SubCategoria;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;

class Pregunta extends Model
{
  protected $with = ['subcategoria'];

  static public function get10Preguntas($categoria){
    $examenes = Examen::where('user_id', '=', Auth::user()->id)
    ->where('categoria_id', '=', $categoria->id)
    ->get();

    $subCatTotal = count($categoria->subCategorias);
    if($subCatTotal == 0){
      return [];
    }

    $contadorPorSubCategoria = [];
    foreach ($examenes as $examen) {
      foreach ($examen->examenPregunta as $preg) {
        if(isset($contadorPorSubCategoria[$preg->subcategoria->nombre])){
          $contadorPorSubCategoria[$preg->subcategoria->nombre] += 1;
        }
        else {
          $contadorPorSubCategoria[$preg->subcategoria->nombre] = 1;
        }
      }
    }

    $examenesHechos = count($examenes);
    //para saber si al dividirse se tendran que agregar mas o no
    $modulo = 10 % $subCatTotal;
    //se divide para saber cuantas preguntas sacaremos por subcategoria
    $div = round(10 / $subCatTotal, 0);
    //en caso que la division tenga residuos se agregaran al balanceador
    $valanceador = $modulo;
    //las preguntas que tiene que agarrar
    $take = $div + $valanceador;

    //donde vamos a combinar todas las queries
    $merge = new Collection;
    $queryTomo = [];
    $contDoWhile = 0;
    do {
      for ($i = 0; $i < $subCatTotal; $i++) {
        if($contDoWhile == 0){
          //if else para tomar cuantos voy a saltar
          if(isset($contadorPorSubCategoria[$categoria->subCategorias[$i]->nombre])){
            $skip = $contadorPorSubCategoria[$categoria->subCategorias[$i]->nombre];
          }
          else {
            $skip = 0;
          }
          //tomamos los datos
          $idSub = $categoria->subCategorias[$i]->id;
          $query = Pregunta::where('subcategoria_id', '=', $idSub)
                              ->offset($skip)
                              ->take($take)
                              ->get();
        }
        else {
          //saltamos tantos y tomamos
          $skip = $contadorPorSubCategoria[$categoria->subCategorias[$i]->nombre];
          $query = Pregunta::where('subcategoria_id', '=', $categoria->subCategorias[$i]->id)
            ->skip($skip)
            ->take($take)
            ->get();
        }

        //contamos las preguntas obtenidas
        $pregObtenidas = count($query);
        //si esta seteado el arreglo entonces se lo sumamos, si no lo igualamos
        if(isset($contadorPorSubCategoria[$categoria->subCategorias[$i]->nombre])){
          $contadorPorSubCategoria[$categoria->subCategorias[$i]->nombre] += $pregObtenidas;
        }
        else {
          $contadorPorSubCategoria[$categoria->subCategorias[$i]->nombre] = $pregObtenidas;
        }

        $valanceador = 0;
        //hacemos el merge del query
        $merge = $merge->merge($query);
        //recalculamos cuantos va a agarrar
        if($contDoWhile == 0){
          if ($pregObtenidas == $take){
            $take = $div + $valanceador;
          }
          else if($pregObtenidas < $take && $pregObtenidas > 0){
            $valanceador = $take - $pregObtenidas;
            $take = $div + $valanceador;
          }
          else if($pregObtenidas == 0){ //en caso que sea igual a 0 (que no tenga ninguna pregunta la subcategoria)
            $valanceador = $take;
            $take = $div + $valanceador;
          }
        }
        else{
          $take = 10 - count($merge);
        }

        if(count($merge) == 10){
          return $merge;
        }
      }
      $take = 10 - count($merge);
      $contDoWhile++;
      if($contDoWhile > 10){
        return [];
      }

    }while(count($merge) < 10);
    return $merge;

  }

  // static public function get10preguntas($categoria){
  //   $examenes = Examen::where('user_id', '=', Auth::user()->id)
  //   ->where('categoria_id', '=', $categoria->id)
  //   ->get();
  //
  //   $contadorPorSubCategoria = [];
  //   //sacamos cuantas subcategorias fueron
  //   foreach ($examenes as $examen) {
  //     foreach ($examen->examenPregunta as $preg) {
  //       if(isset($contadorPorSubCategoria[$preg->subcategoria->nombre])){
  //         $contadorPorSubCategoria[$preg->subcategoria->nombre] += 1;
  //       }
  //       else {
  //         $contadorPorSubCategoria[$preg->subcategoria->nombre] = 1;
  //       }
  //     }
  //   }
  //   $subCatTotal = count($categoria->subCategorias);
  //   if($subCatTotal == 0){
  //     return [];
  //   }
  //   $examenesHechos = count($examenes);
  //   //para saber si al dividirse se tendran que agregar mas o no
  //   $modulo = 10 % $subCatTotal;
  //   //se divide para saber cuantas preguntas sacaremos por subcategoria
  //   $div = round(10 / $subCatTotal, 0);
  //   //cuantas preguntas nos vamos a saltar (lo obtenemos al sacar los examenes que ha hecho)
  //   $skip = $examenesHechos * $div;
  //   //donde vamos a combinar todas las queries
  //   $merge = new Collection;
  //   //en caso que la division tenga residuos se agregaran al balanceador
  //   $valanceador = $modulo;
  //   $contador = 0;
  //   //las preguntas que tiene que agarrar
  //   $take = $div + $valanceador;
  //   do{
  //     for ($i = 0; $i < $subCatTotal; $i++) {
  //       $query = Pregunta::where('subcategoria_id', '=', $categoria->subCategorias[$i]->id)
  //       ->skip($skip)
  //       ->take($take)
  //       ->get();
  //
  //       $pregObtenidas = count($query);
  //       $valanceador = 0;
  //       $merge = $merge->merge($query);
  //       if($contador == 0){
  //         if ($pregObtenidas == $take){
  //           $take = $div + $valanceador;
  //         }
  //         else if($pregObtenidas < $take && $pregObtenidas > 0){
  //           $valanceador = $take - $pregObtenidas;
  //           $take = $div + $valanceador;
  //         }
  //         else if($pregObtenidas == 0){ //en caso que sea igual a 0 (que no tenga ninguna pregunta la subcategoria)
  //           $valanceador = $take;
  //           $take = $div + $valanceador;
  //         }
  //         if(count($merge) == 10){
  //           return $merge;
  //         }
  //       }
  //       else {
  //         $take = 10 - count($merge);
  //       }
  //       //si ya son 10 preguntas que regrese
  //       if(count($merge) == 10){
  //         return $merge;
  //       }
  //     }
  //     if($contador == 2){
  //       return [];
  //     }
  //     $take = 10 - count($merge);
  //     $skip = $skip * 2;
  //     $contador++;
  //   }while(count($merge) < 10);
  //
  //   return $merge;
  // }

  /**Relacion 1 a muchos inversa**/
  public function subcategoria()
  {
    return $this->belongsTo('App\SubCategoria');
  }

  /**Relacion 1 a muchos inversa**/
  public function universidad()
  {
    return $this->belongsTo('App\Universidad');
  }
  public function examenPregunta()
  {
    return $this->belongsToMany('App\Pregunta', 'examen_pregunta')
    ->withPivot('respuesta_seleccionada', 'correcta');
  }

}
