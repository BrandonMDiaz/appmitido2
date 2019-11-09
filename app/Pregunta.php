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

  static public function get10preguntas($categoria){
    $examenes = Examen::where('user_id', '=', Auth::user()->id)
                        ->where('categoria_id', '=', $categoria->id)
                        ->get();

    //sacamos cuantas subcategorias fueron
    $count = count($categoria->subCategorias);
    if($count == 0){
      return [];
    }
    $examenesHechos = count($examenes);
    //para saber si al dividirse se tendran que agregar mas o no
    $modulo = 10 % $count;
    //se divide para saber cuantas preguntas sacaremos por subcategoria
    $div = round(10 / $count, 0);
    //cuantas preguntas nos vamos a saltar (lo obtenemos al sacar los examenes que ha hecho)
    $skip = round($examenesHechos * $div);
    //donde vamos a combinar todas las queries
    $merge = new Collection;
    //en caso que la division tenga residuos se agregaran al balanceador
    $valanceador = $modulo;
    $contador = 0;
    //las preguntas que tiene que agarrar
    $take = $div + $valanceador;
    do{
      for ($i = 0; $i < $count; $i++) {
        $query = Pregunta::where('subcategoria_id', '=', $categoria->subCategorias[$i]->id)
        ->skip($skip)
        ->take($take)
        ->get();

        $pregObtenidas = count($query);

        if ($pregObtenidas == $take){
          $merge = $merge->merge($query);
          $valanceador = 0;
        }
        else if($pregObtenidas < $take){
          $valanceador = $take - $pregObtenidas;
        }
        else if($pregObtenidas == 0){ //en caso que sea igual a 0 (que no tenga ninguna pregunta la subcategoria)
          $valanceador = $take;
        }
        //si ya son 10 preguntas que regrese
        if(count($merge) == 10){
          return $merge;
        }
      }
      if($contador == 2){
        return [];
      }
      $take = $div + $valanceador;
      $contador++;
    }while(count($merge) < 10);
    // do{
    //   for ($i = 0; $i < $count; $i++) {
    //     $query = Pregunta::where('subcategoria_id', '=', $categoria->subCategorias[$i]->id)
    //     ->skip($skip)
    //     ->take($div + $valanceador)
    //     ->get();
    //     if (count($query) > 0){
    //       $merge = $merge->merge($query);
    //       $valanceador = 0;
    //     }
    //     //si ya son 10 preguntas que regrese
    //     if(count($merge) == 10){
    //       return $merge;
    //     }
    //     //si
    //     if(count($query) < $div && count($merge) != 10){
    //       $valanceador = $div - count($query) + $valanceador;
    //     }
    //   }
    //   if($contador == 2){
    //     return [];
    //   }
    //   $div += $valanceador;
    //   $valanceador = -$valanceador;
    //   $contador++;
    // }while($valanceador != 0);

    return $merge;
  }

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
