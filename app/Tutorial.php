<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tutorial extends Model
{
  public function subCategoria()
  {
    return $this->hasOne('App\SubCategoria');
  }
}
