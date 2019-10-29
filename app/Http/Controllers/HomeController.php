<?php

namespace App\Http\Controllers;

use App\Universidad;
use App\Pregunta;
use App\Examen;
use App\Categoria;
use App\SubCategoria;
use App\ExamenPregunta;
use App\CustomClass\Estadistica;

use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

  /**
  * Show the application dashboard.
  *
  * @return \Illuminate\Contracts\Support\Renderable
  */
  public function index(Request $request)
  {

    $user = Auth::user();
    if($request->id != null && $user->examen != $request->id){
      $user->examen = $request->id;
      $user->save();
    }
    if($request->id != null){
      $categorias = Categoria::getExamen($request->id ,Auth::user()->id);
      // $categorias = DB::table('categorias')->where('universidad_id', $request->id)->get();
    }
    else if($user->examen > 0){
      $categorias = Categoria::getExamen($user->examen ,Auth::user()->id);
    }
    else{
      return redirect('/universidad');
    }
    $subcategorias = SubCategoria::where('universidad_id', '=', $user->examen)->with('tutoriales')
    ->get();
    $data = Estadistica::estadisticas($categorias);
    return view('home.index', compact('categorias','data', 'subcategorias'));
  }
}
