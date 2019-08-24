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

}
