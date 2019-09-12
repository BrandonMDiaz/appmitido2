<?php

namespace App\Http\Controllers;

use App\Pregunta;
use App\Examen;
use Illuminate\Http\Request;

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
    return view('examen.index');
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
