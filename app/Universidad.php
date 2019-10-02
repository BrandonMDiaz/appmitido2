<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Universidad extends Authenticatable
{
  protected $table = 'universidades';

  use Notifiable;

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
       'email', 'password', 'logo', 'ubicacion'
  ];

  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */
  protected $hidden = [
      'password', 'remember_token',
  ];

  /**
   * The attributes that should be cast to native types.
   *
   * @var array
   */
  protected $casts = [
      'email_verified_at' => 'datetime',
  ];

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
