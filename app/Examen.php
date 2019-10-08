<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Examen extends Model
{
  protected $table = 'examenes';

  // protected $with = ['imagenes'];
  static public function revisarExamen($id){
    //agarrar preguntas de tabla intermedia
    $examen = Examen::find($id);
    return $examen;
    // return $examen->examenPregunta;
    // return $examen->examenPregunta;
    //
  }

  static public function getEstadisticas($id){

    return $query;
  }

  /**Relacion 1 a 1**/
  // public function categoria()
  // {
  //   return $this->hasOne('App\Categoria');
  // }

  /**Relacion 1 a muchos**/
  public function preguntas()
  {
    return $this->hasMany('App\Pregunta');
  }

  /**Relacion 1 a muchos inversa**/
  public function user()
  {
    return $this->belongsTo('App\User');
  }

  public function categoria()
  {
    return $this->belongsTo('App\Categoria');
  }

  public function examenPregunta()
  {
    return $this->belongsToMany('App\Pregunta', 'examen_pregunta')
    ->withPivot('respuesta_seleccionada', 'correcta');
  }
}
