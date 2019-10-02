<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExamenPregunta extends Model
{
  protected $table = 'subcategorias';
  protected $with = ['categoria'];
}
