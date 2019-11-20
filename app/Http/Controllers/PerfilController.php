<?php

namespace App\Http\Controllers;

use App\Examen;
use App\User;
use App\CustomClass\Estadistica;

use App\Categoria;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PerfilController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
    $this->middleware('univ');

  }

  public function show(){
    $user = Auth::user();
    return view('perfil.editar',compact('user'));
  }

  public function editar(Request $request, User $user){
    $request->validate([
            'name' => 'required|min:3|max:155',
            'preparatoria' => 'required|max:255',
            'promedio' => 'required|numeric|max:100|min:60',
        ]);
    $user->name = $request->name;
    if(isset($user->preparatoria)){
      $user->preparatoria = $request->preparatoria;
    }
    if(isset($user->promedio)){
      $user->promedio = $request->promedio;
    }
    $user->save();
    return redirect()->route('perfil');
  }
  public function perfil()
  {
    $examen = Auth::user()->examen;
    $user = Auth::user();
    $categorias = Categoria::getExamen($examen ,Auth::user()->id);
    // $data = $this->estadisticas($categorias);
    $data = Estadistica::estadisticas($categorias);

    return view('perfil.user', compact('categorias', 'data', 'user'));
  }

}
