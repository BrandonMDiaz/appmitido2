<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Universidad extends Model
{
  protected $table = 'universidades';

  public function user()
  {
    return $this->hasOne('App\User');
  }

  /**Relacion 1 a muchos**/
  public function preguntas()
  {
    return $this->hasMany('App\Pregunta');
  }

  /**Relacion 1 a muchos**/
  public function subCategorias()
  {
    return $this->hasMany('App\SubCategoria');
  }

  /**Relacion 1 a muchos**/
  public function categorias()
  {
    return $this->hasMany('App\Categoria');
  }
}
