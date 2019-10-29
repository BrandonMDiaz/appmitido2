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
    $count = count($categoria->subCategorias);
    if($count == 0){
      return [];
    }
    //para saber si al dividirse se tendran que agregar mas o no
    $modulo = 10 % $count;
    //se divide para saber cuatas vamos a obtener
    $div = round(10 / $count,0);
    //cuantas preguntas nos vamos a saltar
    $skip = round(count($examenes) * $div);
    //donde vamos a combinar todas las queries
    $merge = new Collection;
    //en caso que la division tenga residuos se agregaran al balanceador
    $valanceador = $modulo;
    $contador = 0;
    do{
      for ($i = 0; $i < $count; $i++) {
        $query = Pregunta::where('subcategoria_id', '=', $categoria->subCategorias[$i]->id)
        ->skip($skip)
        ->take($div + $valanceador)
        ->get();
        if (count($query) > 0){
          $merge = $merge->merge($query);
          $valanceador = 0;
        }
        //si ya son 10 preguntas que regrese
        if(count($merge) == 10){
          return $merge;
        }
        //si
        if(count($query) < $div && count($merge) != 10){
          $valanceador = $div - count($query) + $valanceador;
        }
      }
      if($contador == 2){
        return [];
      }
      $div += $valanceador;
      $valanceador = -$valanceador;
      $contador++;
    }while($valanceador != 0);
    // do{
    //   if($modulo == 0){
    //     for ($i = 0; $i < $count; $i++) {
    //       $query = Pregunta::where('subcategoria_id', '=', $categoria->subCategorias[$i]->id)
    //       ->skip($skip)
    //       ->take($div + $valanceador)
    //       ->get();
    //       $merge = $merge->merge($query);
    //       $valanceador = 0;
    //       if(count($query) < $div){
    //         $valanceador = $div - count($query);
    //       }
    //     }
    //   }
    //   else{
    //     for ($i = 0; $i < $count - 1; $i++) {
    //       $query = Pregunta::where('subcategoria_id', '=', $categoria->subCategorias[$i]->id)
    //       ->take($div)
    //       ->get();
    //       $merge = $merge->merge($query);
    //     }
    //     $query = Pregunta::where('subcategoria_id', '=', $categoria->subCategorias[$count-1]->id)
    //     ->skip(($div + $modulo) * count($examenes))
    //     ->take($div + $modulo)
    //     ->get();
    //
    //     $merge = $merge->merge($query);
    //   }
    // }while($valanceador != 0);



    // // LIMIT number;
    // if($modulo == 0){
    //   for ($i = 0; $i < $count; $i++) {
    //     $query = Pregunta::where('subcategoria_id', '=', $categoria->subCategorias[$i]->id)
    //     ->skip($skip)
    //     ->take($div + $valanceador)
    //     ->get();
    //     $merge = $merge->merge($query);
    //     $valanceador = 0;
    //     if(count($query) < $div){
    //       $valanceador = $div - count($query);
    //     }
    //   }
    // }
    // else{
    //   for ($i = 0; $i < $count - 1; $i++) {
    //     $query = Pregunta::where('subcategoria_id', '=', $categoria->subCategorias[$i]->id)
    //     ->take($div)
    //     ->get();
    //     $merge = $merge->merge($query);
    //   }
    //   $query = Pregunta::where('subcategoria_id', '=', $categoria->subCategorias[$count-1]->id)
    //   ->skip(($div + $modulo) * count($examenes))
    //   ->take($div + $modulo)
    //   ->get();
    //
    //   $merge = $merge->merge($query);
    // }
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
