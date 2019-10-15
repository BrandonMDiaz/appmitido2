<?php

namespace App\Http\Controllers;

use Session;
use App\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoriaController extends Controller
{
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index()
  {
    $universidad_id = Auth::guard('universidad')->id();
    $categorias = Categoria::getCategorias($universidad_id);
    return view('categorias.index', compact('categorias'));
  }

  /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function create()
  {
    return view('categorias.crear');
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
    ]);
    $cat = new Categoria();
    $cat->nombre = $request->input('nombre');
    $cat->universidad_id = Auth::guard('universidad')->id();

    $cat->save();
    return redirect()->route('categorias.index');
  }

  /**
  * Display the specified resource.
  *
  * @param  \App\Categoria  $categoria
  * @return \Illuminate\Http\Response
  */
  public function show(Categoria $categoria)
  {
    $subcategorias = Categoria::find($categoria->id)->subcategorias;
    return view('categorias.show', compact(['categoria','subcategorias']));
  }

  /**
  * Show the form for editing the specified resource.
  *
  * @param  \App\Categoria  $categoria
  * @return \Illuminate\Http\Response
  */
  public function edit(Categoria $categoria)
  {
    return view('categorias.crear', compact('categoria'));
  }

  /**
  * Update the specified resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @param  \App\Categoria  $categoria
  * @return \Illuminate\Http\Response
  */
  public function update(Request $request, Categoria $categoria)
  {
    $request->validate([
    'nombre' => 'required|max:255',
    ]);
    $categoria->nombre = $request->input('nombre');
    $categoria->universidad_id = Auth::guard('universidad')->id();
    $categoria->save();

    return redirect()->route('categorias.show', $categoria->id);
  }

  /**
  * Remove the specified resource from storage.
  *
  * @param  \App\Categoria  $categoria
  * @return \Illuminate\Http\Response
  */
  public function destroy(Categoria $categoria)
  {
    $categoria->delete();
    return redirect()->route('categorias.index');
  }
}
