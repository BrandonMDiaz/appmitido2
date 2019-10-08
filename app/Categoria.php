<?php

namespace App;

use Illuminate\Support\Facades\DB;
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


  static public function getExamen($universidadId, $userId){
    // return Categoria::where('universidad_id', '=', $universidadId)
    // ->examenes->where('user_id', '=', $userId);
    return  Categoria::where('universidad_id', '=', $universidadId)
            ->with(['examenes' => function ($query) use ($userId) {
                    $query->where('user_id', '=', $userId);
                  }])->get();
  }
  /**Relacion 1 a muchos inversa**/
  public function universidad()
   {
       return $this->belongsTo('App\Universidad');
   }

   /**Relacion 1 a muchos**/
   public function examenes()
   {
     return $this->hasMany('App\Examen');
   }

   static public function getCategoria($id){
     $query = Categoria::where('id', '=', $id)
                    ->with('subCategorias')
                    ->get();
     return $query;
   }

   static public function getCategorias($id){
     $query = Categoria::with('subCategorias')
                     // ->where('categoria.user_id', '=', $id)
                     ->where('universidad_id', '=', $id)
                     ->get();
     // dd($query);
     return $query;
   }
}
