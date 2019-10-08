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
    $examenes = Examen::where('user_id', '=', Auth::user()->id)->get();
    $count = count($categoria->subCategorias);
    $modulo = 10 % $count;
    $div = 10 / $count;
    $skip = count($examenes) * $div;
    $merge = new Collection;
    // LIMIT number;
    if($modulo == 0){
      for ($i = 0; $i < $count; $i++) {
        $query = Pregunta::where('subcategoria_id', '=', $categoria->subCategorias[$i]->id)
        ->skip($skip)
        ->take($div)
        ->get();
        $merge = $merge->merge($query);
      }
    }
    else{
      for ($i = 0; $i < $count - 1; $i++) {
        $query = Pregunta::where('subcategoria_id', '=', $categoria->subCategorias[$i]->id)
        ->take($div)
        ->get();
        $merge = $merge->merge($query);
      }
      $query = Pregunta::where('subcategoria_id', '=', $categoria->subCategorias[$count-1]->id)
      ->skip(($div + $modulo) * count($examenes))
      ->take($div + $modulo)
      ->get();

      $merge = $merge->merge($query);

    }
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
