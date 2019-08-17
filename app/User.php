<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
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
