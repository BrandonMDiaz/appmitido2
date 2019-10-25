<?php

namespace App\Http\Controllers;

use App\Pregunta;
use App\SubCategoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PreguntaController extends Controller
{

  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index(Request $request)
  {
    $universidad_id = Auth::guard('universidad')->id();
    $subcategorias = SubCategoria::where('universidad_id', '=', $universidad_id)->get();
    $id = $subcategorias[0]->id;
    $nombre = $subcategorias[0]->nombre;
    if(isset($request->subcategoria_id)){
      $id = $request->subcategoria_id;
      $preguntas = Pregunta::where('subcategoria_id', '=', $request->subcategoria_id)->paginate(15);
      foreach ($subcategorias as $sub) {
          if($sub->id == $request->subcategoria_id){
              $nombre = $sub->nombre;
          }
      }
    }
    else {
      $preguntas = Pregunta::where('subcategoria_id', '=', $subcategorias[0]->id)->paginate(15);
    // $subcategorias = SubCategoria::getPreguntas($universidad_id);
    }

    return view('preguntas.index', compact('preguntas', 'subcategorias', 'id', 'nombre'));
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
      'pregunta' => 'required',
      'subcategoria_id' => 'required',
      'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
      'opc1' => 'required',
      'opc2' => 'required',
      'opc3' => 'required',
      'resp' => 'required',
    ]);
    $preg = new Pregunta();
    $preg->universidad_id = Auth::guard('universidad')->id();
    $preg->subcategoria_id = $request->subcategoria_id;
    $preg->pregunta = $request->pregunta;
    if($request->hasFile('image')){
      $preg->imagen = $request->file('image')->store('public');
    }
    $preg->opcion1 = $request->opc1;
    $preg->opcion2 = $request->opc2;
    $preg->opcion3 = $request->opc3;
    $preg->respuesta = $request->resp;
    $preg->save();
    $exito = 1;
    return redirect()->route('preguntas.create',compact('exito'));
  }

  /**
  * Display the specified resource.
  *
  * @param  \App\Pregunta  $pregunta
  * @return \Illuminate\Http\Response
  */
  public function show(Pregunta $pregunta)
  {
    return view('preguntas.show', compact('pregunta'));
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
      'subcategoria_id' => 'required',
      'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
      'opc1' => 'required',
      'opc2' => 'required',
      'opc3' => 'required',
      'resp' => 'required',
    ]);
    $pregunta->universidad_id = Auth::guard('universidad')->id();
    $pregunta->subcategoria_id = $request->subcategoria_id;
    $pregunta->pregunta = $request->pregunta;
    if($request->hasFile('image')){
      Storage::delete($pregunta->imagen);
      $pregunta->imagen = $request->file('image')->store('public');
    }
    $pregunta->opcion1 = $request->opc1;
    $pregunta->opcion2 = $request->opc2;
    $pregunta->opcion3 = $request->opc3;
    $pregunta->respuesta = $request->resp;
    $pregunta->save();
    $exito = 1;

    return redirect()->route('preguntas.show', $pregunta->id);
  }

  /**
  * Remove the specified resource from storage.
  *
  * @param  \App\Pregunta  $pregunta
  * @return \Illuminate\Http\Response
  */
  public function destroy(Pregunta $pregunta)
  {
    $pregunta->delete();
    return redirect()->route('preguntas.index');
  }
}
