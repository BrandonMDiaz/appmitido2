<?php

namespace App\Http\Controllers;

use App\SubCategoria;
use App\Tutorial;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class TutorialAController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

  public function index(){
    $examen = Auth::user()->examen;

    $subcategorias = SubCategoria::where('universidad_id', '=', $examen)
    ->with('tutoriales')
      ->paginate(15);
    return view('tutoriales.index',compact('subcategorias'));
  }
  public function show(Tutorial $tutorial)
  {
    return view('tutoriales.showA', compact('tutorial'));
  }
}
