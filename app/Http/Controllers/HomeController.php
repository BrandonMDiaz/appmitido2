<?php

namespace App\Http\Controllers;

use App\Categoria;
use App\Universidad;

use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
  public function __construct()
  {

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
      $categorias = DB::table('categorias')->where('universidad_id', $request->id)->get();
    }
    else if($user->examen > 0){
      $categorias = DB::table('categorias')->where('universidad_id', $user->examen)->get();
    }
    else{
      return redirect('/universidad');
    }
    return view('home.index', compact('categorias'));
  }

  

}
