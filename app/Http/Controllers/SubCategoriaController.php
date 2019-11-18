<?php

namespace App\Http\Controllers;

use Session;
use App\Categoria;
use App\SubCategoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubCategoriaController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth:universidad');


  }

  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index()
  {
    $universidad_id = Auth::guard('universidad')->id();
    $categorias = Categoria::getCategorias($universidad_id);
    // $subcategorias = SubCategoria::where('universidad_id', '=', $universidad_id)->get();
    // return view('subcategorias.index', compact('subcategorias'));
    return view('Subcategorias.index', compact('categorias'));

  }

  /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function create()
  {
    $universidad_id = Auth::guard('universidad')->id();
    $categorias = Categoria::getCategorias($universidad_id);
    return view('Subcategorias.crear', compact('categorias'));
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
    'nombre' => 'required|max:255',
    'categoria_id' => 'required|numeric',
    ]);
    $sub = new SubCategoria();
    $sub->nombre = $request->input('nombre');
    $sub->universidad_id = Auth::guard('universidad')->id();
    $sub->categoria_id = $request->input('categoria_id');
    $sub->save();
    return redirect()->route('subcategorias.create')->with('status','Subcategoria creada con exito');
  }

  /**
  * Display the specified resource.
  *
  * @param  \App\SubCategoria  $subCategoria
  * @return \Illuminate\Http\Response
  */
  public function show(SubCategoria $subcategoria)
  {
    return view('Subcategorias.show', compact('subcategoria'));
  }

  /**
  * Show the form for editing the specified resource.
  *
  * @param  \App\SubCategoria  $subCategoria
  * @return \Illuminate\Http\Response
  */
  public function edit(SubCategoria $subcategoria)
  {
    $universidad_id = Auth::guard('universidad')->id();
    $categorias = Categoria::getCategorias($universidad_id);
    return view('Subcategorias.crear', compact(['subcategoria','categorias']));

  }

  /**
  * Update the specified resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @param  \App\SubCategoria  $subCategoria
  * @return \Illuminate\Http\Response
  */
  public function update(Request $request, SubCategoria $subcategoria)
  {
    $request->validate([
      'nombre' => 'required|max:255',
      'categoria_id' => 'required|numeric',
    ]);

    $subcategoria->nombre = $request->input('nombre');
    $subcategoria->universidad_id = Auth::guard('universidad')->id();
    $subcategoria->categoria_id = $request->input('categoria_id');
    $subcategoria->save();
    return redirect()->route('subcategorias.index')->with('status','Subcategoria modificada con exito');;

  }

  /**
  * Remove the specified resource from storage.
  *
  * @param  \App\SubCategoria  $subCategoria
  * @return \Illuminate\Http\Response
  */
  public function destroy(SubCategoria $subcategoria)
  {
    $subcategoria->delete();
    return redirect()->route('subcategorias.index')->with('status','Subcategoria eliminada con exito');
  }
}
