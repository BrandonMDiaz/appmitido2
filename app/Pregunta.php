<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pregunta extends Model
{

  static public function get10preguntas(){
    $query = Pregunta::all()->take(10);

    // $query = Pregunta::where('categoria_id', '=', $id)
    //   ->take(10);
    // dd($query);
    return $query;
  }

  /**Relacion 1 a muchos inversa**/
  public function subCategoria()
  {
    return $this->belongsTo('App\SubCategoria');
  }

  /**Relacion 1 a muchos inversa**/
  public function universidad()
   {
       return $this->belongsTo('App\Universidad');
   }

}
