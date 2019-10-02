<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubCategoria extends Model
{
  protected $table = 'subcategorias';
  protected $with = ['categoria'];

  protected $fillable = [
      'nombre', 'universidad_id', 'categoria_id'
  ];
  /**Relacion 1 a 1**/
  public function tutorial()
  {
    return $this->hasOne('App\tutorial');
  }

  /**Relacion 1 a muchos**/
  public function preguntas()
  {
    return $this->hasMany('App\Pregunta');
  }

  /**Relacion 1 a muchos inversa**/
  public function categoria()
   {
       return $this->belongsTo('App\Categoria');
   }

  /**Relacion 1 a muchos inversa**/
  public function universidad()
   {
       return $this->belongsTo('App\Universidad');
   }

   static public function getPreguntas($id){
     $query = SubCategoria::with('pregunta')
                     // ->where('categoria.user_id', '=', $id)
                     ->where('universidad_id', '=', $id)
                     ->get();
     return $query;
   }
}
