<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tutorial extends Model
{
  protected $table = 'tutoriales';

  public function subcategoria()
  {
    return $this->belongsTo('App\SubCategoria', 'subcategoria_id');
  }

  /**Relacion 1 a muchos inversa**/
  public function universidad()
   {
       return $this->belongsTo('App\Universidad');
   }
}
