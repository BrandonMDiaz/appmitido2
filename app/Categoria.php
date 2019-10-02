<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
  protected $fillable = [
      'nombre', 'universidad_id'
  ];
  // protected $with = ['subCategoria'];

  /**Relacion 1 a muchos**/
  public function subCategorias()
  {
    return $this->hasMany('App\SubCategoria');
  }

  /**Relacion 1 a muchos inversa**/
  public function universidad()
   {
       return $this->belongsTo('App\Universidad');
   }

   static public function getCategoria($id){
     $query = Categoria::with('subCategorias')
                     // ->where('categoria.user_id', '=', $id)
                     ->where('universidad_id', '=', $id)
                     ->get();
     // dd($query);
     return $query;
   }
}
