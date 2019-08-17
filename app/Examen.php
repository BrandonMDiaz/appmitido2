<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Examen extends Model
{
  // protected $with = ['imagenes'];

  static public function getExamen10preguntas($id){
    $query = 1;
    // dd($query);
    return $query;
  }


  /**Relacion 1 a 1**/
  public function categoria()
  {
    return $this->hasOne('App\Categoria');
  }
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
}
