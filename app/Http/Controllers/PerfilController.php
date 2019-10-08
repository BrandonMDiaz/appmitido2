<?php

namespace App\Http\Controllers;

use App\Examen;
use Illuminate\Http\Request;

class PerfilController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

  public function perfil()
  {
    $categorias = Categoria::getExamen($examen ,Auth::user()->id);

    return view('perfil.user', compact('categorias'));
  }
}
