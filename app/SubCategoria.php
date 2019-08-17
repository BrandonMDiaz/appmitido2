<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubCategoria extends Model
{
  /**Relacion 1 a 1**/
  public function tutorial()
  {
    return $this->hasOne('App\tutorial');
  }

  /**Relacion 1 a muchos inversa**/
  public function Categoria()
   {
       return $this->belongsTo('App\Categoria');
   }

  /**Relacion 1 a muchos inversa**/
  public function user()
   {
       return $this->belongsTo('App\User');
   }
}
