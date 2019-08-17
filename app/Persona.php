<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
  /**Relacion 1 a 1**/
  public function user()
  {
    return $this->hasOne('App\User');
  }
}
