<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pregunta extends Model
{

  static public function get10preguntas(){
    $query = Pregunta::all()->take(10);
    // dd($query);
    return $query;
  }

  /**Relacion 1 a 1**/
  public function subCategoria()
  {
    return $this->hasOne('App\SubCategoria');
  }

  /**Relacion 1 a muchos inversa**/
  public function user()
   {
       return $this->belongsTo('App\User');
   }
}
