<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
  // protected $with = ['subCategoria'];

  /**Relacion 1 a muchos**/
  public function subCategorias()
  {
    return $this->hasMany('App\SubCategoria');
  }

  /**Relacion 1 a muchos inversa**/
  public function user()
   {
       return $this->belongsTo('App\User');
   }

   static public function getCategoria($id){
     $query = Categoria::with(['subCategorias'])
                     // ->where('categoria.user_id', '=', $id)
                     ->where('user_id', '=', $id)
                     ->get();
     // dd($query);
     return $query;
   }
}
