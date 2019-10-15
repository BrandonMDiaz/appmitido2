<?php

namespace App\Http\Controllers;

use App\Pregunta;
use App\SubCategoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PreguntaController extends Controller
{

  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index()
  {
    $universidad_id = Auth::guard('universidad')->id();
    $subcategorias = SubCategoria::getPreguntas($universidad_id);
    return view('preguntas.index', compact('subcategorias'));
  }

  /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function create()
  {
    $universidad_id = Auth::guard('universidad')->id();
    $subcategorias = SubCategoria::where('universidad_id', '=', $universidad_id)
    ->get();
    return view('preguntas.create', compact('subcategorias'));
  }

  /**
  * Store a newly created resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */
  public function store(Request $request)
  {

    $request->validate([
      'pregunta' => 'required|max:255',
      'categoria_id' => 'required|numeric',
    ]);
    $sub = new SubCategoria();
    $sub->nombre = $request->input('nombre');
    $sub->universidad_id = Auth::guard('universidad')->id();
    $sub->categoria_id = $request->input('categoria_id');
    $sub->save();
    return redirect()->route('subcategorias.index');
  }

  /**
  * Display the specified resource.
  *
  * @param  \App\Pregunta  $pregunta
  * @return \Illuminate\Http\Response
  */
  public function show(Pregunta $pregunta)
  {
    //
  }

  /**
  * Show the form for editing the specified resource.
  *
  * @param  \App\Pregunta  $pregunta
  * @return \Illuminate\Http\Response
  */
  public function edit(Pregunta $pregunta)
  {
    $subcategorias = SubCategoria::where('universidad_id', '=', $pregunta->universidad_id)
    ->get();
    return view('preguntas.create', compact('pregunta', 'subcategorias'));
  }

  /**
  * Update the specified resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @param  \App\Pregunta  $pregunta
  * @return \Illuminate\Http\Response
  */
  public function update(Request $request, Pregunta $pregunta)
  {
    $request->validate([
    'pregunta' => 'required',
    'subcategoria_id' => 'required|numeric',
    'opc1' => 'required',
    'opc2' => 'required',
    'opc3' => 'required',
    'resp' => 'required',
    'img' => 'image|nullable',
    ]);

    $pregunta->pregunta = $request->input('pregunta');
    $pregunta->subcategoria_id = $request->input('subcategoria_id');
    $pregunta->universidad_id = Auth::guard('universidad')->id();

      $pregunta->imagen = $request->input('img');

    $pregunta->opcion1 = $request->input('opc1');
    $pregunta->opcion2 = $request->input('opc2');
    $pregunta->opcion3 = $request->input('opc3');
    $pregunta->respuesta = $request->input('resp');

    $pregunta->save();
    return redirect()->route('preguntas.index');
  }

  /**
  * Remove the specified resource from storage.
  *
  * @param  \App\Pregunta  $pregunta
  * @return \Illuminate\Http\Response
  */
  public function destroy(Pregunta $pregunta)
  {
    //
  }
}
