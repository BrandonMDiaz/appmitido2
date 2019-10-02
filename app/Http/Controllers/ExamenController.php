<?php

namespace App\Http\Controllers;

use Session;
use App\Pregunta;
use App\Examen;
use App\Categoria;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\StatusExamen;

class ExamenController extends Controller
{

  public function __construct()
  {
    $this->middleware('auth');
  }
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index()
  {
    $examen = Auth::user()->examen;
    if(!StatusExamen::haveExam($examen)){
      return redirect('/universidad');
    }
    $categorias = Categoria::getCategoria($examen);
    return view('examen.index',compact('categorias'));
  }

  /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function create()
  {
    //
  }

  /**
  * Store a newly created resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */
  public function store(Request $request)
  {
    //
  }


  public function hacerExamen(Examen $examen)
  {

  }


  /**
  * Display the specified resource.
  *
  * @param  \App\Examen  $examen
  * @return \Illuminate\Http\Response
  */
  public function show(Examen $examen)
  {
    // $categoria = $examen->
    $preguntas = Pregunta::get10preguntas();
    return view('examen.examen2', compact('preguntas'));
  }

  /**
  * Show the form for editing the specified resource.
  *
  * @param  \App\Examen  $examen
  * @return \Illuminate\Http\Response
  */
  public function edit(Examen $examen)
  {
    //
  }

  /**
  * Update the specified resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @param  \App\Examen  $examen
  * @return \Illuminate\Http\Response
  */
  public function update(Request $request, Examen $examen)
  {
    //
  }

  /**
  * Remove the specified resource from storage.
  *
  * @param  \App\Examen  $examen
  * @return \Illuminate\Http\Response
  */
  public function destroy(Examen $examen)
  {
    //
  }
}
