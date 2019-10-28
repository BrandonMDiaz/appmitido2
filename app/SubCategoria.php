<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubCategoria extends Model
{
  protected $table = 'subCategorias';
  protected $with = ['categoria'];

  protected $fillable = [
      'nombre', 'universidad_id', 'categoria_id'
  ];
  /**Relacion 1 a 1**/
  public function tutoriales()
  {
    return $this->hasMany('App\tutorial', 'subcategoria_id');
  }

  /**Relacion 1 a muchos**/
  public function preguntas()
  {
    return $this->hasMany('App\Pregunta','subcategoria_id');
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
     $query = SubCategoria::where('universidad_id', '=', $id)
     ->with('preguntas')
                     // ->where('categoria.user_id', '=', $id)
                     ->get();
     return $query;
   }
}
