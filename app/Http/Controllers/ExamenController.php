<?php

namespace App\Http\Controllers;

use Session;
use App\Pregunta;
use App\Examen;
use App\Categoria;
use App\ExamenPregunta;
use App\CustomClass\Estadistica;


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
    /*funcion para ver si el usuario tiene un examenUniversidad
    en sus parametros diferente de 0*/
    $examen = Auth::user()->examen;
    if(!StatusExamen::haveExam($examen)){
      return redirect('/universidad');
    }

    $categorias = Categoria::getExamen($examen ,Auth::user()->id);
    $data = Estadistica::estadisticas($categorias);

    return view('examen.index',compact('categorias', 'data'));
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

    // $request->validate([
    // 'calificacion' => 'required|numeric',
    // 'tiempo' => 'required|numeric',
    // 'resp.*' => 'required|numeric',
    // 'corr.*' => 'required|numeric',
    // ]);

    $examen = new Examen();
    $examen->categoria_id = $request->categoria_id;
    $examen->user_id = Auth::user()->id;
    $examen->calificacion = $request->input("calificacion");
    $examen->tiempo_en_segundos = $request->input("tiempo");
    $examen->save();

    $minutos = $request->input("tiempo") / 60;
    $minutos = (int)$minutos;
    $segundos = $request->input("tiempo") % 60;
    $preg = $request->input("preg_id");
    $resp = $request->input("resp");
    $corr = $request->input("corr");

    for ($i=0; $i < 10; $i++) {
      $examenPre = new ExamenPregunta();
      $examenPre->examen_id = $examen->id;
      $examenPre->pregunta_id = $request->input("preg_id.$i");

      $examenPre->respuesta_seleccionada = $request->input("resp.$i");
      $examenPre->correcta = $request->input("corr.$i");
      $examenPre->save();
    }
    return redirect("resultados/$examen->id");
  }

  //Mostrar lista de resultados
  public function resultados()
  {
    $examen = Auth::user()->examen;
    $categorias = Categoria::getExamen($examen, Auth::user()->id);
    return view('examen.resultados', compact('categorias'));
  }

  //Mostrar un resultado en especifico
  public function resultadosShow($id)
  {
    // $categoria = Categoria::getCategoria($request->categoria_id);
    $examen = Examen::revisarExamen($id);
    // ->examenPregunta;
    $datos = $this->calcularExamen($examen);

    return view('examen.resultado', compact('examen', 'datos'));
  }

  private function calcularExamen($examen){
    $obj =  new \stdClass;
    $obj->correctas = 0;
    $obj->segundos = 0;
    $obj->minutos = 0;
    $minutos = $examen->tiempo_en_segundos / 60;
    $minutos = (int)$minutos;
    $segundos = $examen->tiempo_en_segundos % 60;

    $obj->minutos = $minutos;
    $obj->segundos = $segundos;
    $obj->respuestaSeleccionada = [];
    $obj->categoriaM = [];
    $obj->categoriaB = [];

    $repetido = [];
    foreach ($examen->examenPregunta as $pregunta) {
      array_push($obj->respuestaSeleccionada, $pregunta->pivot->respuesta_seleccionada);
      if($pregunta->pivot->correcta == 1){
          $obj->correctas = $obj->correctas + 1;
          if(!in_array($pregunta->subcategoria->nombre, $obj->categoriaB)){
            array_push($obj->categoriaB, $pregunta->subcategoria->nombre);
          }
      }
      else {
        if(!in_array($pregunta->subcategoria->nombre, $obj->categoriaM)){
          array_push($obj->categoriaM, $pregunta->subcategoria->nombre);
        }
      }
    }

    return $obj;
  }

  /**
  * Display the specified resource.
  *
  * @param  \App\Examen  $examen
  * @return \Illuminate\Http\Response
  */
  public function show($id)
  {
    $categoria = Categoria::getCategoria($id);
    $preguntas = Pregunta::get10preguntas($categoria[0]);
    if(count($preguntas) != 10){
      return view('examen.missing');
    }
    $nombre = $categoria[0]->nombre;
    return view('examen.examen2', compact('preguntas','id','nombre'));
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
