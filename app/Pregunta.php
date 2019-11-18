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
    $subCatTotal = count($categoria->subCategorias);
    if($subCatTotal == 0){
      return [];
    }
    $examenesHechos = count($examenes);
    //para saber si al dividirse se tendran que agregar mas o no
    $modulo = 10 % $subCatTotal;
    //se divide para saber cuantas preguntas sacaremos por subcategoria
    $div = round(10 / $subCatTotal, 0);
    //cuantas preguntas nos vamos a saltar (lo obtenemos al sacar los examenes que ha hecho)
    $skip = $examenesHechos * $div;
    //donde vamos a combinar todas las queries
    $merge = new Collection;
    //en caso que la division tenga residuos se agregaran al balanceador
    $valanceador = $modulo;
    $contador = 0;
    //las preguntas que tiene que agarrar
    $take = $div + $valanceador;
    do{
      for ($i = 0; $i < $subCatTotal; $i++) {
        $query = Pregunta::where('subcategoria_id', '=', $categoria->subCategorias[$i]->id)
        ->skip($skip)
        ->take($take)
        ->get();

        $pregObtenidas = count($query);
        $valanceador = 0;
        $merge = $merge->merge($query);
        if($contador == 0){
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
        else {
          $take = $take;
        }

        //si ya son 10 preguntas que regrese
        if(count($merge) == 10){
          return $merge;
        }

      }
      if($contador == 2){
        return [];
      }
      $take = 10 - count($merge);
      $contador++;
    }while(count($merge) < 10);
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
